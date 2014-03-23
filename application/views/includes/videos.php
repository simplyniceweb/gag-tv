<?php foreach($videos as $vid) { ?>
    <div class="col-md-3 col-sm-4 col-xs-6">
        <div class="thumbnail">
            <a href="<?php echo base_url(); ?>v/<?php echo $vid->hash; ?>">
                <span class="video-play"></span>
                <img src="<?php echo base_url(). "tools/images/" .$vid->image; ?>"/>
            </a>
            <div class="caption">
                <p>
                    <?php 
                        $title = $vid->sub_title;
                        if(strlen($title) > 95) { 
                            echo substr($title, 0 , 95)."...";
                        } else {
                            echo $title;
                        }
                    ?>
                    <small class="alert-info">
                        <!-- <span class="fa fa-clock-o" title="Video duration"></span> &nbsp; -->
                        <?php echo $vid->duration; ?>
                    </small>
                </p>
            </div>
        </div>
    </div>
<?php } ?>
<div class="clearfix"></div>
<div class="col-sm-2 col-sm-offset-5">
    <?php echo $pagination; ?>
</div>