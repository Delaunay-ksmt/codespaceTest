<?php
// TODO OGP/DescとMV/leadのチェック
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
				<?php if (!post_password_required($post->ID)) : ?>
					<article class="p-blog__detail">
						<div class="head">
							<ol class="p-pankuzu">
								<li><a href="<?php echo $link_path; ?>/"><span>ホーム</span></a></li>
								<li><a href="<?php echo $link_path; ?>/<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
							</ol>
							<p class="date"><span><?php the_time('Y/m/d (月)'); ?></span></p>
							<h1 class="ttl"><span><?php the_title(); ?></span> </h1>
							<div class="img" style="background-image:url(<?php echo get_field('mv')['sizes']['large']; ?>)">
							</div>
							<?php include($root_path . '/assets/inc/parts/snsshare.php'); ?>
							<p class="lead"><span><?php echo get_field('lead'); ?></span></p>
						</div>
						<div class="body">
							<?php
							if (have_rows('body')) :
								while (have_rows('body')) : the_row();
									if (get_row_layout() == 'text') :
										$the_content = MarkdownExtra::defaultTransform(get_sub_field('text'));
										$the_content = preg_replace('/<table/i', '<div class="table"><table', $the_content);
										$the_content = preg_replace('/<\/table>/i', '</table></div>', $the_content);
										echo $the_content;
									elseif (get_row_layout() == 'p') :
										echo '<p>' . get_sub_field('text') . '</p>';
									elseif (get_row_layout() == 'img_ul') :
										if (get_sub_field('img_li')) :
											$imglist = get_sub_field('img_li');
											foreach ($imglist as $img) {
												echo '<div class="img" style="background-image:url(' . $img['image']['sizes']['large'] . ');"></div>';
												echo '<img src="' . $img['image']['sizes']['large'] . '" alt="' . $img['alt'] . '">';
												echo '<p>' . $img['caption'] . '</p>';
											}
										endif;
									elseif (get_row_layout() == 'link') :
										$link = get_sub_field('link');
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										echo '<div class="c-p-btnwrap"><a class="c-link" href="' . $link_url . '" target="' . $link_target . '">' . $link_title . '</a></div>';
									elseif (get_row_layout() == 'youtube') :
										$yturl = 'https://www.youtube.com/embed/' . get_sub_field('yt');
										echo '<iframe class="yt" width="100%" height="315" src="' . $yturl . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
									endif;
								endwhile;
							else :
								echo "記事の内容が見つかりません";
							endif;
							?>
						</div>
						<div class="footer">
							<?php include($root_path . '/assets/inc/parts/snsshare.php'); ?>
							<ul class="taglist">
								<?php
								foreach (get_the_terms($post->ID, 'blog_tag') as $key => $value) :
								?>
									<li><a href="<?php echo $value->slug; ?>"><span><?php echo $value->name; ?></span></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php pager_arr('blog'); ?>
					</article>
				<?php else : ?>
					<?php echo get_the_password_form(); ?>
				<?php endif; ?>
		<?php endwhile;
endif; ?>
			</div>
		</section>
		<section>
			<div class="section__wrap">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish', 'has_password' => false,
					'posts_per_page' => 3,
					'paged' => $paged,
					'post__not_in' => array(get_the_ID()),
					// 'tax_query' => array(
					// 	array(
					// 			'taxonomy' => 'service_category',
					// 			'field' => 'slug',
					// 			'terms' => $case,
					// 			),
					// 	),
				);
				$the_query = new WP_Query($args);
				$post_num = $the_query->found_posts; //該当する投稿数
				$pagepost = ($args["posts_per_page"]);
				if ($the_query->have_posts()) :
				?>
					<ul class="p-blog__index sa_list">
						<?php
						while ($the_query->have_posts()) : $the_query->the_post();
							$cat =  get_the_terms($post->ID, 'blog_cate')[0];
						?>
							<li>
								<a class="img" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo get_field('mv')['sizes']['medium']; ?>')">
									<div class="tag"><span><?php echo $cat->name; ?></span></div>
								</a>
								<div class="txt">
									<a href="<?php the_permalink(); ?>">
										<h3 class="ttl"><span><?php the_title(); ?></span></h3>
									</a>
									<ul class="info">
										<li>
											<div class="date"><span><?php the_time('Y/m/d (月)'); ?></span></div>
										</li>
										<li>
											<a class="cate" href="<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a>
										</li>
									</ul>
								</div>
							</li>

						<?php endwhile;  ?>
					</ul>
				<?php
				else :
					echo '<p><span>該当する記事はありません。</span></p>';
				endif;
				wp_reset_query();
				pager_num($the_query->max_num_pages, $paged, 2, false, $post_num, $pagepost);
				?>
			</div>
		</section>

		<?php include("footer.php"); ?>
