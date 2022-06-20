<?php
/* ------------------------------------------------
 feedにカスタムポストタイプを追加
------------------------------------------------ */
/*feedのテーマを独自ファイルに変更、カスタム投稿も追加*/

foreach ($custompostarray as $addposttype) {
	array_push($feedpost, $addposttype['slug']);
}
add_filter('request', 'mysite_feed_request');
add_action('do_feed_rss2', 'custom_feed_rss2', 10);
function mysite_feed_request($vars)
{
	global $feedpost;
	if (isset($vars['feed']) && !isset($vars['post_type'])) {
		$vars['post_type'] = $feedpost;
	}
	return $vars;
}
remove_filter('do_feed_rss2', 'do_feed_rss2', 10);
function custom_feed_rss2()
{
	$template_file = '/feed-rss2.php';
	load_template(get_template_directory() . $template_file);
}
