<?php
if(isset($featured)) {
	foreach($featured as $feat) {
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $feat->sub_title ." - ". $title; ?></title>
    <meta name="description" content="<?php echo $feat->sub_descriptions; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <meta itemprop="name" content="<?php echo $feat->sub_title; ?>">
    <meta itemprop="description" content="<?php echo $feat->sub_descriptions; ?>">
    <meta itemprop="image" content="<?php echo base_url() ?>tools/images/<?php echo $feat->image; ?>">

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="Gagllery.com"/>
    <meta name="twitter:url" content="<?php echo base_url() ?>v/<?php echo $feat->hash; ?>"/>
    <meta name="twitter:title" content="<?php echo $feat->sub_title; ?>"/>
    <meta name="twitter:description" content="<?php echo $feat->sub_descriptions; ?>"/>
    <meta name="twitter:image" content="<?php echo base_url() ?>tools/images/<?php echo $feat->image; ?>"/>

    <meta property="og:title" content="<?php echo $feat->sub_title; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo base_url() ?>v/<?php echo $feat->hash; ?>" />
    <meta property="og:image" content="<?php echo base_url() ?>tools/images/<?php echo $feat->image; ?>"/>
    <meta property="og:description" content="<?php echo $feat->sub_descriptions; ?>" /> 
    <meta property="og:site_name" content="Gagllery.com" />
    <meta property="fb:app_id" content="1403860496495828">

    <link href="<?php echo base_url() ?>tools/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>tools/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>tools/styles/general.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>tools/styles/admin.css" rel="stylesheet">

	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo base_url() ?>tools/icons/gagllery.ico"/>
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 163dpi)" href="<?php echo base_url() ?>tools/icons/57x57.png" />
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 132dpi)" href="<?php echo base_url() ?>tools/icons/72x72.png" />
    <link rel="apple-touch-icon-precomposed" media="screen and (resolution: 326dpi)" href="<?php echo base_url() ?>tools/icons/114x114.png" />
</head>