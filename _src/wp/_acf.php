<?php
/*
ACF FIELD
*/

/* ------------------------------------
*
* 各ページのACFの設定
*
------------------------------------ */
$partsVariable = array(
	'text' => array(
		'label' => '本文',
		// 'name' => 'text',
		'type' => 'textarea',
		// 'field_type' => '', //normal,repeater,group,flexible
		// 'fields' => array(),
		'sub_fields' => array(
			setAcfArray('text', '', 'text')
		)
	),
	'title' => array(
		'label' => 'タイトル',
		// 'name' => 'title',
		'layout_display' => 'table',
		'sub_fields' => array(
			setAcfFormatTypeSelect(array(
				'h2' => 'h2', 'h3' => 'h3', 'h4' => 'h4'
			), 'h', "レベル"),
			setAcfArray('text', 'テキスト', 'title', array('rows' => 1))
		),
	),
	'image' => array(
		'label' => '画像',
		// 'name' => 'image',
		'layout_display' => 'table',
		'sub_fields' => array(
			setAcfFormatTypeSelect(array('normal' => '普通', 'bgimg' => '背景画像')),
			setAcfArray('image', "画像", 'image'),
		),
	),
	'gallery' => array(
		'label' => '画像ギャラリー',
		// 'name' => 'gallery',
		'layout_display' => 'table',
		'sub_fields' => array(
			setAcfFormatTypeSelect(array('slide' => 'スライド', 'gallery' => 'タイル')),
			setAcfArray('gallery', "リスト", 'gallery'),
		),
	),
	'link' => array(
		'label' => 'リンク',
		// 'name' => 'link',
		'layout_display' => 'table',
		'sub_fields' => array(
			setAcfFormatTypeSelect(array('button' => 'ボタン', 'link' => 'リンク')),
			setAcfArray('link', "", 'link'),
		),
	),
	'list' => array(
		'label' => 'リスト',
		// 'name' => 'list',
		'field_type' => 'repeater',
		'fields' => array(
			setAcfArray('text', '', 'text', array('rows' => 2))
		),
		'layout_display' => 'table',
		'sub_fields' => array(
			setAcfFormatTypeSelect(array('ul' => '・', 'ol' => '1.')),
			setAcfArray(
				'list',
				"リスト",
				'list'
			),
		),
	),
	'list-body' => array(
		'label' => 'リスト(柔軟)',
		// 'name' => 'list-body',
		'field_type' => 'repeater',
		'fields' => array(
			setAcfFormatArrayBody(array('title', 'text', 'image', 'link'))
		),
		'layout_display' => 'table',
		'sub_fields' => array(
			setAcfFormatTypeSelect(array('ul' => '・', 'ol' => '1.')),
			setAcfArray(
				'list',
				"リスト",
				'list-body',
				array('type' => 'body', 'layout' => array('title', 'text', 'image', 'link'))
			),
		),
	),
	'cap' => array(
		'label' => '注釈',
		// 'name' => 'cap',
		'field_type' => 'repeater',
		'fields' => array(
			setAcfArray('text', '', 'text', array('rows' => 2))
		),
		'sub_fields' => array(
			setAcfArray("list", '', 'cap', array('button' => '注釈'))
		),
	),
	'table' => array(
		'label' => '表',
		// 'name' => 'table',
		'sub_fields' => array(
			setAcfArray('table', "", 'table'),
		),
	),
	'dl' => array(
		'label' => 'データリスト',
		// 'name' => 'dl',
		'field_type' => 'repeater',
		'fields' => array(
			setAcfArray('text', '見出し', 'dt', array('rows' => 2, 'width' => 30)),
			setAcfArray(
				'text',
				'',
				'text',
				array('rows' => 2)
			)
		),
		'sub_fields' => array(
			setAcfArray(
				"dl",
				'',
				'dl',
				array('button' => 'データリスト')
			)
		),
	),
	'dl-body' => array(
		'label' => 'データリスト(柔軟)',
		// 'name' => 'dl-body',
		'field_type' => 'repeater',
		'fields' => array(
			setAcfArray('text', '見出し', 'dt', array('rows' => 2, 'width' => 30)),
			setAcfFormatArrayBody(array('title', 'text', 'image', 'link'))
		),
		'layout_display' => 'table',
		'sub_fields' => array(
			setAcfArray('dl', "", 'dl-body', array(
				'type' => 'body', 'button' => 'データリスト', 'layout' => array('text', 'title')
			)),
		),
	),
	'faq' => array(
		'label' => 'よくあるご質問',
		// 'name' => 'faq',
		'field_type' => 'repeater',
		'fields' => array(
			setAcfArray('text', '見出し', 'dt', array('rows' => 2, 'width' => 30)),
			setAcfArray(
				'text',
				'',
				'text',
				array('rows' => 2)
			)
		),
		'sub_fields' => array(
			setAcfArray("dl", '', 'faq', array('button' => 'よくあるご質問'))
		),
	),
	'video' => array(
		'label' => 'ビデオ',
		// 'name' => 'video',
		'field_type' => 'group',
		'fields' => array(
			array(
				'type' => 'file',
				'label' => 'ビデオ',
				'name' => 'video',
				'return_format' => 'url',
			),
			setAcfArray('image', 'カバー画像', 'image'),
		),
		'layout_display' => 'table',
		'sub_fields' => array(
			array(
				'type' => 'file',
				'label' => 'ビデオ',
				'name' => 'video',
				'return_format' => 'url',
			),
			setAcfArray('image', 'カバー画像', 'image'),
		),
	),
	'youtube' => array(
		'label' => 'Youtube',
		'type' => 'textarea',
		'prepend' => 'https://www.youtube.com/watch?v=',
		// 'name' => 'youtube',
		'sub_fields' => array(
			setAcfArray("youtube", '', 'youtube')
		),
	),
	'map' => array(
		'label' => 'マップ',
		// 'name' => 'map',
		'field_type' => 'group',
		'fields' => array(
			array('type' => 'text', 'label' => '緯度', 'name' => 'lat'),
			array('type' => 'text', 'label' => '経度', 'name' => 'lng'),
			array('type' => 'image', 'label' => 'ピン', 'name' => 'pin')
		),
		'layout_display' => 'table',
		'sub_fields' => array(
			array('type' => 'text', 'label' => '緯度', 'name' => 'lat'),
			array('type' => 'text', 'label' => '経度', 'name' => 'lng'),
			array('type' => 'image', 'label' => 'ピン', 'name' => 'pin')
		),
	),
	'imagetext' => array(
		'label' => '画像テキスト',
		// 'name' => 'imagetext',
		'field_type' => 'repeater',
		'fields' => array(
			setAcfArray('image', '画像', 'image', array('width' => 20)),
			setAcfFormatArrayGroup(
				'text',
				array(
					array(
						'type' => 'true_false',
						'label' => '画像位置',
						'name' => 'r',
						'ui_on_text' => '右',
						'ui_off_text' => '左',
					),
					array(
						'type' => 'text',
						'label' => 'タイトル',
						'name' => 'title',
					),
					setAcfArray('text', '本文', 'text'),
					setAcfArray('link', 'リンク', 'link'),
				),
				'テキスト',
				'group',
				'rows'
			)
		),
		'sub_fields' => array(
			setAcfArray("imagetext", '', 'imagetext', array('button' => '画像テキスト'))
		)
	),
	'interview' => array(
		'label' => 'インタビュー',
		// 'name' => 'interview',
		'field_type' => 'repeater',
		'fields' => array(
			array(
				'type' => 'true_false',
				'label' => '位置',
				'name' => 'r',
				'ui_on_text' => '右',
				'ui_off_text' => '左',
				'width' => 15
			),
			setAcfFormatArrayGroup('image', array(
				setAcfArray('image', '', 'image'),
				array(
					'type' => 'text',
					'name' => 'name',
					'label' => '',
					'placeholder' => '名前を入力',
				),
			), '人', 'group', 'block'),
			setAcfArray('text', '本文', 'text', array('width' => 50)),
		),
		'sub_fields' => array(
			setAcfArray("interview", '', 'interview', array('button' => 'インタビュー'))
		)
	),
	'profile' => array(
		'label' => 'プロフィール',
		// 'name' => 'profile',
		'field_type' => 'group',
		'fields' => array(
			setAcfArray(
				'image',
				'画像',
				'image',
				array('width' => 40)
			),
			setAcfFormatArrayGroup('text', array(
				array(
					'type' => 'text',
					'label' => '名前',
					'name' => 'name',
				),
				array(
					'type' => 'text',
					'label' => '肩書き',
					'name' => 'title',
				),
				setAcfArray('text', '紹介文', 'detail'),
			), 'テキスト', 'group', 'rows'),
		),
		'sub_fields' => array(
			setAcfArray("profile", '', 'profile')
		)
	),
	'blockquote' => array(
		'label' => '引用',
		// 'name' => 'blockquote',
		// 'field_type' => '',
		// 'fields' => setAcfFormatArrayBody($args, '引用', 'blockquote'),
		'sub_fields' => array(
			setAcfFormatArrayBody(array('text'), '引用', 'blockquote')
		)
	),
);
$acf_format_array = array(
	'display' => array(
		'type' => 'true_false',
		'label' => '表示',
		'name' => 'display',
		'ui_on_text' => '表示',
		'ui_off_text' => '非表示',
	),
	'rl' => array(
		'type' => 'true_false',
		'label' => '画像位置',
		'name' => 'r',
		'ui_on_text' => '右',
		'ui_off_text' => '左',
	),
	'message' => array(
		'type' => 'message',
		'label' => '本文',
		'name' => '',
		'message' => '文中には下記のhtmlタグが使用できます<br>[リンク] &lt;a href=&quot;ここにURL&quot;&gt;表示する文字列&lt;/a&gt;'
	),
	'lang' => setAcfFormatArrayGroup('lang', array(
		array(
			'type' => 'text',
			'label' => '英語',
			'name' => 'en',
		),
		array(
			'type' => 'text',
			'label' => '日',
			'name' => 'jp',
		),
	), '言語', 'group', 'table')
);
$acfvalues = array();
addAcfValueArray('format', 'FORMAT', 'page', array(
	setAcfArray('title', 'タイトル', 'title'),
	setAcfArray('image', 'メインビジュアル', 'image'),
	setAcfArray('link', 'リンク', 'link'),
	setAcfArray('text', '本文', 'text'),
	setAcfArray('list', 'リスト', 'list'),
	setAcfArray('list', 'リスト(データ)', 'list-data', array('type' => 'body')),
	setAcfArray('dl', 'データリスト', 'dl'),
	setAcfArray('dl', 'データリスト(データ)', 'dl-data', array('type' => 'body')),
	setAcfArray('table', '表', 'table'),
	setAcfArray('imagetext', '画像テキスト', 'imagetext'),
	setAcfArray('gallery', 'ギャラリー', 'gallery'),
	setAcfArray('profile', 'プロフィール', 'profile'),
	setAcfArray('interview', 'インタビュー', 'interview'),
	setAcfArray('youtube', 'Youtube', 'yt'),
	setAcfArray('map', 'map', 'map'),
	setAcfArray('video', 'video', 'video'),
	// setAcfArray('blockquote', '引用', 'blockquote'),
));
addAcfValueArray('top', 'TOP', 'page', array(
	setAcfArray('title', 'タイトル', 'title'),
	setAcfArray('relationship', '関連記事', 'relationship'),
	setAcfArray('post_object', '関連記事2', 'post_object'),
));
addAcfValueArray('news', 'NEWS', 'post', array(
	'archive' => array(
		setAcfArray('title', 'タイトル', 'title'),
	),
	'single' => array(
		setAcfArray('text', 'リード', 'lead'),
		$acf_format_array['message'],
		setAcfFormatArrayBody(array('text', 'title', 'cap', 'link', 'image')),
	)
));
addAcfValueArray('blog', 'BLOG', 'post', array(
	'archive' => array(
		setAcfArray('title', 'タイトル', 'title'),
	),
	'single' => array(
		setAcfFormatArrayGroup('thumbnail', array(
			setAcfArray('image', '画像', 'image'),
			setAcfArray('text', '文章', 'text'),
		), '一覧での表示', 'group', 'table'),
		setAcfArray('image', 'メイン画像', 'image'),
		setAcfArray('text', 'リード', 'lead'),
		$acf_format_array['message'],
		setAcfFormatArrayBody(),
	)
));
addAcfValueArray('faq', 'FAQ', 'page', array(
	setAcfArray('title', 'タイトル', 'title'),
	setAcfArray('dl', 'よくあるご質問', 'faq'),
));
addAcfValueArray('privacy', 'PRIVACY', 'page', array(
	setAcfArray('title', 'タイトル', 'title'),
	setAcfFormatArrayBody(array('title', 'text', 'list')),
	setAcfFormatArrayGroup('contact', array(
		setAcfArray('text', '連絡先', 'text', array('rows' => 10)),
	), 'お問い合わせ先', 'group', 'rows'),
));
addAcfValueArray('contact', 'お問い合わせ', 'page', array(
	setAcfArray('title', 'タイトル', 'title'),
	array('type' => 'text', 'label' => 'MW WP FORM id', 'name' => 'form'),
));
$acfvalues[] = array(
	'name' => 'setting',
	'title' => '初期設定',
	'field' => array(
		array(
			'type' => 'group',
			'label' => 'メタ情報',
			'name' => 'meta',
			'layout' => 'row',
			'sub_fields' => array(
				array(
					'type' => 'text',
					'label' => 'サイトタイトル',
					'name' => 'title',
				),
				array(
					'type' => 'textarea',
					'label' => 'ディスクリプション',
					'name' => 'description',
					'instructions' => '130字程度',
					'rows' => 4,
				),
				array(
					'type' => 'image',
					'label' => 'OGP画像',
					'name' => 'ogp',
					'instructions' => '1200px × 630pxにリサイズしてください。',
					'size' => 'thumbnail',
					'return_format' => 'url',
				),
				array(
					'type' => 'group',
					'label' => 'Google Map',
					'name' => 'map',
					'layout' => 'row',
					'sub_fields' => array(
						array(
							'label' => 'API',
							'name' => 'api',
							'type' => 'text',
							'instructions' => '<a href="https://nendeb.com/276" target="_blank">API取得方法こちら</a>',
						),
						array(
							'label' => '緯度経度',
							'name' => 'latlng',
							'type' => 'group',
							'layout' => 'table',
							'sub_fields' => array(
								array(
									'label' => '緯度',
									'name' => 'lat',
									'type' => 'text',
								),
								array(
									'label' => '経度',
									'name' => 'lng',
									'type' => 'text',
								),
							)
						),
						array(
							'label' => 'Googlemapリンク',
							'name' => 'link',
							'type' => 'link',
						),
					)
				),
				array(
					'type' => 'group',
					'label' => 'Google Analytics',
					'name' => 'analytics',
					'layout' => 'row',
					'sub_fields' => array(
						array(
							'label' => 'どちらを使いますか？',
							'name' => 'ga_or_gtm',
							'type' => 'true_false',
							'ui_on_text' => 'Tag Manager',
							'ui_off_text' => 'Analytics',
						),
						array(
							'label' => 'Google TagManager',
							'name' => 'gtm',
							'type' => 'text',
							'instructions' => 'UTMから始まるアカウントを入力(タグマネージャー画面でアナリティクスの紐付けを行なってください。)',
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_setting_meta_analytics_ga_or_gtm',
										'operator' => '==',
										'value' => '1',
									),
								),
							),
						),
						array(
							'label' => 'GoogleAnalytics',
							'name' => 'ga',
							'type' => 'text',
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_setting_meta_analytics_ga_or_gtm',
										'operator' => '!=',
										'value' => '1',
									),
								),
							),
						),
					)
				),
			)
		),
		array(
			'type' => 'group',
			'label' => 'お客さま情報',
			'name' => 'siteinfo',
			'layout' => 'row',
			'sub_fields' => array(
				array(
					'type' => 'text',
					'label' => '会社名',
					'name' => 'company',
				),
				array(
					'type' => 'text',
					'label' => '電話番号',
					'name' => 'tel',
				),
				array(
					'type' => 'text',
					'label' => 'FAX',
					'name' => 'fax',
				),
				array(
					'type' => 'email',
					'label' => 'お問い合わせ先メールアドレス',
					'name' => 'email',
				),
				array(
					'type' => 'text',
					'label' => '郵便番号',
					'name' => 'zip',
				),
				array(
					'type' => 'text',
					'label' => '住所',
					'name' => 'add',
				),
				array(
					'type' => 'text',
					'label' => 'コピーライト',
					'name' => 'copyright',
				),
			)
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'initsetting',
			),
		),
	)
);
$acfvalues[] = array(
	'name' => 'meta',
	'title' => 'メタ情報',
	'field' => array(
		array(
			'type' => 'image',
			'label' => 'OGP画像',
			'name' => 'ogp',
			'size' => 'thumbnail',
		),
		array(
			'type' => 'textarea',
			'label' => 'ディスクリプション',
			'name' => 'description',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
			array(
				'param' => 'page_template',
				'operator' => '!=',
				'value' => 'index.php',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'movie',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'series',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'essay',
			),
		),
	),
	'option' => array(
		'position' => 'side'
	)
);

