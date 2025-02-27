<?php

namespace App\Traits;

use App\Models\AuthModel;
use App\Models\AuthSettingModel;
use App\Models\MusicUploadModel;

trait InitModelsTrait
{
    protected $auth_model;
    protected $auth_setting_model;
    protected $music_upload_model;


    protected function initAuthModels()
    {
        if (!$this->auth_model) {
            $this->auth_model = model("AuthModel");
        }
        if (!$this->auth_setting_model) {
            $this->auth_setting_model = model("AuthSettingModel");
        }
    }

    protected function initMusicUploadModels()
    {
        if (!$this->music_upload_model) {
            $this->music_upload_model = model("MusicUploadModel");
        }
       
    }
}