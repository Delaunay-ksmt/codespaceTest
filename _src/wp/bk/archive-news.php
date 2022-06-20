<?php

$page_class       = "archive";
$page_title       = "全記事一覧";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
$this_page_value = $page_value;
$pankuzu = $this_page_value['pankuzu'];
include('header.php'); ?>
<section class="">
	<div class="section__wrap">
		<div class="p-ttl page c">
			<h1>
				<span class="ttl">NEWS</span>
				<span class="subttl"></span>
			</h1>
		</div>
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'news',
			'post_status' => 'publish', 'has_password' => false,
			'posts_per_page' => 5,
			'paged' => $paged
		);
		$the_query = new WP_Query($args);
		$post_num = $the_query->found_posts;
		$pagepost = ($args["posts_per_page"]);
		if ($the_query->have_posts()) :	while ($the_query->have_posts()) : $the_query->the_post();
		?>
				<article class="p-news__index">
					<div class="wrap">
						<div class="head">
							<p class="date"><span><?php the_time('Y.m.d'); ?></span></p>
						</div>
						<div class="main">
							<h2 class="ttl"><span><?php the_title(); ?></span></h2>
							<?php
							if (have_rows('body')) :
								while (have_rows('body')) : the_row();
									if (get_row_layout() == 'text') :
										echo '<p class="txt"><span>' . get_sub_field('text') . '</span></p>';
									elseif (get_row_layout() == 'image') :
										echo '<img src="' . get_sub_field('image')['sizes']['large'] . '" alt="' . get_sub_field('image')['title'] . '">';
									elseif (get_row_layout() == 'link') :
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
			<?php endwhile;  ?>
		<?php
		else :
			echo '<p><span>該当する記事はありません。</span></p>';
		endif;
		wp_reset_query();
		pager_num($the_query->max_num_pages, $paged, 2, false, $post_num, $pagepost);
		?>
	</div>
</section>

<?php include('footer.php'); ?>
