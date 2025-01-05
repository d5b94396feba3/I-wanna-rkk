<?php

/**
 * Helper function to check if current user has admin privileges
 * 
 * Checks if the user's role exists in the configured admin roles list
 * Admin roles are defined in Config/Roles.php
 *
 * @return bool True if user has admin role, false otherwise
 */
if (!function_exists('is_admin')) {
    function is_admin(): bool
    {
        // Get roles configuration
        $config = config('Roles');
        // Get current user's role from session
        $userRole = session()->get('userrole');
        
        // Check if user's role is in admin roles array
        return in_array($userRole, $config->adminRoles);
    }
}