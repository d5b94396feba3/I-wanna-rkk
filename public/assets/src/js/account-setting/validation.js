$(document).ready(function () {
    // Form validation
    window.validateArtistFields = function() {
        let isValid = true;
        
        // Get all form values
        const artistName = $("#artist_name").val();
        const artistType = $("#artist_type").val();
        const officialEmail = $("#official_contact_email").val();
        const country = $("#artistCountry").val();
        const label = $("#label").val();
        const genre = $("#genre").val();

        // Validate Artist Name
        if (artistName === '') {
            showRequiredFieldErrorMsg("#artist_name");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg("#artist_name");
        }

        // Validate Artist Type
        if (artistType === '') {
            showRequiredFieldErrorMsg("#artist_type");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg("#artist_type");
        }

        // Validate Official Contact Email
        if (officialEmail === '') {
            showRequiredFieldErrorMsg("#official_contact_email");
            isValid = false;
        } else {
            // Additional email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(officialEmail)) {
                showCustomErrorMsg("#official_contact_email", "Please enter a valid email address");
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#official_contact_email");
            }
        }

        // Validate Country
        if (country === '') {
            showRequiredFieldErrorMsg(".countries-select-container");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg(".countries-select-container");
        }

        // Validate Label
        if (label === '') {
            showRequiredFieldErrorMsg("#label");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg("#label");
        }

        // Validate Genre
        if (genre === '') {
            showRequiredFieldErrorMsg(".genries-select-container");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg(".genries-select-container");
        }

        return isValid;
    };

    window.validatePersonFields = function() {
        let isValid = true;
        
        // Get all form values
        const role = $("#role").val();
        const firstName = $("#firstname").val();
        const lastName = $("#lastname").val();
        const email = $("#email").val();
        const country = $("#personCountry").val();
    
        // Validate Role
        if (role === '') {
            showRequiredFieldErrorMsg("#role");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg("#role");
        }
    
        // Validate First Name
        if (firstName === '') {
            showRequiredFieldErrorMsg("#firstname");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg("#firstname");
        }
    
        // Validate Last Name
        if (lastName === '') {
            showRequiredFieldErrorMsg("#lastname");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg("#lastname");
        }
    
        // Validate Email
        if (email === '') {
            showRequiredFieldErrorMsg("#email");
            isValid = false;
        } else {
            // Additional email format validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showCustomErrorMsg("#email", "Please enter a valid email address");
                isValid = false;
            } else {
                removeRequiredFieldErrorMsg("#email");
            }
        }
    
        // Validate Country
        if (country === '') {
            showRequiredFieldErrorMsg(".countries-select-container");
            isValid = false;
        } else {
            removeRequiredFieldErrorMsg(".countries-select-container");
        }
    

        return isValid;
    };

    // Remove error message on input change
    $('input, select').on('input change', function() {
        removeRequiredFieldErrorMsg(this);
    });

    // Remove error message when selecting a genre
    $('.genre-option').on('click', function() {
        removeRequiredFieldErrorMsg(".genries-select-container");
    });

    // Define the function for showing required field error
    window.showRequiredFieldErrorMsg = function(fieldSelector) {
        $(fieldSelector).css({
            'border': '1px solid #FF8303',
            'border-radius': '30px',
            'font-size': '13px'
        });
        // Remove any existing error message
        $(fieldSelector).siblings('.error-message').remove();
        // Add new error message
        if ($(fieldSelector).siblings('.error-message').length === 0) {
            $("<p class='error-message' style='color: #FF8303; margin-top: 5px; font-size: 13px;'>This field is required.</p>").insertAfter(fieldSelector);
        }
    }

    // Define the function for showing custom error messages
    window.showCustomErrorMsg = function(fieldSelector, message) {
        $(fieldSelector).css({
            'border': '1px solid #FF8303',
            'border-radius': '30px',
            'font-size': '13px'
        });
        // Remove any existing error message
        $(fieldSelector).siblings('.error-message').remove();
        // Add new error message
        if ($(fieldSelector).siblings('.error-message').length === 0) {
            $("<p class='error-message' style='color: #FF8303; margin-top: 5px; font-size: 13px;'>" + message + "</p>").insertAfter(fieldSelector);
        }
    }

    // Define the function for removing error messages
    window.removeRequiredFieldErrorMsg = function(fieldSelector) {
        $(fieldSelector).css('border', '');
        $(fieldSelector).siblings('.error-message').remove();
    }
});