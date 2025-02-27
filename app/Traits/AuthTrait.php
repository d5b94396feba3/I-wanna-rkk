<?php

namespace App\Traits;
use App\Traits\CookieTrait;

trait AuthTrait
{

    /**
     * Import CookieTrait to handle cookie-related functionality
     * This trait provides methods for cookie management used in authentication
     */
    use CookieTrait;
    /**
     * Check if user is logged in
     *
     * @return bool
     */
    protected function authenticated(): bool
    {
        $authenticated = session()->get('authenticated');
        if (!$authenticated && !$this->isCookieExist()) {
            return false;
        }
        return true;
    }


    protected function isAdmin()
    {
        $userRole = session('userrole');
        $config = config('Roles');
        
        return in_array($userRole, $config->adminRoles);
    }

    protected function getReservedRolesTrait()
    {
        $config = config('Roles');
        return $config->reservedRoles;
    }

    protected function hasPermission($permission)
    {
        $userRole = session('userrole');
        $config = config('Roles');
        
        if (!isset($config->roles[$userRole])) {
            return false;
        }
        
        return in_array($permission, $config->roles[$userRole]['permissions']);
    }

    protected function getRoleLevel()
    {
        $userRole = session('userrole');
        $config = config('Roles');
        
        return $config->roles[$userRole]['level'] ?? 0;
    }

    protected function canAssignRole($targetRole)
    {
        $config = config('Roles');
        $currentUserLevel = $this->getRoleLevel();
        $targetRoleLevel = $config->roles[$targetRole]['level'] ?? 0;
        
        // User can only assign roles with level equal to or lower than their own
        return $currentUserLevel >= $targetRoleLevel;
    }

    protected function handleUnauthorized()
    {
        if (!$this->authenticated()) {
            return redirect()->to('/login')->with('errorMsg', 'Please login to access this page.');
        }
        
        return redirect()->back()->with('errorMsg', 'You do not have permission to access this page.');
    }


    protected function handleUnauthorizedViaAjax()
    {
        if (!$this->authenticated()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Session expired. Please log in again.',
                'url' => '/login',
                'redirect' => true
            ]);
        }
        return redirect()->back()->with('errorMsg', 'You do not have permission to access this page.');

    }
}