/* ------------------------------------
*
* ACF設定用のfunction
*
------------------------------------ */

function setAcfArray($type, $label = "", $name = "", $args = array())
{
	global $acf_format_array;
	// $thisParts = (isset($partsVariable[$type])) ? $partsVariable[$type] : "";
	// var_dump($thisParts['label']);
	$array = array(
		'type' => $type,
		'label' => $label,
		'name' => (!empty($name)) ? $name : $type
	);
	if (!empty($args)) {
		$array = array_merge($args, $array);
	}
	if ($type == 'title') :
		$args = (!empty($args)) ? $args : array('title', 'subtitle', 'lead', 'text');
		$field_data = array();
		$titlevalue = array(
			'title' => array('label' => 'タイトル', 'rows' => 1),
			'subtitle' => array('label' => 'サブタイトル', 'rows' => 1),
			'lead' => array('label' => 'リード', 'rows' => 2),
			'text' => array('label' => 'テキスト', 'rows' => 4),
		);
		foreach ($args as $value) {
			$field_data[] = setAcfArray('text', $titlevalue[$value]['label'], $value, array('rows' => $titlevalue[$value]['rows']));
		}
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'group', 'rows');
	elseif ($type == 'blockquote') :
		$array = setAcfFormatArrayBody($args, '引用', 'blockquote');
	elseif ($type == 'text') :
		$array['type'] = 'textarea';
	elseif ($type == 'list') :
		$mode = (!empty($args['type'])) ? $args['type'] : 'text';
		if ($mode == "text") {
			$field_data[] = setAcfArray('text', '', 'text', array('rows' => 2));
		} else {
			$flex_layout = (!empty($args['layout'])) ? $args['layout'] : array('text', 'image', 'link');
			$field_data[] = setAcfFormatArrayBody($flex_layout);
		}
		$button_label = (isset($args['button'])) ? $args['button'] : "";
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'repeater', 'table', "", $button_label);
	elseif ($type == 'video') :
		$field_data = array(
			array(
				'type' => 'file',
				'label' => 'ビデオ',
				'name' => 'video',
				'return_format' => 'url',
			),
			setAcfArray('image', 'カバー画像', 'image'),
		);
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'group', 'table');
	elseif ($type == 'map') :
		$field_data = array(
			array(
				'type' => 'text',
				'label' => '緯度',
				'name' => 'lat',
			),
			array(
				'type' => 'text',
				'label' => '経度',
				'name' => 'lng',
			),
			array(
				'type' => 'image',
				'label' => 'ピン',
				'name' => 'pin',
			)
		);
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'group', 'table');
	elseif ($type == 'dl') :
		$mode = (!empty($args['type'])) ? $args['type'] : 'text';
		$field_data = array(
			setAcfArray('text', '見出し', 'dt', array('rows' => 2, 'width' => 30))
		);
		if ($mode == "text") {
			$field_data[] = setAcfArray('text', '本文', 'dd', array('rows' => 4));
		} else {
			$flex_layout = (!empty($args['layout'])) ? $args['layout'] : array('text', 'image', 'link');
			$field_data[] = setAcfFormatArrayBody($flex_layout);
		}
		$button_label = (isset($args['button'])) ? $args['button'] : "";
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'repeater', 'table', "", $button_label);
	elseif ($type == 'imagetext') :
		$field_data = array(
			setAcfArray('image', '画像', 'image', array('width' => 20)),
			setAcfFormatArrayGroup('text', array(
				$acf_format_array['rl'],
				setAcfArray('text', 'タイトル', 'title', array('row' => 1)),
				setAcfArray('text', '本文', 'text'),
				setAcfArray('link', 'リンク', 'link'),
			), 'テキスト', 'group', 'rows')
		);
		$button_label = (isset($args['button'])) ? $args['button'] : "";
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'repeater', 'table', "", $button_label);
	elseif ($type == 'interview') :
		$field_data = array(
			array(
				'type' => 'true_false',
				'label' => '位置',
				'name' => 'r',
				'ui_on_text' => '右',
				'ui_off_text' => '左',
				'width' => 15
			),
			setAcfFormatArrayGroup('image', array(
				setAcfArray('image', '', 'image'),
				array(
					'type' => 'text',
					'name' => 'name',
					'label' => '',
					'placeholder' => '名前を入力',
				),
			), '人', 'group', 'block'),
			setAcfArray('text', '本文', 'text', array('width' => 50)),
		);
		$button_label = (isset($args['button'])) ? $args['button'] : "";
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'repeater', 'table', "", $button_label);
	elseif ($type == 'profile') :
		$field_data = array(
			setAcfArray('image', '画像', 'image', array('width' => 40)),
			setAcfFormatArrayGroup('text', array(
				array(
					'type' => 'text',
					'label' => '名前',
					'name' => 'name',
				),
				array(
					'type' => 'text',
					'label' => '肩書き',
					'name' => 'title',
				),
				setAcfArray('text', '紹介文', 'detail'),
			), 'テキスト', 'group', 'rows'),
		);
		$array = setAcfFormatArrayGroup($name, $field_data, $label, 'group', 'table');
	elseif ($type == 'youtube') :
		$array['type'] = 'text';
		$array['prepend'] = 'https://www.youtube.com/watch?v=';

	endif;
	return $array;
}
function setAcfArrayInBody($layouts, $fieldkey)
{
	global $partsVariable;
	$array = array();
	foreach ($layouts as $layout) {
		$thiskey = $fieldkey . '_' . $layout;
		$partsFormat = $partsVariable[$layout];
		$thislayout = array(
			'label' => $partsFormat['label'],
			'name' => $layout,
			'type' => $layout,
			'key' => 'layout_' . $thiskey,
			'display' => (!empty($partsFormat['layout_display'])) ? $partsFormat['layout_display'] : 'block',
			'sub_fields' => (!empty($partsFormat['sub_fields'])) ? $partsFormat['sub_fields'] : array(),
		);
		$thislayout['sub_fields'] = setAcfRoop($thislayout['sub_fields'], $thiskey);
		$array[] = $thislayout;
	}
	return $array;
}
function setAcfFormatArrayGroup($name, $field_data, $label = "", $type = "group", $layout = "row", $logic = "", $button_label = "")
{
	$array = array(
		'type' => $type,
		'label' => $label,
		'name' => $name,
		'layout' => $layout,
		'sub_fields' => $field_data
	);
	if ($type == "repeater") {
		$array['button_label'] = ($button_label != "") ? $button_label . 'を追加' : $label . 'を追加';
	}
	if (!empty($logic)) {
		$array['conditional_logic'] = array(
			array(
				array(
					'field' => $logic,
					'operator' => '==',
					'value' => '1',
				),
			),
		);
	}
	return $array;
};
function setAcfFormatArrayBody($layout = array(), $label = "コンテンツ", $name = "body")
{
	global $partsVariable;
	$layout = (!empty($layout)) ? $layout : array_keys($partsVariable);
	return array(
		'type' => 'flexible_content',
		'name' => $name,
		'label' => $label,
		'layouts' => $layout
	);
}
function setAcfFormatTypeSelect($arr, $name = 'type', $label = "タイプ")
{
	$array = array(
		'type' => 'select',
		'label' => $label,
		'name' => $name,
		'return_format' => 'value',
		'width' => 20,
		'choices' => $arr,
	);
	return $array;
}

