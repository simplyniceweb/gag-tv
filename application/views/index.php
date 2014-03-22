<?php include(__DIR__ . "/header.php"); ?>

<section class="page-content">
    <div class="container">
        <div class="row">
        	<div class="col-sm-8">
				<div class="theater video-wrapper">
                	<iframe src="//www.youtube.com/embed/4OP_hGBzwSg?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-sm-4 video-details">
                <h3>This Award Winning Horror Short Film Will Make You Afraid To Turn Off The Lights.</h3>
                <p></p>
                <p>A woman sees something in the dark. 
                David Sandberg won Best Director at this year's Bloody Cuts Horror Challenge for "Lights Out".</p>
                
                <div class="btn-group">
                    <a type="button" class="active btn btn-primary">Facebook</a>
                    <a type="button" class="btn btn-primary">
                        <span class="fa fa-facebook fa-lg"></span>
                    </a>
                </div>

                <div class="btn-group">
                    <a type="button" class="active btn btn-info">Twitter</a>
                    <a type="button" class="btn btn-info">
                        <span class="fa fa-twitter fa-lg"></span>
                    </a>
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
            <?php for($i=0;$i<8;$i++) { ?>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <div class="thumbnail">
                    <a href="">
                        <img src="https://fbexternal-a.akamaihd.net/safe_image.php?d=AQAUu595DrunDeN-&w=398&h=208&url=http%3A%2F%2Fi1.ytimg.com%2Fvi%2F4OP_hGBzwSg%2Fhqdefault.jpg&cfs=1&upscale&sx=0&sy=0&sw=480&sh=251"/>
                    </a>
                    <div class="caption"><p><?php echo ucwords("Thumbnail label"); ?></p></div>
                </div>
            </div>
            <?php } ?>
            </div>
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