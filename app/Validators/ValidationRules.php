<?php

namespace App\Validators;

use CodeIgniter\HTTP\RequestInterface;

class ValidationRules
{
    public static function audioFile($str, string $fields, array $data): bool
    {
        $allowedFormats = ['mp3', 'wav', 'flac', 'aac', 'ogg'];

        // Check if the file has been uploaded
        if (!isset($_FILES[$fields])) {
            return false;
        }

        $file = $_FILES[$fields];

        // Check if there is any error during file upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        // Get the file extension
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Check if the file extension is in the allowed formats
        return in_array(strtolower($fileExtension), $allowedFormats);
    }
}
