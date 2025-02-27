$(document).ready(function() {
    const $marketSearch = $('#marketSearch');
    const $marketsDropdown = $('#marketsDropdown');
    const $selectedMarkets = $('#selectedMarkets');
    const $hiddenInput = $('#release_available_markets');
    const $marketOptions = $('.market-option');
    
    let selectedValues = new Map(); 
    const baseUrl = window.location.origin + '/';

    // Show dropdown on focus
    $marketSearch.on('focus click', function(e) {
        e.stopPropagation();
        $marketsDropdown.show();
    });

    // Handle clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.markets-select-container').length) {
            $marketsDropdown.hide();
        }
    });

    // Search functionality
    $marketSearch.on('input', function() {
        const searchText = $(this).val().toLowerCase();
        $marketOptions.each(function() {
            const matches = $(this).text().toLowerCase().includes(searchText);
            $(this).toggle(matches);
        });
    });

    // Select market
    $marketOptions.on('click', function() {
        const code = $(this).data('value');
        const name = $(this).text().trim();
        
        // Handle "Worldwide" selection
        if (code === 'Worldwide') {
            selectedValues.clear();
            selectedValues.set(code, name);
            updateSelectedMarkets();
            $marketSearch.val('');
            $marketsDropdown.hide();
            return;
        }
        
        // Remove "Worldwide" if selecting specific country
        if (selectedValues.has('Worldwide')) {
            selectedValues.delete('Worldwide');
        }
        
        if (!selectedValues.has(code)) {
            selectedValues.set(code, name);
            updateSelectedMarkets();
        }
        
        $marketSearch.val('');
        $marketsDropdown.hide();

        // Update selected state
        updateSelectedState();
    });

    // Function to update selected markets
    function updateSelectedMarkets() {
        $selectedMarkets.empty();
        $hiddenInput.val(Array.from(selectedValues.keys()).join(','));
        
        selectedValues.forEach((name, code) => {
            const flagSrc = code === 'Worldwide' 
                ? `${baseUrl}assets/country-flags/1x1/world.svg`
                : `${baseUrl}assets/country-flags/1x1/${code.toLowerCase()}.svg`;
                
            const $tag = $(`
                <div class="market-tag">
                    <img src="${flagSrc}" class="flag-icon">
                    ${name}
                    <span class="remove-tag" data-value="${code}">×</span>
                </div>
            `);
            $selectedMarkets.append($tag);
        });

        updateSelectedState();
    }

    // Function to update selected state in dropdown
    function updateSelectedState() {
        $marketOptions.each(function() {
            const code = $(this).data('value');
            $(this).toggleClass('selected', selectedValues.has(code));
        });
    }

    // Handle removing tags
    $selectedMarkets.on('click', '.remove-tag', function() {
        const code = $(this).data('value');
        selectedValues.delete(code);
        updateSelectedMarkets();
    });

    // Prevent dropdown from closing when clicking inside it
    $marketsDropdown.on('click', function(e) {
        e.stopPropagation();
    });

    // Initialize with empty selection
    updateSelectedMarkets();

    // Function to update selected markets on load
    function updateSelectedMarketsOnload() {
        $selectedMarkets.empty();
        
        const searchValues = $marketSearch.val();
        
        if (searchValues) {
            const searchValuesArray = searchValues.split(',');
            searchValuesArray.forEach(code => {
                $marketOptions.each(function() {
                    if ($(this).data('value') === code) {
                        const countryName = $(this).text().trim();
                        selectedValues.set(code, countryName);
                    }
                });
            });
            
            // Update the visual display of selected markets in the UI
            updateSelectedMarkets(); 
            
            // Update the selected state of market options in the dropdown
            updateSelectedState();   
        }

        $marketSearch.val('');
    }

    // Call the function when document is ready
    updateSelectedMarketsOnload();
});

