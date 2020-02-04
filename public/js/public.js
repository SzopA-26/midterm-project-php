$(document).ready(function () {


    $('#write-story-btn').on('click', function() {
        window.location = "write"
    });

    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
})