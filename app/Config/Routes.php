<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get("/", "Home::index");
$routes->get("Home/login", "Home::login");
$routes->post("Home/login", "Home::login");
$routes->get("logout", "Home::logout");
$routes->post("update_artist_data", "Profile::update_artist_data");
$routes->post(
    "Profile/ajax_artist_profile_data_onPageLoad",
    "Profile::ajax_artist_profile_data_onPageLoad"
);
$routes->get("profile", "Profile::index");

$routes->get("mu_profile", "MusicUpload::index");
$routes->get("mu_release", "MusicUpload::release_index");
$routes->get("mu_track", "MusicUpload::track_index");
$routes->post(
    "MusicUpload/ajax_music_upload_data_onPageLoad",
    "MusicUpload::ajax_music_upload_data_onPageLoad"
);
$routes->post(
    "MusicUpload/ajax_track_info_popup",
    "MusicUpload::ajax_track_info_popup"
);
$routes->post(
    "MusicUpload/ajax_create_release_data",
    "MusicUpload::ajax_create_release_data"
);
$routes->post(
    "MusicUpload/ajax_add_track_data",
    "MusicUpload::ajax_add_track_data"
);
$routes->post("upload_track_data", "MusicUpload::upload_track_data");
$routes->post(
    "update_music_upload_profile_data",
    "MusicUpload::update_music_upload_profile_data"
);
$routes->post(
    "upload_music_release_data",
    "MusicUpload::upload_music_release_data"
);

$routes->get("direct-artist-support", "DirectArtistSupport::index");
$routes->post(
    "update_direct_artist_support",
    "DirectArtistSupport::update_direct_artist_support"
);
$routes->post(
    "DirectArtistSupport/ajax_direct_artist_support_onPageLoad",
    "DirectArtistSupport::ajax_direct_artist_support_onPageLoad"
);

$routes->get("statistics", "Statistics::index");
$routes->post(
    "Statistics/ajax_artist_stats_data_onPageLoad",
    "Statistics::ajax_artist_stats_data_onPageLoad"
);

$routes->get("account", "Account::index");
$routes->get("change_password", "Account::change_password_index");
$routes->get("delete_account", "Account::delete_account_index");
$routes->post("ajax_delete_account", "Account::ajax_delete_account");
$routes->get("connected_account", "Account::connected_account_index");
$routes->post(
    "Account/ajax_artist_account_data_onPageLoad",
    "Account::ajax_artist_account_data_onPageLoad"
);
$routes->post("delete_artist_account", "Account::delete_artist_account");
$routes->post("update_artist_password", "Account::update_artist_password");
$routes->post("update_artist_password", "Account::update_artist_password");
$routes->post(
    "Account/ajax_change_password_data",
    "Account::ajax_change_password_data"
);
