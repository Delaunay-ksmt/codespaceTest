<?php
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);
ini_set('xdebug.var_display_max_depth', -1);
$img_path = $rocal_path . '/assets/img/';
$icon_path = $img_path . 'icon/sprite.svg#';
$noimg = $img_path . '';
$telephone        = true; // true : 電話番号への自動リンクを消す
$viewport         = true; // true : viewportの指定あり
$ga = ""; // UAから始まるアカウントを記入
$gtm = ""; // UAから始まるアカウントを記入

$protocol = (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$common_ogp = $protocol . $_SERVER["HTTP_HOST"] . "/assets/img/common/ogp.png";
$twittercard    = "summary_large_image"; // summary, summary_large_image, app , player
$twitteraccount = "";
$fb_account = "";
$insta_account = "";
$map_api = "AIzaSyBqbFe8HiHPFKei49bolFbIujFtZHT6-eM";

$snslist = array(
	array(
		'link' => 'https://www.facebook.com/' . $fb_account,
		'icon' => 'sns-facebook',
	),
	array(
		'link' => 'https://twitter.com/' . $twitteraccount,
		'icon' => 'sns-twitter',
	),
	array(
		'link' => 'https://www.instagram.com/' . $insta_account,
		'icon' => 'sns-instagram',
	),
);



$dummy_text =  'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。';
$dummy_list_text = array(
	array(
		'text' => $dummy_text,
	),
	array(
		'text' => $dummy_text,
	),
	array(
		'text' => $dummy_text,
	),
);
$dummy_list_body = array(
	array(
		'body' => array(
			setValueInBody('title', array('大見出しが入ります', '中見出しが入ります。', $dummy_text, $dummy_text), "h2"),
			setValueInBody('text', array($dummy_text)),
		),
	),
	array(
		'body' => array(
			setValueInBody('title', array('大見出しが入ります', '中見出しが入ります。', $dummy_text, $dummy_text), "h2"),
			setValueInBody('text', array($dummy_text)),
		),
	),
);
$dummy_dl_text = array(
	array(
		'dt' => $dummy_text,
		'dd' => $dummy_text,
	),
	array(
		'dt' => $dummy_text,
		'dd' => $dummy_text,
	)
);
$dummy_dl_body = array(
	array(
		'dt' => $dummy_text,
		'body' => array(
			setValueInBody('title', array('大見出しが入ります', '中見出しが入ります。', $dummy_text, $dummy_text), "h2"),
			setValueInBody('text', array($dummy_text)),
		),
	),
	array(
		'dt' => $dummy_text,
		'body' => array(
			setValueInBody('title', array('大見出しが入ります', '中見出しが入ります。', $dummy_text, $dummy_text), "h2"),
			setValueInBody('text', array($dummy_text)),
		),
	),
);
$dummy_table =	array(
	'header' => array(
		array(
			'c' => $dummy_text
		),
		array(
			'c' => $dummy_text
		),
	),
	'body' => array(
		array(
			array(
				'c' => $dummy_text
			),
			array(
				'c' => $dummy_text
			),
		),
		array(
			array(
				'c' => $dummy_text
			),
			array(
				'c' => $dummy_text
			),
		),

	),
);

$dummy_body = array(
	setValueInBody('title', array('大見出しが入ります'), "h2"),
	setValueInBody('text', array($dummy_text)),
	setValueInBody('title', array('画像群'), "h3"),
	setValueInBody('image', array()),
	setValueInBody('image', array($img_path . '_dummy/dummy.png', '背景画像'), 'bgimg'),
	setValueInBody('title', array('リンク群'), "h3"),
	setValueInBody('link', array($link_path, '詳しくみる'), "button"),
	setValueInBody('link', array($link_path, '詳しくみる'), "link", array('icon' => 'arr', 'svg_after' => false)),
	setValueInBody('title', array('リスト'), "h3"),
	setValueInBody('list', array($dummy_list_text), 'ul'),
	setValueInBody('list', array($dummy_list_body), 'ol'),
	setValueInBody('dl', array($dummy_dl_body)),
	setValueInBody('dl', array($dummy_dl_text)),
	setValueInBody('table', array($dummy_table)),
	setValueInBody(
		'profile',
		array(
			array(
				'image' => setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
				'text' => array(
					'title' => '代表取締役',
					'name' => '鈴木太郎（すずきたろう）',
					'detail' => $dummy_text . $dummy_text
				)
			)
		),
	),
	setValueInBody(
		'gallery',
		array(
			array(
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
			)
		),
	),
	setValueInBody(
		'gallery',
		array(
			array(
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
				setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
			)
		),
		'slide'
	),
	setValueInBody('youtube', array('PMDKbr3c38M')),
	setValueInBody('map', array('35.640523', '139.685171', array('url' => $img_path . 'common/pin.svg'))),
	setValueInBody('video', array($rocal_path . '/assets/files/dummy.mp4', setValue('image', $img_path . '_dummy/dummy.png'))),
	setValueInBody(
		'imagetext',
		array(
			array(
				array(
					'image' =>  setValue('image', $img_path . '_dummy/dummy.png'),
					'text' => array(
						'r' => false,
						'title' => $dummy_text,
						'text' => $dummy_text . $dummy_text
					)
				),
			),
		)
	),
	setValueInBody(
		'interview',
		array(
			array(
				array(
					'r' => false,
					'image' => array(
						'image' => setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
						'name' => '鈴木太郎',
					),
					'text' => $dummy_text . $dummy_text,
				),
				array(
					'r' => true,
					'image' => array(
						'image' => setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
						'name' => '鈴木太郎',
					),
					'text' => $dummy_text . $dummy_text,
				),
			),
		)
	),
	setValueInBody(
		'blockquote',
		array(
			array(
				setValueInBody('title', array('大見出しが入ります'), "h2"),
				setValueInBody('text', array($dummy_text)),
				setValueInBody('title', array('画像群'), "h3"),
				setValueInBody('image', array()),
				setValueInBody('image', array($img_path . '_dummy/dummy.png', '背景画像'), 'bgimg'),
				setValueInBody('title', array('リンク群'), "h3"),
				setValueInBody('link', array($link_path, '詳しくみる'), "button"),
				setValueInBody('link', array($link_path, '詳しくみる'), "link", array('icon' => 'arr', 'svg_after' => false)),
			),
		)
	),
);
