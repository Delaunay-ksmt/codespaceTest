<?php
include('_value.php');
// $this_title = get_field('page_title', $post_type_slug);
$args['post_type'] = $post_type_slug;
$page_title       = $post_type_name;
$this_page_value = ${'page_' . $post_type_slug};
$this_page_value['child']  = getPostList($args);

include('header.php');
include($root_path . "/assets/inc/block/post_" . $post_type_slug . "_index.php");
include('footer.php');
