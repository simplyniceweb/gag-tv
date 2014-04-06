<?php include(__DIR__ . "/header.php"); ?>

<section class="page-content">
    <div class="container">
        <div class="row">
        	<span class="youtube-id" data-id="<?php echo $feat->hash; ?>"></span>
        	<div class="col-sm-8">
				<div class="theater video-wrapper">
                	<iframe id="player" src="//www.youtube.com/embed/<?php echo $feat->hash; ?>?&amp;autohide=1&amp;fs=1&amp;modestbranding=1&amp;iv_load_policy=3&amp;rel=0&amp;showinfo=0&amp;enablejsapi=1" allowfullscreen></iframe>
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
            </div>

            <div class="col-sm-4 video-details">
                <h3><?php echo $sub_title; ?><?php if($nsfw == 1) { echo " (NSFW)"; } ?></h3>
                <p></p>
                <p><?php echo $sub_desc; ?></p>
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
				<p></p>
                <div class="btn-group">
					<a  class="fb-share btn btn-primary" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url()."v/".$feat->slug; ?>" title="<?php echo $sub_title; ?>" target="_blank">Facebook</a>
                    <span class="active btn btn-primary"><i class="fa fa-facebook fa-lg"></i></span>
                </div>
&nbsp;&nbsp;
                <div class="btn-group">
                    <a class="twitter-share btn btn-info" href="http://twitter.com/share?url=<?php echo base_url()."v/".$feat->slug; ?>" title="<?php echo $sub_title; ?>" target="_blank">Twitter</a>
                    <span class="active btn btn-info"><i class="fa fa-twitter fa-lg"></i></span>
                </div>
                <p></p>
                <div class="fb-like" data-href="<?php echo base_url()."v/".$feat->hash; ?>" data-layout="button_count" 
                data-action="like" data-show-faces="true" data-share="false"></div>
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
            <div class="col-sm-12 video-pagination">
            <?php include(__DIR__ . "/includes/videos.php"); ?>
            <div class="clearfix"></div>
            <div class="text-center">
				<?php if($segment == "v") { ?>
                	<a href="<?php echo base_url(); ?>#" class="btn btn-info btn-md load-more">Load more videos...</a>
                <?php } else { ?>
					<?php echo $pagination;  ?>
                <?php } ?>
            </div>
			</div>
        </div>
	</div>
</section>
<?php /*
<div class="modal fade" id="fbComments">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Facebook comments</h4>
      </div>
      <div class="modal-body">
		<div class="fb-comments" data-href="http://gagllery.com/v/<?php echo $feat->hash; ?>" data-numposts="20" data-colorscheme="light"></div>
      </div>
    </div>
  </div>
</div>
*/ ?>
<?php include(__DIR__ . "/footer.php"); ?>