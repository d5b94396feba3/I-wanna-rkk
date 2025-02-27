<?php

namespace App\Traits;
use App\Traits\AWSJSONFormatTrait;
use App\Traits\InitModelsTrait;

trait S3BucketUploadTrait
{
    use AWSJSONFormatTrait;
    public function handleBatchUploadToS3($release_id, $isupdate=false)
    {
        try {
            // Step 0: Prepare release data
            $releaseData = $this->prepareReleaseData($release_id);
            if (!$releaseData) {
                return false;
            }

            // Extract data
            $data_artist = $releaseData['data_artist'];
            $data_release = $releaseData['data_release'];
            $administratorName = $releaseData['administrator_name'];
            $administratorRole = $releaseData['administrator_role'];

            // Extract first artist record
            $artist = $data_artist[0];
            if (empty($artist['file_name']) || empty($artist['file_link'])) {
                log_message('error', 'Artist artwork data is missing for release_id: ' . $release_id);
                // return false;
            }

            // Validate artwork filename
            $release = $data_release[0];
            if (empty($release['artwork_file_name'])) {
                log_message('error', 'Artwork filename is missing for release_id: ' . $release_id);
                // return false;
            }

            $release_icpn=$release['release_icpn'];

            // Generate base key
            $baseKey = $this->getCurrentDateTime() . '_' . $release_icpn;

            // Step 1: Artist Artwork File Upload
            if (!$this->uploadArtistMediaFiles($artist['file_name'], $artist['file_link'], $release_id, $baseKey)) {
                log_message('error', 'Artist Artwork filename is missing for release_id: ' . $release_id);
                // return false;
            }

            // Step 2: Upload JSON data
            if (!$this->uploadJsonData($data_artist, $data_release, $administratorName, $administratorRole, $release_id, $release_icpn, $baseKey, $isupdate)) {
                return false;
            }

            // Step 3: Release Upload media files
            if (!$this->uploadReleaseMediaFiles($data_release, $release['artwork_file_name'], $release_id, $baseKey)) {
                return false;
            }

            return true;

        } catch (\Exception $e) {
            log_message('error', 'Batch upload failed: ' . $e->getMessage());
            return false;
        }
    }

    private function prepareReleaseData($release_id)
    {
        // Initialize models required for release data
        $this->initMusicUploadModels(); 
        $userID = $this->userID();

        $data_artist = $this->music_upload_model->get_s3_upload_artist_data(
            $release_id,
            $userID
        );

        if (!$data_artist) {
            log_message('error', 'No artist data found for release_id: ' . $release_id);
            return false;
        }

        $data_release = $this->music_upload_model->get_s3_upload_release_data(
            $release_id,
            $userID
        );

        if (!$data_release) {
            log_message('error', 'No release data found for release_id: ' . $release_id);
            return false;
        }

        return [
            'data_artist' => $data_artist,
            'data_release' => $data_release,
            'administrator_name' => $this->administratorName(),
            'administrator_role' => $this->administratorRole()
        ];
    }

    private function uploadJsonData($data_artist, $data_release, $administratorName, $administratorRole, $release_id, $release_icpn, $baseKey, $isupdate)
    {
        try {
            $data = $this->formatDataToJSON($data_artist, $data_release, $administratorName, $administratorRole, $isupdate);
            
            $jsonData = json_encode($data, JSON_PRETTY_PRINT);
            if ($jsonData === false) {
                log_message('error', 'Failed to encode JSON data for release_id: ' . $release_id);
                return false;
            }

            $files = [[
                'data' => $jsonData,
                'key' => $baseKey . '/'.$release_icpn.'.json',
                'contentType' => 'application/json'
            ]];

             // Perform batch upload
             $results = batchUploadToS3($files, $baseKey);
             return $this->checkUploadResults($results, 'JSON Upload');

        } catch (\Exception $e) {
            log_message('error', 'JSON upload failed: ' . $e->getMessage());
            return false;
        }
    }


