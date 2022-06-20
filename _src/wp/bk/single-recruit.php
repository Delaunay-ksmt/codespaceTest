<?php
// TODO OGP/DescとMV/leadのチェック

if (have_posts()) : while (have_posts()) : the_post();
		$page_class       = "news";
		$page_title       = strip_tags(get_the_title());
		$page_description = strip_tags(get_field('description'));
		$page_type        = "website"; // or blog
		$page_ogimage     = "";
		include("header.php");
?>
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
						<li>
							<h2 class="ttl is-active"><span><?php the_title(); ?></span></h2>
							<div class="detail open">
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
					</ul>
				</div>
			</div>
		</section>
<?php endwhile;
endif; ?>
<?php include('footer.php'); ?>
