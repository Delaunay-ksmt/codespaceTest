<?php
$class = "b-news__index";
$if_condition = count($this_page_value['child']);
?>
<section class="<?php echo $class; ?>">
	<div class="section__wrap">
		<?php setHtmlTitle($this_page_value['title'], 'b-title__page', 'h1'); ?>
		<div class="<?php echo $class; ?>__wrap">
			<div class="<?php echo $class; ?>">
				<?php if ($if_condition) : ?>
					<ul class="<?php echo $class; ?>">
						<?php foreach ($this_page_value['child'] as $list) { ?>
							<li class="<?php echo $class . '__li'; ?>">
								<div class="<?php echo $class . '__wrap'; ?>">
									<div class="<?php echo $class; ?>__txtwrap">
										<a href="<?php echo $list['link']['url']; ?>">
											<div class="<?php echo $class; ?>__date"><span><?php echo $list['date']; ?></span></div>
											<h3 class="<?php echo $class; ?>__title"><span><?php echo $list['title']['title']; ?></span></h3>
										</a>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				<?php else : ?>
					<div class="<?php echo $class; ?>__nothing">記事はありません。</div>
				<?php endif; ?>
			</div>
			<?php
			if ($wpflg) {
				$the_query = new WP_Query($args);
				$paged = $args['paged'];
				$post_num = $the_query->found_posts;
				$pagepost = ($args["posts_per_page"]);
				wp_reset_query();
				pager_num($the_query->max_num_pages, $paged, 2, false, $post_num, $pagepost);
			} else {
				pager_num();
			}
			?>
		</div>
	</div>
</section>
