// Define global variables
window.uploaded_audio_file_name = '';
window.uploaded_audio_file_size = 0;

$(document).ready(function() {
    const $personFileInputContainer = $('#personFileInputContainer');
    const $person_image_link = $('#person_image_link'); 
    const $personPreview = $('#personPreview');
    const defaultImage = `<img src="${window.config.defaultImageUrl}" alt="Upload icon">`;

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

    // Setup person image upload
    const personPreviewFile = createPreviewFunction($personPreview).bind($person_image_link[0]);
    handleDragAndDrop($personFileInputContainer, $person_image_link, personPreviewFile);
    $person_image_link.on('change', personPreviewFile);

    $(document).on('click', '.person-img-upload-btn', function(e){
        e.preventDefault();
        $('#person_image_link').click();
    });
});
