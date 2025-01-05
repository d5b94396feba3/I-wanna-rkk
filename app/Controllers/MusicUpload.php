<?php

namespace App\Controllers;

use App\Models\MusicUploadModel;
use App\Models\MusicUploadModel_mainDB;
use CodeIgniter\Controller;
use App\Traits\FileUploadTrait;
use App\Traits\InputFieldsValidationTrait;

class MusicUpload extends BaseController
{

    protected $music_upload_model;
    protected $music_upload_model_mainDB;
    protected $session;
    private $cache;
    use FileUploadTrait;
    use InputFieldsValidationTrait;

    public function __construct()
    {
        $this->music_upload_model = model("MusicUploadModel");
        $this->music_upload_model_mainDB = model("MusicUploadModel_mainDB");
        $this->session = session();
        $this->cache = \Config\Services::cache();

        // Set PHP limits for large file uploads
        ini_set('upload_max_filesize', '100M');
        ini_set('post_max_size', '100M');
        ini_set('memory_limit', '256M');
        ini_set('max_execution_time', '1200'); // 20 minutes
    }

    public function index()
    {
        $data["active_nav"] = "create_release";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        // Get the user data
        $userid = $this->userID();

        $artist = $this->music_upload_model->get_artist_data_from_artist_info_by_id($userid);
        $genres = $this->music_upload_model_mainDB->getGenreDataFromMainDB();

        $data['artist_data'] = $artist;
        $data['genres'] = $genres;

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/music-upload/create-release/index", $data) .
            view("rokk-artists/layout/footer");
    }

