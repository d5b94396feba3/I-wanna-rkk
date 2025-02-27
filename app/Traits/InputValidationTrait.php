<?php

namespace App\Traits;

trait InputValidationTrait
{

    protected function validateUploadMusicReleaseFields($request)
    {
        $validation = \Config\Services::validation();

        $rules = [
            "artist_name" => "required|max_length[150]",
            "release_title" => "required|max_length[200]",
            "genre" => "required|max_length[100]", 
            "language" => "required",
            "release_date" => "required",
            "release_icpn" => "required|max_length[200]",
            "release_available_markets" => "required|max_length[200]",
            "copyright" => "required",
            "copyright_desc" => "max_length[255]",
            "image_link" => [
                "label" => "Release Image",
                "rules" => "uploaded[image_link]|max_size[image_link,10240]|is_image[image_link]",
                "errors" => [
                    "uploaded" => "A release image is required",
                    "max_size" => "The {field} field exceeds the maximum file size.",
                    "is_image" => "The {field} field must contain a valid image file."
                ]
            ]
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }


    protected function validateUploadTrackFields($request,$fields)
    {
        $validation = \Config\Services::validation();

        // Sanitize field names for validation
        $trackFile = trim($fields['track_file']);

        $rules = [
            $fields['artist_name'] => "required|max_length[250]",
            $fields['track_title'] => "required|max_length[250]",
            $fields['features'] => "max_length[150]",
            $fields['composer'] => "required|max_length[100]",
            $fields['lyricist'] => "required|max_length[100]",
            $fields['isrc_code'] => "required|max_length[100]",
            $fields['track_disc_number'] => "required|max_length[5]",
            $fields['track_file'] => [
                "label" => "Track File" . $fields['track_file'],
                "rules" => [
                    "uploaded[" . $trackFile . "]",
                    "max_size[" . $trackFile . ",102400]",
                    "ext_in[" . $trackFile . ",mp3,wav,flac,aac,ogg]",
                ],
                "errors" => [
                    "uploaded" =>
                        "The {field} field must contain a valid file.",
                    "max_size" =>
                        "The {field} field exceeds the maximum file size.",
                    "ext_in" =>
                        "The {field} field must be a valid audio file (MP3, WAV, FLAC, AAC, OGG).",
                ],
            ],
            $fields['explicit'] => "required",
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }


    protected function validateUpdateTrackFields($request,$fields)
    {
        $validation = \Config\Services::validation();

        $rules = [
            $fields['track_title'] => "required|max_length[250]",
            $fields['features'] => "max_length[150]",
            $fields['composer'] => "required|max_length[100]",
            $fields['lyricist'] => "required|max_length[100]",
            $fields['isrc_code'] => "required|max_length[100]",
            $fields['track_disc_number'] => "required|max_length[5]",
            $fields['explicit'] => "required",
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }

    protected function validateUpdateReleaseCoverImg($request)
    {
        $validation = \Config\Services::validation();

        $rules = [
            "image_link" => [
                "label" => "Release Cover Image",
                "rules" => "uploaded[image_link]|max_size[image_link,10240]|is_image[image_link]",
                "errors" => [
                    "uploaded" => "Please select an image to upload.",
                    "max_size" => "The {field} exceeds the maximum file size of 10MB.",
                    "is_image" => "The uploaded file is not a valid image.",
                ],
            ],
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }

    protected function validateUpdateTrackFile($request,$file)
    {
        $validation = \Config\Services::validation();

        $rules = [
            $file => [
                "label" => "Track File",
                "rules" => "uploaded[$file]|max_size[$file,102400]|ext_in[$file,mp3,wav,flac,aac,ogg]",
                "errors" => [
                    "uploaded" => "The {field} must contain a valid file.",
                    "max_size" => "The {field} exceeds the maximum file size.",
                    "ext_in" => "The {field} must be a valid audio file (MP3, WAV, FLAC, AAC, OGG).",
                ],
            ],
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }

    protected function validateUpdateReleaseDetailFields($request)
    {
        $validation = \Config\Services::validation();

        $rules = [
            "release_title" => "required|max_length[200]",
            "genre" => "required|max_length[100]",
            "language" => "required",
            "release_date" => "required",
            "release_icpn" => "required|max_length[200]",
            "release_available_markets" => "required|max_length[200]",
            "copyright" => "required",
            "copyright_desc" => "max_length[255]",
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }

    protected function validatePersonProfileImg($request)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'person_image_link' => [
                'rules' => [
                    'uploaded[person_image_link]',
                    'is_image[person_image_link]',
                    'mime_in[person_image_link,image/jpg,image/jpeg,image/png]',
                    'max_size[person_image_link,2048]', // 2MB max size
                ],
                'errors' => [
                    'uploaded' => 'Please choose a file to upload',
                    'is_image' => 'The file must be an image',
                    'mime_in' => 'The file must be a JPG or PNG image',
                    'max_size' => 'The file size must be under 2MB'
                ]
            ]
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }

    protected function validateArtistLogoImg($request)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'image_link' => [
                'rules' => [
                    'uploaded[image_link]',
                    'is_image[image_link]',
                    'mime_in[image_link,image/jpg,image/jpeg,image/png]',
                    'max_size[image_link,2048]', // 2MB max size
                ],
                'errors' => [
                    'uploaded' => 'Please choose a file to upload',
                    'is_image' => 'The file must be an image',
                    'mime_in' => 'The file must be a JPG or PNG image',
                    'max_size' => 'The file size must be under 2MB'
                ]
            ]
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }


    protected function validateArtistSettingFields($request)
    {
        $validation = \Config\Services::validation();

        $rules = [
            "artist_name" => "required|max_length[200]",
            "artist_type" => "required|max_length[100]",
            "official_contact_email" => "required",
            "country" => "required",
            "label" => "max_length[255]",
            "distributor_and_aggregator" => "max_length[255]",
            "genre" => "required|max_length[255]",
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }

    protected function validatePersonSettingFields($request)
    {
        $validation = \Config\Services::validation();

        $rules = [
            "role" => "required|max_length[50]",
            "firstname" => "required|max_length[150]",
            "lastname" => "required|max_length[150]",
            "email" => "required",
            "phone" => "max_length[20]",
            "country" => "max_length[100]",
            "address" => "max_length[100]",
            "city" => "max_length[100]",
            "zip" => "max_length[10]",
        ];

        $validation->setRules($rules);
        
        return $validation->withRequest($request)->run();
    }

    protected function validateSocialMediaFields($request)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            "website" => "max_length[255]",
            "facebook" => "max_length[255]", 
            "instagram" => "max_length[255]",
            "twitter" => "max_length[255]",
            "tiktok" => "max_length[255]",
            "youtube" => "max_length[255]",
            "metal-archives" => "max_length[255]",
            "discogs" => "max_length[255]",
        ]);

        return $validation->withRequest($request)->run();
    }

    protected function validatePasswordFields($request)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            "password" => 'required|min_length[8]|max_length[25]|regex_match[/[a-z]/]|regex_match[/[A-Z]/]|regex_match[/\d/]|regex_match[/[@$!%*?&]/]',
            "confirm_password" => "required"
        ]);

        return $validation->withRequest($request)->run();
    }

    protected function validateDeleteAccountFields($request)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            "password" => 'required|min_length[8]|max_length[25]|regex_match[/[a-z]/]|regex_match[/[A-Z]/]|regex_match[/\d/]|regex_match[/[@$!%*?&]/]'
        ]);

        return $validation->withRequest($request)->run();
    }


    protected function validateAuthLoginFields($request)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|min_length[8]|max_length[50]',
            'password' => 'required|min_length[8]|max_length[50]', 
        ]);

        return $validation->withRequest($request)->run();
    }

    protected function validateForgotPasswordField($request)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|min_length[8]|max_length[50]',
        ]);

        return $validation->withRequest($request)->run();
    }


}