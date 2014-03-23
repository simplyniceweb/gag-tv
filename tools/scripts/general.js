;(function () {
	var SocNetConf = {
		view          : $("small.view-count"),
		like          : $("small.like-count"),
		dislike       : $("small.dislike-count"),
		fb_share      : '.fb-share',
		twitter_share : '.twitter-share',
		paginate_body : '.video-pagination',
		paginate_prev : '.pager .previous a',
		paginate_next : '.pager .next a'
	}

	var SocNetFunc = {
		get_details: function() {
			return this.delegate(config.doc, "ready", function(){
				var me = $(this), youtube_id = me.find(".youtube-id").data("id");
				$.ajax({
					url: config.base_url + 'index/views/',
					type: 'POST',
					data: { "youtube_id": youtube_id, "gagllery_csrf": config.cookie },
					success: function(response){
						var json = $.parseJSON(response);
						SocNetConf.view.text(json.count);
						SocNetConf.like.text(json.like);
						SocNetConf.dislike.text(json.dislike);
						config.doc.get_videos(config.base_url + 'index/videos/');
					}, error: function () {
						console.log('Failed to process your request!');
					}
				})
			})
		},
		get_videos: function(url) {
			$.ajax({
				url: url,
				type: 'POST',
				data: { "offset": SocNetConf.offset, "gagllery_csrf": config.cookie },
				success: function(response){
					$(SocNetConf.paginate_body).html(response);
				}, error: function () {
					console.log('Failed to process your request!');
				}
			})
		},
		paginate_next: function() {
			return this.delegate(SocNetConf.paginate_next, "click", function(e){
				e.preventDefault();
				config.doc.get_videos($(this).attr("href"));
			})
		},
		paginate_prev: function() {
			return this.delegate(SocNetConf.paginate_prev, "click", function(e){
				e.preventDefault();
				config.doc.get_videos($(this).attr("href"));
			})
		},
		fb_share: function() {
			return this.delegate(SocNetConf.fb_share, "click", function(e){
				e.preventDefault();
				var me = $(this), loc = me.attr('href'), title = me.attr('title');
				window.open( loc + '&amp;text=' + title, 
				'facebook-share-dialog', 
				'height=436, width=626, top=' + ($(window).height() / 2 - 225) + ', left=' + $(window).width() / 2 + 
				', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
			})
		},
		twitter_share: function() {
			return this.delegate(SocNetConf.twitter_share, "click", function(e){
				e.preventDefault();
				var me = $(this), loc = me.attr('href'), title = me.attr('title');
				window.open( loc + '&amp;text=' + title, 
				'facebook-share-dialog', 
				'height=436, width=626, top=' + ($(window).height() / 2 - 225) + ', left=' + $(window).width() / 2 + 
				', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
			})
		},
	}

	$.extend(config.doc, SocNetFunc);
	config.doc.fb_share();
	config.doc.get_details();
	config.doc.twitter_share();
	config.doc.paginate_next();
	config.doc.paginate_prev();

})(jQuery, window, document);