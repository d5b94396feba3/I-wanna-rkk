  
    
    $(document).ready(function () {

        // Get the base URL of the current page (e.g., "https://example.com")
        const baseLocation = window.location.origin;

        let currentCARequest; // Stores current AJAX request for connected accounts data
        let currentPDRequest; // Stores current AJAX request for password/deletion data  
        let currentADRequest; // Stores current AJAX request for administrator data
        
        // Hide all account menu containers initially
        $('.account-selected-menu-container').hide();

        // Show the first section of the account page by default
        $('.secid-1').show();
        // Creating an array of promises for each AJAX request
        const promises = [
            load_account_administrator_data_onPageLoad(),
            load_artist_connected_account_data_OnPageLoad(),
            load_password_deletion_data_onPageLoad()
        ];
        
        // Wait for all AJAX requests to complete before hiding the loader
        Promise.all(promises)
            .then(() => {
                // $("#ajax_loader").fadeOut("slow");
            })
            .catch((error) => {
                console.log("Error:", error);
            });

        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);

        // Add click event handler for account navigation links
        $('.account-nav-link').on('click', function(e) {
            // Prevent default link behavior
            e.preventDefault();
            
            // Remove active class from all nav links
            $('.account-nav-link').removeClass('active');
            // Add active class to clicked nav link
            $(this).addClass('active');
    
            // Get the navigation ID from data attribute
            var navid=$(this).data("navid");
    
            // Hide all content sections
            $('.account-selected-menu-container').hide();
            // Show the content section corresponding to clicked nav
            $('.secid-' + navid).show();
        });


    function load_account_administrator_data_onPageLoad() {
        const url = `${baseLocation}/Account/ajax_account_administrator_data`;
        
        // Abort any existing request
        if (currentADRequest && currentADRequest.state() === 'pending') {
            currentADRequest.abort();
        }

        // Store the new request
        currentADRequest = $.ajax({
            url: url,
            type: 'get',
            timeout:20000, // 20 seconds
            beforeSend: function (jqXHR) {
                $('#account-content-placeholder').show();
            },
            success: function(response) {
                $('.secid-1').html(response.administrator_data);
            },
            complete: function(){
                $('#account-content-placeholder').hide(); 
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $('#account-content-placeholder').hide();
                window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'json'
        });
    }


    function load_password_deletion_data_onPageLoad() {
        const url = `${baseLocation}/Account/ajax_password_deletion_data_onPageLoad`;
    
        // Abort any existing request
        if (currentPDRequest && currentPDRequest.state() === 'pending') {
            currentPDRequest.abort();
        }

        // Store the new request
        currentPDRequest = $.ajax({
            url: url,
            type: 'get',
            beforeSend: function (jqXHR) {
                $('#account-content-placeholder').show();
            },
            success: function(response) {                
                // Distribute the HTML to each container
                $('.secid-3').html(response.account_password_data);
                $('.secid-4').html(response.delete_account_data);
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $('#account-content-placeholder').hide();
                window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'json'
        });
    }

     function load_artist_connected_account_data_OnPageLoad() {

        const url = `${baseLocation}/Account/ajax_paginated_artist_connected_accounts_data`;

        // Abort any existing request
        if (currentCARequest && currentCARequest.state() === 'pending') {
            currentCARequest.abort();
        }

        // Store the new request
        currentCARequest = $.ajax({
            url: url,
            type: 'get',
            beforeSend: function (jqXHR) {
                $('#account-content-placeholder').show();
            },
            success: function(html){
                $('.secid-2').html(html);
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors
                $('#account-content-placeholder').hide();
                window.show_error_msg('An error occurred while processing your request. Please refresh and try again.');
                console.log('Error submitting form:', error);
            },
            dataType: 'html'  
        });
    }

});


