<?php

if (have_posts()) : while (have_posts()) : the_post();
		include('_value.php');
		$page_class = "page-" . $page_key;
		$this_page_value = ${'page_' . $page_key};
		$this_page_value = array_merge($this_page_value, get_fields());
	endwhile;
endif;

include('header.php');
include($root_path . "/assets/inc/block/" . 'page_' . $page_key . ".php");
include('footer.php');
