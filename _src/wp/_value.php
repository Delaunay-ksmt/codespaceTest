<?php
$post_type = get_post($post->ID)->post_type;
$post_type_slug = get_query_var('post_type');
$post_type_info = get_post_type_object($post_type_slug);
$post_type_name = $post_type_info->label;
$page_title       = (get_field('title')['title']) ? get_field('title')['title'] : strip_tags(get_the_title());
$page_description = strip_tags(get_field('description'));
$page_ogimage     = (isset(get_field('ogp')['sizes']['large'])) ? get_field('ogp')['sizes']['large'] : "";
$page_type        = "website"; // or blog
