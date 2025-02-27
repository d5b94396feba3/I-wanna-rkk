$(document).ready(function() {
    const $genreSearch = $('#genreSearch');
    const $genriesDropdown = $('#genriesDropdown');
    const $selectedGenries = $('#selectedGenries');
    const $hiddenInput = $('#genre');
    const $genreOptions = $('.genre-option');
    
    let selectedValues = new Map(); 

    // Show dropdown on focus
    $genreSearch.on('focus click', function(e) {
        e.stopPropagation();
        $genriesDropdown.show();
    });

    // Handle clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.genries-select-container').length) {
            $genriesDropdown.hide();
        }
    });

    // Search functionality
    $genreSearch.on('input', function() {
        const searchText = $(this).val().toLowerCase();
        $genreOptions.each(function() {
            const matches = $(this).text().toLowerCase().includes(searchText);
            $(this).toggle(matches);
        });
    });

    // Select genre
    $genreOptions.on('click', function() {
        const code = $(this).data('value');
        const name = $(this).text().trim();
        
        if (!selectedValues.has(code)) {
            selectedValues.set(code, name);
            updateSelectedGenres();
        }
        
        $genreSearch.val('');
        $genriesDropdown.hide();
        updateSelectedState();
    });

    // Function to update selected genres
    function updateSelectedGenres() {
        $selectedGenries.empty();
        $hiddenInput.val(Array.from(selectedValues.keys()).join(','));
        
        selectedValues.forEach((name, code) => {
            const $tag = $(`
                <div class="genre-tag">
                    ${name}
                    <span class="remove-tag" data-value="${code}">×</span>
                </div>
            `);
            $selectedGenries.append($tag);
        });

        updateSelectedState();
    }

    // Function to update selected state in dropdown
    function updateSelectedState() {
        $genreOptions.each(function() {
            const code = $(this).data('value');
            $(this).toggleClass('selected', selectedValues.has(code));
        });
    }

    // Handle removing tags
    $selectedGenries.on('click', '.remove-tag', function() {
        const code = $(this).data('value');
        selectedValues.delete(code);
        updateSelectedGenres();
    });

    // Prevent dropdown from closing when clicking inside it
    $genriesDropdown.on('click', function(e) {
        e.stopPropagation();
    });

    // Initialize with empty selection
    updateSelectedGenres();

    // Function to update selected genres on load
    function updateSelectedGenresOnload() {
        $selectedGenries.empty();
        
        const searchValues = $genreSearch.val();
        
        if (searchValues) {
            const searchValuesArray = searchValues.split(',');
            searchValuesArray.forEach(code => {
                $genreOptions.each(function() {
                    if ($(this).data('value') === code) {
                        const genreName = $(this).text().trim();
                        selectedValues.set(code, genreName);
                    }
                });
            });
            
            updateSelectedGenres();
            updateSelectedState();   
        }

        $genreSearch.val('');
    }

    // Call the function when document is ready
    updateSelectedGenresOnload();
});