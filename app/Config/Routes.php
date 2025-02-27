<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Auth routes
$routes->group('', function($routes) {
    $routes->get('/', 'Auth::index');
    $routes->match(['get','post'], 'login', 'Auth::login');
    $routes->get('check-session', 'Auth::checkSession');
    $routes->match(['get','post'],'forgot-password', 'Auth::ForgotPassword');
    $routes->get('logout', 'Auth::logout');
});

$routes->group('', function($routes) {
    $routes->get("create_release", "MusicUpload::index");
    $routes->get("music_releases", "MusicRelease::index");
    
    // Music upload AJAX endpoints
    $routes->group('MusicUpload', function($routes) {
        $routes->post("ajax_track_info_popup", "MusicUpload::ajax_track_info_popup");
        $routes->post("ajax_add_track_data", "MusicUpload::ajax_add_track_data");
        $routes->get("ajax_genres_in_options_onPageLoad", "MusicUpload::ajax_genres_in_options_onPageLoad");
    });

    // Upload endpoints
    $routes->post("upload_track_data", "MusicUpload::upload_track_data");
    $routes->post("update_music_upload_profile_data", "MusicUpload::update_music_upload_profile_data", 
        ['filter' => 'throttle:3,60']
    );
    $routes->post("upload_music_release_data", "MusicUpload::upload_music_release_data");

    // Media access endpoints
    $routes->get('audio/track/(:segment)', 'MusicUpload::getTrack/$1');
    $routes->get('release/image/(:segment)', 'MusicUpload::getReleaseImage/$1');
});

// Direct Artist Support routes
$routes->group('', function($routes) {
    // Main page for direct artist support
    $routes->get("direct-artist-support", "DirectArtistSupport::index");

    // Update artist's ROKK address, throttled to 3 requests per minute
    $routes->post(
        "update_direct_artist_support",
        "DirectArtistSupport::update_direct_artist_support", ['filter' => 'throttle:3,60']
    );

    // Load initial direct artist support data via AJAX
    $routes->get(
        "DirectArtistSupport/ajax_direct_artist_support_onPageLoad",
        "DirectArtistSupport::ajax_direct_artist_support_onPageLoad"
    );
});

// Analytics routes  
$routes->group('', function($routes) {
     // Main analytics dashboard page
    $routes->get('analytics', 'Analytics::index'); 
    // Load artist stats via AJAX
    $routes->get('Analytics/ajax_artist_stats_data_onPageLoad', 'Analytics::ajax_artist_stats_data_onPageLoad');  
});

$routes->group('', function($routes) {
    // Main account pages
    $routes->get("account", "Account::index");
    $routes->get("connected_account", "Account::connected_account_index");

    // Account management endpoints
    $routes->post("delete_artist_account", "Account::delete_artist_account");
    $routes->post("update_artist_password", "Account::update_artist_password");

    // AJAX data loading endpoints
    $routes->group('Account', function($routes) {
        $routes->get("ajax_paginated_artist_connected_accounts_data", 
            "Account::ajax_paginated_artist_connected_accounts_data");
        $routes->get("ajax_change_password_data",
            "Account::ajax_change_password_data");
        $routes->get("ajax_load_all_account_data_onPageLoad",
            "Account::ajax_load_all_account_data_onPageLoad");
        $routes->get("ajax_account_administrator_data",
            "Account::ajax_account_administrator_data");
        $routes->get("ajax_password_deletion_data_onPageLoad",
            "Account::ajax_password_deletion_data_onPageLoad");
    });
});

// MusicRelease routes
$routes->group('', function($routes) {
    // GET endpoints
    $routes->get("release_detail/(:num)", "MusicRelease::release_detail_index/$1");
    
    // MusicRelease AJAX endpoints
    $routes->group('MusicRelease', function($routes) {
        $routes->get("ajax_music_release_pending_data_onPageLoad", 
            "MusicRelease::ajax_music_release_pending_data_onPageLoad");
        $routes->get("artist_release_table_data",
            "MusicRelease::artist_release_table_data");
        $routes->get("ajax_artist_top_track_stats",
            "MusicRelease::ajax_artist_top_track_stats");
        $routes->get("ajax_selected_top_track_data",
            "MusicRelease::ajax_selected_top_track_data");
        $routes->get("ajax_selected_top_albums_data",
            "MusicRelease::ajax_selected_top_albums_data");
        $routes->get("ajax_selected_top_playlists_data",
            "MusicRelease::ajax_selected_top_playlists_data");
    });

    // Throttled POST endpoints
    $routes->group('', ['filter' => 'throttle:3,60'], function($routes) {
        $routes->post("update_music_release_cover_image",
            "MusicRelease::update_music_release_cover_image");
        $routes->post("update_music_release_detail",
            "MusicRelease::update_music_release_detail");
        $routes->post("update_release_track_title",
            "MusicRelease::update_release_track_title");
        $routes->post("update_release_track_info",
            "MusicRelease::update_release_track_info");
        $routes->post("update_track_audio_file",
            "MusicRelease::update_track_audio_file");
    });
});

