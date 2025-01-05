// Define global variables
window.uploaded_audio_file_name = '';
window.uploaded_audio_file_size = 0;

$(document).ready(function() {

    const $personFileInputContainer = $('#personFileInputContainer');
    const $person_image_link = $('#person_image_link'); 
    const $fileInputContainer = $('#fileInputContainer');
    const $imageInput = $('#image_link');
    const $personPreview = $('#personPreview');
    const $preview = $('#preview');
    const defaultImage = `<img src="${window.config.defaultImageUrl}" alt="Upload icon">`;

    // Setup person image upload
    const personPreviewFile = createPreviewFunction($personPreview).bind($person_image_link[0]);
    handleDragAndDrop($personFileInputContainer, $person_image_link, personPreviewFile);
    $person_image_link.on('change', personPreviewFile);

    // Make personPreviewFile globally available
    window.personPreviewFile = personPreviewFile;

    // Setup regular image upload
    const previewFile = createPreviewFunction($preview).bind($imageInput[0]);
    handleDragAndDrop($fileInputContainer, $imageInput, previewFile);
    $imageInput.on('change', previewFile);


    $(document).on('click', '.logo-img-upload-btn', function(e){
        e.preventDefault();
        $('#image_link').click();
    });

    $(document).on('click', '.person-img-upload-btn', function(e){
        e.preventDefault();
        $('#person_image_link').click();
    });
});

// Common drag and drop handler function
window.handleDragAndDrop = function ($container, $input, previewFn) {
    $container.on({
        'dragenter dragover dragleave drop': function(e) {
            e.preventDefault();
            e.stopPropagation();
        },
        'dragenter dragover': function() {
            $(this).addClass('highlight');
        },
        'dragleave drop': function() {
            $(this).removeClass('highlight');
        },
        'drop': function(e) {
            $input[0].files = e.originalEvent.dataTransfer.files;
            previewFn();
        }
    });
}

// Generic preview function
window.createPreviewFunction = function ($previewElement) {
    return function() {
        const file = this.files?.[0];
        if (!file) {
            $previewElement.html(defaultImage);
            return;
        }

        const reader = new FileReader();
        reader.onloadend = () => {
            $previewElement.html(`<img src="${reader.result}" alt="Preview">`);
        };
        reader.readAsDataURL(file);
    };
}
