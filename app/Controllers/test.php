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

        if ($query->getResult()) {
            return $query->getResultArray();
        } else {
            return false;
        }
    }

    public function getArtistDataByID($id)
    {
        try {
            $query = $this->db
                ->table("artist_registration")
                ->select("*")
                ->where(["artist_id" => $id])
                ->get();

            if ($query->resultID->num_rows > 0) {
                return $query->getRow();
            } else {
                return false;
            }
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
                ->table("artist_info")
                ->select(
                    "artist_info.artist_type as artist_type_from_ai, artist_info.*, artist_registration.*",
                    false
                )
                ->where(["artist_info.artist_id" => $artist_id])
                ->join(
                    "artist_registration",
                    "artist_registration.artist_id = artist_info.artist_id",
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

            if (!empty($result)) {
                return $result[0];
            } else {
                return false;
            }
        } catch (Exception $e) {
            log_message(
                "error",
                "Error in get_artist_data_from_artist_info_by_id: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function update_artist_profile_data_by_id($postData)
    {
        try {
            $id = trim($postData["hidden_artist_id"]);

            $artist_type = trim($postData["artist_type"]);
            $artist_name = trim($postData["artist_name"]);
            $artist_country = trim($postData["artist_country"]);
            $email_management = trim($postData["email_management"]);
            $official_contact_email = trim($postData["official_contact_email"]);
            $facebook = trim($postData["facebook"]);
            $instagram = trim($postData["instagram"]);
            $twitter = trim($postData["twitter"]);
            $spotify = trim($postData["spotify"]);
            $metal_archives = trim($postData["metal_archives"]);
            $website = trim($postData["website"]);
            $discogs = trim($postData["discogs"]);
            $label = trim($postData["label"]);
            $distributor_and_aggregator = trim(
                $postData["distributor_and_aggregator"]
            );

            $data = [
                "artist_type" => $artist_type,
                "artist_name" => $artist_name,
                "artist_country" => $artist_country,
                "email_management" => $email_management,
                "official_contact_email" => $official_contact_email,
                "facebook" => $facebook,
                "instagram" => $instagram,
                "twitter" => $twitter,
                "spotify" => $spotify,
                "metal_archives" => $metal_archives,
                "website" => $website,
                "discogs" => $discogs,
                "label" => $label,
                "distributor_and_aggregator" => $distributor_and_aggregator,
            ];

            $query = $this->db
                ->table("artist_registration")
                ->set($data)
                ->where(["artist_id" => $id])
                ->update();

            if ($query) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error or do something else with it
            log_message(
                "error",
                "Error in update_artist_profile_data_by_id: " . $e->getMessage()
            );
            return false;
        }
    }

    public function insert_track_data($postData)
    {
        try {
            $artist_id = trim($postData["hidden_artist_id"]);

            $query = $this->db
                ->table("artist_registration")
                ->select("*")
                ->where(["artist_id" => $artist_id])
                ->get();

            if ($query->resultID->num_rows > 0) {
                return $query->getRow();
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Log the error or do something else with it
            log_message(
                "error",
                "Error in insert_track_data: " . $e->getMessage()
            );
            return false;
        }
    }

    public function update_music_upload_profile_data_by_id($postData)
    {
        try {
            $artist_id = trim($postData["hidden_artist_id"]);

            $artist_type = trim($postData["artist_type"]);
            $artist_name = trim($postData["artist_name"]);
            $first_name = trim($postData["first_name"]);
            $last_name = trim($postData["last_name"]);
            $email = trim($postData["email"]);
            $phone = trim($postData["phone"]);
            $website = trim($postData["website"]);
            $country = trim($postData["country"]);
            $street_and_number = trim($postData["street_and_number"]);
            $zip = trim($postData["zip"]);
            $city = trim($postData["city"]);
            $is_vat_applicable = trim($postData["vat"]);

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "artist_id" => $artist_id,
                "artist_type" => $artist_type,
                "artist_name" => $artist_name,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => $phone,
                "website" => $website,
                "country" => $country,
                "street_and_number" => $street_and_number,
                "zip" => $zip,
                "city" => $city,
                "is_vat_applicable" => $is_vat_applicable,
                "updated" => $updated,
            ];

            $query = $this->db->table("artist_info")->replace($data);

            if ($this->db->affectedRows() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in update_music_upload_profile_data_by_id: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function upload_release_data($postData, $image_link, $artist_id)
    {
        // CREATE TABLE artist_release ( release_id BIGINT(20) AUTO_INCREMENT PRIMARY KEY, artist_id BIGINT(20) UNIQUE KEY, artist_name VARCHAR(255), release_title VARCHAR(255), genre VARCHAR(100), language VARCHAR(50), release_date DATE, copyright VARCHAR(10), copyright_desc TEXT, image_link VARCHAR(255), updated DATE DEFAULT CURRENT_DATE );

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

    public function upload_track_data($trackDataArray)
    {
        try {
            $query = $this->db
                ->table("artist_track")
                ->insertBatch($trackDataArray);

            if ($this->db->affectedRows() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in upload_track_data: " . $e->getMessage()
            );
            return false;
        }
    }
}