// account setting
$routes->group('', function($routes) {
    // GET endpoints
    $routes->get("account_setting", "AccountSetting::index");
    $routes->get("AccountSetting/ajax_account_setting_artist_data_onPageLoad", 
        "AccountSetting::ajax_account_setting_artist_data_onPageLoad");

    // Throttled POST endpoints
    $routes->group('', ['filter' => 'throttle:3,60'], function($routes) {
        $routes->post("update_artist_logo_image",
            "AccountSetting::update_artist_logo_image");
        $routes->post("update_person_profile_image", 
            "AccountSetting::update_person_profile_image");
        $routes->post("update_artist_setting_info",
            "AccountSetting::update_artist_setting_info");
        $routes->post("update_person_setting_info",
            "AccountSetting::update_person_setting_info");
        $routes->post("update_socail_media_setting_info",
            "AccountSetting::update_socail_media_setting_info");
    });
});


// Admin dashboard's Registered Artist Routes
$routes->group('', function($routes) {
    // GET endpoints
    $routes->get("artist_dashboard", "DashboardAdmin::artist_dashboard");
    $routes->get("DashboardAdmin/ajax_registered_artists_data", "DashboardAdmin::ajax_registered_artists_data");
    $routes->get("DashboardAdmin/ajax_count_registered_artists_data", "DashboardAdmin::ajax_count_registered_artists_data");
    $routes->get("DashboardAdmin/ajax_count_link_status_data", "DashboardAdmin::ajax_count_link_status_data");
    $routes->get("DashboardAdmin/ajax_selected_artist_data", "DashboardAdmin::ajax_selected_artist_data");

    // Throttled endpoints
    $routes->group('', ['filter' => 'throttle:3,60'], function($routes) {
        $routes->match(['post', 'get'], "update_artist", "DashboardAdmin::update_artist");
    });
});

// Contact Us Routes
$routes->group('', function($routes) {
    // GET endpoints
    $routes->get("contact", "ContactUs::index");
    
    // POST endpoints
    $routes->group('', ['filter' => 'throttle:3,60'], function($routes) {
        $routes->post("send_artist_contact_us_form", "ContactUs::send_artist_contact_us_form");
    });
});

// Faqs Routes
$routes->group('', function($routes) {
    // GET endpoints
    $routes->get("faqs", "Faqs::index");
    $routes->get("faqs_dashboard", "Faqs::faqs_dashboard");
    $routes->get("Faqs/ajax_faq_question_index_data", "Faqs::ajax_faq_question_index_data");
    $routes->get("Faqs/ajax_faq_section_dashboard_data", "Faqs::ajax_faq_section_dashboard_data"); 
    $routes->get("Faqs/ajax_faq_question_dashboard_data", "Faqs::ajax_faq_question_dashboard_data");
    $routes->get("Faqs/ajax_selected_faq_question_dashboard_data", "Faqs::ajax_selected_faq_question_dashboard_data");
    $routes->get("Faqs/ajax_selected_faq_sec_dashboard_data", "Faqs::ajax_selected_faq_sec_dashboard_data");

    // Throttled endpoints
    $routes->group('', ['filter' => 'throttle:3,60'], function($routes) {
        $routes->match(['post', 'get'], "update_faq_section", "Faqs::update_faq_section");
        $routes->match(['post', 'get'], "update_faq_question", "Faqs::update_faq_question");
    });

    // POST endpoints
    $routes->post("Faqs/delete_faq_section", "Faqs::delete_faq_section");
    $routes->post("Faqs/delete_faq_question", "Faqs::delete_faq_question");
});

// Notification Routes
$routes->group('', function($routes) {
    // GET endpoints
    $routes->get("notification", "Notification::index");
    $routes->get("notification_dashboard", "Notification::notification_dashboard");
    $routes->get("Notification/ajax_notification_dashboard_data", "Notification::ajax_notification_dashboard_data");
    $routes->get("Notification/ajax_selected_notification_data", "Notification::ajax_selected_notification_data");
    $routes->get("Notification/ajax_artist_notification_index", "Notification::ajax_artist_notification_index");
    $routes->get("Notification/notification_header", "Notification::notification_header");
    $routes->get("Notification/(:num)", "Notification::release_detail_index/$1");

    // POST endpoints
    $routes->post("add_notification", "Notification::add_notification");
    $routes->post("Notification/delete_notification", "Notification::delete_notification");

    // Throttled endpoints
    $routes->group('', ['filter' => 'throttle:3,60'], function($routes) {
        $routes->match(['post', 'get'], "update_notification", "Notification::update_notification");
        $routes->post("Notification/ajax_update_artist_notification_status", "Notification::ajax_update_artist_notification_status");
        $routes->post("Notification/ajax_update_artist_all_notifications_status", "Notification::ajax_update_artist_all_notifications_status");
    });
});


// s3 upload-json
$routes->group('', function($routes) {
    $routes->get('upload-json', 'S3UploadController::uploadJson');
});

// 404 page route
$routes->group('', function($routes) {
    $routes->get('(:any)', 'Errors::show404');
});


