$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'write your story...',
        tabsize: 2,
        height: 450,
        value: 'aaaa'
    });

    $('#submit-story-btn').on('click', function() {
        var title = $("#title-input").val();
        var contentcode = $('#summernote').summernote('code');
        $.ajax({
            url: '/stories/save_draft',
            data: {
                title: title,
                content: contentcode
            },
            method: 'POST'
        }).done(function (message) {
            console.log(message)
            if (message == 'success') {
                alert('stories saved success.')
                window.location.href='/stories'
            } else {
                alert('stories cannot save.')
            }
        })
    });

    
})