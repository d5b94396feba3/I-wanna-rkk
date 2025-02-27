<?php

namespace App\Controllers;
use App\Traits\AWSJSONFormatTrait;

class S3UploadController extends BaseController
{
    use AWSJSONFormatTrait;

    public function uploadJson()
    {

        $this->formatDataToJSON([]);
        // Path to the JSON file
        $jsonFilePath = WRITEPATH . 'uploads/sample2.json'; // e.g., generated file path
        $s3Key = 'uploads/sample2.json'; // S3 object key (path in bucket)

        // Call the helper function to upload
        $uploadedUrl = uploadJsonToS3($jsonFilePath, $s3Key);

        if ($uploadedUrl) {
            return $this->response->setJSON([
                'status' => 'success',
                'url'    => $uploadedUrl,
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to upload JSON.',
            ]);
        }
    }

    public function formatDataToJSON_disable(){
        $data = [
            'message_header' => [
                'message_id' => '123456789',
                'message_sender' => [
                    'message_sender_full_name' => '<MESSAGE_UPLOADER_NAME>'
                ],
                'message_created_date_time' => '2025-01-22T19:53:37Z'
            ],
            'message_indicator' => 'OriginalMessage OR UpdateMessage',
            'release_name' => '<ALBUM_NAME>',
            'release_icpn' => '123456789',
            'release_artwork_file_name' => '123456789',
            'release_original_release_date' => '2025-01-22T19:53:37Z',
            'release_is_remastered' => false,
            'release_genres' => ['ROKK_GENRE_1', 'ROKK_GENRE_2'],
            'release_available_markets' => ['AF', 'IN', 'DE', 'GB'],
            'release_copyright' => ['Worldwide'],
            'artists' => [
                [
                    'artist_name' => '<ARTIST_NAME>',
                    'artist_reference' => '<ARTIST_ID>',
                    'artist_explicit' => false,
                    'artist_artwork_link' => '<ARTIST_ARTWORK_LINK>',
                    'artist_genres' => ['ROKK_GENRE_1', 'ROKK_GENRE_2'],
                    'artist_role' => 'MainArtist'
                ],
                [
                    'artist_name' => '<ARTIST_NAME>',
                    'artist_reference' => '<ARTIST_ID>',
                    'artist_explicit' => false,
                    'artist_artwork_link' => '<ARTIST_ARTWORK_LINK>',
                    'artist_genres' => ['ROKK_GENRE_1', 'ROKK_GENRE_2'],
                    'artist_role' => 'Composer'
                ]
            ],
            'tracks' => [
                [
                    'track_name' => '<TRACK_NAME_1>',
                    'track_reference' => '<TRACK_ID>',
                    'track_file_name' => '<TRACK_FILE_NAME>',
                    'track_genre' => 'ROKK_GENRE_1',
                    'track_disc_number' => 1,
                    'track_duration_ms' => 158000,
                    'track_explicit' => false,
                    'track_number' => 1,
                    'track_type' => 'MusicalWorkSoundRecording',
                    'track_is_cover' => false,
                    'track_is_instrumental' => false,
                    'track_is_remastered' => false,
                    'track_is_hires' => true,
                    'track_language_performance' => 'en',
                    'track_is_dummy' => false
                ],
                [
                    'track_name' => '<TRACK_NAME_2>',
                    'track_reference' => '<TRACK_ID>',
                    'track_file_name' => '<TRACK_FILE_NAME>',
                    'track_genre' => 'ROKK_GENRE_1',
                    'track_disc_number' => 1,
                    'track_duration_ms' => 158000,
                    'track_explicit' => false,
                    'track_number' => 2,
                    'track_type' => 'MusicalWorkSoundRecording',
                    'track_is_cover' => false,
                    'track_is_instrumental' => false,
                    'track_is_remastered' => false,
                    'track_is_hires' => true,
                    'track_language_performance' => 'en',
                    'track_is_dummy' => false
                ]
            ]
        ];
        
        file_put_contents(WRITEPATH . 'uploads/sample2.json', json_encode($data, JSON_PRETTY_PRINT));
        
    }
}
