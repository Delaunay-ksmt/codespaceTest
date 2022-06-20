<?php

$page_class       = "recruit";
$page_title       = "RECRUIT - 採用情報";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
$this_page_value = $page_value;
$pankuzu = $this_page_value['pankuzu'];
include('header.php'); ?>
<section class="p-page">
	<div class="section__wrap">
		<div class="p-ttl page c">
			<ol class="p-pankuzu">
				<li><a href="<?php echo $link_path; ?>"><span>ホーム</span></a></li>
				<li>
					<p><span>採用情報</span></p>
				</li>
			</ol>
			<div class="img"></div>
			<h1>
				<span class="ttl">RECRUIT</span>
				<span class="subttl">採用情報</span>
			</h1>
		</div>
		<div class="p-recruit">
			<ul>
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'recruit',
					'post_status' => 'publish', 'has_password' => false,
					'posts_per_page' => -1,
					'paged' => $paged
				);
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
				?>
						<li>
							<h2 class="ttl"><span><?php the_title(); ?></span></h2>
							<div class="detail">
								<p class="lead"><span><?php echo get_field('lead'); ?></span></p>
								<?php if (have_rows('detail')) : while (have_rows('detail')) : the_row(); ?>
										<dl>
											<dt class="bb"><span><?php echo get_sub_field('title'); ?></span></dt>
											<dd><span><?php echo get_sub_field('text'); ?></span></dd>
										</dl>
								<?php endwhile;
								endif; ?>
								<dl>
									<dt><span>採用の流れ</span></dt>
									<dd>
										<ul class="step">
											<?php foreach (get_field('flow')['step'] as $value) : ?>
												<li><span><?php echo $value['text']; ?></span></li>
											<?php endforeach; ?>
										</ul>
										<div class="sendfor">
											<div class="first"><span>書類送付先</span></div>
											<div>
												<span><?php echo get_field('flow')['send']; ?></span>
											</div>
										</div>
										<span><?php echo get_field('flow')['attention']; ?></span>
									</dd>
								</dl>
							</div>

						</li>

				<?php endwhile;
				endif;
				wp_reset_query();
				?>

			</ul>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>
