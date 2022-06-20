<?php
/* ------------------------------------------------
 オプションページを追加
------------------------------------------------ */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(
		array(
			'page_title' => '初期設定',
			'menu_title' => '初期設定',
			'menu_slug' => 'initsetting',
			'position' => 3,
			'post_id' => 'setting'
		)
	);
}

/* ------------------------------------------------
マニュアルページを追加
------------------------------------------------ */
function mt_add_pages()
{
	add_menu_page('マニュアル', 'マニュアル', 'edit_posts', 'manual', 'show_manual', 'dashicons-book-alt', 2);
}
function show_manual()
{
	include "manual.php";
}
// add_action('admin_menu', 'mt_add_pages');


/* ------------------------------------------------
  固定ページをメニューに追加
------------------------------------------------ */

add_action('admin_menu', 'my_admin_menu');
function my_admin_menu()
{
	global $fixedpage_arr;
	foreach ($fixedpage_arr as $value) {
		add_menu_page($value['name'], $value['name'], 'edit_pages', '/post.php?post=' . $value['id'] . '&action=edit', '', '', $value['rank']);
	}
}
