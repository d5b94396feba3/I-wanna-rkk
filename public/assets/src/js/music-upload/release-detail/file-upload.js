// Define global variables
window.uploaded_audio_file_name = '';
window.uploaded_audio_file_size = 0;

$(document).ready(function() {
    const $imageFileContainer = $('#imageFileContainer');
    const $imageInput = $('#image_link');
    const $preview = $('#preview');
    const $trackFileContainer = $('.track-upload-area');

    // Common drag and drop handlers
    window.preventDefaults=function(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    window.handleDragEnterOver=function() {
        $(this).addClass('highlight');
    }

    window.handleDragLeaveDrop=function () {
        $(this).removeClass('highlight'); 
    }
     
     $('#image_link').on('change', function() {
        previewFile();
    });

    // Image upload handling
    window.previewFile=function() {
        const file = $imageInput[0].files[0];
        if (!file) {
            $preview.html(`<img src="${window.config.defaultImageUrl}" alt="Upload icon">`);
            return;
        }

        const reader = new FileReader();
        reader.onloadend = function() {
            $('.upload-default-img').hide();
            $preview.html(`<img src="${reader.result}" alt="Preview">`);
        }
        reader.readAsDataURL(file);
    }

    // Track upload handling
    window.displayFileInformation=function (file, previewDiv) {
        if (!file) return;
        
        const reader = new FileReader();
        reader.onload = function() {
            $('.uploaded-file-name').empty();
            previewDiv.html(`<p class="pre-info">${file.name}</p>`);          
        };
        reader.readAsDataURL(file);
    }

    window.handleTrackFileInputChange=function (trackNumber) {
        const fileInput = $(`#track_file_${trackNumber}`)[0];
        if (!fileInput?.files.length) return;
        
        displayFileInformation(fileInput.files[0], $(`#preview${trackNumber}`));
    }

    window.handleTrackDrop=function (event, trackNumber) {
        const file = event.originalEvent.dataTransfer.files[0];
        if (!file) return;

        const fileInput = $(`#track_file_${trackNumber}`)[0];
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        fileInput.files = dataTransfer.files;
        
        displayFileInformation(file, $(`#preview${trackNumber}`));
    }

    // Image container event bindings
    $imageFileContainer
        .on('dragenter dragover dragleave drop', preventDefaults)
        .on('dragenter dragover', handleDragEnterOver)
        .on('dragleave drop', handleDragLeaveDrop)
        .on('drop', function(e) {
            $imageInput[0].files = e.originalEvent.dataTransfer.files;
            previewFile();
        });

    $imageInput.on('change', previewFile);

    // Track container event bindings 
    $trackFileContainer
        .on('dragenter dragover dragleave drop', preventDefaults)
        .on('dragenter dragover', handleDragEnterOver)
        .on('dragleave drop', handleDragLeaveDrop);

    // Event delegation for dynamic elements
    $(document)
        .on('dragenter dragover dragleave drop', '.track-upload-area', preventDefaults)
        .on('dragenter dragover', '.track-upload-area', handleDragEnterOver)
        .on('dragleave drop', '.track-upload-area', handleDragLeaveDrop)
        .on('drop', '.track-upload-area', function(e) {
            handleTrackDrop(e, $(this).data('track-upload-area-id'));
        })
        .on('change', 'input[type="file"]', function() {
            handleTrackFileInputChange($(this).data('track-file-id'));
        });
});