    private function uploadArtistMediaFiles($artwork_file_name, $artwork_file_link, $release_id, $baseKey)
    {
        try {
            $files = [];
            // Add artwork
            $artworkPath = ROOTPATH . 'public/uploads/images/' . $artwork_file_name;
            if (!file_exists($artworkPath)) {
                log_message('error', 'Artwork file not found: ' . $artworkPath);
                return false;
            }

            $artworkData = file_get_contents($artworkPath);
            if ($artworkData === false) {
                log_message('error', 'Failed to read artwork file: ' . $artworkPath);
                return false;
            }

            $files[] = [
                'data' => $artworkData,
                'key' => $baseKey . '/resources/' . $artwork_file_name,
                'contentType' => mime_content_type($artworkPath)
            ];

            if (empty($files)) {
                log_message('error', 'No files prepared for upload for release_id: ' . $release_id);
                return false;
            }

            $results = batchUploadToS3($files, $baseKey);
            return $this->checkUploadResults($results, 'Media Files Upload');


        } catch (\Exception $e) {
            log_message('error', 'Media files upload failed: ' . $e->getMessage());
            return false;
        }
    }

    private function uploadReleaseMediaFiles($data_release, $artwork_file_name, $release_id, $baseKey)
    {
        try {
            $files = [];
            // Add artwork
            $artworkPath = WRITEPATH . 'uploads/release-images/' . $artwork_file_name;
            if (!file_exists($artworkPath)) {
                log_message('error', 'Artwork file not found: ' . $artworkPath);
                return false;
            }

            $artworkData = file_get_contents($artworkPath);
            if ($artworkData === false) {
                log_message('error', 'Failed to read artwork file: ' . $artworkPath);
                return false;
            }

            $files[] = [
                'data' => $artworkData,
                'key' => $baseKey . '/resources/' . $artwork_file_name,
                'contentType' => mime_content_type($artworkPath)
            ];

            // Add tracks
            foreach ($data_release as $release) {
                if (empty($release['track_file_name'])) {
                    log_message('warning', 'Track filename is missing in release data');
                    continue;
                }

                $trackPath = WRITEPATH . 'uploads/tracks/' . $release['track_file_name'];
                if (!file_exists($trackPath)) {
                    log_message('warning', 'Track file not found: ' . $trackPath);
                    continue;
                }

                $trackData = file_get_contents($trackPath);
                if ($trackData === false) {
                    log_message('warning', 'Failed to read track file: ' . $trackPath);
                    continue;
                }

                $files[] = [
                    'data' => $trackData,
                    'key' => $baseKey . '/resources/' . $release['track_file_name'],
                    'contentType' => mime_content_type($trackPath)
                ];
            }

            if (empty($files)) {
                log_message('error', 'No files prepared for upload for release_id: ' . $release_id);
                return false;
            }

            $results = batchUploadToS3($files, $baseKey);
            return $this->checkUploadResults($results, 'Media Files Upload');


        } catch (\Exception $e) {
            log_message('error', 'Media files upload failed: ' . $e->getMessage());
            return false;
        }
    }

    private function checkUploadResults($results, $context = '')
    {
        $failures = array_filter($results, function($result) {
            return !$result['success'];
        });

        if (!empty($failures)) {
            foreach ($failures as $failure) {
                log_message('error', 
                    ($context ? "[$context] " : '') . 
                    'Upload failed: ' . ($failure['error'] ?? 'Unknown error')
                );
            }
            return false;
        }

        return true;
    }

    /**
     * Get user ID of the currently logged in account
     * Returns false if not logged in
     *
     * @return int
     */
    protected function userID(): int
    {
        if (!$this->authenticated()) {
            return 0;
        }

        $userid = session()->get('userid');
        return $userid;
    }

     /**
     * Get person's full name of the currently logged in account
     * Returns empty string if not logged in
     *
     * @return string
     */
    protected function administratorName(): string
    {
        if (!$this->authenticated()) {
            return '';
        }

        $artist_type = session()->get('administratorName');
        return $artist_type;
    }

     /**
     * Get user role of the currently logged in account
     * Returns empty string if not logged in
     *
     * @return string
     */
    protected function administratorRole(): string
    {
        if (!$this->authenticated()) {
            return '';
        }

        $artist_type = session()->get('userrole');
        return $artist_type;
    }


}