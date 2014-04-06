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
    <title><?php echo $sub_title ." - ". $title; ?></title>
    <link rel="canonical" href="<?php echo base_url() ?>" />
    
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $sub_desc; ?>" />
    <meta name="keywords" content="Gagllery, Gagllery.com, tv, video, jokes, interesting, cool, fun collection, fun portfolio, admire, fun, humor, humour, just for fun, vines, best vines, funny vines, funny videos, vids, creative, clever, awesome, fantastic"/>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="Gagllery.com"/>
    <meta name="twitter:url" content="<?php echo base_url() ?>v/<?php echo $feat->hash; ?>"/>
    <meta name="twitter:title" content="<?php echo $sub_title; if($nsfw == 1) { echo " (NSFW)"; } ?>"/>
    <meta name="twitter:description" content="<?php echo $sub_desc; ?>"/>
    <meta name="twitter:image" content="<?php echo base_url() ?>tools/images/<?php echo $feat->image; ?>"/>
    
    <meta property="og:title" content="<?php echo $sub_title; if($nsfw == 1) { echo " (NSFW)"; } ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo base_url() ?>v/<?php echo $feat->hash; ?>" />
    <meta property="og:image" content="<?php echo base_url() ?>tools/images/<?php echo $feat->image; ?>"/>
    <meta property="og:description" content="<?php echo $sub_desc; ?>" /> 
    <meta property="og:site_name" content="Gagllery.com" />
    <meta property="fb:app_id" content="1403860496495828">

    <link href="<?php echo base_url() ?>tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>tools/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>tools/styles/general.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>tools/icons/gagllery.ico" rel="shortcut icon" />
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 163dpi)" href="<?php echo base_url() ?>tools/icons/57x57.png" />
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 132dpi)" href="<?php echo base_url() ?>tools/icons/72x72.png" />
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 326dpi)" href="<?php echo base_url() ?>tools/icons/114x114.png" />
</head>
<body Itemscope itemtype="http://schema.org/Article">