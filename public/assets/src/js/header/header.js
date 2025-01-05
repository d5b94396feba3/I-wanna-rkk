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
    const duration = 300;

    function toggleDropdown() {
        $musicUploadDropdown.toggleClass('active');
        $listDropdown.toggleClass('active');
        $sidebarActive.toggleClass();
        $musicUploadDropdownMenu.stop().slideToggle('slow');
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

    // Compact music dropdown handlers
    $('#compact-music-dropdown').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $compactMusicDropdown.toggle();
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('#compact-music-dropdown, .compact-music-dropdown').length) {
            $compactMusicDropdown.hide();
        }
    });

    function toggleSidebar(){
        $sidebarToggle.toggleClass("rotatedToggleIcon");
        if (windowWidth < 768) {
            $(".sidebar-overlay").toggleClass("active");
            const leftPosition = $mainContent.hasClass("active") ? '0' : '430px';
            $sidebar.animate({left: leftPosition}, duration);
            $mainContent.toggleClass("active");
        } else {
            $sidebar.toggleClass("active");
            $compactSidebar.toggle();
            $dashboardFooter.toggleClass("active");
            
            const marginLeft = $mainContent.hasClass("active") ? '322px' : '50px';

            const sidebarStatus = marginLeft == '322px' ? 'true' : 'false';
            
            // Save state after toggle
            localStorage.setItem('sidebarStatus', sidebarStatus);

            $mainContent.animate({ marginLeft: marginLeft }, duration, function() {
                $mainContent.toggleClass("active");
            });
        }
    }


});