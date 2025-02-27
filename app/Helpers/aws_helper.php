<?php


// For Server, Update this line to point to extracted AWS SDK location
// require_once __DIR__ . '/../../vendor/aws/aws-autoloader.php';

use Aws\S3\S3Client;

if (!function_exists('initializeS3Client')) {

    function initializeS3Client()
    {
        $s3Config = [
            'version' => 'latest',
            'region' => env('AWS_REGION'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY')
            ]
        ];
        return new S3Client($s3Config);
    }

}

/**
 * Batch upload files to S3 with retry logic
 * @param array $files Array of files with structure [['data' => $fileData, 'key' => $s3Key, 'contentType' => $mimeType], ...]
 * @param int $maxRetries Maximum number of retry attempts per file
 * @param int $initialBackoff Initial backoff delay in seconds
 * @return array Array of results with structure ['success' => bool, 'url' => string|null, 'error' => string|null]
 */
function batchUploadToS3($files, $basePrefix, $maxRetries = 3, $initialBackoff = 1) 
{
    $s3 = initializeS3Client();
    $bucket = env('AWS_BUCKET');
    $results = [];

    foreach ($files as $file) {
        $attempt = 0;
        $backoffDelay = $initialBackoff;
        $success = false;

        while ($attempt < $maxRetries && !$success) {
            try {
                $attempt++;

                // Validate file data
                if (empty($file['data'])) {
                    throw new \Exception('File data is empty');
                }

                if (empty($file['key'])) {
                    throw new \Exception('File key is missing');
                }

                if (empty($file['contentType'])) {
                    throw new \Exception('Content type is missing');
                }

                $result = $s3->putObject([
                    'Bucket' => $bucket,
                    'Key'    => $file['key'],
                    'Body'   => $file['data'],
                    'ContentType' => $file['contentType'],
                ]);

                $results[] = [
                    'success' => true,
                    'url' => $result['ObjectURL'],
                    'error' => null
                ];

                $success = true;

                if ($attempt > 1) {
                    log_message('info', 
                        "Successfully uploaded file {$file['key']} on attempt {$attempt}"
                    );
                }

            } catch (Aws\Exception\AwsException $e) {
                $errorMessage = "S3 upload failed for key {$file['key']}: " . $e->getMessage();
                
                if ($attempt < $maxRetries) {
                    log_message('warning', 
                        "Upload attempt {$attempt} failed: {$errorMessage}. " .
                        "Retrying in {$backoffDelay} seconds..."
                    );
                    
                    sleep($backoffDelay);
                    $backoffDelay *= 2; // Exponential backoff
                } else {
                    log_message('error', 
                        "Upload failed after {$maxRetries} attempts: {$errorMessage}"
                    );
                    
                    $results[] = [
                        'success' => false,
                        'url' => null,
                        'error' => $errorMessage
                    ];

                    // Clean up any uploaded files on failure
                    if (!empty($basePrefix)) {
                        log_message('info', "Cleaning up uploaded files due to failure...");
                        deleteS3Folder($basePrefix);
                    }

                    return $results;

                }
            } catch (\Exception $e) {
                log_message('error', 
                    "Validation failed for key {$file['key']}: " . $e->getMessage()
                );
                
                $results[] = [
                    'success' => false,
                    'url' => null,
                    'error' => $e->getMessage()
                ];

                // Clean up any uploaded files on failure
                if (!empty($basePrefix)) {
                    log_message('info', "Cleaning up uploaded files due to failure...");
                    deleteS3Folder($basePrefix);
                }
                
                return $results;

            }
        }
    }

    return $results;
}


/**
 * Delete a folder and its contents from S3
 * @param string $prefix The folder prefix to delete
 * @return bool Success status
 */
function deleteS3Folder($prefix) 
{
    try {
        $s3 = initializeS3Client();
        $bucket = env('AWS_BUCKET');

        // List all objects with the prefix
        $objects = $s3->listObjects([
            'Bucket' => $bucket,
            'Prefix' => $prefix
        ]);

        if (!isset($objects['Contents'])) {
            return true; // Nothing to delete
        }

        $deleteObjects = [];

        foreach ($objects['Contents'] as $object) {
            $deleteObjects[] = ['Key' => $object['Key']];
        }

        if (!empty($deleteObjects)) {
            $result = $s3->deleteObjects([
                'Bucket' => $bucket,
                'Delete' => [
                    'Objects' => $deleteObjects
                ]
            ]);

            log_message('info', "Deleted folder {$prefix} from S3");
            return true;
        }

        return true;

    } catch (Aws\Exception\AwsException $e) {
        log_message('error', "Failed to delete S3 folder {$prefix}: " . $e->getMessage());
        return false;
    }
}


