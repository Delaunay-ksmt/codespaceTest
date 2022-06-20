<?php
// TODO OGP/DescとMV/leadのチェック
// TODO たくそのミーの取得方法

$page_class       = "archive";
$page_title       = single_term_title("", false);
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
$this_page_value = $page_value;
$pankuzu = $this_page_value['pankuzu'];
include('header.php'); ?>
<section>
	<div class="section__wrap">
		<div class="p-ttl__sec c">
			<h2><span class="ttl"><?php echo single_term_title("", false); ?></span><span class="subttl">CATEGORY</span></h2>
		</div>
		<?php
		$blogtype = "normal";
		$blogpllx = "";
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'post',
			'post_status' => 'publish', 'has_password' => false,
			'posts_per_page' => 16,
			'paged' => $paged,
			'tag_id' => get_query_var('tag_id'),
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
			<ul class="">
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

<?php include('footer.php'); ?>
