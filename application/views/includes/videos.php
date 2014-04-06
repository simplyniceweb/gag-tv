<?php
	foreach($videos as $vid) {
		$sub_title = htmlspecialchars($vid->sub_title);
		$nsfw      = htmlspecialchars($vid->nsfw);

		 if(strlen($sub_title) > 95) { 
			$sub_title = substr($sub_title, 0 , 95)."...";
		}
?>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="thumbnail" data-id="<?php echo $vid->hash; ?>">
            <a href="<?php echo base_url(); ?>v/<?php echo $vid->slug; ?>">
                <span class="video-play"></span>
                <span class="video-time">
                <span class="fa fa-clock-o" title="Video duration"></span>&nbsp;<?php echo $vid->duration; ?></span>
                <img src="<?php echo base_url(). "tools/images/" .$vid->image; ?>" alt="<?php echo $sub_title; ?>"/>
            </a>
            <div class="caption">
                <p><?php echo $sub_title; if($nsfw == 1) { echo " (NSFW)"; } ?></p>
            </div>
        </div>
    </div>
<?php } ?>