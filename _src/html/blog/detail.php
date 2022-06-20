<?php
$url = str_replace($_SERVER['DOCUMENT_ROOT'], "", dirname(__FILE__));
$url = ltrim($url, '/');
if (strpos($url, '/') == "") :
	$url = $url;
else :
	$num = strpos($url, '/');
	$url = substr($url, 0, $num);
endif;
$post_type_name = 'blog';
$rocal_path       = is_numeric($url) ? '/' . $url : '';
$root_path        = $_SERVER['DOCUMENT_ROOT'] . $rocal_path;
$page_class       = "";
$page_title       = "";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
$page_value_name = 'page_' . $post_type_name;
$this_block_class = 'b-' . $post_type_name . '__detail';
include($root_path . "/assets/inc/_l-head.php");


$this_page_value = (isset($_GET['id'])) ? ${$post_type_name . '_list'}[$_GET['id']] : ${$post_type_name . '_list'}[0];
?>
<!-- <link rel="stylesheet" href="個別で読み込むCSS"> -->
<?php include($root_path . "/assets/inc/_l-header.php"); ?>
<?php include($root_path . "/assets/inc/block/post_" . $post_type_name . "_detail.php"); ?>
<?php include($root_path . "/assets/inc/_l-foot.php"); ?>
</body>

</html>
