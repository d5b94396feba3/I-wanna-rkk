// Wait for DOM to be fully loaded before executing
$(document).ready(function() {
    // Cache jQuery selectors for performance
    var $header = $('#header');
    var $secondaryNav = $('.secondary-nav');
    
    // Validate that required elements exist in the DOM
    if ($header.length === 0 || $secondaryNav.length === 0) {
        console.error('Header or secondary nav not found');
        return;
    }

    /**
     * Handles scroll behavior for header and secondary nav
     * Adds/removes 'header-scrolled' and 'sticky' classes based on header state
     */
    function handleScroll() {
        if ($header.hasClass('header-scrolled')) {
            // When header is scrolled, make secondary nav sticky
            $secondaryNav.addClass('header-scrolled sticky');
        } else {
            // When header is at top, remove sticky nav
            $secondaryNav.removeClass('header-scrolled sticky');
        }
    }

    // Check initial scroll position when page loads
    handleScroll();

    // Listen for scroll events and update nav accordingly
    $(window).on('scroll', handleScroll);
});