/**
 * Updates the artist drawer fields based on whether adding or editing
 * @param {string} click - The type of action ('add' or 'update')
 * @param {number} id - The artist ID when editing, 0 when adding
 */
window.update_registered_artist_drawer_fields = function (response, id) {
    // Define form field selectors
    const formFields = {
        artist_id: $('.registered-artist-details-drawer #artist_id'),
        artist_type: $('.registered-artist-details-drawer #artist_type'),
        artist_name: $('.registered-artist-details-drawer #artist_name'),
        artist_country: $('.registered-artist-details-drawer #artist_country'),
        email_management: $('.registered-artist-details-drawer #email_management'),
        official_contact_email: $('.registered-artist-details-drawer #official_contact_email'),
        preferred_rokk_address: $('.registered-artist-details-drawer #preferred_rokk_address'),
        facebook: $('.registered-artist-details-drawer #facebook'),
        instagram: $('.registered-artist-details-drawer #instagram'),
        twitter: $('.registered-artist-details-drawer #twitter'),
        spotify: $('.registered-artist-details-drawer #spotify'),
        metal_archives: $('.registered-artist-details-drawer #metal_archives'),
        website: $('.registered-artist-details-drawer #website'),
        discogs: $('.registered-artist-details-drawer #discogs'),
        label: $('.registered-artist-details-drawer #label'),
        distributor: $('.registered-artist-details-drawer #distributor'),
        status: $('.registered-artist-details-drawer .custom-dropdown #dropdown-selected'),
        join_date: $('.registered-artist-details-drawer #join_date')
    };

    // Default values for adding new artist
    let request_type = 'add';
    let request_title = 'ADD ARTIST';
    let request_btn = 'SUBMIT';
    
    // Set each form field value from response data
    Object.entries(formFields).forEach(([key, field]) => {

        if (key === 'preferred_rokk_address') {
            let address = response[key];
            if(!address.includes('rokk.com') && address !== ''){
                address = address.toUpperCase() + '.rokk.com';
            }
            field.val(address || '');
        }
        else if (key === 'status') {
            // Update the custom dropdown for status
            const statusText = field.text(); 
            // Capitalize the first letter of the status value
            const statusValue = response[key].charAt(0).toUpperCase() + response[key].slice(1);
            field.text(statusValue); 
            $('#status').val(statusValue); // Update the hidden input value
        } else if (field.is('select')) {
            // For select elements, find and select the matching option
            field.find('option').each(function() {
                if ($(this).val() === response[key]) {
                    field.val(response[key]);
                }
            });
        } else {
            field.val(response[key] || '');
        }
    });

    // Update request info for editing
    request_type = 'update';
    request_title = 'UPDATE ARTIST';
    request_btn = 'UPDATE';

    $('.drawer-additional-fields').show();

    $('#request-type').val(request_type);
    

    // Update drawer header title
    $('.registered-artist-details-drawer .drawer-header h3').text(request_title);
}


/**
 * Updates the drawer action buttons based on add/edit mode
 * @param {string} click_btn - The type of action ('add' or 'update')
 */
window.update_drawer_action_mark_btn_and_icon = function(click_btn) {
    var drawer_actions_add = $('.drawer-actions-add');
    var drawer_actions_update = $('.drawer-actions-update');

    // Show/hide appropriate action buttons
    if (click_btn == 'add') {
        drawer_actions_add.show();
        drawer_actions_update.hide();
    } else {
        drawer_actions_add.hide();
        drawer_actions_update.show();
    }
}