<?php include($root_path . "/assets/inc/meta/tag_head.php"); ?>
</head>
<?php $bodyclass = ($page_class) ? $page_class . ' ready' : 'ready'; ?>

<body class="<?php echo $bodyclass ?>">
	<?php include($root_path . "/assets/inc/meta/tag_body.php"); ?>

	<?php
	include($root_path . "/assets/inc/meta/guide.php");
	//include($root_path . "/assets/inc/block/intro.php");
	?>
	<?php $header_class = "l-header"; ?>

	<?php include($root_path . "/assets/inc/block/header_hamberger.php"); ?>
	<div id="wrapAll">
		<header class="<?php echo $header_class; ?>">
			<div class="<?php echo $header_class; ?>__wrap">
				<div class="<?php echo $header_class; ?>__inner">
					<div class="<?php echo $header_class; ?>__col">
						<a href="<?php echo $link_path; ?>/" class="<?php echo $header_class; ?>__logo"><span class="p-svg__logo"><?php setHtmlSvg('logo'); ?><span><?php echo $site_title; ?></span></span></a>
					</div>
					<?php
					$headerCol = array(
						'header' => 'main',
						'header_sub' => 'sub',
					);
					foreach ($headerCol as $headerkey => $headervalue) : ?>
						<div class="<?php echo $header_class; ?>__col">
							<nav class="<?php echo $header_class; ?>__nav">
								<ul class="<?php echo $header_class; ?>__nav__ul">
									<?php foreach ($menu_list as $slug => $value) {
										setHtmlNavLink($slug, $value, $headerkey, $header_class . '__nav', "");
									} ?>
								</ul>
							</nav>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</header>
		<?php //setHtmlPankuzu($this_page_value); ?>
		<main class="l-main">
