<?php

namespace App\Traits;

use App\Models\AuthModel;
use App\Models\AuthSettingModel;

trait AuthInitModelTrait
{
    protected $auth_model;
    protected $auth_setting_model;

    protected function initAuthModels()
    {
        if (!$this->auth_model) {
            $this->auth_model = model("AuthModel");
        }
        if (!$this->auth_setting_model) {
            $this->auth_setting_model = model("AuthSettingModel");
        }
    }
}