$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'write your story...',
        tabsize: 2,
        height: 100
    });

    $('#submit-story-btn').on('click', function() {
        var title = $("#title-input").val();
        var contentcode = $('#summernote').summernote('code');
        // console.log(markupStr)
        // document.getElementById("content").innerHTML = markupStr;
        // window.location.href='/home/index'
        $.ajax({
            url: '/stories/save_draft',
            // url: '/stories/ajax_request',
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