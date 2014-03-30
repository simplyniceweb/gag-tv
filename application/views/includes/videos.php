<?php
	foreach($videos as $vid) {
		$sub_title = htmlentities($vid->sub_title);
		$sub_desc  = htmlentities($vid->sub_descriptions);
		$nsfw      = $vid->nsfw;

		 if(strlen($sub_title) > 95) { 
			$sub_title = substr($sub_title, 0 , 95)."...";
		}
?>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="thumbnail">
            <a href="<?php echo base_url(); ?>v/<?php echo $vid->hash; ?>">
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
<div class="clearfix"></div>
<div class="col-sm-2 col-sm-offset-5">
    <?php echo $pagination; ?>
</div>