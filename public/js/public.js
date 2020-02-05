$(document).ready(function () {


    $('#write-story-btn').on('click', function() {
        window.location = "write"
    });

    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });

    $('#g100-btn').on('click', function() {
        $('#gift').attr('value',100)
    });
    $('#g500-btn').on('click', function() {
        $('#gift').attr('value',500)
    });
    $('#g1000-btn').on('click', function() {
        $('#gift').attr('value',1000)
    });


})