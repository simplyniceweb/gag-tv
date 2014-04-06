;(function () {

	var SocNetConf = {
		view          : $("small.view-count"),
		like          : $("small.like-count"),
		dislike       : $("small.dislike-count"),
		fb_share      : '.fb-share',
		twitter_share : '.twitter-share',
		paginate_body : '.video-pagination',
		paginate_prev : '.pager .previous a',
		paginate_next : '.pager .next a',
		suggestion    : 'form#suggestion',
		error_handler : 'div.error-handler',
		suggest_btn   : 'button.suggest-btn',
		modal_suggest : '#suggestVideo',
		load_more     : '.load-more',
		status        : 0,
	}

	var SocNetFunc = {
		remove_warning: function() {
			return this.delegate(SocNetConf.modal_suggest, "hidden.bs.modal", function(){
				$(".submit-success").hide();
			})
		},
		suggestion: function() {
			return this.delegate(SocNetConf.suggestion, "submit", function(e){
				e.preventDefault();
				var me = $(this), data = me.serialize();
				$(SocNetConf.suggest_btn).html("<span class='fa fa-spinner fa-spin'></span> Processing").attr("disabled", "disabled");
				$.ajax({
					url: config.base_url + 'index/suggestion',
					type: 'POST',
					data: data,
					success: function(response){
						if(response == "success") {
							$(SocNetConf.suggestion)[0].reset();
							$(".submit-success").show();
						} else {
							$(SocNetConf.error_handler).html(response);
						}
						$(SocNetConf.suggest_btn).html("Submit").removeAttr("disabled", "disabled");
					}, error: function () {
						console.log('Failed to process your request!');
					}
				})
			})
		},
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
					}, error: function () {
						console.log('Failed to process your request!');
					}
				})
			})
		},
		load_more: function() {
			return this.delegate(SocNetConf.load_more, "click", function(e){
				e.preventDefault();
				if(SocNetConf.status == 1) return false;
				SocNetConf.status = 1;
				var me = $(this), last = $(".thumbnail:last");
				me.html('<span class="fa fa-cog fa-spin"></span>');
				$.ajax({
					url: config.base_url + 'index/load_api/',
					type: 'POST',
					data: { "video_id": last.data("id"), "gagllery_csrf": config.cookie },
					success: function(response){
						if(response == "No more to load.") {
							me.removeClass("btn-info").addClass("btn-warning").html(response);
						} else {
							me.html('Load more videos ...');
							last.parent().after(response);
						}
						SocNetConf.status = 0;
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
	config.doc.load_more();
	config.doc.suggestion();
	config.doc.get_details();
	config.doc.twitter_share();
	// config.doc.paginate_next();
	// config.doc.paginate_prev();
	config.doc.remove_warning();

})(jQuery, window, document);