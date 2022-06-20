<?php
/*
*	Template Name: Format
*/

$page_key = "format";
if (have_posts()) : while (have_posts()) : the_post();
		include('_value.php');
		$page_class 	= "page-" . $page_key;
		$page_value_name = 'page_' . $page_key;
		$this_page_value = ${$page_value_name};
		include('header.php');

		$this_page_value = array_merge($this_page_value, get_fields());
		$this_page_value['list_body'] = get_field('list-data');
		$this_page_value['dl_body'] = get_field('dl-data');
		$this_page_value['youtube'] = get_field('yt');
		// $this_page_value['blockquote'] = get_field('blockquote');
		// var_dump(get_fields());
?>
		<?php
		$class = "b-format";
		$sv = $this_page_value;
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
					<?php setHtmlImage($sv['image'], $class . '__bgimg', 'bgimg'); ?>
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
					<?php setHtmlDl($sv['dl'], $class . '__dl'); ?>
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
			</div>
		</section>
<?php

	endwhile;
endif;
include('footer.php');
