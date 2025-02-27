$(document).ready(function() {
    // Initialize both country selectors
    initializeCountrySelector('artist');
    initializeCountrySelector('person');

    function initializeCountrySelector(type) {
        const $countrySearch = $(`#${type}CountrySearch`);
        const $countriesDropdown = $countrySearch.closest('.countries-select-container').find('.countries-dropdown');
        const $hiddenInput = $(`#${type}Country`);
        const $countryOptions = $countriesDropdown.find('.country-option');
        const $countrySelectContainer = $countrySearch.closest('.countries-select-container');
        const $selectedFlagContainer = $countrySelectContainer.find('.selected-flag-container');
        const $searchInput = $countriesDropdown.find('.country-search-input');
        
        const baseUrl = window.location.origin + '/';

        // Make the main input readonly
        $countrySearch.attr('readonly', true);

        // Toggle dropdown on container click
        $countrySelectContainer.on('click', function(e) {
            if (!$(e.target).hasClass('remove-tag') && !$(e.target).hasClass('country-search-input')) {
                $countriesDropdown.toggle();
            }
        });

        // Select country and close dropdown
        $countryOptions.on('click', function(e) {
            e.stopPropagation(); // Prevent event bubbling
            const code = $(this).data('value');
            const name = $(this).text().trim();
            const flagSrc = code === 'International' 
                ? `${baseUrl}assets/country-flags/1x1/world.svg`
                : `${baseUrl}assets/country-flags/1x1/${code.toLowerCase()}.svg`;
            
            $countrySearch.val(name);
            $hiddenInput.val(name);
            $selectedFlagContainer.html(`<img src="${flagSrc}" class="flag-icon" alt="${name} flag">`).show();
            $countryOptions.removeClass('selected');
            $(this).addClass('selected');
            $countrySelectContainer.find('.clear-selection').show();
            $searchInput.val('');
            filterCountries($countryOptions, '');
            
            // Explicitly hide the dropdown
            $countriesDropdown.hide();
        });

        // Search functionality
        $searchInput.on('input', function(e) {
            e.stopPropagation();
            const searchText = $(this).val().toLowerCase();
            filterCountries($countryOptions, searchText);
        });

        // Prevent dropdown from closing when clicking the search input
        $searchInput.on('click', function(e) {
            e.stopPropagation();
        });

        // Clear selection
        $countrySelectContainer.find('.clear-selection').on('click', function(e) {
            e.stopPropagation();
            $countrySearch.val('');
            $hiddenInput.val('');
            $selectedFlagContainer.empty().hide();
            $countryOptions.removeClass('selected');
            $(this).hide();
            $searchInput.val('');
            filterCountries($countryOptions, '');
            $countriesDropdown.hide();
        });

        // Initialize on load
        updateSelectedCountryOnload();

        function updateSelectedCountryOnload() {
            const savedCountry = $hiddenInput.val();
            if (savedCountry) {
                $countryOptions.each(function() {
                    const $option = $(this);
                    const countryName = $option.text().trim();
                    if (countryName === savedCountry) {
                        const code = $option.attr('data-value');
                        const flagSrc = code === 'International' 
                            ? `${baseUrl}assets/country-flags/1x1/world.svg`
                            : `${baseUrl}assets/country-flags/1x1/${code.toLowerCase()}.svg`;
                        
                        $countrySearch.val(countryName);
                        $selectedFlagContainer.html(`<img src="${flagSrc}" class="flag-icon" alt="${countryName} flag">`).show();
                        $countryOptions.removeClass('selected');
                        $option.addClass('selected');
                        $countrySelectContainer.find('.clear-selection').show();
                    }
                });
            }
        }
    }

    // Global handler for clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.countries-select-container').length) {
            $('.countries-dropdown').hide();
            $('.country-search-input').val('');
            $('.country-option').show();
        }
    });

    // Helper function to filter countries
    function filterCountries($options, searchText) {
        $options.each(function() {
            const countryName = $(this).text().trim().toLowerCase();
            const matches = countryName.includes(searchText);
            $(this).toggle(matches);
        });
    }
});