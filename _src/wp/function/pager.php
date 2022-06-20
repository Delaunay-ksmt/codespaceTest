<?php

/* ------------------------------------------------
 Pager
------------------------------------------------ */
// remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
/* pagination (array) */
function pager_arr($postindex, $taxonomy = "category")
{
	$prev = get_adjacent_post(false, '', true, $taxonomy);
	$prev_link = get_permalink($prev->ID);
	$next = get_adjacent_post(false, '', false, $taxonomy);
	$next_link = get_permalink($next->ID); ?>
	<div class="b-pager__arr">
		<ul class="">
			<li>
				<?php if ($prev != "") : ?>
					<a class="b-pager__arr__prev arr" rel="prev" href="<?php echo $prev_link; ?>"><?php setHtmlSvg('arr'); ?><span>PREV</span></a>
				<?php endif; ?>
			</li>
			<li><a href="<?php echo $postindex; ?>" class="b-pager__arr__index"><?php setHtmlSvg('index'); ?><span>INDEX</span></a></li>
			<li>
				<?php if ($next != "") : ?>
					<a class="b-pager__arr__next arr" rel="next" href="<?php echo $next_link; ?>"><span>NEXT</span><?php setHtmlSvg('arr'); ?></a>
				<?php endif; ?>
			</li>
		</ul>
	</div>
<?php
}

/* pagination (number) */
// pager_num($the_query->max_num_pages, $paged,2,false,$post_num,$pagepost);
function pager_num($pages, $paged, $range = 2, $show_only = false, $maxposts, $pageposts)
{
	$pages = (int) $pages;    //float型で渡ってくるので明示的に int型 へ
	$paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように
	$firstpost = ($paged - 1) * $pageposts + 1;
	if ($pages > 1) :
		$lastpost = $firstpost + $pageposts - 1;
	else :
		$lastpost = $maxposts;
	endif; ?>

	<div class="b-pager__num">
		<ul class="b-pager__num__ul">
			<?php if ($show_only && $pages === 1) : ?>
				<li class="">
					<div><span>1</span></div>
				</li>
			<?php endif; ?>
			<?php if ($pages !== 1) : ?>
				<?php if ($paged > 1) : ?>
					<li class=""><a href="<?php echo get_pagenum_link($paged - 1) ?>" class="prev"><span>PREV</span></a></li>
				<?php endif; ?>
				<?php for ($i = 1; $i <= $pages; $i++) : ?>
					<?php if ($i <= $paged + $range && $i >= $paged - $range) : ?>
						<?php if ($paged === $i) : ?>
							<li>
								<div><span><?php echo $i; ?></span></div>
							</li>
						<?php else : ?>
							<li><a href="<?php echo get_pagenum_link($i); ?>"><span><?php echo $i; ?></span></a></li>
						<?php endif; ?>
					<?php endif; ?>
				<?php endfor; ?>
				<?php if ($paged < $pages) : ?>
					<li class=""><a href="<?php echo get_pagenum_link($paged + 1) ?>" class="next"><span>NEXT</span></a></li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>
	</div>
	<?php if ($maxposts != 0) : ?>
		<!-- <div class="pageresult">検索結果<?php echo $maxposts; ?>件中<?php echo $firstpost; ?>-<?php echo $lastpost ?>件</div> -->
	<?php endif; ?>
<?php
}
