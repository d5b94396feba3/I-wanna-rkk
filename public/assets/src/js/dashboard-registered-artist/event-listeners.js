let currentRequest; // Stores current AJAX request for artist data

// Reload artist dashboard data when clicking secondary navigation items
$(document).on('click', '.secondary-nav-item', function(e) {
    e.preventDefault();
    window.load_registered_artist_dashboard_data();
});

// Handle pagination clicks in the artist table
$(document).on('click', '.registered-artist-table-a', function(e) {
    e.preventDefault();
    var pageUrl = $(this).attr('href');    

    window.fetchArtistDashboardData(pageUrl);
});

// Handle pagination clicks in the artist table
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var pageUrl = $(this).attr('href');    

    window.fetchArtistDashboardData(pageUrl);
});

// Open drawer to add new artist
$(document).on('click', '.add-notificaton-btn', function(event) {
    event.preventDefault();
    // Set click type to 'add' for new artist
    var click_btn = 'add';
    
    // Set ID to 0 since this is a new artist
    var id = 0;
    
    // Update the drawer fields with empty values for new artist
    window.update_registered_artist_drawer_fields(click_btn, id);
    
    // Update drawer action buttons to show submit button instead of update
    window.update_drawer_action_mark_btn_and_icon(click_btn);
    
    // Open the artist details drawer
    $('.registered-artist-details-drawer').addClass('open');
});

// Open drawer to edit existing artist
$(document).on('click', '.edit-artist-btn', function(event) {
    event.preventDefault();
    // Get the artist ID from the clicked button's data attribute
    var id = $(this).data("id");
    // Set click type to 'update' for editing existing artist
    var click_btn = 'update';

    // Prevent body scrolling when drawer is open
    $('body').css('overflow', 'hidden');

     // Construct the URL for the AJAX request
     const url = `${baseLocation}/DashboardAdmin/ajax_selected_artist_data`;

     // Abort any existing request
     if (currentRLAR && currentRLAR.state() === 'pending') {
         currentRLAR.abort();
     }
     // Store the new request
     currentRLAR = $.ajax({
         url: url,
         data:{
            id:id
         },
         type: 'get',
         timeout:20000, // 10 seconds
         beforeSend: function (jqXHR) {
             // Clear existing table content and show loading placeholder
             window.show_sweet2alert_loader("Loading...");
         },
         success: function(response){
             // Update table with new artist data
             var data = response.data;
             // Close loader on error
             window.close_sweet2alert_loader();
            // Update drawer fields and buttons for edit mode
            window.update_registered_artist_drawer_fields(data, id);
            // Update the drawer action button and icon to show update mode
            window.update_drawer_action_mark_btn_and_icon(click_btn);
            // Store the artist ID as a data attribute on the drawer
            $('.registered-artist-details-drawer').attr('data-notificaton-id', id);
            // Open the artist details drawer
            $('.registered-artist-details-drawer').addClass('open');
         },
         error: function(xhr, status, error) {
             // Close loader on error
             window.close_sweet2alert_loader(); 
             window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
             console.log('Error submitting form:', error);
         },
         dataType: 'json'  
     });
});

// Close drawer when clicking close button or icon
$(document).on('click', '.close-drawer, .close-drawer-btn', function(e) {
    e.preventDefault();
    $('.registered-artist-details-drawer').removeClass('open');
    $('body').css('overflow', 'auto');
});

// Handle delete artist from drawer
$(document).on('click', '.drawer-delete-btn', function(event) {
    event.preventDefault();
    var registered_artist_id = $('.registered-artist-details-drawer').attr('data-notificaton-id');

    // Show confirmation dialog before deleting
    Swal.fire({
        title: '<h2>DELETE ARTIST</h2>',
        html: '<p>Are you sure you want to delete this artist?</p>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, I want to delete',
        cancelButtonText: 'Cancel',
        customClass: {
            popup: 'custom-popup',
            title: 'custom-title',
            htmlContainer: 'custom-html-container',
            icon: 'custom-icon',
            confirmButton: 'custom-confirm-button',
            cancelButton: 'custom-cancel-button'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.delete_selected_artist(registered_artist_id);
        }
    });
});

// Handle submission of new artist
$(document).on('click', '.drawer-actions-submit-btn', function(event) {
    event.preventDefault();

    // Validate form before submission
    if (!window.validateArtistForm()) {
        return false;
    }


    var url = window.location.origin + '/add_artist';

    // Show confirmation dialog before adding
    Swal.fire({
        title: '<h2>ADD ARTIST INFO</h2>',
        html: '<p>Are you sure you want to add this artist?</p>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, I want to add',
        cancelButtonText: 'Cancel',
        customClass: {
            popup: 'custom-popup',
            title: 'custom-title',
            htmlContainer: 'custom-html-container',
            icon: 'custom-icon',
            confirmButton: 'custom-confirm-button',
            cancelButton: 'custom-cancel-button'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.submitArtistFormViaAjax(url);
        }
    });
});

// Handle updating existing artist
$(document).on('click', '.drawer-actions-update-btn', function(event) {
    event.preventDefault();

    // Validate form before update
    if (!window.validateArtistForm()) {
        return false;
    }

    var url = window.location.origin + '/update_artist';

    // Show confirmation dialog before updating
    Swal.fire({
        title: '<h2>UPDATE ARTIST INFO</h2>',
        html: '<p>Are you sure you want to update this artist info?</p>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, I want to update',
        cancelButtonText: 'Cancel',
        customClass: {
            popup: 'custom-popup',
            title: 'custom-title',
            htmlContainer: 'custom-html-container',
            icon: 'custom-icon',
            confirmButton: 'custom-confirm-button',
            cancelButton: 'custom-cancel-button'
        },
        buttonsStyling: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.submitArtistFormViaAjax(url);
            $('body').css('overflow', 'auto');
        }
    });
});