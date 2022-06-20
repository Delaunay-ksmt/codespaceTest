<?php

if (have_posts()) : while (have_posts()) : the_post();
		$page_class       = "single";
		$page_title       = strip_tags(get_the_title());
		$page_description = strip_tags(get_field('description'));
		$page_type        = "website"; // or blog
		$page_ogimage     = get_field('ogp')['sizes']['large'];
		include("header.php");
?>
		<section class="">
			<div class="section__wrap">
				<div class="p-ttl page c">
					<h1>
						<span class="ttl">NEWS</span>
						<span class="subttl"></span>
					</h1>
				</div>
				<?php if (!post_password_required($post->ID)) : ?>
					<article class="p-news__detail">
						<div class="wrap">
							<div class="head">
								<p class="date"><span><?php the_time('Y.m.d'); ?></span></p>
							</div>
							<div class="main">
								<h2 class="ttl"><span><?php the_title(); ?></span></h2>
								<?php if (have_rows('body')) : ?>
									<?php while (have_rows('body')) : the_row(); ?>
										<?php if (get_row_layout() == 'text') : ?>
											<p class="txt"><span><?php echo get_sub_field('text'); ?></span></p>
										<?php elseif (get_row_layout() == 'markdown') :
											$the_content = MarkdownExtra::defaultTransform(get_sub_field('markdown'));
											$the_content = preg_replace('/<table/i', '<div class="table"><table', $the_content);
											$the_content = preg_replace('/<\/table>/i', '</table></div>', $the_content);
											echo $the_content; ?>
										<?php elseif (get_row_layout() == 'image') : ?>
											<img src="<?php echo get_sub_field('image')['sizes']['large']; ?>" alt="<?php echo get_sub_field('image')['title']; ?>">
											<?php elseif (get_row_layout() == 'link') :
											$link = get_sub_field('link');
											if ($link) :
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
											?>
												<a class="link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span></a>
								<?php endif;
										endif;
									endwhile;
								else :
									echo "記事の内容が見つかりません";
								endif;
								?>
							</div>
						</div>
					</article>

				<?php else : ?>
					<?php echo get_the_password_form(); ?>
				<?php endif; ?>
		<?php endwhile;
endif; ?>
			</div>
		</section>

		<?php include("footer.php"); ?>
