<?php

namespace App\Models;

use CodeIgniter\Model;

class MusicUploadModel extends Model
{
    protected $dbGroup = "wp_artist_registration";
    protected $table = "artist_registration";
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
 
    public function get_registered_artist_data()
    {
        $query = $this->db->table("artist_registration")->select("*")->get();

        return $query->getNumRows() > 0 ? $query->getResultArray() : false;
    }

    public function getArtistDataByID($id)
    {
        try {
            $query = $this->db
                ->table("artist_registration")
                ->select("*")
                ->where(["artist_id" => $id])
                ->get();

            return $query->getNumRows() > 0 ? $query->getRow() : false;
        } catch (Exception $e) {
            // Log the error or do something else with it
            log_message(
                "error",
                "Error in getArtistDataByID: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_artist_data_from_artist_info_by_id($artist_id)
    {
        try {
            $query = $this->db
                ->table("rokk_artist")
                ->select(
                    "rokk_artist.artist_type as artist_type_from_ai, rokk_artist.*, artist_registration.*",
                    false
                )
                ->where(["rokk_artist.artist_id" => $artist_id])
                ->join(
                    "artist_registration",
                    "artist_registration.artist_id = rokk_artist.artist_id",
                    "left"
                )
                ->get();

            $result = $query->getResult();

            if (!empty($result)) {
                return $result[0];
            }

            // If no result in the join query, fall back to the second query
            $query = $this->db
                ->table("artist_registration")
                ->select("*")
                ->where(["artist_id" => $artist_id])
                ->get();

            $result = $query->getResult();

            return !empty($result) ? $result[0] : false;
        } catch (Exception $e) {
            log_message(
                "error",
                "Error in get_artist_data_from_artist_info_by_id: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function cleanupFailedUpload($release_id)
    {
        try {
            $query = $this->db
                ->table("artist_release")
                ->where(["release_id" => $release_id])
                ->delete();

            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Log the error or do something else with it
            log_message(
                "error",
                "Error in cleanupFailedUpload: " . $e->getMessage()
            );
            return false;
        }
    }

    public function upload_release_data($postData, $image_link, $artist_id)
    {

        try {
            $artist_name = trim($postData["artist_name"]);
            $release_title = trim($postData["release_title"]);
            $genre = trim($postData["genre"]);
            $language = trim($postData["language"]);
            $release_date = trim($postData["release_date"]);
            $copyright = trim($postData["copyright"]);
            $copyright_desc = trim($postData["copyright_desc"]);
            // $image_link = trim($postData["image_link"]);

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "artist_id" => $artist_id,
                "artist_name" => $artist_name,
                "release_title" => $release_title,
                "genre" => $genre,
                "language" => $language,
                "release_date" => $release_date,
                "copyright" => $copyright,
                "copyright_desc" => $copyright_desc,
                "image_link" => $image_link,
                "updated" => $updated,
            ];

            $query = $this->db->table("artist_release")->insert($data);

            if ($this->db->affectedRows() > 0) {
                // Retrieve the release_id of the last inserted row
                $release_id = $this->db->insertID();

                // Return the release_id
                return $release_id;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in upload_release_data: " . $e->getMessage()
            );
            return false;
        }
    }

    public function upload_track_data($track_data) {
        try {
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");
            $uploaded_at = date("Y-m-d H:i:s");
            $data = [
                "release_id" => $track_data['release_id'],
                "artist_id" => $track_data['artist_id'],
                "artist_name" => trim($track_data['artist_name']),
                "track_title" => trim($track_data['track_title']),
                "features" => trim($track_data['features']),
                "composer" => trim($track_data['composer']),
                "lyricist" => trim($track_data['lyricist']),
                "isrc_code" => trim($track_data['isrc_code']),
                "explicit" => $track_data['explicit'],
                "track_file_name" => $track_data['track_file_name'],
                "track_file_link" => $track_data['track_file_link'],
                "uploaded_at" => $uploaded_at,
                "updated" => $updated,
            ];

            $query = $this->db->table("artist_track")->insert($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_artist_data_by_id: " . $e->getMessage()
            );
            return false;
        }
    }

}
