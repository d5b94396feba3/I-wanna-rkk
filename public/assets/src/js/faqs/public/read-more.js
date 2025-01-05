// Wait for DOM to be fully loaded before executing
$(document).ready(function() {
    // Add click handler for both "Read More" and "Read Less" buttons
    $('.read-more-btn, .read-less-btn').click(function(e) {
        // Prevent default link/button behavior
        e.preventDefault();

        // Find the closest parent FAQ item container
        var $faqItem = $(this).closest('.faq-item');
        
        // Get references to the truncated and full content containers
        var $showLessContent = $faqItem.find('.show-less-content'); // Truncated content
        var $showMoreContent = $faqItem.find('.show-more-content'); // Full content

        // Animate the showing/hiding of content sections using jQuery's slideToggle
        $showMoreContent.slideToggle(); // Toggle full content visibility
        $showLessContent.slideToggle(); // Toggle truncated content visibility

        // Update FAQ item styling:
        // - If "Read More" was clicked, set height to auto to show full content
        // - If "Read Less" was clicked, set height back to 300px
        // - Toggle 'active' class for additional styling
        $faqItem.css('height', $(this).hasClass('read-more-btn') ? 'auto' : '300px')
                .toggleClass('active');
    });
});