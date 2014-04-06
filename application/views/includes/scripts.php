<div id="fb-root"></div>
<script src="<?php echo base_url() ?>tools/scripts/jquery-2.1.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>tools/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<?php
	$this->load->view("includes/configuration");
	if($segment == "v" || $segment == "videos" || !$segment ) {
?>
<script src="<?php echo base_url() ?>tools/scripts/general.js" type="text/javascript"></script>
<?php } else { ?>
<script src="<?php echo base_url() ?>tools/scripts/admin.js" type="text/javascript"></script>
<?php } ?>
<script>
(function(e,t,n,r,i,s,o){e["GoogleAnalyticsObject"]=i;e[i]=e[i]||function(){(e[i].q=e[i].q||[]).push(arguments)},e[i].l=1*new Date;s=t.createElement(n),o=t.getElementsByTagName(n)[0];s.async=1;s.src=r;o.parentNode.insertBefore(s,o)})(window,document,"script","//www.google-analytics.com/analytics.js","ga");ga("create","UA-49300715-1","gagllery.com");ga("send","pageview");(function(e,t,n){var r,i=e.getElementsByTagName(t)[0];if(e.getElementById(n))return;r=e.createElement(t);r.id=n;r.src="//connect.facebook.net/en_GB/all.js#xfbml=1&appId=1403860496495828";i.parentNode.insertBefore(r,i)})(document,"script","facebook-jssdk");!function(e,t,n){var r,i=e.getElementsByTagName(t)[0],s=/^http:/.test(e.location)?"http":"https";if(!e.getElementById(n)){r=e.createElement(t);r.id=n;r.src=s+"://platform.twitter.com/widgets.js";i.parentNode.insertBefore(r,i)}}(document,"script","twitter-wjs");(function(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src="https://apis.google.com/js/platform.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})()
</script>
</body>
</html>