<?php
$link_path = $rocal_path;
$lang = (isset($_GET['lang'])) ? $_GET['lang'] : 'ja';
$wpflg = false;
include($root_path . "/assets/inc/function/index.php");
include($root_path . "/assets/inc/value/" . $lang . ".php");
include($root_path . "/assets/inc/meta/meta.php");
$this_page_value = ${$page_value_name};
function pager_num()
{
?>
	<div class="b-pager__num">
		<ul>
			<li>
				<div><span>1</span></div>
			</li>
			<li><a href="javascript:void();"><span>2</span></a></li>
			<li><a href="javascript:void();"><span>3</span></a></li>
			<li><a href="javascript:void();"><span>4</span></a></li>
			<li><a href="javascript:void();"><span>5</span></a></li>
		</ul>
	</div>
<?php
}

function pager_arr($index)
{
	global $link_path;
	$prev = true;
	$prev_link = $link_path . "/";
	$next = true;
	$next_link = $link_path . "/";
	$postindex = $link_path . '/' . $index;
?>
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

$gf = array();
foreach ($googlefont as $font) {
	$gf[] = 'family=' . $font;
}
?>
<link async rel="preconnect" href="https://fonts.googleapis.com">
<link async rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link async href="https://fonts.googleapis.com/css2?<?php echo implode('&', $gf) ?>&display=swap" rel="stylesheet">
<link async rel="stylesheet" href="<?php echo $rocal_path; ?>/assets/css/style.css" media="screen,print">
