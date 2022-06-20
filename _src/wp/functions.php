<?php
//(参考) https://for-someone.com/blog/4963/
// https://techmemo.biz/wordpress/simple-slug-translate/
$custompostarray = array(
	array(
		'name' => 'NEWS',
		'slug' => 'news',
		'taxonomy' => array(
			array(
				'name' => 'カテゴリ',
				'slug' => 'category',
				'category' => true
			)
		),
	),
	array(
		'name' => 'BLOG',
		'slug' => 'blog',
		'taxonomy' => array(
			array(
				'name' => 'カテゴリ',
				'slug' => 'category',
				'category' => true
			),
			array(
				'name' => 'タグ',
				'slug' => 'tag',
				'category' => false
			)
		),
	),
);
$fixedpage_arr = array(
	// array('id' => 21, 'name' => 'TOP', 'rank' => 5),
	// array('id' => 176, 'name' => 'ABOUT', 'rank' => 6),
	// array('id' => 172, 'name' => 'PRIVACY', 'rank' => 7),
);
$feedpost = array();

/* ------------------------------------------------
ページを追加(設定・マニュアル・固定ページのメニュー)
------------------------------------------------ */
include('function/addpage.php');

/* ------------------------------------------------
共通変数
------------------------------------------------ */
$rocal_path       = get_template_directory_uri();
$root_path        = get_template_directory();
$wpflg = true;
$link_path = home_url();
include($root_path . "/assets/inc/function/index.php");
$lang = (isset($_GET['lang'])) ? $_GET['lang'] : 'ja';
include(get_template_directory() .  "/assets/inc/value/" . $lang . ".php");
include("_acf.php");
$acf_fields = constructAcfArray($acfvalues);
if (function_exists('acf_add_local_field_group')) :
	foreach ($acf_fields as $acf_field) {
		acf_add_local_field_group($acf_field);
	}
endif;

$siteinfo = get_field('siteinfo', 'setting');
$meta = get_field('meta', 'setting');
$site_title       = $meta['title'];
$site_description = $meta['description'];
$site_keywords    = "";
$client_name      =  $siteinfo['company'];
$copyright   =  $siteinfo['copyright']; //footerに表示
$project_name     = $site_title . "サイト制作";
$telephone        = true; // true : 電話番号への自動リンクを消す
$viewport         = true; // true : viewportの指定あり
$ga = (!$meta['analytics']['ga_or_gtm']) ? $meta['analytics']['ga'] : ""; // UAから始まるアカウントを記入
$gtm = ($meta['analytics']['ga_or_gtm']) ? $meta['analytics']['gtm'] : ""; // UAから始まるアカウントを記入
$twittercard    = "summary_large_image"; // summary, summary_large_image, app , player
$tw = 'https://twitter.com/' . $sns['tw'];
$fb = 'https://www.facebook.com/' . $sns['fb'];
$insta = 'https://www.instagram.com/' . $sns['instagram'];

$tel =  $siteinfo['tel'];
$fax =  $siteinfo['fax'];
$email =  $siteinfo['email'];
$zip =  $siteinfo['zip'];
$add =  $siteinfo['add'];
$open =  $siteinfo['open'];
$common_ogp = $meta['ogp'];
$logo = $meta['logo'];
$lat = $meta['map']['latlng']['lat'];
$lng = $meta['map']['latlng']['lng'];
$map_link = ($meta['map']['link']) ? $meta['map']['link']['url'] : "";
$map_api = $meta['map']['api'];

$news_value['category'] = get_terms('news_category');

/* ------------------------------------------------
init
------------------------------------------------ */
$role_object = get_role('editor');
$role_object->add_cap('manage_privacy_options', true);
$role_object->add_cap('manage_options');
add_filter('allow_major_auto_core_updates', '__return_true');/* メジャーアップグレード自動更新有効 */
add_filter('auto_update_plugin', '__return_true');/* プラグイン自動更新を有効化 */
remove_action('wp_head', 'print_emoji_detection_script', 7);/* WPのデフォルトCSSなど削除用 */
remove_action('wp_print_styles', 'print_emoji_styles', 10);
// add_theme_support('post-thumbnails');/* アイキャッチ表示 */
function dequeue_jquery_migrate($scripts)
{
	if (!is_admin()) {
		$scripts->remove('jquery');
		$scripts->add('jquery', false, array('jquery-core'), '1.10.2');
	}
}
add_filter('wp_default_scripts', 'dequeue_jquery_migrate');
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', '__return_null');
add_filter('show_admin_bar', '__return_false');



function getPostList($args)
{
	$args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args['post_status'] = 'publish';
	$args['has_password'] = false;
	$post_type = $args['post_type'];
	$the_query = new WP_Query($args);
	$list = array();
	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$this_post = get_fields();
			$this_post['title'] = setValue('title', get_the_title());
			$this_post['date'] = get_the_date();
			$this_post['link'] = array('url' => get_the_permalink());
			if (get_the_terms(get_the_ID(), $post_type . '_category')) {
				$this_post['category'] = get_the_terms(get_the_ID(), $post_type . '_category');
			}
			if (get_the_terms(get_the_ID(), $post_type . '_tag')) {
				$this_post['tag'] = get_the_terms(get_the_ID(), $post_type . '_tag');
			}
			$list[] =	$this_post;
		}
	}
	return $list;
}




/* ------------------------------------------------
  カスタムポストタイプ・タクソノミー追加
------------------------------------------------ */
include('function/cpt.php');

/* ------------------------------------------------
 管理画面系の設定
------------------------------------------------ */
include('function/adminstyle.php');

/* ------------------------------------------------
 feedにカスタムポストタイプを追加
------------------------------------------------ */
include('function/feed.php');

/* ------------------------------------------------
 Pager
- pager_arr($postindex, $taxonomy = "category");
- pager_num($the_query->max_num_pages, $paged,2,false,$post_num,$pagepost);
------------------------------------------------ */
include('function/pager.php');

/* ------------------------------------------------
 初期設定の変数をShortcordに追加
------------------------------------------------ */
include('function/shortcord.php');

/* ------------------------------------------------
 MW WP Form
------------------------------------------------ */
include('function/mwwpform.php');

/* ------------------------------------------------
 パスワード保護の時にでるテキスト修正
------------------------------------------------ */
include('function/password.php');

/* ------------------------------------------------
からーみーショップ
------------------------------------------------ */
include('function/colorme.php');
