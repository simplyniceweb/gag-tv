<?php
$segment = $this->uri->segment(1);
if(isset($featured)) {
	foreach($featured as $feat) {
		$sub_title = htmlspecialchars($feat->sub_title);
		$sub_desc  = htmlspecialchars($feat->sub_descriptions);
		$nsfw      = $feat->nsfw;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      GGGG    AAA     GGGG  LL      LL      EEEEEEE RRRRRR  YY   YY 
     GG  GG  AAAAA   GG  GG LL      LL      EE      RR   RR YY   YY 
    GG      AA   AA GG      LL      LL      EEEEE   RRRRRR   YYYYY  
    GG   GG AAAAAAA GG   GG LL      LL      EE      RR  RR    YYY   
     GGGGGG AA   AA  GGGGGG LLLLLLL LLLLLLL EEEEEEE RR   RR   YYY
    -->
    <title><?php echo $title; ?></title>
    <link rel="canonical" href="<?php echo base_url() ?>" />
    <?php if($segment == "admin") : ?>
    <meta name="robots" value="noindex" />
    <?php endif; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gagllery.com offers you youtube videos that's worth watching for!" />
    <meta name="keywords" content="Gagllery, Gagllery.com, tv, video, jokes, interesting, cool, fun collection, fun portfolio, admire, fun, humor, humour, just for fun, vines, best vines, funny vines, funny videos, vids, creative, clever, awesome, fantastic"/>

    <meta name="description" content="Gagllery, laugh all you want!" />
    <meta name="twitter:card" content="photo" />
    <meta name="twitter:site" content="@Gagllery" />
    <meta name="twitter:image" content="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-prn1/1013088_414617958648655_1252067445_n.png" />
    <meta property="og:title" content="Gagllery"/>
    <meta property="og:type" content="blog"/>
    <meta property="og:url" content="<?php echo base_url(); ?>"/>
    <meta property="og:image" content="https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-prn1/1013088_414617958648655_1252067445_n.png"/>
    <meta property="og:site_name" content="Gagllery"/>
    <meta property="og:description" content="Just for fun!"/>
    <meta property="fb:app_id" content="1403860496495828" />

    <link href="<?php echo base_url() ?>tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>tools/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>tools/styles/general.css" rel="stylesheet">
    <?php if($segment == "admin"): ?>
    <link href="<?php echo base_url() ?>tools/styles/admin.css" rel="stylesheet">
    <?php endif; ?>

	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo base_url() ?>tools/icons/gagllery.ico"/>
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 163dpi)" href="<?php echo base_url() ?>tools/icons/57x57.png" />
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 132dpi)" href="<?php echo base_url() ?>tools/icons/72x72.png" />
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 326dpi)" href="<?php echo base_url() ?>tools/icons/114x114.png" />
</head>
<body Itemscope itemtype="http://schema.org/Article">