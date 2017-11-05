$(document).on('ready', function() {
    //sets search form action as null
    document.searchForm.action = "";

    //displays search list
    $("#search-form-submit").on('click', function() {
        var url = "index.php/youtube";
        var searchText = $("#sname").val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'searchText': searchText
            },
            dataType: 'json',
            success: function(result) {
                $("#video-list").html(result);
            }
        });
        return false;
    });
});

/**
 * Function used to display next video on click event
 * @param videoTitle title of youtube video
 * @param videoDesc description of youtube video
 * @param videoId unique id of youtube video
 */
function getNextVideo(videoTitle, videoDesc, videoId) {
    $("#youtube-title").html(urldecode(videoTitle));
    $("#youtube-desc").html(urldecode(videoDesc));
    $("#youtube-url").attr('src', 'https://www.youtube.com/embed/' + urldecode(videoId));
}

/**
 * Decodes an encoded string
 * @param string provided string to be decoded
 */
function urldecode(string) {
    return decodeURIComponent(string.replace(/\+/g, ' '));
}