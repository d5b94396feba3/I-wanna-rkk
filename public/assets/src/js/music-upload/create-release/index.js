$(document).ready(function () {
    // Creating an array of promises for each AJAX request
    const promises = [
        // load_artist_release_data_OnPageLoad(),
    ];

    // Wait for all AJAX requests to complete before hiding the loader
    Promise.all(promises)
        .then(() => {
            $("#ajax_loader").fadeOut("slow");
        })
        .catch((error) => {
            console.log("Error:", error);
        });
});