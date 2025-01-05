<?php

namespace App\Controllers;

use App\Models\MusicUploadModel;
use App\Models\MusicUploadModel_mainDB;
use App\Models\MusicReleaseModel;
use CodeIgniter\Controller;
use App\Traits\FileUploadTrait;
use App\Traits\InputFieldsValidationTrait;

class MusicRelease extends BaseController
{
    use FileUploadTrait;
    use InputFieldsValidationTrait;
    protected $music_upload_model;
    protected $music_release_model;
    protected $music_upload_model_mainDB;
    protected $session;
    protected $perPage = 8;
    private $cache;

    public function __construct()
    {
        $this->music_upload_model = model("MusicUploadModel");
        $this->music_release_model = model("MusicReleaseModel");
        $this->music_upload_model_mainDB = model("MusicUploadModel_mainDB");
        $this->session = session();
        $this->cache = \Config\Services::cache();
    }

    public function index()
    {
        $data["active_nav"] = "music_releases";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        // Get the artist data
        $artist_release = $this->music_release_model->get_artist_all_release_data_from_artist_release_tbl();

        $data['artist_release'] = $artist_release;

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/music-upload/music-releases/index", $data) .
            view("rokk-artists/layout/footer");
    }


    public function release_detail_index($release_id = null)
    {
        $data["active_nav"] = "music_releases";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        // Get the user data
        $userid = $this->userID();
        $release_detail = $this->music_release_model->get_artist_release_data_by_release_id($release_id);
        $artist_release_track = $this->music_release_model->get_artist_release_track_data_by_release_id($release_id);

        // Get the artist data
        $artist_data = $this->music_upload_model->get_artist_data_from_artist_info_by_id($userid);

        $data['release_detail'] = $release_detail;
        $data['artist_data'] = $artist_data;
        $data['artist_release_track'] = $artist_release_track;

        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/music-upload/music-releases/release_detail", $data) .
            view("rokk-artists/layout/footer");
    }

    public function track_index()
    {
        $data["active_nav"] = "mu_track";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        return view("rokk-artists/layout/header", $data) .
            view("rokk-artists/music-upload/track/index", $data) .
            view("rokk-artists/layout/footer");
    }


    public function ajax_artist_top_track_stats()
    {

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        $limit=4;
        $topTracks = $this->music_release_model->get_artist_top_tracks($limit);
        $topPlaylists=$topTracks;
        $topAlbums=$topTracks;

        $data['topTracks'] = $topTracks;
        $data['topPlaylists'] = $topPlaylists;
        $data['topAlbums'] = $topAlbums;

        $response = [
            'topTracks' => view("rokk-artists/dashboard/top-tracks", $data),
            'topPlaylists' => view("rokk-artists/dashboard/top-playlists", $data),
            'topAlbums' => view("rokk-artists/dashboard/top-albums", $data)
        ];

        return $this->response->setJSON($response);
    }

