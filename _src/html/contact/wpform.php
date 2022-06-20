<?php
$url = str_replace($_SERVER['DOCUMENT_ROOT'], "", dirname(__FILE__));
$url = ltrim($url, '/');
if (strpos($url, '/') == "") :
	$url = $url;
else :
	$num = strpos($url, '/');
	$url = substr($url, 0, $num);
endif;
$rocal_path       = is_numeric($url) ? '/' . $url : '';
$root_path        = $_SERVER['DOCUMENT_ROOT'] . $rocal_path;
$page_class       = "sub contact";
$page_title       = "CONTACT";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";

$page_value_name = 'page_contact';
include($root_path . "/assets/inc/_l-head.php");
?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<?php include($root_path . "/assets/inc/_l-header.php"); ?>
<?php
$form_type = 'wpform';
include($root_path . "/assets/inc/block/" . $page_value_name . ".php");
?>
<?php include($root_path . "/assets/inc/_l-foot.php"); ?>
</body>

</html>
