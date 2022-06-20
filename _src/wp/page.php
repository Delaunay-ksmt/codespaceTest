<?php
if (have_posts()) : while (have_posts()) : the_post();
		include('_value.php');
		$page_class       = "page";
		$this_page_value = ${'page_value'};
		$pankuzu = $this_page_value['pankuzu'];
		include('header.php');
?>
		<section class="b-page">
			<div class="section__wrap">
				<div class="p-ttl page">
					<h1 class=""><span><?php the_title(); ?></span></h1>
				</div>
				<?php the_content(); ?>
			</div>
		</section>
<?php endwhile;
endif; ?>
<?php include('footer.php'); ?>
