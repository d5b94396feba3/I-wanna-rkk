<?php

namespace App\Traits;
use App\Models\AuthModel;
use App\Models\AuthSettingModel;
use App\Traits\InitModelsTrait;

trait SessionTrait
{
    // Import InitModelsTrait to initialize authentication models
    use InitModelsTrait;
    
    /**
     * Sets the user session data after successful login
     *
     * @param object $user The user object containing artist details
     * @return void
     */
    public function setUserSession($user)
    {
        try {
            // Initialize auth models required for session data
            $this->initAuthModels(); 

            // Initialize empty values for optional fields
            $profileimage = '';
            $personFullName = '';
            $userrole = '';

            // Extract and sanitize basic user data
            $artist_name = trim($user->artist_name);
            $artist_type = trim($user->artist_type);
            $country = trim($user->country);
            $userid = trim($user->artist_id);
            // Convert join date to year only
            $joinyear = date('Y', strtotime(trim($user->join_date)));

            // Fetch additional user data from rokk_person table if available
            if ($person_data = $this->account_setting_model->get_person_data_from_rokk_person_by_id($userid)) {
                // Get profile image if exists
                $profileimage = isset($person_data->person_img_link) ? trim($person_data->person_img_link) : '';
                $personFullName = isset($person_data->first_name) && isset($person_data->last_name) ? trim($person_data->first_name . ' ' . $person_data->last_name) : '';
                // Get user role if exists
                $userrole = isset($person_data->role) ? trim($person_data->role) : '';
            }

            // Generate formatted account display name
            $displayname = $this->filter_displayname($artist_name);

            // Prepare session data array with all user information
            $sessionData = [
                'authenticated' => true,
                'fullName' => $artist_name,
                'administratorName' => $personFullName,
                'displayname' => $displayname,
                'profileimage' => $profileimage,
                'userrole' => $userrole,
                'userid' => $userid,
                'joinyear' => $joinyear,
                'country' => $country,
                'cookieStatus' => false,
                'artist_type' =>$artist_type,
            ];

            // Set the session data
            $this->session->set($sessionData);

            return true;

        } catch (\Exception $e) {
            log_message('error', 'Session set failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Formats an account name by shortening first and last names
     * 
     * @param string $displayname The full account name to filter
     * @return string The formatted account name
     */
    public function filter_displayname($displayname) {
        // Split the name into first and last name parts
        $names = explode(" ", trim($displayname));
        $first_name = $names[0];
        
        // If first name is 10+ chars, truncate to first 2 chars with period
        if (strlen($first_name) >= 10) {
            $first_name = substr($first_name, 0, 2) . '.';
        }

        // Get last name if it exists, otherwise empty string
        $last_name = isset($names[1]) ? $names[1] : '';
        // If last name exists, truncate to first char with period
        if ($last_name) {
            $last_name = substr($last_name, 0, 1) . '.';
        }

        // Return formatted name with trimmed whitespace
        return trim($first_name . ' ' . $last_name);
    }
}