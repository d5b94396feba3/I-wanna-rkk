<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Roles extends BaseConfig
{
    public $roles = [
        'super_admin' => [
            'level' => 100,
            'permissions' => ['manage_users', 'manage_content', 'manage_settings', 'manage_roles']
        ],
        'admin' => [
            'level' => 90,
            'permissions' => ['manage_content', 'manage_settings']
        ],
        'manager' => [
            'level' => 80,
            'permissions' => ['manage_own_content', 'manage_settings']    
        ],
        'artist' => [
            'level' => 80,
            'permissions' => ['manage_own_content', 'manage_own_content']
        ],
        'guest' => [
            'level' => 10, 
            'permissions' => [] 
        ]
    ];

    public $adminRoles = ['super_admin', 'admin', 'manager', 'guest'];
    public $reservedRoles = ['super_admin', 'admin', 'manager', 'guest'];
}