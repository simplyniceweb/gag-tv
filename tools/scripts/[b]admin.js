;(function () {
	var AdminConf = {
		suggestion    : 'form#suggestion',
		edit_btn      : '.edit-suggest',
		modal_suggest : '#suggestVideo',
		nsfw          : '[name=nsfw]:radio'
	}

	var AdminFunc = {
		edit_suggest: function() {
			return this.delegate(AdminConf.edit_btn, "click", function(){
				$(AdminConf.suggestion)[0].reset();
				$("[name=nsfw]:radio").parent().removeClass("active");

				var me    = $(this),
					id    = me.data("id"),
					prev  = me.parent("td").prev(),
					nsfw  = prev.attr("title"),
					desc  = prev.prev().attr("title"),
					title = prev.prev().prev().attr("title"),
					hash  = prev.prev().prev().prev().text(),
					email = prev.prev().prev().prev().prev().text(),
					name  = prev.prev().prev().prev().prev().prev().text();

				$(AdminConf.suggestion)
				.prepend('<input type="hidden" name="suggest_id" value="'+id+'"/>')
				.attr("action", config.base_url + "admin/suggestion");

				if(nsfw == 0) {
					$(AdminConf.nsfw+":first").prop('checked', true).parent().addClass("active");
				} else {
					$(AdminConf.nsfw+":last").prop('checked', true).parent().addClass("active");
				}
				$("#desc").val(desc);
				$("#title").val(title);
				$("#link").val(hash);
				$("#email").val(email);
				$("#name").val(name);
			})
		},
	}

	$.extend(config.doc, AdminFunc);
	config.doc.edit_suggest();

})(jQuery, window, document);