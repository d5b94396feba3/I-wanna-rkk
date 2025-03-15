<?php

namespace App\Models;

use CodeIgniter\Model;

class MusicReleaseModel extends Model
{
    protected $dbGroup = "wp_artist_registration";
    protected $table = "artist_release";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $returnType = "array";
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = "datetime";
    protected $createdField = "created_at";
    protected $updatedField = "updated_at";
    protected $deletedField = "deleted_at";

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


    public function get_artist_all_release_data_from_artist_release_tbl($artist_id)
    {
        try {
            $query = $this->db
                ->table("artist_release")
                ->select("*")
                ->where('artist_id',$artist_id)
                ->get();

                return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_artist_all_release_data_from_artist_release_tbl: " . $e->getMessage()
            );
            return false;
        }
    }
 
    public function get_selected_artist_releases($artist_id=null,$search='', $filterBy='', $per_page=10, $sort_column = 'release_id', $order = 'asc')
    {

        $query = $this->select("*");

        if (!empty($search)) {
            $query->like('release_title', $search, 'after');
        }

        if (!empty($filterBy)) {
            $query->where(["artist_id" => $artist_id, 'status' => $filterBy]);
        }else{
            $query->where(["artist_id" => $artist_id]);
        }

        // Validate and apply sorting
        $allowedColumns = ['release_id', 'release_title', 'genre', 'release_date', 'status'];
        $sort_column = in_array($sort_column, $allowedColumns) ? $sort_column : 'release_id';
        $order = strtolower($order) === 'desc' ? 'DESC' : 'ASC';
        
        $query->orderBy($sort_column, $order);

        // Get the paginated results
        $result = $query->paginate($per_page);

        // Check if records were found
        if ($query->countAllResults() === 0) {
            return false;
        }

        return $result;
    }

    public function getArtistDataByID($id)
    {
        try {
            $query = $this->db
                ->table("artist_release")
                ->select("*")
                ->where(["artist_id" => $id])
                ->get();

            return $query->getNumRows() > 0 ? $query->getRow() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in getArtistDataByID: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_artist_release_data_by_release_id($id)
    {
        try {
            $query = $this->db
                ->table("artist_release")
                ->select("*")
                ->where(["release_id" => $id])
                ->get();
            return $query->getNumRows() > 0 ? $query->getRow() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_artist_release_data_by_release_id: " . $e->getMessage()
            );
            return false;
        }
    }
   
    public function get_artist_top_tracks($limit)
    {
        try {
            $artist_id = session("userid");

            $query = $this->db
                ->table("artist_track")
                ->select("artist_track.*, artist_release.artwork_link, artist_release.artist_name, artist_release.genre, artist_release.release_date, artist_release.release_title")
                ->join("artist_release", "artist_release.release_id = artist_track.release_id")
                ->where(["artist_track.artist_id" => $artist_id])
                ->limit($limit)
                ->get();
            
            return $query->getNumRows() > 0 ? $query->getResultArray() : [];
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_artist_top_tracks: " . $e->getMessage()
            );
            return [];
        }
    }

    public function get_artist_top_playlists_data($track_id,$release_id,$limit)
    {
        try {
            $query = $this->db
            ->table("artist_track")
            ->select("artist_track.*, artist_release.artwork_link, artist_release.artist_name, artist_release.genre, artist_release.language, artist_release.release_date, artist_release.release_title, artist_release.copyright, artist_release.copyright_desc, artist_release.updated, artist_release.status")
            ->join("artist_release", "artist_release.release_id = artist_track.release_id")
            ->where(["artist_track.track_id" => $track_id, "artist_release.release_id" => $release_id])
            ->limit($limit)
            ->get();

            return $query->getNumRows() > 0 ? $query->getRowArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_selected_faq_sec_dashboard_data: ' . $e->getMessage());
            return false;     
        }
    }

    public function get_selected_top_albums_data($track_id,$release_id,$limit)
    {
        try {
            $query = $this->db
            ->table("artist_track")
            ->select("artist_track.*, artist_release.artwork_link, artist_release.artist_name, artist_release.genre, artist_release.language, artist_release.release_date, artist_release.release_title, artist_release.copyright, artist_release.copyright_desc, artist_release.updated, artist_release.status")
            ->join("artist_release", "artist_release.release_id = artist_track.release_id")
            ->where(["artist_track.track_id" => $track_id, "artist_release.release_id" => $release_id])
            ->limit($limit)
            ->get();

            return $query->getNumRows() > 0 ? $query->getRowArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_selected_faq_sec_dashboard_data: ' . $e->getMessage());
            return false;     
        }
    }

    function get_selected_top_track_data($track_id,$release_id,$limit){

        try {
            $query = $this->db
            ->table("artist_track")
            ->select("artist_track.*, artist_release.artwork_link, artist_release.artist_name, artist_release.genre, artist_release.language, artist_release.release_date, artist_release.release_title, artist_release.copyright, artist_release.copyright_desc, artist_release.updated, artist_release.status")
            ->join("artist_release", "artist_release.release_id = artist_track.release_id")
            ->where(["artist_track.track_id" => $track_id, "artist_release.release_id" => $release_id])
            ->limit($limit)
            ->get();

            return $query->getNumRows() > 0 ? $query->getRowArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_selected_faq_sec_dashboard_data: ' . $e->getMessage());
            return false;     
        }

    }

    public function get_artist_release_track_data_by_release_id($id)
    {
        try {
            $query = $this->db
                ->table("artist_track")
                ->select("*")
                ->where(["release_id" => $id])
                ->get();
            return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_artist_release_track_data_by_release_id: " . $e->getMessage()
            );
            return false;
        }
    }

    public function update_music_release_status($postData)
    {
        try {

            $release_id = trim($postData["release_id"]);
            $status = trim($postData["status"]);

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "status" => $status,
                "updated" => $updated,
            ];

            $query = $this->db
            ->table("artist_release")
            ->where("release_id", $release_id)
            ->update($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_music_release_status: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function get_music_release_status_data($status, $artist_id)
    {
        try {
            $query = $this->db
                ->table("artist_release")
                ->where(["status" => $status, "artist_id" => $artist_id])
                ->countAllResults();

            return $query;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in insert_track_data: " . $e->getMessage()
            );
            return false;
        }
    }

    public function insert_track_data($postData)
    {
        try {
            $artist_id = trim($postData["hidden_artist_id"]);

            $query = $this->db
                ->table("artist_release")
                ->select("*")
                ->where(["artist_id" => $artist_id])
                ->get();
            return $query->getNumRows() > 0 ? $query->getRow() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in insert_track_data: " . $e->getMessage()
            );
            return false;
        }
    }

    public function update_music_release_cover_image($postData, $image_newName, $image_link)
    {
        try {
            $release_id = trim($postData["release_id"]);

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "artwork_file_name" => $image_newName,
                "artwork_link" => $image_link,
                "updated" => $updated,
            ];

            $query = $this->db
                ->table("artist_release")
                ->where("release_id", $release_id)
                ->update($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_music_release_cover_image: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function update_music_track_info($trackData)
    {
        try {
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $track_id = $trackData['track_id'];

            $data = [
                'artist_name' => $trackData['artist_name'],
                'track_title' => $trackData['track_title'],
                'features' => $trackData['features'],
                'composer' => $trackData['composer'],
                'lyricist' => $trackData['lyricist'],
                'isrc_code' => $trackData['isrc_code'],
                'explicit' => $trackData['explicit'],
                'track_disc_number' => $trackData['track_disc_number'],
                'updated' => $updated
            ];

            $query = $this->db
            ->table("artist_track")
            ->where('track_id', $track_id)
            ->update($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_music_track_info: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function update_music_track_file($track_file_name,$track_link,$track_id)
    {
        try {
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "track_file_name" => $track_file_name,
                "track_file_link" => $track_link,
                "updated" => $updated,
            ];

            $query = $this->db
            ->table("artist_track")
            ->where('track_id', $track_id)
            ->update($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_music_track_file: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function update_music_track_title($postData,$track_id,$track_title)
    {
        try {
           
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "track_title" => $track_title,
                "updated" => $updated,
            ];

            $query = $this->db
            ->table("artist_track")
            ->where('track_id', $track_id)
            ->update($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_music_track_title: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function update_music_release_detail($postData)
    {
        try {
            $release_id = trim($postData["release_id"]);

            $release_title = trim($postData["release_title"]);
            $genre = trim($postData["genre"]);
            $language = trim($postData["language"]);
            $release_date = trim($postData["release_date"]);
            $copyright = trim($postData["copyright"]);
            $copyright_desc = trim($postData["copyright_desc"]);
            $release_icpn = trim($postData["release_icpn"]);
            $release_available_markets = trim($postData["release_available_markets"]);
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "release_title" => $release_title,
                "genre" => $genre,
                "language" => $language,
                "release_date" => $release_date,
                "release_icpn" => $release_icpn,
                "release_available_markets" => $release_available_markets,
                "copyright" => $copyright,
                "copyright_desc" => $copyright_desc,
                "updated" => $updated,
            ];

            $query = $this->db
            ->table("artist_release")
            ->where("release_id", $release_id)
            ->update($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_music_release_detail: " .
                    $e->getMessage()
            );
            return false;
        }
    }


}
