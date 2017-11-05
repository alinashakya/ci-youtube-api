

$(document).on('ready',function(){
	$("#search-form-submit").on('click',function(){
		var url = "index.php/youtube";
		var searchText = $("#sname").val();
		$.ajax({
			url: url,
			type: 'POST',
	        data: {
	            'searchText': searchText
	        },
        	dataType: 'json',
			success: function(result){
				$("#video-list").html(result);
        	}
        });
		return false;
	});
});

function getNextVideo(videoTitle,videoDesc,videoId){
	alert(videoTitle);
	alert(videoDesc);
	alert(videoId);
	$("#youtube-title").html(videoTitle);
	$("#youtube-desc").html(videoDesc);
	$("#youtube-url").attr('src','https://www.youtube.com/embed/'+videoId);
}