    function ajax_selected_top_track_data(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        } elseif (
            $this->request->getMethod() === "get"
        ) {
            $track_id = $this->request->getGet('track_id');
            $release_id = $this->request->getGet('release_id');
            $limit=1;
            $result = $this->music_release_model->get_selected_top_track_data($track_id,$release_id,$limit);
            if ($result) {
                $response = [
                    'result' => $result,
                ];
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON(['error' => 'No data found']);
            }
        }
    }

    function ajax_selected_top_albums_data(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }elseif (
            $this->request->getMethod() === "get"
        ) {
            $track_id = $this->request->getGet('track_id');
            $release_id = $this->request->getGet('release_id');
            $limit=1;
            $result = $this->music_release_model->get_selected_top_albums_data($track_id,$release_id,$limit);
            if ($result) {
                $response = [
                    'result' => $result,
                ];
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON(['error' => 'No data found']);
            }
        }
    }

    function ajax_selected_top_playlists_data(){
        
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }elseif (
            $this->request->getMethod() === "get"
        ) {
            $track_id = $this->request->getGet('track_id');
            $release_id = $this->request->getGet('release_id');
            $limit=1;
            $result = $this->music_release_model->get_artist_top_playlists_data($track_id,$release_id,$limit);
            if ($result) {
                $response = [
                    'result' => $result,
                ];
                return $this->response->setJSON($response);
            } else {
                return $this->response->setJSON(['error' => 'No data found']);
            }
        }
    }


    public function artist_release_table_data()
    {

        if (!$this->authenticated()) {
            return $this->handleUnauthorizedViaAjax();
        }

        $search='';
        $filterBy='';
        $pager = \Config\Services::pager();
        $per_page = $this->perPage;

        // Get the current page number from the query string
        $page = $this->request->getGet("page") ?? 1;
        $search = trim($this->request->getGet("search"));

        $sort_column = $this->request->getGet("sort_column") ?? "release_id";
        $order = $this->request->getGet("order") ?? "asc";
        
         // Get the artist data
        $artist_release = $this->music_release_model->get_artist_release_data_from_artist_release_tbl($search,$filterBy,$per_page,$sort_column,$order);

        $data["sort_column"] = $sort_column;
        $data["order"] = $order;
        $data['artist_release'] = $artist_release;

        $total_records = $this->music_release_model->pager->getTotal();

        // cl4 built-in pager links
        // $pager_links = $this->capagination_model->pager->links();

        // Calculate pagination details
        $total_pages = ceil($total_records / $per_page);
        $has_previous = $page > 1;
        $has_next = $page < $total_pages;

        $data["total_records"] = $total_records;
        $data["current_page"] = $page;
        $data["per_page"] = $this->perPage;
        $data["total_pages"] = $total_pages;
        $data["has_previous"] = $has_previous;
        $data["has_next"] = $has_next;

        return view("rokk-artists/music-upload/music-releases/search/ajax-release-data", $data);
    }

    public function ajax_music_release_pending_data_onPageLoad()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }
        $status="Pending";
        $release_data= $this->music_release_model->get_music_release_status_data($status);
        echo $release_data;
    }

    public function update_music_release_cover_image()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== 'post') {
            return $this->handleResponse(false, 'Invalid request method');
        }

        if (!$this->validateUpdateReleaseCoverImg($this->request)) {
            return $this->handleResponse(false, 'Failed to validate uploaded image. Please upload a valid image file and try again.');
        }

        $release_id = $this->request->getPost('release_id');
        $old_cover_image_link = $this->request->getPost('old_cover_image_link');
        $file = $this->request->getFile('image_link');
        
        // Prepare new image name
        $image_newName = $this->generateFileName($release_id, $file->getName());

        // Handle file upload
        if (!$this->handleReleaseImageFileUpload($file, $image_newName)) {
            return $this->handleResponse(false, 'Failed to update the image. Please refresh the page and try again.');
        }

        // Update database with new image
        $image_link = base_url("release/image/" . $image_newName);

        $result = $this->music_release_model->update_music_release_cover_image(
            $this->request->getPost(),
            $image_link
        );

        // Try to delete old image
        if (!$this->delete_old_release_cover_from_the_folder($old_cover_image_link)) {
            log_message('error', "Failed to delete cover image: {$old_cover_image_link}");
        }

        $message = $result 
        ? 'Cover image has been successfully updated.' 
        : 'Failed to update cover image. Please try again.';

        return $this->handleResponse($result, $message);

    }


    public function delete_old_release_cover_from_the_folder($old_cover_image_link) {
        // Split the image URL into parts using "/" as delimiter
        $pathParts = explode("/", $old_cover_image_link);
        
        // Get the filename from the last part of the URL
        $fileName = end($pathParts);
        
        // Construct the full file path by combining WRITEPATH with uploads directory and filename
        $filePath = WRITEPATH . 'uploads/release-images/' . $fileName; 
        if (file_exists($filePath) && is_file($filePath)) {
            try {
                unlink($filePath);
                return true;
            } catch (Exception $e) {
                log_message('error', 'Failed to delete file: ' . $e->getMessage());
                return false;
            }
        }
        
        return false;
    }


    public function update_release_track_title()
    {
        // Initialize variables
        $success = false;
        $message = '';

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== 'post') {
            return $this->handleResponse(false, 'Invalid request method');
        }

        $validation = \Config\Services::validation();
        $release_id = $this->request->getPost("release_id");
        $track_id = $this->request->getPost("track_id");
        $track_index = $this->request->getPost("track_index");
        $track_title_key = "track_title_" . $track_index;
        $track_title = $this->request->getPost($track_title_key);

        $validation->setRule($track_title_key, 'Track Title', 'required|max_length[200]');

        if ($validation->withRequest($this->request)->run()) {
            $result = $this->music_release_model->update_music_track_title(
                $this->request->getPost(),
                $track_id,
                $track_title
            );

            $message = $result ? "Track title has been updated successfully." : "Failed to update track title. Please try again.";
            $success = $result ? true : false;
        } else {
            $message = "Failed to submit. " . implode(" ", $validation->getErrors());
            $success = false;
        }

        return $this->handleResponse($success,$message);
    }
    

    public function update_track_audio_file()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== 'post') {
            return $this->handleResponse(false, 'Invalid request method');
        }

        try {
            $track_index = $this->request->getPost('track_index');
            $track_file_key = "track_file_{$track_index}";

            // Validate file
            if (!$this->validateUpdateTrackFile($this->request, $track_file_key)) {
                return $this->handleResponse(false, 
                    'Invalid Track File. Please upload a valid audio file (MP3, WAV, FLAC, AAC, OGG) with maximum file size of 100MB.'
                );
            }

            // Get file and prepare new name
            $track_file = $this->request->getFile($track_file_key);
            $track_file_newName = $this->generateFileName(
                $this->userID(), 
                $track_file->getName()
            );

            // Handle file upload
            if (!$this->handleReleaseTrackFileUpload($track_file, $track_file_newName)) {
                return $this->handleResponse(false, 
                    "Audio File upload failed. Please refresh and try again."
                );
            }

            // Try to delete old file
            $old_track_file = $this->request->getPost('old_track_file');
            if (!$this->delete_old_audio_file_from_the_folder($old_track_file)) {
                log_message('error', "Failed to delete audio file: {$old_track_file}");
            }

            // Update database
            $track_link = base_url("audio/track/{$track_file_newName}");
            $result = $this->music_release_model->update_music_track_file(
                $track_file_newName, 
                $track_link, 
                $this->request->getPost('track_id')
            );

            return $this->handleResponse(
                $result,
                $result 
                    ? "Track audio file updated successfully." 
                    : "Failed to update track audio file. Please refresh and try again."
            );

        } catch (\Exception $e) {
            log_message('error', 'Track upload failed: ' . $e->getMessage());
            return $this->handleResponse(false, 
                "Failed to update track audio file. Please refresh and try again."
            );
        }
    }

    public function delete_old_audio_file_from_the_folder($file_name) {
        $filePath = WRITEPATH . 'uploads/tracks/' . $file_name; 
        
        if (file_exists($filePath) && is_file($filePath)) {
            try {
                unlink($filePath);
                return true;
            } catch (Exception $e) {
                log_message('error', 'Failed to delete file: ' . $e->getMessage());
                return false;
            }
        }
        
        return false;
    }


    public function update_release_track_info()
    {
        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== 'post') {
            return $this->handleResponse(false, 
                "Invalid request method."
            );
        }

        $track_index = $this->request->getPost('track_index');

        // Build field names
        $fields = $this->buildTrackFieldNames($track_index);

        // Validate fields
        if (!$this->validateUpdateTrackFields($this->request, $fields)) {
            return $this->handleResponse(false, 
                "Failed to update. Please check the input fields and ensure correct data is entered in all required fields."
            );
        }

        // Build track data for update
        $trackData = $this->buildTrackData($fields,$this->request->getPost());

        // Update track info
        $result = $this->music_release_model->update_music_track_info($trackData);

        $message = $result 
        ? 'Track information updated successfully.'
        : 'Failed to update track information. Please check your input and try again.';

        return $this->handleResponse($result, $message);
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
            'artist_name' => "artist_name_{$track_index}"
        ];
    }

    /**
     * Build track data array for database update
     */
    private function buildTrackData(array $fields, array $requestData): array
    {
        return [
            'track_id' => $requestData['track_id'],
            'release_id' => $requestData['release_id'],
            'artist_name' => $requestData[$fields['artist_name']],
            'track_title' => $requestData[$fields['track_title']],
            'features' => $requestData[$fields['features']],
            'composer' => $requestData[$fields['composer']],
            'lyricist' => $requestData[$fields['lyricist']],
            'isrc_code' => $requestData[$fields['isrc_code']],
            'explicit' => $requestData[$fields['explicit']]
        ];
    }

    public function update_music_release_detail()
    {
        $data["active_nav"] = "music-upload";

        if (!$this->authenticated()) {
            return $this->handleUnauthorized();
        }

        if ($this->request->getMethod() !== 'post') {
            return $this->handleResponse(false, 
                "Invalid request method."
            );
        }

        if($this->validateUpdateReleaseDetailFields($this->request)) {

            $result = $this->music_release_model->update_music_release_detail(
                $this->request->getPost()
            );

            if ($result) {
                return $this->handleResponse(true, "Release has been successfully updated.");
            } else {
                return $this->handleResponse(false, "Failed to update. Please refresh and try again.");
            }

        } else {
            return $this->handleResponse(false,
            "Failed to update. Please check the input fields and ensure correct data is entered in all required fields.");
        }
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
