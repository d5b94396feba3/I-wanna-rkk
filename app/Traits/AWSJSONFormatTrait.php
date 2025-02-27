<?php

namespace App\Traits;

trait AWSJSONFormatTrait
{

    private function generateMessageId(): string
    {
        return random_int(100000000, 999999999);
    }

    private function getCurrentDateTime(): string
    {
        return gmdate('YmdHis');
    }

    private function getCurrentUTCDateTime(): string
    {
        return gmdate('Y-m-d\TH:i:s\Z');
    }

    public function formatDataToJSON($data_artist, $data_release, $administratorName, $administratorRole, $isUpdate = false)
    {
        // Extract first record 
        $artist = $data_artist[0];
        $release = $data_release[0];

        // extract artist genres
        $artistGenres = !empty($artist['genre']) ? explode(',', $artist['genre']) : [];

        // extract release genres
        $releaseGenres = !empty($release['genre']) ? explode(',', $release['genre']) : [];

        // extract release available markets
        $releaseAvailableMarkets = !empty($release['release_available_markets']) ? explode(',', $release['release_available_markets']) : [];
        
        $data = [
            'message_header' => [
                'message_id' => $this->generateMessageId(),
                'message_sender' => [
                    'message_sender_full_name' => $administratorName
                ],
                'message_created_date_time' => $this->getCurrentUTCDateTime()
            ],
            'message_indicator' => $isUpdate ? 'UpdateMessage' : 'OriginalMessage',
            'release_name' => $release['release_title'],
            'release_reference' => $release['release_id'],
            'release_icpn' => $release['release_icpn'],
            'release_artwork_file_name' => $release['artwork_file_name'] ?? '',
            'release_original_release_date' => $release['release_date'],
            'release_is_remastered' => false,
            'release_genres' => $releaseGenres,
            'release_available_markets' => $releaseAvailableMarkets,
            'release_language' => $release['language'],
            'release_copyright' => $release['copyright'],
            'release_copyright_desc' => $release['copyright_desc'],
            'artists' => [
                [
                    'artist_name' => $artist['artist_name'],
                    'artist_reference' => $artist['artist_id'],
                    'artist_explicit' => false,
                    'artist_artwork_file_name' => $artist['file_name'] ?? '',
                    'artist_artwork_link' => $artist['file_link'] ?? '',
                    'artist_genres' => $artistGenres,
                    'artist_role' => $administratorRole,
                    'artist_type' => $artist['artist_type'],
                    'distributor' => $artist['distributor'],
                    'label' => $artist['label'],
                ],
            ],
            'tracks' => array_map(function($track, $index) use ($release) {
                $track_number = $index + 1;
                $track_isrc_code = $release['release_icpn'] . '000' . ($index + 1);
                return [
                    'track_name' => $track['track_title'],
                    'track_reference' => $track['track_id'],
                    'track_file_name' => $track['track_file_name'] ?? '',
                    'track_genre' => $release['genre'],
                    'track_disc_number' => $track['track_disc_number'],
                    'track_duration_ms' => $track['track_duration_ms'],
                    'track_explicit' => $track['explicit'] === 'yes' ? true : false,
                    'track_number' => $track_number,
                    'track_type' => '',
                    'track_is_cover' => false,
                    'track_is_instrumental' => false,
                    'track_is_remastered' => false,
                    'track_is_hires' => false,
                    'track_language_performance' => '',
                    'track_features' => $track['features'],
                    'track_composer' => $track['composer'],
                    'track_lyricist' => $track['lyricist'],
                    'track_isrc_code' => $track_isrc_code,
                    'track_isrc_code_reference' => $track['isrc_code'],
                ];
            }, array_values($data_release), array_keys(array_values($data_release)))
        ];
        
        return $data;
    }


}