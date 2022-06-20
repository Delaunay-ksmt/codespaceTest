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
$page_class       = "pag-template";
$page_title       = "";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
$page_value_name = 'page_top';
include($root_path . "/assets/inc/_l-head.php");
// $this_page_value = $page_value;
// $pankuzu = $this_page_value['pankuzu'];
?>
<?php include($root_path . "/assets/inc/_l-header.php"); ?>
<?php
$dummy_text =  'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。';
$page_template = array(
	'content' => array(
		'logo' => array(
			'title' => array(
				'en' => 'LOGO',
				'jp' => 'ロゴ',
			),
			'type' => 'logo',
			'class' => '__logo',
			'list' => array(
				array(
					'class' => 'p-svg__logo',
					'svg' => 'logo',
					'text' => $site_title,
					'max-width' => '200px',
				),
				array(
					'class' => 'p-svg__logo2',
					'svg' => 'logo2',
					'text' => $site_title,
					'max-width' => '200px',
				),
			),
		),
		'color' => array(
			'title' => array(
				'en' => 'COLOR',
				'jp' => 'カラー',
			),
			'type' => 'color',
			'class' => '__color',
			'list' => array(
				array(
					'color' => 'var(--Title)',
				),
				array(
					'color' => 'var(--Text)',
				),
				array(
					'color' => 'var(--SubText)',
				),
				array(
					'color' => 'var(--Border)',
				),
				array(
					'color' => 'var(--Light)',
				),
				array(
					'color' => 'var(--Base)',
				),

			),
		),
		'color_key' => array(
			'title' => array(
				'en' => 'KEY COLOR',
				'jp' => 'キーカラー',
			),
			'type' => 'color',
			'class' => '__color',
			'list' => array(
				array(
					'color' => 'var(--Key1)',
				),
				array(
					'color' => 'var(--Key2)',
				),
				array(
					'color' => 'var(--Key3)',
				),
			),
		),
		'color_base' => array(
			'title' => array(
				'en' => 'BASE COLOR',
				'jp' => 'ベースカラー',
			),
			'type' => 'color',
			'class' => '__color',
			'list' => array(
				array(
					'color' => 'var(--Base1)',
				),
				array(
					'color' => 'var(--Base2)',
				),
				array(
					'color' => 'var(--Base3)',
				),
			),
		),
		'text_en' => array(
			'title' => array(
				'en' => 'TEXT EN',
				'jp' => 'テキスト 英語',
			),
			'type' => 'text',
			'class' => '__text',
			'list' => array(
				array(
					'class' => 'p-txt__en--1',
					'text' => 'Dummy.',
				),
				array(
					'class' => 'p-txt__en--2',
					'text' => 'This sentence is a dummy.',
				),
				array(
					'class' => 'p-txt__en--3',
					'text' => 'This text is a dummy. It is included to check the size, amount, spacing, and line spacing of the text.',
				),
				array(
					'class' => 'p-txt__en--4',
					'text' => 'This text is a dummy. It is included to check the size, amount, spacing, and line spacing of the text.',
				),
				array(
					'class' => 'p-txt__en--5',
					'text' => 'This sentence is a dummy. This is a dummy text to check the size, amount, spacing, line spacing, etc. This text is a dummy. This text is included to check the size, amount, spacing, line spacing, etc.',
				),
				array(
					'class' => 'p-txt__en--p',
					'text' => 'This sentence is a dummy. This is a dummy text to check the size, amount, spacing, line spacing, etc. This text is a dummy. This text is included to check the size, amount, spacing, line spacing, etc.',
				),
				array(
					'class' => 'p-txt__en--cap',
					'text' => 'This sentence is a dummy. This is a dummy text to check the size, amount, spacing, line spacing, etc. This text is a dummy. This text is included to check the size, amount, spacing, line spacing, etc.',
				),
				array(
					'class' => 'p-txt__en--mini',
					'text' => 'This sentence is a dummy. This is a dummy text to check the size, amount, spacing, line spacing, etc. This text is a dummy. This text is included to check the size, amount, spacing, line spacing, etc.',
				),
			),
		),
		'text_jp' => array(
			'title' => array(
				'en' => 'TEXT JP',
				'jp' => 'テキスト 日本語',
			),
			'type' => 'text',
			'class' => '__text',
			'list' => array(
				array(
					'class' => 'p-txt--1',
					'text' => 'ダミーです',
				),
				array(
					'class' => 'p-txt--2',
					'text' => 'この文章はダミーです',
				),
				array(
					'class' => 'p-txt--3',
					'text' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。',
				),
				array(
					'class' => 'p-txt--4',
					'text' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。',
				),
				array(
					'class' => 'p-txt--5',
					'text' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。',
				),
				array(
					'class' => 'p-txt--p',
					'text' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。',
				),
				array(
					'class' => 'p-txt--cap',
					'text' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。<a href="#">これはリンクです。</a>文字の大きさ、量、字間、行間等を確認するために入れています。',
				),
				array(
					'class' => 'p-txt--mini',
					'text' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。<a href="#">これはリンクです。</a>文字の大きさ、量、字間、行間等を確認するために入れています。',
				),
			),
		),
		'attention' => array(
			'title' => array(
				'en' => 'ATTENTION',
				'jp' => '注釈',
			),
			'type' => 'attention',
			'class' => '_attention',
			'list' => array(
				array(
					'class' => 'p-attention',
					'list' => array(
						array(
							'text' => '現在のお買取金額と異なってまいりますので、上記の金額はあくまで参考程度にお考え下さい。',
						),
						array(
							'text' => 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。',
						),
						array(
							'text' => 'この文章はダミーです。',
						),
					),
				),
			),
		),
		'word' => array(
			'title' => array(
				'en' => 'WORD',
				'jp' => '単語（短いテキスト）',
			),
			'type' => 'word',
			'class' => '__word',
			'list' => array(
				array(
					'class' => 'p-word__s',
					'text' => '20201.12.30',
					'svg' => '',
				),
				array(
					'class' => 'p-word__m',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-word__l',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-word__s',
					'text' => '短いテキスト',
					'svg' => 'file',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-word__m',
					'text' => '短いテキスト',
					'svg' => 'file',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-word__l',
					'text' => '短いテキスト',
					'svg' => 'file',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-word__s',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-word__m',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-word__l',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-word__s arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-word__m arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-word__l arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-word__s arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-word__m arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-word__l arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
			),
		),
		'link' => array(
			'title' => array(
				'en' => 'LINK',
				'jp' => 'リンク',
			),
			'type' => 'link',
			'class' => '__link',
			'list' => array(
				array(
					'class' => 'p-link__s',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-link__m',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-link__l',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-link__s',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-link__m',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-link__l',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-link__s',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__m',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__l',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__s arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-link__m arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-link__l arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-link__s arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__m arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__l arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
			),
		),
		'btn' => array(
			'title' => array(
				'en' => 'BTN',
				'jp' => 'ボタン',
			),
			'type' => 'link',
			'class' => '__link',
			'list' => array(
				array(
					'class' => 'p-btn__s',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-btn__m',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-btn__l',
					'text' => '短いテキスト',
					'svg' => '',
				),
				array(
					'class' => 'p-btn__s',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-btn__m',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-btn__l',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-btn__s',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__l',
					'text' => '短いテキスト',
					'svg' => 'index',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__s arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-btn__m arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-btn__l arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'before',
				),
				array(
					'class' => 'p-btn__s arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__l arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__round__s arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__round__m arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__round__l arr',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
			),
		),
		'hover' => array(
			'title' => array(
				'en' => 'COLOR & HOVER',
				'jp' => 'カラー & ホバー',
			),
			'type' => 'hover',
			'class' => '__hover',
			'list' => array(
				array(
					'class' => 'p-btn__m arr',
					'hover_class' => 'hv-btn__key',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m arr',
					'hover_class' => 'hv-btn__key__w',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m arr',
					'hover_class' => 'hv-btn__key__r',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m arr',
					'hover_class' => 'hv-btn__neutral',
					'text' => '通常ボタン',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m arr',
					'hover_class' => 'hv-btn__negative',
					'text' => 'ネガティブボタン',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m arr',
					'hover_class' => 'hv-btn__positive',
					'text' => 'ポジティブボタン',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-btn__m arr',
					'hover_class' => 'hv-btn__disable',
					'text' => '無効ボタン',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__m arr',
					'hover_class' => '',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__m arr',
					'hover_class' => 'hv-link__key',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__m arr',
					'hover_class' => 'hv-link__key__r',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__m arr',
					'hover_class' => 'hv-link__key__w',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),
				array(
					'class' => 'p-link__m arr',
					'hover_class' => 'hv-link__w',
					'text' => '短いテキスト',
					'svg' => 'arr',
					'svg_pos' => 'after',
				),

			),
		),
		'pankuzu' => array(
			'title' => array(
				'en' => 'PANKUZU',
				'jp' => 'パンくず',
			),
			'type' => 'pankuzu',
			'class' => '',
		),
		'pager' => array(
			'title' => array(
				'en' => 'PAGER',
				'jp' => 'ページャー',
			),
			'type' => 'pager',
			'class' => '__pager',

		),
		'img' => array(
			'title' => array(
				'en' => 'IMG',
				'jp' => '画像',
			),
			'type' => 'img',
			'class' => '__img',
			'list' => array(
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r33',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r50',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r56',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r66',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r75',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r100',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r120',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r150',
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r66 link',
					'link' => array(
						'url' => 'javascript:void(0);',
						'text' => '詳しく見る',
					),
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r66 link',
					'link' => array(
						'url' => 'javascript:void(0);',
						'text' => 'READ MORE',
					),
				),
				array(
					'src' => $img_path . '_dummy/dummy.jpg',
					'class' => 'p-img__r66 link',
					'link' => array(
						'url' => 'javascript:void(0);',
						'text' => '詳細ページへ',
					),
				),

			),
		),
		'search' => array(
			'title' => array(
				'en' => 'SEARCH',
				'jp' => '検索窓',
			),
			'type' => 'search',
			'class' => '__search',
			'list' => array(
				array(
					'class' => '__XXXX',
					'content' => '__XXXX',
					'text' => '__XXXX',
				),
			),
		),
		'select' => array(
			'title' => array(
				'en' => 'SELECT',
				'jp' => 'セレクトボックス',
			),
			'type' => 'select',
			'class' => '__select',
			'list' => array(
				array(
					'class' => '__XXXX',
					'content' => '__XXXX',
					'text' => '__XXXX',
				),
			),
		),
		'table' => array(
			'title' => array(
				'en' => 'TABLE',
				'jp' => 'テーブル',
			),
			'type' => 'table',
			'class' => '__table',
			'list' => array(
				array(
					'class' => '__XXXX',
					'content' => '__XXXX',
					'text' => '__XXXX',
				),
			),
		),
		'icon' => array(
			'title' => array(
				'en' => 'COMMON ICON',
				'jp' => 'アイコン',
			),
			'type' => 'icon',
			'class' => '__icon',

		),
	),
); ?>
<?php
$sec_id = "Template";
$sec_class = "b-template";
$this_value = $page_template;
?>
<section id="<?php echo $sec_id; ?>" class="<?php echo $sec_class; ?>">
	<div class="section__wrap <?php echo $sec_class; ?>__wrap">
		<div class="section__inner <?php echo $sec_class; ?>__inner">
			<?php foreach ($this_value['content'] as $content) : ?>
				<div class="<?php echo $sec_class; ?>__content">
					<div class="<?php echo $sec_class; ?>__content__head">
						<p class="<?php echo $sec_class; ?>__title">
							<span class="<?php echo $sec_class; ?>__title__en"><?php echo $content['title']['en']; ?></span>
							<span class="<?php echo $sec_class; ?>__title__jp"><?php echo $content['title']['jp']; ?></span>
						</p>
					</div>
					<div class="<?php echo $sec_class; ?>__content__body">
						<div class="<?php echo $sec_class; ?>__list<?php echo $content['class']; ?>">
							<?php if ($content['type'] == "logo") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li style="max-width: <?php echo $list['max-width']; ?>;">
											<span class="<?php echo $list['class']; ?> copy_html"><?php setHtmlSvg($list['svg']); ?><span><?php echo $list['text']; ?></span></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php elseif ($content['type'] == "color") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<span class="<?php echo $sec_class; ?>__list<?php echo $content['class']; ?>__swatch" style="background-color: <?php echo $list['color']; ?>;"></span>
											<span class="<?php echo $sec_class; ?>__guide"><?php echo $list['color']; ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php elseif ($content['type'] == "text") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<span class="<?php echo $list['class']; ?> copy_html"><?php echo $list['text']; ?></span>
											<span class="<?php echo $sec_class; ?>__guide"><?php echo $list['class']; ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php elseif ($content['type'] == "word") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<?php if (isset($list['svg']) && $list['svg'] != '') : ?>
												<?php if ($list['svg_pos'] == "before") : ?>
													<span class="<?php echo $list['class']; ?> copy_html"><?php setHtmlSvg($list['svg']); ?><span><?php echo $list['text']; ?></span></span>
												<?php else : ?>
													<span class="<?php echo $list['class']; ?> copy_html"><span><?php echo $list['text']; ?></span><?php setHtmlSvg($list['svg']); ?></span>
												<?php endif; ?>
											<?php else : ?>
												<span class="<?php echo $list['class']; ?> copy_html"><span><?php echo $list['text']; ?></span></span>
											<?php endif; ?>
											<span class="<?php echo $sec_class; ?>__guide"><?php echo $list['class']; ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php elseif ($content['type'] == "link") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<?php if (isset($list['svg']) && $list['svg'] != '') : ?>
												<?php if ($list['svg_pos'] == "before") : ?>
													<a href="javascript:void(0);" class="<?php echo $list['class']; ?> copy_html"><?php setHtmlSvg($list['svg']); ?><span><?php echo $list['text']; ?></span></a>
												<?php else : ?>
													<a href="javascript:void(0);" class="<?php echo $list['class']; ?> copy_html"><span><?php echo $list['text']; ?></span><?php setHtmlSvg($list['svg']); ?></a>
												<?php endif; ?>
											<?php else : ?>
												<a href="javascript:void(0);" class="<?php echo $list['class']; ?> copy_html"><span><?php echo $list['text']; ?></span></a>
											<?php endif; ?>
											<span class="<?php echo $sec_class; ?>__guide"><?php echo $list['class']; ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php elseif ($content['type'] == "hover") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<?php if (isset($list['svg']) && $list['svg'] != '') : ?>
												<?php if ($list['svg_pos'] == "before") : ?>
													<a href="javascript:void(0);" class="<?php echo $list['class']; ?> <?php echo $list['hover_class']; ?> copy_html"><?php setHtmlSvg($list['svg']); ?><span><?php echo $list['text']; ?></span></a>
												<?php else : ?>
													<a href="javascript:void(0);" class="<?php echo $list['class']; ?> <?php echo $list['hover_class']; ?> copy_html"><span><?php echo $list['text']; ?></span><?php setHtmlSvg($list['svg']); ?></a>
												<?php endif; ?>
											<?php else : ?>
												<a href="javascript:void(0);" class="<?php echo $list['class']; ?> <?php echo $list['hover_class']; ?> copy_html"><span><?php echo $list['text']; ?></span></a>
											<?php endif; ?>
											<span class="<?php echo $sec_class; ?>__guide"><?php echo $list['class']; ?><?php if (isset($list['hover_class']) && $list['hover_class'] != '') : ?> + <?php echo $list['hover_class']; ?><?php endif; ?></span>
										</li>
									<?php endforeach; ?>
								</ul>

							<?php elseif ($content['type'] == "attention") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<div class="<?php echo $list['class']; ?> copy_html2">
												<ul>
													<?php
													foreach ($list['list'] as $attention) :
													?>
														<li><span><?php echo $attention['text'] ?></span></li>
													<?php endforeach; ?>
												</ul>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php elseif ($content['type'] == "pankuzu") : ?>
								<?php setHtmlPankuzu($this_page_value); ?>
							<?php elseif ($content['type'] == "pager") : ?>
								<ul>
									<li>
										<?php pager_num(); ?>
									</li>
									<br><br>
									<li>
										<?php pager_arr('/'); ?>
									</li>
								</ul>
							<?php elseif ($content['type'] == "img") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<?php if (isset($list['link']) && $list['link'] != '') : ?>
												<a href="<?php echo $list['link']['url']; ?>" class="<?php echo $list['class']; ?> copy_html2" data-text="<?php echo $list['link']['text']; ?>">
													<span class="js-lazy_bgi" data-bgi="<?php echo $list['src']; ?>"></span>
												</a>
											<?php else : ?>
												<div class="<?php echo $list['class']; ?> copy_html2">
													<span class="js-lazy_bgi" data-bgi="<?php echo $list['src']; ?>"></span>
												</div>
											<?php endif; ?>
											<span class="<?php echo $sec_class; ?>__guide"><?php echo $list['class']; ?></span>
										</li>
									<?php endforeach; ?>
								</ul>

							<?php elseif ($content['type'] == "search") : ?>
								<div class="p-search">
									<form action="" method="GET" id="search">
										<input type="text" name="keyword" placeholder="キーワードで検索">
										<input type="submit" value="検索" class="submit">
									</form>
								</div>
							<?php elseif ($content['type'] == "select") : ?>
								<div class="p-select">
									<select name="" class="sel">
										<option label="2021 - 09 (10)" value="" selected="selected">2021 - 09 (10)</option>
										<option label="2021 - 08 (10)" value="">2021 - 08 (10)</option>
										<option label="2021 - 07 (10)" value="">2021 - 07 (10)</option>
										<option label="2021 - 06 (10)" value="">2021 - 06 (10)</option>
										<option label="2021 - 05 (10)" value="">2021 - 05 (10)</option>
										<option label="2021 - 04 (10)" value="">2021 - 04 (10)</option>
										<option label="2021 - 03 (10)" value="">2021 - 03 (10)</option>
										<option label="2021 - 02 (10)" value="">2021 - 02 (10)</option>
										<option label="2021 - 01 (10)" value="">2021 - 01 (10)</option>
									</select>
									<?php setHtmlSvg("arr"); ?>
								</div>
							<?php elseif ($content['type'] == "table") : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>
											<div class="p-table">
												<table>
													<?php for ($i = 0; $i < 5; $i++) : ?>
														<tr>
															<th><span>項目が入る</span></th>
															<td><span><?php echo $dummy_text; ?></span></td>
														</tr>
													<?php endfor; ?>
												</table>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php elseif ($content['type'] == "icon") : ?>
								<?php
								$xml = $root_path . "/assets/img/icon/sprite.svg"; //ファイルを指定
								$xmlData = simplexml_load_file($xml);
								?>
								<ul>
									<?php foreach ($xmlData as $icon) : ?>
										<?php if (strpos($icon['id'], "stroke") === false && strpos($icon['id'], "logo") === false && strpos($icon['id'], "sns") === false) : ?>
											<li>
												<?php setHtmlSvg($icon['id']); ?>
												<span class="<?php echo $sec_class; ?>__guide"><?php echo $icon['id']; ?></span>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
								<ul>
									<?php foreach ($xmlData as $icon) : ?>
										<?php if (strpos($icon['id'], "sns") !== false) : ?>
											<li>
												<?php setHtmlSvg($icon['id']); ?>
												<span class="<?php echo $sec_class; ?>__guide"><?php echo $icon['id']; ?></span>
											</li>
										<?php endif; ?>
									<?php endforeach; ?>
								</ul>
							<?php else : ?>
								<ul>
									<?php foreach ($content['list'] as $list) : ?>
										<li>

										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php include($root_path . "/assets/inc/_l-foot.php"); ?>
<div id="CopySign"></div>
<script type="text/javascript">
	var php = "";
	php += "<";
	php += "?php echo $rocal_path";
	php += ";";
	php += " ?>";

	$(".copy_html").on("click", function() {
		var copyFrom = document.createElement("textarea");
		var copytarget = $(this);
		var copyhtml = copytarget.prop("outerHTML");
		copyhtml = copyhtml.replace(/ class="copy_html"+/g, "");
		copyhtml = copyhtml.replace(/ copy_html +/g, "");
		copyhtml = copyhtml.replace(/ copy_html+/g, "");
		copyhtml = copyhtml.replace(/copy_html +/g, "");
		copyhtml = copyhtml.replace("/assets/", php + "/assets/");
		copyhtml = copyhtml.replace(/\r?\n/g, "").replace(/\t/g, "").replace(/^ +$/gm, "").replace(/ +/g, " ").replace(/\n{3,}/g, "\n\n");;
		if (copyhtml.match(/xlink/)) {
			var svghtml = String(copyhtml.match(/<svg(?: .+?)?>.*?<\/svg>/g));
			var svgname = svghtml.split('#')[1];
			svgname = svgname.split('"></use></svg>')[0];
			var svgphp = "";
			svgphp += "<";
			svgphp += "?php setHtmlSvg ('" + svgname + "')";
			svgphp += ";";
			svgphp += " ?>";
			copyhtml = copyhtml.replace(svghtml, svgphp);
		}
		copyFrom.textContent = copyhtml;
		var bodyElm = document.getElementsByTagName("body")[0];
		bodyElm.appendChild(copyFrom);
		copyFrom.select();
		var retVal = document.execCommand('copy');
		bodyElm.removeChild(copyFrom);
		$("#CopySign").addClass('is-copy');
		var CopyTimer = setTimeout(function() {
			$("#CopySign").removeClass('is-copy');
			clearTimeout(CopyTimer);
		}, 600);
		return retVal;

	});

	$(".copy_html2").on("click", function() {
		var copyFrom = document.createElement("textarea");
		var copytarget = $(this);
		var copyhtml = copytarget.prop("outerHTML");
		copyhtml = copyhtml.replace(/ class="copy_html2"+/g, "");
		copyhtml = copyhtml.replace(/ copy_html2 +/g, "");
		copyhtml = copyhtml.replace(/ copy_html2+/g, "");
		copyhtml = copyhtml.replace(/copy_html2 +/g, "");
		copyhtml = copyhtml.replace(/\t/g, "")
		copyhtml = copyhtml.replace("/assets/", php + "/assets/");
		if (copyhtml.match(/xlink/)) {
			var svghtml = String(copyhtml.match(/<svg(?: .+?)?>.*?<\/svg>/g));
			var svgname = svghtml.split('#')[1];
			svgname = svgname.split('"></use></svg>')[0];
			var svgphp = "";
			svgphp += "<";
			svgphp += "?php setHtmlSvg ('" + svgname + "')";
			svgphp += ";";
			svgphp += " ?>";
			copyhtml = copyhtml.replace(svghtml, svgphp);
		}

		copyFrom.textContent = copyhtml;
		var bodyElm = document.getElementsByTagName("body")[0];
		bodyElm.appendChild(copyFrom);
		copyFrom.select();
		var retVal = document.execCommand('copy');
		bodyElm.removeChild(copyFrom);
		$("#CopySign").addClass('is-copy');
		var CopyTimer = setTimeout(function() {
			$("#CopySign").removeClass('is-copy');
			clearTimeout(CopyTimer);
		}, 600);
		return retVal;
	});

	var Xpos = 0;
	var Ypos = 0;
	var MouseTimer = 0;
	$(".copy_html,.copy_html2").on('mousemove', function(event) {
		Xpos = event.clientX;
		Ypos = event.clientY;
		$("#CopySign").css({
			'transform': 'matrix(1, 0, 0, 1, ' + Xpos + ',  ' + Ypos + ')',
			'opacity': '1'
		});
		clearTimeout(MouseTimer);
		MouseTimer = setTimeout(clearMouse, 1000);
	}).on('mouseout', function(event) {
		$("#CopySign").css({
			'opacity': '0'
		});
	});;

	function clearMouse() {
		$("#CopySign").css({
			'opacity': '0'
		});
	};

	////
	$('.b-template__list__color__swatch').each(function() {
		var t = $(this).css("background-color");
		$(this).next('.b-template__guide').html($(this).next('.b-template__guide').text() + '<br>' + t)
	});

	$(".b-template__list__text >ul>li,.b-template__list__word >ul>li,.b-template__list__link >ul>li").each(function() {
		var guide = $(this).find('.b-template__guide');
		var target = guide.prev('p,a,span')
		var t = '';
		t += 'font-family : ' + target.css("font-family").split(',')[0];
		t += ' | font-size : ' + target.css("font-size");
		t += ' | font-weight : ' + target.css("font-weight");
		var ls = (parseFloat(target.css("letter-spacing"))) / parseFloat(target.css("font-size"))
		ls = Math.ceil(ls * 100) / 100;
		t += ' | letter-spacing : ' + ls;
		t += ' | line-height : ' + Math.ceil((parseFloat(target.css("line-height")) / parseFloat(target.css("font-size"))) * 100) / 100;
		guide.html(guide.text() + '<br>' + t)
	});
</script>
</body>

</html>
