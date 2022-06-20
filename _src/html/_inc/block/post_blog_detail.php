<?php $class = "b-blog__detail" ?>
<section class="<?php echo $class; ?>">
	<div class="section__wrap <?php echo $class; ?>__wrap">
		<div class="<?php echo $class; ?>__head">
			<h1 class="<?php echo $class; ?>__title"><span><?php echo $this_page_value['title']['title']; ?></span></h1>
			<p class="<?php echo $class; ?>__date"><span><?php echo $this_page_value['date']; ?></span></p>
		</div>
		<?php setHtmlBody($this_page_value['body'], $class);
		?>
		<?php pager_arr('blog'); ?>
	</div>
</section>
