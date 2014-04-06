<?php
$segment = $this->uri->segment(1);
if($segment == "v") {
	include(__DIR__ . "/includes/metadata.php");
} else {
	include(__DIR__ . "/admin/metadata.php");
}
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"></a>
    </div>

    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      	<li><a href="#" data-toggle="modal" data-target="#suggestVideo"><span class="fa fa-video-camera"></span>&nbsp;Suggest Video</a></li>
		<li><a href="https://www.facebook.com/messages/Gagllery" target="_blank"><span class="fa fa-envelope-o"></span>&nbsp;Contact Us</a></li>
        <?php /* <li><a href="javascript:void(0)">Help &nbsp;<span class="label-new label label-success">New</span> </a></li> */ ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><div class="fb-like" data-href="https://www.facebook.com/Gagllery" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></a></li>
        <li class="twitter-parent"><span></span><a href="https://twitter.com/Gagllery" class="twitter-follow-button" data-show-count="false" data-show-screen-name="true">Follow @Gagllery</a></li>
        <li><a class="link-g-follow" href="#"><div class="g-follow" data-annotation="none" data-height="20" data-href="//plus.google.com/u/0/116869387432010531299" data-rel="publisher"></div>
		</a></li>
      </ul>

    </div>

  </div>
</nav>