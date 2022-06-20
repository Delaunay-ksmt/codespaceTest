<?php
/* ------------------------------------------------
 タイトルの文字数表示
------------------------------------------------ */
add_action('admin_head-post-new.php', 'count_title_characters');
add_action('admin_head-post.php', 'count_title_characters');
function count_title_characters()
{ ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			//全角を1、半角を0.5として数える
			function count_zen_han_characters(str) {
				len = 0;
				str = escape(str);
				for (i = 0; i < str.length; i++, len++) {
					if (str.charAt(i) == "%") {
						if (str.charAt(++i) == "u") {
							i += 3;
							len++;
						}
						i++;
					}
				}
				return len / 2;
			}

			//in_selの文字数をカウントしてout_selに出力する
			function count_characters(in_sel, out_sel) {
				$(out_sel).html(count_zen_han_characters($(in_sel).val()));
			}

			//ページ表示に表示エリアを出力
			$('#titlewrap').after('<div style="position:absolute;top:-24px;right:0;color:#666;background-color:#f7f7f7;padding:1px 2px;border-radius:5px;border:1px solid #ccc;">文字数<span class="wp-title-count" style="margin-left:5px;">0</span></div>');

			//ページ表示時に数える
			count_characters('#title', '.wp-title-count');

			//入力フォーム変更時に数える
			$('#title').bind("keydown keyup keypress change", function() {
				count_characters('#title', '.wp-title-count');
			});

		});
	</script>
<?php
}


/* ------------------------------------------------
 管理画面にcss/jsを適用する
------------------------------------------------ */
add_action('admin_print_scripts', 'my_admin_script');
add_action('admin_print_styles', 'my_admin_style');
function my_admin_style()
{
	wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/assets/css/wpadmin.css');
}
function my_admin_script()
{
	echo '<script>
  〜適用したいスクリプトを記入〜
  </script>' . PHP_EOL;
}

/* ------------------------------------------------
 デフォルトのエディターを削除
------------------------------------------------ */
add_action('init', 'my_remove_post_editor_support');
function my_remove_post_editor_support()
{
	remove_post_type_support('post', 'editor');
	remove_post_type_support('page', 'editor');
}

/* ------------------------------------------------
カラム（項目）を追加
------------------------------------------------ */
function set_columns($columns)
{
	$columns['description'] = 'description';
	return $columns;
}
add_filter('manage_edit-works_columns', 'set_columns');

//カスタムフィールドの内容を表示
function add_column($column_name, $post_id)
{
	if ($column_name == 'description') {
		$stitle = get_post_meta($post_id, 'description', true);
	}
	if (isset($stitle) && $stitle) {
		// $attachment_id = get_field('description', $post->ID);
		// echo "<img src=\"" . $attachment_id . "\" width=\"100\" height=\"100\">";
		echo '<p>' . get_field('description') . '</p>';
	} else {
		echo __('None');
	}
}
add_action('manage_works_posts_custom_column', 'add_column', 10, 2);

/* ------------------------------------------------
 年月アーカイブの文字列を変更
------------------------------------------------ */
function my_archives_link($html)
{
	$html = str_replace('年', '.', $html);
	$html = str_replace('月', '', $html);
	return $html;
}

add_filter('get_archives_link', 'my_archives_link');
