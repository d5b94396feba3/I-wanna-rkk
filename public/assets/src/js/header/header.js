$(document).ready(function() {
    // Cache DOM elements
    const $musicUploadDropdown = $('#musicUploadDropdown');
    const $listDropdown = $('.list-dropdown');
    const $musicUploadDropdownMenu = $('#musicUploadDropdownMenu');
    const $musicUploadDropdownIcon = $('#musicUploadDropdownIcon');
    const $mainContent = $(".main-body-content");
    const $sidebar = $("#sidebar");
    const $sidebarActive = $("#sidebar a.active").not(".list-dropdown a");
    const $compactSidebar = $("#compact-sidebar");
    const $dashboardFooter = $("#dashboard-footer");
    const $sidebarToggle = $(".sidebar-toggle");
    const $compactMusicDropdown = $('.compact-music-dropdown');
    const windowWidth = $(window).width();
    const duration = 0;

    // Function to toggle dropdown
    function toggleDropdown() {
        $musicUploadDropdown.toggleClass('active');
        $listDropdown.toggleClass('active');
        $sidebarActive.toggleClass();
        $musicUploadDropdownMenu.stop().slideToggle('fast');
        $musicUploadDropdownIcon.toggleClass('rotate180');
    }

    // Initialize dropdown if shouldBeOpen is true
    if (window.shouldBeOpen) {
        toggleDropdown();
    }

    // Get initial state from localStorage
    const savedSidebarState = localStorage.getItem('sidebarStatus');
    
    // Initialize sidebar state based on saved preference
    if (savedSidebarState =='false') {

        setTimeout(() => {
            toggleSidebar();
        }, 0);
    }

    // Event handlers
    $listDropdown.on('click', function(e) {
        e.stopPropagation();
        toggleDropdown();
    });

    $musicUploadDropdownMenu.on('click', 'a', function(e) {
        e.stopPropagation();
    });

    $(document).on('click', '.compact-dropdwon', toggleDropdown);

    $sidebarToggle.on('click', function() {
       toggleSidebar();
    });

    // Event handler for hovering over the compact music dropdown container
    $('.compact-music-dropdown-container').hover(function() {
        // Show the compact music dropdown on hover
        $compactMusicDropdown.show();
    });

    // Event handler for hovering over links in the compact sidebar that are not sub-music links
    $('#compact-sidebar a').not('.sub-music-a').hover(function() {
        // Hide the compact music dropdown on hover over other links
        $compactMusicDropdown.hide();
    });

    // Event handler for clicking anywhere in the document
    $(document).on('click', function(e) {
        // Check if the click target is not the compact music dropdown or its container
        if (!$(e.target).closest('#compact-music-dropdown, .compact-music-dropdown').length) {
            // Hide the compact music dropdown if the click is outside of it
            $compactMusicDropdown.hide();
        }
    });

    // Function to toggle sidebar
    function toggleSidebar(){
        // Toggle the rotation class for the sidebar toggle icon
        $sidebarToggle.toggleClass("rotatedToggleIcon");
        
        // Check if the window width is less than 768px for mobile layout
        if (windowWidth < 768) {
            // Toggle the active class for the sidebar overlay for mobile layout
            $(".sidebar-overlay").toggleClass("active");
            // Determine the left position for the sidebar based on its current state
            const leftPosition = $mainContent.hasClass("active") ? '0' : '430px';
            // Animate the sidebar to the determined left position
            $sidebar.animate({left: leftPosition}, duration);
            // Toggle the active class for the main content
            $mainContent.toggleClass("active");
        } else {
            // Toggle the active class for the sidebar for desktop layout
            $sidebar.toggleClass("active");
            // Toggle the compact sidebar for desktop layout
            $compactSidebar.toggle();
            // Toggle the active class for the dashboard footer for desktop layout
            $dashboardFooter.toggleClass("active");
            
            // Determine the margin left for the main content based on its current state
            const marginLeft = $mainContent.hasClass("active") ? '322px' : '50px';

            // Determine the sidebar status based on the margin left
            const sidebarStatus = marginLeft == '322px' ? 'true' : 'false';
            
            // Save the sidebar status to localStorage after toggle
            localStorage.setItem('sidebarStatus', sidebarStatus);

            // Animate the main content to the determined margin left
            $mainContent.animate({ marginLeft: marginLeft }, duration, function() {
                // Toggle the active class for the main content after animation
                $mainContent.toggleClass("active");
            });
        }
    }
});