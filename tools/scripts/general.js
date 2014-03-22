;(function () {
	var youtubeConf = {
		view    : $("small.view-count"),
		like    : $("small.like-count"),
		dislike : $("small.dislike-count")
	}
	
	var youtubeFunc = {
		get_views: function() {
			return this.delegate(config.doc, "ready", function(){
				var me = $(this), youtube_id = me.find(".youtube-id").data("id");
				$.ajax({
					url: config.base_url + 'index/views/',
					type: 'POST',
					data: { "youtube_id": youtube_id, gagllery_csrf: $.cookie('gagllery_cookie') },
					success: function(response){
						var json = $.parseJSON(response);
						youtubeConf.view.text(json.count);
						youtubeConf.like.text(json.like);
						youtubeConf.dislike.text(json.dislike);
					}, error: function () {
						console.log('Failed to process your request!');
					}
				})
			})
		},
	}

	$.extend(config.doc, youtubeFunc);
	config.doc.get_views();

})(jQuery, window, document);