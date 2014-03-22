<?php include(__DIR__ . "/header.php"); ?>
<?php 
	foreach($featured as $feat) {
		$minute = floor($feat->duration / 60);
		$duration = $feat->duration - ($minute * 60);
	}
?>
<section class="page-content">
    <div class="container">
        <div class="row">
        	<span class="youtube-id" data-id="<?php echo $feat->hash; ?>"></span>
        	<div class="col-sm-8">
				<div class="theater video-wrapper">
                	<iframe src="//www.youtube.com/embed/<?php echo $feat->hash; ?>?rel=0&controls=0&showinfo=0&showinfo=0" 
                    frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-sm-4 video-details">
                <h3><?php echo $feat->title; //sub_ ?></h3>
                <p></p>
                <p><?php echo $feat->descriptions; //sub_ ?></p>
                <p>
                    <span class="fa fa-clock-o" title="Video duration"></span> &nbsp; 
                    <small><?php echo $minute. ":" .$duration; ?></small>&nbsp&nbsp&nbsp

                    <span class="fa fa-eye" title="View count"></span> &nbsp; 
                    <small class="view-count"></small>
                </p>

                <p>
                    <span class="fa fa-thumbs-o-up" title="Video duration"></span> &nbsp; 
                    <small class="like-count"></small>&nbsp&nbsp&nbsp

                    <span class="fa fa-thumbs-o-down" title="View count"></span> &nbsp; 
                    <small class="dislike-count"></small>
                </p>

                <div class="btn-group">
                    <a type="button" class="btn btn-primary">Facebook</a>
                    <span class="active btn btn-primary"><i class="fa fa-facebook fa-lg"></i></span>
                </div>

                <div class="btn-group">
                    <a type="button" class="btn btn-info">Twitter</a>
                    <span class="active btn btn-info"><i class="fa fa-twitter fa-lg"></i></span>
                </div>
<!--
                <div class="btn-group">
                    <a type="button" class="active btn btn-success">Email</a>
                    <a type="button" class="btn btn-success">
                        <span class="fa fa-envelope fa-lg"></span>
                    </a>
                </div>
-->
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
            <div class="col-sm-12">
            <?php
			foreach($videos as $vid) { 
				$minute = floor($feat->duration / 60);
				$duration = $feat->duration - ($minute * 60);
			?>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <div class="thumbnail">
                    <a href="">
                        <img src="<?php echo base_url(). "tools/images/" .$vid->image; ?>"/>
                    </a>
                    <div class="caption">
                        <p>
							<?php echo ucwords($vid->title); ?>
                            <span class="fa fa-clock-o" title="Video duration"></span> &nbsp; 
                            <small><?php echo $minute. ":" .$duration; ?></small>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <ul class="pager">
                  <li class="previous"><a href="#">&larr; Prev</a></li>
                  <li class="next"><a href="#">Next &rarr;</a></li>
                </ul>
            </div>
        </div>
	</div>
</section>

<?php include(__DIR__ . "/footer.php"); ?>