    /**
     * Upload a new music release with cover image and track data
     * 
     * Validates the request method and input fields
     * Handles cover image upload and creates release record
     * Calls upload_track_data() to handle individual track uploads
     * 
     * @return JSON Response with success/error message
     */
    public function upload_music_release_data()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== 'post') {
            return $this->handleResponse(false, 'Invalid request method');
        }

        if (!$this->validateUploadMusicReleaseFields($this->request)) {
            return $this->handleResponse(false, 
                'Failed to update. Please check the input fields and ensure correct data is entered in all required fields.'
            );
        }

        // Handle cover image upload
        $file = $this->request->getFile('image_link');
        $image_newName = $this->generateFileName($this->userID(), $file->getName());

        if (!$this->handleReleaseImageFileUpload($file, $image_newName)) {
            log_message('error', "Cover Image upload failed: file_name: " . $file->getName());
            return $this->handleResponse(false, 
                'Cover Image upload failed. Please refresh and try again.'
            );
        }

        // Create release record
        $image_link = base_url("release/image/" . $image_newName);
        $release_id = $this->music_upload_model->upload_release_data(
            $this->request->getPost(),
            $image_link,
            $this->userID()
        );

        if (!$release_id) {
            return $this->handleResponse(false, 
                'Failed to upload your release. Please refresh page and try again. 1'
            );
        }

        // Upload tracks
        $result = $this->upload_track_data(
            $this->request,
            $release_id,
            $this->request->getPost('num_of_track')
        );

        return $this->handleResponse(
            $result,
            $result 
                ? 'Your release upload was successful.'
                : 'Failed to upload your release. Please refresh page and try again. 2'
        );
    }

    /**
     * Upload track data for a release
     */
    public function upload_track_data($request, $release_id, $num_of_track)
    {
        try {
            // Validate input
            if (!is_numeric($num_of_track) || $num_of_track > 100 || $num_of_track < 1) {
                log_message('error', "Invalid number of tracks: {$num_of_track}");
                return false;
            }

            $userid = $this->userID();

            // Process each track
            for ($track_index = 1; $track_index <= $num_of_track; $track_index++) {
                if (!$this->processTrackUpload($request, $release_id, $userid, $track_index)) {
                    $this->handleFailedUpload($release_id);
                    return false;
                }
            }

            return true;

        } catch (\Exception $e) {
            log_message('error', 'Track upload failed: ' . $e->getMessage());
            $this->handleFailedUpload($release_id);
            return false;
        }
    }

    /**
     * Process individual track upload
     */
    private function processTrackUpload($request, $release_id, $userid, $track_index): bool
    {
        // Build field names
        $fields = $this->buildTrackFieldNames($track_index);

        if (!$this->validateUploadTrackFields($this->request, $fields)) {
            log_message('error', "Track validation failed for track {$track_index}");
            return false;
        }

        // Handle file upload
        $track_file = $request->getFile($fields['track_file']);
        if (!$track_file->isValid()) {
            log_message('error', "Invalid track file for track {$track_index}");
            return false;
        }

        // Generate new filename and upload
        $track_file_newName = $this->generateFileName($userid, $track_file->getName());
        if (!$this->handleReleaseTrackFileUpload($track_file, $track_file_newName)) {
            log_message('error', "File upload failed for track {$track_index}");
            return false;
        }

        // Generate track URL and build data
        $track_link = base_url("audio/track/" . $track_file_newName);
        $track_data = $this->buildTrackData($fields, $track_file_newName, $track_link, $release_id, $this->request->getPost());

        // Insert track data
        if (!$this->music_upload_model->upload_track_data($track_data)) {
            log_message('error', "Database insert failed for track {$track_index}");
            return false;
        }

        return true;
    }

    /**
     * Handle cleanup for failed upload
     */
    private function handleFailedUpload($release_id): void
    {
        if (!$this->music_upload_model->cleanupFailedUpload($release_id)) {
            log_message('error', 
                "Failed to delete release data from artist_release table after track upload failure. " .
                "Release ID: {$release_id}"
            );
        }
    }


    /**
     * Build track field names based on track index
     */
    private function buildTrackFieldNames(string $track_index): array 
    {
        return [
            'track_title' => "track_title_{$track_index}",
            'features' => "features_{$track_index}",
            'composer' => "composer_{$track_index}",
            'lyricist' => "lyricist_{$track_index}",
            'isrc_code' => "isrc_code_{$track_index}",
            'explicit' => "explicit_{$track_index}",
            'track_file' => "track_file_{$track_index}",
            'artist_name' => "artist_name_{$track_index}",
        ];
    }

    /**
     * Build track data array for database update
     */
    private function buildTrackData(array $fields, string $fileName, string $fileLink, string $release_id, array $requestData): array
    {
        return [
            'artist_id' => $this->userID(),
            'release_id' => $release_id,
            'artist_name' => $requestData[$fields['artist_name']],
            'track_title' => $requestData[$fields['track_title']],
            'features' => $requestData[$fields['features']],
            'composer' => $requestData[$fields['composer']],
            'lyricist' => $requestData[$fields['lyricist']],
            'isrc_code' => $requestData[$fields['isrc_code']],
            'explicit' => $requestData[$fields['explicit']],
            'track_file_name' => $fileName,
            'track_file_link' => $fileLink
        ];
    }

    /**
     * Get an audio track file and stream it to the client
     * 
     * @param string $filename The name of the track file to retrieve
     * @return \CodeIgniter\HTTP\Response The HTTP response containing the audio file
     * 
     * Validates authentication, sanitizes filename, and streams the audio file
     * with proper MIME type if found. Returns 403 if unauthorized or 404 if not found.
     */
    public function getTrack($filename)
    {
        // Sanitize the track name to prevent directory traversal
        $filename = basename($filename);

        if (!$this->authenticated()) {
            return $this->response->setStatusCode(403)->setBody('Access Denied');
        }else{
            $path = WRITEPATH . 'uploads/tracks/' . $filename;
            
            if (file_exists($path)) {
                $mime = mime_content_type($path);
                return $this->response
                    ->setHeader('Content-Type', $mime)
                    ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
                    ->setBody(file_get_contents($path));
            }
            
            return $this->response->setStatusCode(404)->setBody('Audio file not found');
        }
    }

    /**
     * Get a release cover image and stream it to the client
     * 
     * @param string $filename The name of the image file to retrieve
     * @return \CodeIgniter\HTTP\Response The HTTP response containing the image file
     * 
     * Validates authentication, sanitizes filename, and streams the image file
     * with proper MIME type if found. Returns 403 if unauthorized or 404 if not found.
     */
    public function getReleaseImage($filename)
    {

        // Sanitize the image name to prevent directory traversal
        $imageName = basename($filename);

        $path = WRITEPATH . 'uploads/release-images/' . $imageName;
        
        if (!$this->authenticated()) {
            return $this->response->setStatusCode(403)->setBody('Access Denied');
        }
        
        if (file_exists($path)) {
            $mime = mime_content_type($path);
            return $this->response
                ->setHeader('Content-Type', $mime)
                ->setHeader('Content-Disposition', 'inline; imageName="' . $imageName . '"')
                ->setBody(file_get_contents($path));
        }
        
        return $this->response->setStatusCode(404)->setBody('File not found');
    }


    public function get_all_genres_from_mainDB()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
    
        $cacheKey = 'genres_list';
        
        // Try to get genres from cache first
        if (!$genres = $this->cache->get($cacheKey)) {
            // If not in cache, get from DB
            $genres = $this->music_upload_model_mainDB->getGenreDataFromMainDB();
            // Cache genres for 1 hour
            $this->cache->save($cacheKey, $genres, 3600);
        }
    
        return $this->buildGenreOptions($genres);
    }

    public function ajax_genres_in_options_onPageLoad()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
    
        $cacheKey = 'genres_list';
        
        // Try to get genres from cache first
        if (!$genres = $this->cache->get($cacheKey)) {
            // If not in cache, get from DB
            $genres = $this->music_upload_model_mainDB->getGenreDataFromMainDB();
            // Cache genres for 1 hour
            $this->cache->save($cacheKey, $genres, 3600);
        }
    
        return $this->buildGenreOptions($genres);
    }
    
    private function buildGenreOptions(array $genres): string 
    {
        $options = array_map(function($genre) {
            $genre = trim($genre['genre']);
            // Escape the genre value for security
            $safeGenre = esc($genre);
            return sprintf('<option value="%s">%s</option>', $safeGenre, $safeGenre);
        }, $genres);
    
        return implode('', $options);
    }
}
