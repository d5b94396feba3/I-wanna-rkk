<?php

namespace App\Traits;

trait FileUploadTrait
{
    
    public function handleReleaseTrackFileUpload($file, $newName)
    {
        try {

            // get private app upload path
            $destination = WRITEPATH . 'uploads/tracks';
            // Ensure destination directory exists
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Move the file
            if (!$file->move($destination, $newName)) {
                // Get error details from the file object
                $errorString = $file->getErrorString();
                $errorCode = $file->getError();
                
                log_message('error', sprintf(
                    "File upload failed: %s (Error code: %s)", 
                    $errorString,
                    $errorCode
                ));
                
                return false;
            }

            return true;

        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'File upload failed: ' . $e->getMessage());
            
            return false;
        }
    }

    public function handleReleaseImageFileUpload($file, $newName)
    {
        try {

            // get private app upload path
            $destination = WRITEPATH . 'uploads/release-images';
            // Ensure destination directory exists
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Move the file
            if (!$file->move($destination, $newName)) {
                // Get error details from the file object
                $errorString = $file->getErrorString();
                $errorCode = $file->getError();
                
                log_message('error', sprintf(
                    "File upload failed: %s (Error code: %s)", 
                    $errorString,
                    $errorCode
                ));
                
                return false;
            }

            return true;

        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'File upload failed: ' . $e->getMessage());
            
            return false;
        }
    }

    public function handlePersonImageFileUpload($file, $newName)
    {
        try {
            // get private app upload path
            $destination =  ROOTPATH . "/public/uploads/images";
            // Ensure destination directory exists
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Move the file
            if (!$file->move($destination, $newName)) {
                // Get error details from the file object
                $errorString = $file->getErrorString();
                $errorCode = $file->getError();
                
                log_message('error', sprintf(
                    "File upload failed: %s (Error code: %s)", 
                    $errorString,
                    $errorCode
                ));
                
                return false;
            }

            return true;

        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'File upload failed: ' . $e->getMessage());
            
            return false;
        }
    }

    public function handleArtistLogoFileUpload($file, $newName)
    {
        try {
            // get private app upload path
            $destination =  ROOTPATH . "/public/uploads/images";
            // Ensure destination directory exists
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }

            // Move the file
            if (!$file->move($destination, $newName)) {
                // Get error details from the file object
                $errorString = $file->getErrorString();
                $errorCode = $file->getError();
                
                log_message('error', sprintf(
                    "File upload failed: %s (Error code: %s)", 
                    $errorString,
                    $errorCode
                ));
                
                return false;
            }

            return true;

        } catch (\Exception $e) {
            // Log the error
            log_message('error', 'File upload failed: ' . $e->getMessage());
            
            return false;
        }
    }

    /**
     * Generate a unique file name
     */
    private function generateFileName(string $id, string $originalName): string
    {
        return $id . '_' . uniqid() . '_' . str_replace(' ', '_', $originalName);
    }


}