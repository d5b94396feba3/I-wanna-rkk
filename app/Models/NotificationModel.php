<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table            = 'notification';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function get_total_count_by_table_name($table)
    {
        try {
            $query = $this->db
                ->table($table)
                ->countAllResults();

            return $query;
        } catch (Exception $e) {
            // Log the error 
            log_message(
                "error",
                "Error in get_total_count_from_faq_table: " . $e->getMessage()
            );
            return false;
        }
    }

    public function get_all_notification(){

        try {
            $query = $this->db->table('notification')
                             ->select('*')
                             ->get();

            return $query->getNumRows() > 0 ? $query->getResultArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_all_notification: ' . $e->getMessage());
            return false;     
        }
    }

  
    public function get_notifications($artistId, $onlyUnread = false)
    {

        try {
            $this->db->transStart();
            $builder ="";
            // check user role using global function
            if (is_admin()) {
                $builder=$this->all_notification_for_admin($artistId);
            }elseif ($artistId) {
                $builder=$this->all_published_notification_for_artist($artistId);
            } else {
                // Neither admin nor artist with valid ID
                return false;
            }
            
            if (!$onlyUnread) {
                $builder->where('an.read', 0);
            }
            
            $query = $builder->get();

            if ($query->getNumRows() == 0) {

                // If no notifications found, assign all notifications to the artist
                $this->assign_published_notification_to_single_artist($artistId);
                
                // Rerun the query to get the newly assigned notifications
                if (is_admin()) {
                    $builder=$this->all_notification_for_admin($artistId);
                }elseif ($artistId) {
                    $builder=$this->all_published_notification_for_artist($artistId);
                }
                $query = $builder->get();
            }

            $this->db->transComplete();
            
            if ($this->db->transStatus() === false) {
                return false;
            }

            return $query->getResultArray();
            
        } catch (\Exception $e) {
            log_message('error', 'Error in get_notifications: ' . $e->getMessage());
            return false;
        }
    }

    public function all_notification_for_admin($artistId) {

        $builder = $this->db->table('artist_notification an')
        ->select('an.read, an.artist_id, an.notification_id, an.updated, n.id, n.title, n.content, n.imgUrl, n.status, n.types, n.createdAt, n.updatedAt')
        ->join('notification n', 'n.id = an.notification_id')
        ->where('an.artist_id', $artistId);

        return $builder;
    }

    public function all_published_notification_for_artist($artistId) {

        $builder = $this->db->table('artist_notification an')
        ->select('an.read, an.artist_id, an.notification_id, an.updated, n.id, n.title, n.content, n.imgUrl, n.status, n.types, n.createdAt, n.updatedAt')
        ->join('notification n', 'n.id = an.notification_id')
        ->where(['an.artist_id' => $artistId, 'n.status'=>'published']);

        return $builder;
    }

    public function assign_published_notification_to_single_artist($artistId)
    {

        try {

            if (!$this->is_artist_exists_in_rokk_artist($artistId)) {

                if(!$this->insert_artist_data_from_artist_registration($artistId)){
                    log_message('error', 'Failed to insert artist in rokk_artist table: ' . $artistId);
                    return false;
                }
            }

            $data = [];
            date_default_timezone_set("UTC");
            $currentDateTime = date("Y-m-d");

            $query = $this->db->table('notification')
                ->select('id')
                ->get();

            if ($query->getResult()) {
                foreach ($query->getResultArray() as $result) {
                    $data[] = [
                        'notification_id' => $result['id'],
                        'artist_id' => $artistId,
                        'read' => 0,
                        'updated' => $currentDateTime,
                    ];
                }

                if (!empty($data)) {
                    $this->db->table('artist_notification')->insertBatch($data);
                }
            }

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in assign_published_notification_to_single_artist: ' . $e->getMessage());
            throw $e; // Re-throw the exception to be caught in the calling method
        }
    }

    public function is_artist_exists_in_rokk_artist($userid)
    {
        try {
            $query = $this->db
                ->table('rokk_artist')
                ->where('artist_id', $userid)
                ->get();

            return $query->getNumRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in is_artist_exists_in_artist_link: ' . $e->getMessage());
            return false;
        }
    }

    public function insert_artist_data_from_artist_registration($userid)
    {
        try {
            $query = $this->db
                ->table('artist_registration')
                ->where('artist_id', $userid)
                ->get();

            if($query->getNumRows() > 0){
               $artistData=$query->getRow();
               if(!$this->insert_into_rokk_artist($artistData)){
                    return false;
               }
            }
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Error in insert_artist_data_from_artist_registration: ' . $e->getMessage());
            return false;
        }
    }

    public function insert_into_rokk_artist($artistData)
    {
        try {
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $updated = date("Y/m/d");

            $data = [
                "artist_id" => $artistData->artist_id,
                "artist_type" => $artistData->artist_type,
                "artist_name" => $artistData->artist_name,
                "country" => $artistData->artist_country,
                "official_contact_email" => $artistData->official_contact_email,
                "label" => $artistData->label,
                "distributor" => $artistData->distributor_and_aggregator,
                "join_date" => $artistData->join_date,
                "updated" => $updated
            ];

            $query = $this->db
                ->table("rokk_artist")
                ->insert($data);

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            // Log the error
            log_message(
                "error",
                "Error in insert_into_rokk_artist: " .
                    $e->getMessage()
            );
            return false;
        }
    }

    public function assign_published_notification_to_all_artists($notification_id)
    {
        try {
            $data = [];
            date_default_timezone_set("UTC");
            $currentDateTime = date("Y-m-d");

            // Query the artists table instead of notifications
            $query = $this->db->table('rokk_artist')  
                ->select('artist_id')
                ->get();

            if ($query->getResult()) {
                foreach ($query->getResultArray() as $result) {
                    $data[] = [
                        'notification_id' => $notification_id,
                        'artist_id' => $result['artist_id'],  
                        'read' => 0,
                        'updated' => $currentDateTime,
                    ];
                }

                if (!empty($data)) {
                    $this->db->table('artist_notification')->insertBatch($data);
                }
            }

            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in assign_published_notification_to_all_artists: ' . $e->getMessage());
            throw $e;
        }
    }

    public function submit_notification($postData)
    {

        $this->db->transStart();

        try {
            $title = trim($postData["title"]);
            $content = trim($postData["content"]);
            $imgUrl = trim($postData["imgUrl"]);
            $status = trim($postData["status"]);
            $types = trim($postData["types"]);

            $hidden_type = trim($postData["request-type"]);
            $id = trim($postData["notification-id"]);
        
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $currentDateTime = date("Y-m-d H:i:s");

            $data = [
                "title" => $title,
                "content" => $content,
                "imgUrl" => $imgUrl,
                "status" => $status,
                "types" => $types,
                "updatedAt" => $currentDateTime,
            ];

            $notification_id = 0;

            if ($hidden_type === "update") {

                $this->db
                    ->table("notification") 
                    ->where("id", $id)
                    ->update($data);
            } else {
                $data["createdAt"] = $currentDateTime;
                $query = $this->db
                    ->table("notification")
                    ->insert($data);
                $notification_id = $this->db->insertID();
            }

            if ($this->db->affectedRows() > 0) {
                if ($notification_id != 0) {
                    $result=$this->assign_published_notification_to_all_artists($notification_id);
                    if(!$result){
                        $this->db->transRollback();
                        return false;
                    }
                }
                $this->db->transComplete();
                return $this->db->transStatus(); 
            }
            $this->db->transRollback();
            return false;

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message(
                "error",
                "Error in submit_notification: " . $e->getMessage()
            );
            return false;
        }
    }

    public function update_notification($postData)
    {
        try {
            $title = trim($postData["title"]);
            $content = trim($postData["content"]);
            $imgUrl = trim($postData["imgUrl"]);
            $status = trim($postData["status"]);
            $types = trim($postData["types"]);

            $id = trim($postData["notification-id"]);
        
            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $currentDateTime = date("Y-m-d H:i:s");

            $data = [
                "title" => $title,
                "content" => $content,
                "imgUrl" => $imgUrl,
                "status" => $status,
                "types" => $types,
                "updatedAt" => $currentDateTime,
            ];

            $this->db
            ->table("notification") 
            ->where("id", $id)
            ->update($data);

            if ($this->db->affectedRows() > 0) {
                return true; 
            }
            return false;

        } catch (\Exception $e) {
            log_message(
                "error",
                "Error in update_notification: " . $e->getMessage()
            );
            return false;
        }
    }


    public function add_notification($postData)
    {

        $this->db->transStart();

        try {
            $title = trim($postData["title"]);
            $content = trim($postData["content"]);
            $imgUrl = trim($postData["imgUrl"]);
            $status = trim($postData["status"]);
            $types = trim($postData["types"]);

            $hidden_type = trim($postData["request-type"]);
            $id = trim($postData["notification-id"]);
            $notification_id = 0;

            // Set the timezone explicitly before using strtotime and date functions
            date_default_timezone_set("UTC");
            $currentDateTime = date("Y-m-d H:i:s");

            $data = [
                "title" => $title,
                "content" => $content,
                "imgUrl" => $imgUrl,
                "status" => $status,
                "types" => $types,
                "createdAt" => $currentDateTime,
                "updatedAt" => $currentDateTime,
            ];

            $query = $this->db
                ->table("notification")
                ->insert($data);
            $notification_id = $this->db->insertID();

            if ($this->db->affectedRows() > 0) {
                if ($notification_id != 0) {
                    $result=$this->assign_published_notification_to_all_artists($notification_id);
                    if(!$result){
                        $this->db->transRollback();
                        return false;
                    }
                }
                $this->db->transComplete();
                return $this->db->transStatus(); 
            }
            $this->db->transRollback();
            return false;

        } catch (\Exception $e) {
            $this->db->transRollback();
            log_message(
                "error",
                "Error in add_notification: " . $e->getMessage()
            );
            return false;
        }
    }


    function get_selected_notification_data($id){

        try {
            $query = $this->db->table('notification')
                             ->select('*')
                             ->where(['id' => $id])
                             ->get();

            return $query->getNumRows() > 0 ? $query->getRowArray() : false;
        } catch (Exception $e) {
            // Log the error 
            log_message('error', 'Error in get_selected_notification_data: ' . $e->getMessage());
            return false;     
        }

    }


    public function update_artist_notification_status($notificationId, $read_status, $artistId)
    {

        // Set the timezone explicitly before using strtotime and date functions
        date_default_timezone_set("UTC");
        $currentDateTime = date("Y-m-d");

        try {
            $data = [
                'read' => ($read_status == 0 ) ? 1 : 0,
                'updated' => $currentDateTime
            ];
            $result = $this->db->table('artist_notification')
                ->where(['notification_id' => $notificationId, 'artist_id' => $artistId])
                ->update($data);
    
            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in update_artist_notification_status: ' . $e->getMessage());
            return false;     
        }
    }
    
    public function assignNotificationToArtist($notificationId, $artistId, $currentDateTime)
    {
        try {
            $data = [
                'notification_id' => $notificationId,
                'artist_id' => $artistId,
                'updated' => $currentDateTime,
                'read' => 1
            ];
            
            $this->db->table('artist_notification')->insert($data);
            
            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in assignNotificationToArtist: ' . $e->getMessage());
            return false;
        }
    }


    public function delete_notification($postData, $allowed_roles, $user_role, $artistId)
    {
        try {
            $id = trim($postData["id"]);
            if (in_array($user_role, $allowed_roles)) {
                // Admin deleting from the notification table
                $result = $this->db->table('notification')->where('id', $id)->delete();
            } elseif ($artistId) {
                // Artist deleting from the artist_notification table
                $result = $this->db->table('artist_notification')
                    ->where(['notification_id' => $id, 'artist_id' => $artistId])
                    ->delete();
            } else {
                // Neither admin nor artist with valid ID
                return false;
            }

            // Check if any rows were affected
            return $this->db->affectedRows() > 0;
        } catch (\Exception $e) {
            log_message('error', 'Error in delete_notification: ' . $e->getMessage());
            throw $e; // Re-throw the exception to be caught in the controller
        }
    }



}
