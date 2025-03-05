$(document).ready(function () {
    const LAYOUTS = {
        grid: 'col-md-4',
        full: 'col-md-12'
    };

    $('.analytics-nav-link').on('click', function(e) {
        e.preventDefault();
        
        // Cache frequently used elements
        const $this = $(this);
        const $allTabs = $('.analytics-nav-link');
        const $allPanels = $('.tab-panel');
        const $tabContent = $('.tab-content');
        
        // Get configuration from data attributes
        const targetPanel = $this.data('target');
        const layout = $this.data('layout');

        // Update active state
        $allTabs.removeClass('active');
        $this.addClass('active');

        // Handle panel visibility and layout
        if (targetPanel === 'all' || targetPanel === 2) {
            $tabContent.show();
            $allPanels
                .show()
                .removeClass(Object.values(LAYOUTS).join(' '))
                .addClass(LAYOUTS.grid)
                .css('transition', 'none');
        } else {
            $allPanels.hide();
            $(`.tab-idx-${targetPanel}`)
                .show()
                .removeClass(Object.values(LAYOUTS).join(' '))
                .addClass(LAYOUTS[layout])
                .css('transition', 'all 0.3s ease');
        }
    });
});