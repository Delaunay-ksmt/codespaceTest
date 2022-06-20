<?php
require_once $root_path . '/Michelf/MarkdownExtra.inc.php';

use Michelf\MarkdownExtra;

include($root_path . "/assets/inc/meta/meta.php");
$gf = array();
foreach ($googlefont as $font) {
	$gf[] = 'family=' . $font;
}
?>
<link async rel="preconnect" href="https://fonts.googleapis.com">
<link async rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link async href="https://fonts.googleapis.com/css2?<?php echo implode('&', $gf) ?>&display=swap" rel="stylesheet">
<link async rel="stylesheet" href="<?php echo $rocal_path; ?>/assets/css/style.css" media="screen,print">
<?php
wp_head();
foreach ($custompostarray as $cpt) {
	foreach ($cpt['taxonomy'] as $tax) {
		${$cpt['slug'] . '_value'}[$tax['slug']] = get_terms($cpt['slug'] . '_' . $tax['slug']);
	}
}
include("schema.php");
include($root_path . "/assets/inc/_l-header.php");
