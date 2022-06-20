<?php
include('_value.php');

$term_name = single_term_title("", false);
$term_id = get_queried_object_id();
$term_slug = $term;
$term_info = get_queried_object();
$taxonomy_slug = $term_info->taxonomy;
$taxonomy_name = get_taxonomy($taxonomy_slug)->label;

$page_class       = "archive";
$page_title       = $term_name . '|' . $post_type_name;
$page_description = "";
$page_ogimage     = "";


$this_page_value = ${'page_' . $post_type};
$pankuzu = $this_page_value['pankuzu'];
$this_block_class = 'b-' . $post_type . '__index';

include("header.php");
$this_page_value['title'] = get_field('page_ttl', $post_type_slug);
// $this_page_value['title']['subtitle'] = $taxonomy_name;
// $taxonomy_acf = get_field('value', $post_type_slug);
$this_page_value['child']  = getPostList(array(
  'post_type' => $post_type_slug,
  'posts_per_page' => 10,
  'tag_id' => get_query_var('tag_id'),
  'tax_query' => array(
    array(
      'taxonomy' => $taxonomy_slug,
      'field' => 'slug',
      'terms' => $term_slug,
    ),
  ),
));

include($root_path . "/assets/inc/block/post_" . $post_type_slug . "_index.php");
include('footer.php');
