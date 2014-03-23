<?php include(__DIR__ . "/header.php"); ?>

<section class="page-content">
    <div class="container">
        <div class="row">
        	<span class="youtube-id" data-id="<?php echo $feat->hash; ?>"></span>
        	<div class="col-sm-8">
				<div class="theater video-wrapper">
                	<iframe id="player" src="//www.youtube.com/embed/<?php echo $feat->hash; ?>?&amp;autohide=1&amp;fs=1&amp;modestbranding=1&amp;iv_load_policy=3&amp;rel=0&amp;showinfo=0&amp;enablejsapi=1" frameborder="0" allowfullscreen></iframe>
                </div>
                
                <div class="prev-next">
                <div class="clearfix"></div>
					<?php if(!empty($prev)) { ?>
                    <a href="<?php echo base_url() . "v/" . $prev; ?>" class="btn btn-primary">
                    <span class="fa fa-arrow-left"></span> &nbsp; Prev</a>
                    <?php } else { ?>
                    <span class="btn btn-default"><span class="fa fa-arrow-left"></span> &nbsp; Prev</span>
                    <?php } ?>
                    <?php if(!empty($next)) { ?>
                    <a href="<?php echo base_url() . "v/" . $next; ?>" class="btn btn-primary pull-right">
                    Next &nbsp; <span class="fa fa-arrow-right"></span></a>
                    <?php } else { ?>
                    <span class="btn btn-default pull-right">Next &nbsp; <span class="fa fa-arrow-right"></span></span>
                    <?php } ?>
				</div>
                <br/>
            </div>

            <div class="col-sm-4 video-details">
                <h3><?php echo $feat->sub_title; //sub_ ?></h3>
                <p></p>
                <p><?php echo $feat->sub_descriptions; //sub_ ?></p>
                <p>
                    <span class="fa fa-thumbs-o-up" title="Like count"></span> &nbsp; <small class="like-count"></small>
                    &nbsp;&nbsp;&nbsp;

                    <span class="fa fa-thumbs-o-down" title="Dislike count"></span> &nbsp;  <small class="dislike-count"></small>
                </p>

                <p>
                    <span class="fa fa-clock-o" title="Video duration"></span> &nbsp; <small><?php echo $feat->duration; ?></small>
                    &nbsp;&nbsp;&nbsp;&nbsp;

                    <span class="fa fa-eye" title="View count"></span> &nbsp; <small class="view-count"></small>
                </p>

                <div class="btn-group">
					<a  class="fb-share btn btn-primary" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url() . "v/" . $feat->hash; ?>" title="<?php echo $feat->sub_title; ?>" target="_blank">Facebook</a>
                    <span class="active btn btn-primary"><i class="fa fa-facebook fa-lg"></i></span>
                </div>
&nbsp;&nbsp;
                <div class="btn-group">
                    <a class="twitter-share btn btn-info" href="http://twitter.com/share?url=<?php echo base_url() . "v/" . $feat->hash; ?>" title="<?php echo $feat->sub_descriptions; ?>" target="_blank">Twitter</a>
                    <span class="active btn btn-info"><i class="fa fa-twitter fa-lg"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="featured-video">
    <div class="container">
        <div class="row">            
        	<div class="col-sm-12">
            	<div class="col-md-3">
                	<h4 class="feat-text">Featured Video</h4>
				</div>
            </div>
            <div class="col-sm-12 video-pagination"></div>
        </div>
	</div>
</section>

<?php include(__DIR__ . "/footer.php"); ?>