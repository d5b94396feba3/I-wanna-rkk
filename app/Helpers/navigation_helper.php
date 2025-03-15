<?php

if (!function_exists('get_previous_url')) {
    function get_previous_url($default = '')
    {
        return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $default;

    }
}

