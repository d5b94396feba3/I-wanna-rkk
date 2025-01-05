
/**
 * Updates the visibility of drawer action buttons for sections based on action type
 * @param {string} click_btn - The type of action ('add' or 'update')
 */
window.update_drawer_sec_action_mark_btn_and_icon = function (click_btn){
    var drawer_actions_add = $('.drawer-actions-add');
    var drawer_actions_update = $('.drawer-actions-update');

    if(click_btn == 'add') {
        drawer_actions_add.show();
        drawer_actions_update.hide();
    } else {
        drawer_actions_add.hide();
        drawer_actions_update.show();
    }
}

/**
 * Updates the visibility of drawer action buttons for FAQs based on action type
 * @param {string} click_btn - The type of action ('add' or 'update')
 */
window.update_drawer_faq_action_mark_btn_and_icon = function (click_btn){
    var drawer_actions_add = $('.faq-drawer .drawer-actions-add');
    var drawer_actions_update = $('.faq-drawer .drawer-actions-update');

    if(click_btn == 'add') {
        drawer_actions_add.show();
        drawer_actions_update.hide();
    } else {
        drawer_actions_add.hide();
        drawer_actions_update.show();
    }
}

/**
 * Updates the FAQ drawer fields based on whether adding new or editing existing FAQ
 * @param {string} click - The type of action ('add' or 'update')
 * @param {number} id - The ID of the FAQ being edited (only used for updates)
 */
window.update_faq_drawer_fields = function (click,id,index){

    // Define form field selectors
    const formFields = {
            question: $('.faq-details-drawer #question'),
            answer: $('.faq-details-drawer #answer'), 
            updated_by: $('.faq-details-drawer #updated_by'),
            prio: $('.faq-details-drawer #prio'),
            faq_section_id: $('.faq-details-drawer #faq_section_id'),
        };

        let popup_type = 'add';
        let popup_title = 'ADD NEW FAQ';
        let request_btn = 'SUBMIT';

        if(click === 'add') {
            // Clear all form fields for new FAQ
            Object.values(formFields).forEach(field => field.val(''));

        } else {
            // Get existing values from table cells for FAQ being edited
            const values = {
                question: $('.tb-question-' + index).text(),
                answer: $('.tb-answer-' + index).text(),
                updated_by: $('.tb-updated_by-' + index).text(),
                prio: $('.tb-prio-' + index).text(),
                faq_section_id: $('.tb-faq_section_id-' + index).text(),
            };
            // Populate form with existing values
            Object.entries(values).forEach(([key, value]) => {
                formFields[key].val(value);
            });

            popup_type = 'update';
            popup_title = 'UPDATE NOTIFICATION';
            request_btn = 'UPDATE';

            // Set hidden fields for update action
            $('#faq-hidden').val(popup_type);
            $('#faq-hidden-id').val(id);
        }

        // Update drawer header title
        $('.faq-details-drawer .drawer-header h3').text(popup_title);
}

/**
 * Updates the section drawer fields based on whether adding new or editing existing section
 * @param {string} click - The type of action ('add' or 'update') 
 * @param {number} id - The ID of the section being edited (only used for updates)
 */
window.update_sec_drawer_fields = function (click,id,index){

    // Define form field selectors
    const formFields = {
        name: $('.faq-details-drawer #name'),
        url: $('.faq-details-drawer #url'), 
        prio: $('.faq-details-drawer #prio'),
    };

    let popup_type = 'add';
    let popup_title = 'ADD NEW SECTION';
    let request_btn = 'SUBMIT';

    if(click === 'add') {
        // Clear all form fields for new section
        Object.values(formFields).forEach(field => field.val(''));

    } else {
        // Get existing values from table cells for section being edited
        const values = {
            name: $('.tb-name-' + index).text(),
            url: $('.tb-url-' + index).text(),
            prio: $('.tb-prio-' + index).text(),
        };

        // Populate form with existing values
        Object.entries(values).forEach(([key, value]) => {
            formFields[key].val(value);
        });

        popup_type = 'update';
        popup_title = 'UPDATE FAQ';
        request_btn = 'UPDATE';

        // Set hidden fields for update action
        $('#faqsec-hidden').val(popup_type);
        $('#faqsec-hidden-id').val(id);
    }

    // Update drawer header title
    $('.faq-details-drawer .drawer-header h3').text(popup_title);
}