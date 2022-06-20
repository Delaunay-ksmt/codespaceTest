<?php
if (have_posts()) :
	while (have_posts()) : the_post();
		include('_value.php');
		$page_class       = "page-" . $post_type_slug . "-detail";
		$this_page_value = get_fields();
		if (!get_field('title')) {
			$this_page_value['title'] = setValue('title', get_the_title());
		}
		$this_page_value['date'] = get_the_date();
		$this_page_value['category'] = get_the_terms(get_the_ID(), $post_type . '_category');
	endwhile;
endif;


include('header.php');
include($root_path . "/assets/inc/block/post_" . $post_type_slug . "_detail.php");
include('footer.php');
