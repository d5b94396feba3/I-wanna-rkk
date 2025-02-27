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
        } catch (\Exception $e) {
            // Log the error or do something else with it
            log_message(
                "error",
                "Error in getArtistDataByID: " . $e->getMessage()
            );
            return false;
        }
    }


    public function get_s3_upload_artist_data($release_id,$artist_id)
    {
        try {
            $query = $this->db
                ->table("rokk_artist")
                ->select(
                    "rokk_artist.artist_id, rokk_artist.artist_name, rokk_artist.artist_type, rokk_artist.country,
                    artist_details.label, artist_details.distributor, artist_details.genre,
                    artist_assets.file_link, artist_assets.file_name")
                ->where([ 
                    "rokk_artist.artist_id" => $artist_id,
                ])
                ->join(
                    "artist_details",
                    "artist_details.artist_id = rokk_artist.artist_id",
                    "left"
                )
                ->join(
                    "artist_assets", 
                    "artist_assets.artist_id = rokk_artist.artist_id",
                    "left"
                )
                ->get();

            return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (\Exception $e) {
            log_message(
                "error",
                "Error in get_s3_upload_artist_data: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_s3_upload_release_data($release_id, $artist_id)
    {
        try {
            $query = $this->db
                ->table("artist_release")
                ->select(
                    "artist_release.release_id, artist_release.release_title, artist_release.release_date, artist_release.genre, artist_release.language, artist_release.copyright,
                     artist_release.copyright_desc, artist_release.language, artist_release.artwork_file_name, artist_release.release_icpn, artist_release.release_available_markets,
                    artist_track.track_title, artist_track.track_id, artist_track.explicit, artist_track.features, artist_track.composer, artist_track.lyricist,
                    artist_track.isrc_code, artist_track.track_file_name, artist_track.track_disc_number, artist_track.track_duration_ms"
                )
                ->where([
                    "artist_release.release_id" => $release_id,
                    "artist_release.artist_id" => $artist_id  
                ])
                ->join(
                    "artist_track",
                    "artist_track.release_id = artist_release.release_id",
                    "left"
                )
                ->get();
    
            return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (\Exception $e) {
            log_message(
                "error",
                "Error in get_s3_upload_release_data: " . $e->getMessage()
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
                    "rokk_artist.artist_type as artist_type_from_ai, rokk_artist.artist_name, rokk_artist.artist_id, artist_details.email_management, artist_details.label, artist_details.distributor, rokk_artist_link.website")
                ->join(
                    "artist_details",
                    "artist_details.artist_id = rokk_artist.artist_id",
                    "left"
                )
                ->join(
                    "rokk_artist_link",
                    "rokk_artist_link.artist_id = rokk_artist.artist_id",
                    "left"
                )
                ->where(["rokk_artist.artist_id" => $artist_id])
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
        } catch (\Exception $e) {
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
        } catch (\Exception $e) {
            // Log the error or do something else with it
            log_message(
                "error",
                "Error in cleanupFailedUpload: " . $e->getMessage()
            );
            return false;
        }
    }

    public function upload_release_data($postData, $image_fileName, $image_link, $artist_id)
    {

        try {

            $this->db->transBegin(); // Start transaction

            $artist_name = trim($postData["artist_name"]);
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
                "artist_id" => $artist_id,
                "artist_name" => $artist_name,
                "release_title" => $release_title,
                "genre" => $genre,
                "language" => $language,
                "release_date" => $release_date,
                "release_icpn" => $release_icpn,
                "release_available_markets" => $release_available_markets,
                "copyright" => $copyright,
                "copyright_desc" => $copyright_desc,
                "artwork_file_name" => $image_fileName,
                "artwork_link" => $image_link,
                "updated" => $updated,
            ];

            $query = $this->db->table("artist_release")->insert($data);

            if ($this->db->affectedRows() > 0) {
                // Retrieve the release_id of the last inserted row
                $release_id = $this->db->insertID();
                if(!$this->updateArtistDetailTable($postData,$artist_id)){
                    $this->db->transRollback();  // Explicitly rollback if artist details update fails
                    return false;
                }

                $this->db->transCommit();
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
            $this->db->transRollback();
            return false;
        }
    }

    public function updateArtistDetailTable($postData,$artist_id)
    {
        try {
            $this->db->transBegin(); // Start transaction

            $artist_name = trim($postData["artist_name"]);
            $artist_type = trim($postData["artist_type"]);
            $email_management = trim($postData["email_management"]);
            $label = trim($postData["label"]);
            $distributor = trim($postData["distributor"]);
            $website = trim($postData["website"]);

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");


            // Data for rokk_artist table
            $artist_data = [
                "artist_id" => $artist_id,
                "artist_name" => $artist_name,
                "artist_type" => $artist_type,
                "updated_at" => $updated
            ];

            // Data for artist_details table
            $details_data = [
                "artist_id" => $artist_id,
                "label" => $label,
                "distributor" => $distributor,
                "email_management" => $email_management,
                "updated_at" => $updated
            ];

            // Data for rokk_artist_link table
            $website_data = [
                "artist_id" => $artist_id,
                "website" => $website,
                "updated" => $updated
            ];


            // Update or insert rokk_artist
            $result1 = $this->db->table("rokk_artist")
            ->where("artist_id", $artist_id)
            ->get();

            if ($result1->getNumRows() === 0) {
            $result1 = $this->db->table("rokk_artist")->insert($artist_data);
            } else {
            $result1 = $this->db->table("rokk_artist")
                ->where("artist_id", $artist_id)
                ->update($artist_data);
            }

            // Update or insert artist_details
            $result2 = $this->db->table("artist_details")
            ->where("artist_id", $artist_id)
            ->get();

            if ($result2->getNumRows() === 0) {
            $result2 = $this->db->table("artist_details")->insert($details_data);
            } else {
            $result2 = $this->db->table("artist_details")
                ->where("artist_id", $artist_id)
                ->update($details_data);
            }

            // Update or insert rokk_artist_link
            $result3 = $this->db->table("rokk_artist_link")
            ->where("artist_id", $artist_id)
            ->get();

            if ($result3->getNumRows() === 0) {
            $result3 = $this->db->table("rokk_artist_link")->insert($website_data);
            } else {
            $result3 = $this->db->table("rokk_artist_link")
                ->where("artist_id", $artist_id)
                ->update($website_data);
            }

            // Check if all updates were successful
            if ($this->db->transStatus() === false || !$result1 || !$result2 || !$result3) {
            $this->db->transRollback();
            return false;
            }

            $this->db->transCommit();
            return true;

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message("error", "Error in updateArtistDetailTable: " . $e->getMessage());
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
                "track_duration_ms" => $track_data['track_duration_ms'],
                "track_disc_number" => $track_data['track_disc_number'],
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
