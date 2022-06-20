<?php
function is_tablet()
{
	$useragents = array(
		'iPad'
	);
	$pattern = '/' . implode('|', $useragents) . '/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
function is_mobile()
{
	$useragents = array(
		'iPhone', // iPhone
		'iPod', // iPod touch
		'Android', // 1.5+ Android
		'dream', // Pre 1.5 Android
		'CUPCAKE', // 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS', // Palm Pre Experimental
		'incognito', // Other iPhone browser
		'webmate' // Other iPhone browser
	);
	$pattern = '/' . implode('|', $useragents) . '/i';
	return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
$title = ($page_title != "") ? $page_title . " | " . $site_title : $site_title;
$description = ($page_description != "") ? $page_description : $site_description;
$protocol = (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$url = $protocol . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$type = ($page_type != "") ? $page_type : "article";
$ogimage = ($page_ogimage != "") ? $page_ogimage : $common_ogp;
// $isAmp = (is_mobile() && isset($_GET['amp']) && $_GET['amp'] == 1) ? true : false;
?>


<!DOCTYPE html>
<html dir="ltr" lang="ja">

<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php if (!isset($_GET["amp"])) : ?>
		<link rel="canonical" href="<?php echo $url ?>" />
	<?php endif; ?>
	<meta http-equiv="content-script-type" content="text/javascript">
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:description" content="<?php echo $description; ?>">
	<meta property="og:url" content="<?php echo $url; ?>">
	<meta property="og:image" content="<?php echo $ogimage; ?>">
	<meta name="description" content="<?php echo $description; ?>">
	<meta property="og:site_name" content="<?php echo $site_title; ?>">
	<meta property="og:type" content="<?php echo $type; ?>">
	<meta name="robots" content="index,follow">
	<?php if ($twitteraccount != "") : ?>
		<meta name="twitter:card" content="<?php echo $twittercard; ?>">
		<meta name="twitter:site" content="<?php echo $twitteraccount; ?>">
	<?php endif; ?>
	<?php if ($telephone == true) : ?>
		<meta name="format-detection" content="telephone=no"><?php endif; ?>
	<?php if ($viewport == true) : ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"><?php endif; ?>

	<meta name="viewport-extra" content="width=device-width,initial-scale=1,min-width=375" />
	<link rel="alternate" type="application/rss+xml" title="<?php echo $title; ?>フィード" href="<?php echo $url; ?>/feed/" />
	<link rel="shortcut icon" href="<?php echo $img_path; ?>common/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo $rocal_path; ?>/img/common/apple-touch-icon.png">
	<meta name="theme-color" content="<?php echo $theme_color; ?>">
