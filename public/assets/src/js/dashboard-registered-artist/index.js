// Get the base URL of the current page (e.g., "https://example.com")
const baseLocation = window.location.origin;
let currentRCRA='';
let currentRLAR='';
let currentRCRA2='';
let currentRLAR2='';
// Global variable to store the current search AJAX request
// This allows canceling pending searches when a new search is initiated
window.searchNAjax = null;
// When the document is ready, initialize the dashboard
$(document).ready(function () {
    // Create an array of promises for AJAX requests that need to run on page load
    const promises = [
        // Load the initial artist dashboard data
        window.load_registered_artist_dashboard_data(),
        window.count_registered_artists_data(),
        window.count_link_status_data()
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            // Fade out the loading indicator once all requests are done
            $("#ajax_loader").fadeOut("slow");
        })
        .catch((error) => {
            console.log("Error:", error);
        });
    
    // Auto-hide any alert messages after 3 seconds    
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 3000);
});

/**
 * Loads artist dashboard data via AJAX
 * Makes a GET request to fetch artist data and updates the table content
 */
window.load_registered_artist_dashboard_data = function() {
    // Construct the URL for the AJAX request
    const url = `${baseLocation}/DashboardAdmin/ajax_registered_artists_data`;

    // Abort any existing request
    if (currentRLAR && currentRLAR.state() === 'pending') {
        currentRLAR.abort();
    }
    // Store the new request
    currentRLAR = $.ajax({
        url: url,
        type: 'get',
        timeout:20000, // 10 seconds
        beforeSend: function (jqXHR) {
            // Clear existing table content and show loading placeholder
            $('.registered-artist-table-content').empty();
            $('#registered-artist-table-container-placeholder').show();
        },
        success: function(response){
            // Update table with new artist data
            var html = response;
            $('#registered-artist-table-container-placeholder').hide();
            $('.registered-artist-table-content').html(html);
        },
        error: function(xhr, status, error) {
            $('#registered-artist-table-container-placeholder').hide();
            window.errorMsg('An error occurred while processing your request. Please refresh and try again.');
            console.log('Error submitting form:', error);
        },
        dataType: 'html'  
    });
}


/**
 * Validates the artist registration form
 * Checks required fields and displays error messages
 * @returns {boolean} True if form is valid, false otherwise
 */
window.validateArtistForm = function() {
    var isValid = true;

    // Define required fields and their display names
    var requiredFields = {
        'artist_type': 'Artist Type',
        'artist_name': 'Artist Name',
        'artist_country': 'Country',
        'official_contact_email': 'Official Contact Email',
    };

    // Validate each required field
    Object.keys(requiredFields).forEach(function(fieldName) {
        var field = $('#ArtistForm #' + fieldName);
        var value = field.val() ? field.val().trim() : '';
        var displayName = requiredFields[fieldName];
        
        // Check if field is empty
        if (!value) {
            isValid = false;
            if (!field.hasClass('is-invalid')) {
                // Add error styling and message
                field.addClass('is-invalid');
                field.after(`<span class="text-danger">${displayName} is required</span>`);
            }
        } else {
            // Additional validation for email fields
            if (fieldName.includes('email') && !isValidEmail(value)) {
                isValid = false;
                if (!field.hasClass('is-invalid')) {
                    field.addClass('is-invalid');
                    field.after(`<span class="text-danger">Please enter a valid email address</span>`);
                }
            } else {
                // Clear error styling and message
                field.removeClass('is-invalid');
                field.next('.text-danger').remove();
            }
        }
        
        // Auto-remove error messages after 3 seconds
        setTimeout(() => {
            field.removeClass('is-invalid');
            field.next('.text-danger').remove();
        }, 3000);
    });

    return isValid;
}

/**
 * Validates email format
 * @param {string} email - The email address to validate
 * @returns {boolean} True if email is valid, false otherwise
 */
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}