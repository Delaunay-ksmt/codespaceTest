<?php
$url = str_replace($_SERVER['DOCUMENT_ROOT'], "", dirname(__FILE__));
$url = ltrim($url, '/');
if (strpos($url, '/') == "") :
	$url = $url;
else :
	$num = strpos($url, '/');
	$url = substr($url, 0, $num);
endif;
$rocal_path       = is_numeric($url) ? '/' . $url : '';
$root_path        = $_SERVER['DOCUMENT_ROOT'] . $rocal_path;
$page_class       = "";
$page_title       = "";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
$page_value_name = 'page_format';

include($root_path . "/assets/inc/_l-head.php");
?>
<!-- <link rel="stylesheet" href="個別で読み込むCSS"> -->
<?php include($root_path . "/assets/inc/_l-header.php"); ?>


<?php
$class = "b-format";
$sv = $this_page_value;
// [TODO] 出力がどういったものかコメントを残す
// [TODO] template/index.phpとマージする
?>
<section class="<?php echo $class; ?>">
	<div class="section__wrap <?php echo $class; ?>__wrap">
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlTitle($sv['title'], $class . '__title', 'h1'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlText($sv['text'], $class . '__text'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlImage($sv['image'], $class . '__image'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlImage($sv['image2'], $class . '__bgimg', 'bgimg'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlLink($sv['link'], $class . '__link', array('icon' => 'arr', 'svg_after' => true)); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlLink($sv['link'], $class . '__btn', array('icon' => 'download', 'svg_after' => true)); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlList($sv['list'], $class . '__list'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlList($sv['list'], $class . '__cap'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlList($sv['list_body'], $class . '__list', 'ol'); ?>
		</div>

		<div class="<?php echo $class; ?>__box">
			<?php setHtmlDl($sv['dl'], $class . '__faq', true); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlDl($sv['dl_body'], $class . '__dl'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlTable($sv['table'], $class . '__table'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlImagetext($sv['imagetext'], $class . '__imagetext'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlProfile($sv['profile'], $class . '__profile'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlInterview($sv['interview'], $class . '__interview'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlGallery($sv['gallery'], $class . '__gallery'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlGallery($sv['gallery'], $class . '__gallery', 'gallery'); ?>
		</div>

		<div class="<?php echo $class; ?>__box">
			<?php setHtmlYoutube($sv['youtube'], $class . '__youtube'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlMap($sv['map'], $class . '__map'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlVideo($sv['video'], $class . '__video'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php setHtmlBlockquote($sv['blockquote'], $class . '__blockquote'); ?>
		</div>
		<div class="<?php echo $class; ?>__box">
			<?php //setHtmlForm($sv['form'], 'p-form');
			?>
		</div>

	</div>
</section>


<?php include($root_path . "/assets/inc/_l-foot.php"); ?>
</body>

</html>