/* ------------------------------------
*
* ACF設定用のfunction
*
------------------------------------ */
function addAcfValueArray($key, $title, $type, $field)
{
	global $acfvalues;
	global ${'acf_' . $key};
	if ($type != "post") {
		$acfvalues[] = array(
			'name' => $key,
			'title' => $title,
			'field' => $field,
			'location' => setAcfLocation($type, $key),
		);
	} else {
		$acfvalues[] = array(
			'name' => $key . '__index',
			'title' => $title . '一覧',
			'field' => $field['archive'],
			'location' => setAcfLocation('archive', $key),
		);
		$acfvalues[] = array(
			'name' => $key,
			'title' => $title,
			'field' => $field['single'],
			'location' => setAcfLocation('post', $key),
		);
	}
}
function setAcfLocation($type, $value)
{
	$pagetype = array(
		'post' => 'post_type',
		'archive' => 'admin_page',
		'page' => 'page_template',
	);
	$array = array(
		array(
			array(
				'param' => $pagetype[$type],
				'operator' => '==',
				'value' => ($type == 'page') ? 'page-' . $value . '.php' : $value,
			),
		),
	);
	return $array;
}
function constructAcfArray($array)
{
	$field_array = array();
	foreach ($array as $pagevalue) {
		$page_field = array(
			'key' => 'group_' . $pagevalue['name'],
			'title' =>  $pagevalue['title'],
			'fields' => $pagevalue['field'],
			'location' => $pagevalue['location'],
			'menu_order' => 6,
			'position' => (!empty($pagevalue['position'])) ? $pagevalue['position'] : 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => array(
				// 0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'page_attributes',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
			'active' => true,
			'description' => '',
		);
		if (!empty($pagevalue['option'])) {
			foreach ($pagevalue['option'] as $key => $value) {
				$page_field[$key] = $value;
			}
		}
		$page_key = $pagevalue['name'];
		$page_field['fields'] = setAcfRoop($page_field['fields'], $page_key);

		$field_array[] = $page_field;
	}
	return $field_array;
}
function setAcfRoop($fieldvalues, $page_key)
{
	$field = array();
	if (is_array($fieldvalues)) {
		foreach ($fieldvalues as $fieldvalue) {
			$field_type = $fieldvalue['type'];
			$fieldvalue['key'] = $page_key . '_' . $fieldvalue['name'];
			if ($field_type == 'group' || $field_type == 'repeater') {
				$fieldvalue['sub_fields'] = setAcfRoop($fieldvalue['sub_fields'], $fieldvalue['key']);
			} elseif ($field_type == 'flexible_content') {
				$fieldvalue['layouts'] = setAcfArrayInBody($fieldvalue['layouts'], $fieldvalue['key']);
			}
			$field[] =	constructAcfField($fieldvalue);
		}
	}
	return $field;
}
function constructAcfField($field_data)
{
	$type = $field_data['type'];
	$array = array(
		'key' => 'field_' . $field_data['key'],
		'label' => $field_data['label'],
		'name' => $field_data['name'],
		'type' => $field_data['type'],
		'instructions' => (isset($field_data['instructions'])) ? $field_data['instructions'] : '',
		'required' => 0,
		'conditional_logic' => (isset($field_data['conditional_logic'])) ? $field_data['conditional_logic'] : 0,
		'wrapper' => array(
			'width' => (isset($field_data['width'])) ? $field_data['width'] : '',
			'class' => '',
			'id' => '',
		),
	);
	$acfFieldSetting = array(
		'text' => array(
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		'textarea' => array(
			'default_value' => '',
			'placeholder' => '',
			'rows' => 4,
			'maxlength' => '',
			'new_lines' => 'rows',
		),
		'number' => array(
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
			'min' => '',
			'max' => '',
			'step' => '',
		),
		'image' => array(
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
			'mime_types' => '',
		),
		'file' => array(
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_size' => 0,
			'max_size' => 0,
			'mime_types' => '',
		),
		'gallery' => array(
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min' => 0,
			'max' => 0,
			'min_width' => 0,
			'min_height' => 0,
			'min_size' => 0,
			'max_width' => 0,
			'max_height' => 0,
			'max_size' => 0,
			'mime_types' => '',
			'insert' => 'append',
		),
		'link' => array(
			'type' => 'link',
			'return_format' => 'array',
		),
		'true_false' => array(
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'はい',
			'ui_off_text' => 'いいえ',
		),
		'select' => array(
			'return_format' => 'array',
			'default_value' => '',
			'choices' => '',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'placeholder' => '',
		),
		'checkbox' => array(
			'return_format' => 'array',
			'default_value' => '',
			'choices' => '',
			'layout' => 'horizontal',
			'allow_custom' => false,
			'save_custom' => false,
			'toggle' => true,
		),
		'radio' => array(
			'return_format' => 'array',
			'default_value' => '',
			'choices' => '',
			'layout' => 'horizontal',
			'save_other_choice' => 0,
			'other_choice' => 0,
		),
		'markdown' => array(
			'autogrow' => 1,
			'editor-theme' => 'dark',
			'preview-theme' => 'github',
			'syntax-highlight' => 0,
			'syntax-theme' => 'monokai_sublime',
			'media-upload' => 0,
			'tab-function' => 0,
		),
		'table' => array(
			'use_header' => 0,
			'use_caption' => 2,
		),
		'group' => array(
			'layout' => $field_data['layout'],
			'sub_fields' => $field_data['sub_fields'],
		),
		'repeater' => array(
			'layout' => 'block',
			'collapsed' => '',
			'sub_fields' => $field_data['sub_fields'],
			'button_label' => 'リストを追加',
			'min' =>  1,
			'max' => '',
		),
		'flexible_content' => array(
			'layouts' => $field_data['layouts'],
			'button_label' => 'コンテンツを追加',
			'min' =>  1,
			'max' =>  '',
		),
		'relationship' => array(
			'post_type' => $field_data['post_type'],
			'taxonomy' => '',
			'filters' => array('search', 'post_type', 'taxonomy'),
			'elements' => array(),
			'min' => 1,
			'max' => '',
			'return_format' => 'id',
		),
		'post_object' => array(
			'post_type' => $field_data['post_type'],
			'taxonomy' => '',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 1,
			'return_format' => 'id',
		),
		'color_picker' => array(
			'enable_opacity' => 0,
			'return_format' => 'string',
		),
		'message' => array(
			'message' => $field_data['message'],
			'esc_html' => 0,
			'new_lines' => 'br',
		),
	);
	if ($acfFieldSetting[$type]) {
		foreach ($acfFieldSetting[$type] as $key => $value) {
			$array[$key] = (isset($field_data[$key])) ? $field_data[$key] : $value;
		}
	}
	return $array;
};
