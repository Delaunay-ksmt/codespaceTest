<?php
include('_common.php');

/*
[TODO] amp対応
[TODO] line heightの計算 mixin
[TODO] contactのメールとかもfunctionから設定
*/
$googlefont = array(
	'Poppins:wght@400;500;700;800',
	'Montserrat:wght@300;400;500;700',
	'Nunito:wght@300;400;500;700',
	'Noto+Sans+JP:wght@300;400;500;700'
);




$site_title       = "DELAUNAY";
$site_description = "FORMAT";
$site_keywords    = "";
$client_name      = "株式会社クライアント";
$copyright      = "©︎" . $site_title . ", 2021"; //footerに表示
$project_name     = $site_title . "サイト制作";

$tel = "03-1234-5678";
$fax = "";
$email = "hello@delaunay.jp";
$zip =  "〒154-0002";
$add =  "東京都世田谷区下馬1-11-10";
$buil =  "フェリオカナクボ203";
$open =  "";
$logo = $rocal_path . "/assets/img/common/logo.svg";
$theme_color = '';
// WPではfunction.phpで設定する



/*================
メニュー(ヘッダー・フッター・ハンバーガー共通)
 - 入れ子のページは各page_valueのところで設定
 - displayはbooleanじゃなく、stringにして条件分岐してもOK
=================*/
$menu_list = array(
	'home' => array(
		'title' => setValue('title', 'HOME', 'ホーム'),
		'link' => setValue('link', $link_path . '/', '', ''),
		'class' => "home",
		'icon' => "",
		'display' => array(
			"header" => true,
			"header_sub" => false,
			"spnav" => true,
			"spnav_sub" => false,
			"footer1" => true,
			"footer2" => false,
			"footer3" => false,
			"footer4" => false,
		),
	),
	'about' => array(
		'title' => setValue('title', 'ABOUT', '事業紹介'),
		'class' => "about",
		'icon' => "",
		'link' => setValue('link', $link_path . '/about', '', '_blank'),
		'display' => array(
			"header" => true,
			"header_sub" => false,
			"spnav" => true,
			"spnav_sub" => false,
			"footer1" => true,
			"footer2" => false,
			"footer3" => false,
			"footer4" => false,
		),
	),
	'company' => array(
		'title' => setValue('title', 'COMPANY', '企業紹介'),
		'class' => "company",
		'icon' => "",
		'link' => setValue('link', $link_path . '/company', '', ''),
		'display' => array(
			"header" => true,
			"header_sub" => false,
			"spnav" => true,
			"spnav_sub" => false,
			"footer1" => true,
			"footer2" => false,
			"footer3" => false,
			"footer4" => false,
		),
	),
	'service' => array(
		'title' => setValue('title', 'SERVICE', '事業内容'),
		'class' => "service",
		'icon' => "",
		'link' => setValue('link', $link_path . '/service', '', ''),

		'display' => array(
			"header" => true,
			"header_sub" => false,
			"spnav" => true,
			"spnav_sub" => false,
			"footer1" => false,
			"footer2" => true,
			"footer3" => false,
			"footer4" => false,
		),
	),
	'blog' => array(
		'title' => setValue('title', 'BLOG', 'ブログ'),
		'class' => "blog",
		'icon' => "",
		'link' => setValue('link', $link_path . '/blog', '', ''),
		'display' => array(
			"header" => true,
			"header_sub" => false,
			"spnav" => true,
			"spnav_sub" => false,
			"footer1" => false,
			"footer2" => false,
			"footer3" => true,
			"footer4" => false,
		),
	),
	'news' => array(
		'title' => setValue('title', 'NEWS', 'お知らせ'),
		'class' => "news",
		'icon' => "",
		'link' => setValue('link', $link_path . '/news', '', ''),
		'display' => array(
			"header" => true,
			"header_sub" => false,
			"spnav" => true,
			"spnav_sub" => false,
			"footer1" => true,
			"footer2" => false,
			"footer3" => false,
			"footer4" => false,
		),
	),
	'recruit' => array(
		'title' => setValue('title', 'RECRUIT', '採用情報'),
		'class' => "recruit",
		'icon' => "",
		'link' => setValue('link', $link_path . '/recruit', '', ''),
		'display' => array(
			"header" => false,
			"header_sub" => true,
			"spnav" => false,
			"spnav_sub" => true,
			"footer1" => false,
			"footer2" => false,
			"footer3" => false,
			"footer4" => true,
		),
	),
	'contact' => array(
		'title' => setValue('title', 'CONTACT', 'お問い合わせ'),
		'class' => "contact",
		'icon' => "",
		'link' => setValue('link', $link_path . '/contact', '', ''),
		'display' => array(
			"header" => true,
			"header_sub" => false,
			"spnav" => true,
			"spnav_sub" => false,
			"footer1" => false,
			"footer2" => false,
			"footer3" => false,
			"footer4" => true,
		),
	),
	'faq' => array(
		'title' => setValue('title', 'FAQ', 'よくある質問'),
		'class' => "faq",
		'icon' => "",
		'link' => setValue('link', $link_path . '/faq', '', ''),

		'display' => array(
			"header" => false,
			"header_sub" => true,
			"spnav" => false,
			"spnav_sub" => true,
			"footer1" => false,
			"footer2" => false,
			"footer3" => false,
			"footer4" => true,
		),
	),
	'privacy' => array(
		'title' => setValue('title', 'PRIVACY POLICY', '個人情報保護方針'),
		'class' => "privacy",
		'icon' => "",
		'link' => setValue('link', $link_path . '/privacy', '', ''),

		'display' => array(
			"header" => false,
			"header_sub" => false,
			"spnav" => false,
			"spnav_sub" => true,
			"footer1" => false,
			"footer2" => false,
			"footer3" => false,
			"footer4" => true,
		),
	),
);


/*================
デフォルト ページ:基本の形
=================*/
$p_key = "format";
$page_format = array(
	'pankuzu' => array('home'),
	'title' => setValue('title', 'PAGE TITLE', 'PAGE SUBTITLE', $dummy_text, $dummy_text . $dummy_text),
	'text' => $dummy_text,
	'image' => setValue('image', $img_path . '_dummy/dummy.png', 'テスト画像'),
	'image2' => setValue('image'), //省略するとダミー画像が出る
	'link' => setValue('link', $link_path, '詳しくみる'),
	'list' => setValue('list', $dummy_list_text),
	'list_body' => setValue('list', $dummy_list_body),
	'dl' => setValue('dl', $dummy_dl_text),
	'dl_body' => setValue('dl', $dummy_dl_body),
	'table' =>  setValue('table', $dummy_table),
	'imagetext' => setValue(
		'imagetext',
		array(
			array(
				'image' =>  setValue('image', $img_path . '_dummy/dummy.png'),
				'text' => array(
					'r' => false,
					'title' => $dummy_text,
					'text' => $dummy_text . $dummy_text
				)
			),
			array(
				'image' =>  setValue('image', $img_path . '_dummy/dummy.png'),
				'text' => array(
					'r' => true,
					'title' => $dummy_text,
					'text' => $dummy_text . $dummy_text
				)
			)
		)
	),
	'profile' => setValue(
		'profile',
		array(
			'image' => setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
			'text' => array(
				'title' => '代表取締役',
				'name' => '鈴木太郎（すずきたろう）',
				'detail' => $dummy_text . $dummy_text
			)
		),
	),
	'gallery' => setValue(
		'gallery',
		array(
			setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
			setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
			setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
			setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
		)
	),
	'interview' => setValue(
		'interview',
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
		)
	),
	'youtube' => setValue('youtube', 'PMDKbr3c38M'),
	'map' => setValue('map', '35.640523', '139.685171', array('url' => $img_path . 'common/pin.svg')),
	'video' => setValue('video', $rocal_path . '/assets/files/dummy.mp4', setValue('image', $img_path . '_dummy/dummy.png')),
	'blockquote' => setValue('blockquote', $dummy_body),
	'form' => array(),
);



/*================
TOPページ
=================*/
$p_key = "top";
${'page_' . $p_key}  = array(
	'title' => setValue('title', 'TOP'),
	'text' => $dummy_text,
	'image' => setValue('image', $img_path . '_dummy/dummy.png'),
	'link' => setValue('link', $link_path, '詳しくみる'),
);


/*================
NEWS ページ
=================*/
$p_key = "news";
${$p_key . '_value'}  = array(
	'category'  => setTaxonmyArray($p_key . '_category', array(
		array('カテゴリー1', 'category1'),
		array('カテゴリー2', 'category2'),
		array('カテゴリー3', 'category3'),
	)),
	'tag'  => setTaxonmyArray($p_key . '_tag', array(
		array('タグ1', 'tag1'),
		array('タグ2', 'tag2'),
		array('タグ3', 'tag3'),
	)),
);
${$p_key . '_list'}  = array(
	array(
		'pankuzu' => array('home', $p_key),
		'title' => setValue('title', 'ブログの見出しが25文字程度で入ります。長めで2行くらいになりそうです。'),
		'link' => setValue('link', $link_path . '/' . $p_key . '/detail.php?id=0'),
		'lead' => $dummy_text,
		'date' => date('Y.m.d (D)'),
		'image' => setValue('image', $img_path . '_dummy/dummy.png', 'テスト画像'),
		'category' => array($news_value['category'][0]),
		'body' => $dummy_body
	)
);
${'page_' . $p_key}  = array(
	'pankuzu' => array('home'),
	'title' => setValue('title', $menu_list[$p_key]['title']['title'], $menu_list[$p_key]['title']['subtitle']),
	'child' => array($news_list[0]),
);

/*================
BLOG ページ
=================*/
$p_key = "blog";
${$p_key . '_value'}  = array(
	'category'  => setTaxonmyArray($p_key . '_category', array(
		array('カテゴリー1', 'category1'),
		array('カテゴリー2', 'category2'),
		array('カテゴリー3', 'category3'),
	)),
	'tag'  => setTaxonmyArray($p_key . '_tag', array(
		array('タグ1', 'tag1'),
		array('タグ2', 'tag2'),
		array('タグ3', 'tag3'),
	)),
);
${$p_key . '_list'}  = array(
	array(
		'pankuzu' => array('home', $p_key),
		'title' => setValue('title', 'ブログの見出しが25文字程度で入ります。長めで2行くらいになりそうです。'),
		'link' => setValue('link', $link_path . '/' . $p_key . '/detail.php?id=0'),
		'date' => date('Y.m.d (D)'),
		'category' => array(${$p_key . '_value'}['category'][1]),
		'tag' => array(${$p_key . '_value'}['tag'][0], ${$p_key . '_value'}['tag'][1], ${$p_key . '_value'}['tag'][2]),

		'image' => setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
		'lead' => $dummy_text,
		'thumbnail' => array(
			'image' => setValue('image', $img_path . '_dummy/dummy.png', '画像タイトル'),
			'text' => $dummy_text,
		),
		'body' => $dummy_body
	),
);
${'page_' . $p_key}  = array(
	'pankuzu' => array('home'),
	'title' => setValue('title', $menu_list['blog']['title']['title'], $menu_list['blog']['title']['subtitle']),
	'child' => array(${$p_key . '_list'}[0]),
);
// メニューにカテゴリを追加する場合
$menu_list[$p_key]['children'] = array(
	'type' => 'taxonomy',
	'list' => ${$p_key . '_value'}['category']
);


/*================
FAQ ページ
=================*/
$p_key = "faq";
${'page_' . $p_key} = array(
	'pankuzu' => array('home'),
	'title' => setValue('title', 'FAQ', 'よくあるご質問', $dummy_text),
	'faq' => array(
		array(
			'dt' => 'このサービスは誰でも使えるものですか？',
			'dd' => 'これは正式な文章の代わりに入れて使うダミーテキストです。ダミーテキストはダミー文書やダミー文章とも呼ばれることがあります。文章に特に深い意味はありません。ダミーテキストはダミー文書やダミー文章とも呼ばれることがあります。カタカナ語が苦手な方は「組見本」と呼ぶとよいでしょう。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。',
		),
	),
);


/*================
PRIVACY ページ
=================*/
$p_key = "privacy";
${'page_' . $p_key} = array(
	'pankuzu' => array('home'),
	'title' => setValue('title', 'Privacy Policy', '個人情報保護方針', $dummy_text),
	'body' => array(
		setValueInBody('text', array($client_name . '（以下「当社」）は、当社が提供するサービス（以下「本サービス」）における利用者の個人情報の取扱いについて、下記のとおり個人情報保護方針を定め、個人情報の保護に関する法律（以下｢個人情報保護法｣といいます。）その他の関係法令とともに、これを遵守します。')),
		setValueInBody('title', array('個人情報の利用目的'), 'h2'),
		setValueInBody('text', array('当社は、下記の目的のために必要な範囲内において、個人情報を利用いたします。')),
		setValueInBody('title', array('当社での利用'), 'h3'),
		setValueInBody('list', array(array(
			array(
				'text' => $dummy_text,
			),
			array(
				'text' => $dummy_text,
			),
			array(
				'text' => $dummy_text,
			),
		)), 'ul'),
		setValueInBody('title', array('第三者への提供(当社で利用される場合も含む)'), 'h3'),
		setValueInBody('list', array(array(
			array(
				'text' => '紛争や訴訟等へ対応する場合における、関係者や関係機関への情報の提出のため',
			),
			array(
				'text' => '関係法令等に基づく行政機関及び司法機関への情報の提出のため',
			),
		)), 'ul'),
		setValueInBody('title', array('委託先の管理'), 'h2'),
		setValueInBody('text', array('当社は、利用目的の実施に必要な範囲で、個人情報の取り扱いを外部に委託することがありますが、委託する場合には当社が個人情報を適切に取り扱うと認める委託先を選定します。また、当社は、委託先に対し、利用目的の実施に必要な範囲に限定して個人情報を提供し、契約等により個人情報の適切な取り扱いを求め、その状況について定期的に確認します。')),
		setValueInBody('title', array('匿名情報の取扱'), 'h2'),
		setValueInBody('text', array('当社の本サービスを利用した際に、利用者に関する匿名情報(IPアドレス、機能の利用状況、利用時間等の情報)がWebサーバに自動的に記録されます。この情報は以下の目的に利用されます。')),
		setValueInBody('list', array(array(
			array(
				'text' => 'サーバで発生した問題の原因を解明し、それを解決するため',
			),
			array(
				'text' => '不正アクセスの有無を監視するため',
			),
			array(
				'text' => '本サービスの改善及び開発のため',
			),
		)), 'ul'),
		setValueInBody('text', array('利用者が当社に個人を特定できるような情報を提供しない限り、当社が匿名情報のみを使用して利用者個人を特定することはできません。')),
		setValueInBody('title', array('個人情報の第三者への提供'), 'h2'),
		setValueInBody('text', array('当社は、「2 個人情報の利用目的」で規定された範囲内で第三者への提供を行うことがありますが、その他の場合は、次に掲げる場合を除き、利用者の事前の同意を得ないで、個人情報を第三者に提供しません。')),
		setValueInBody(
			'list',
			array(array(
				array(
					'text' => '法令に基づく場合',
				),
				array(
					'text' => '人の生命、身体または財産の保護のために必要がある場合であって、利用者の同意を得ることが困難である場合',
				),
				array(
					'text' => '公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合であって、利用者の同意を得ることが困難である場合',
				),
				array(
					'text' => '国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって、利用者の同意を得ることによってその事務の遂行に支障を及ぼすおそれがあると当社が判断した場合',
				),
				array(
					'text' => '当社が利用目的の達成に必要な範囲内において個人情報の取扱いの全部または一部を委託する場合',
				),
				array(
					'text' => '裁判所、検察庁、警察、弁護士会またはこれらに準じた権限を有する機関から、利用者の個人情報についての開示を求められた場合',
				),
			)),
			'ul'
		),
		setValueInBody('text', array('利用者が当社に個人を特定できるような情報を提供しない限り、当社が匿名情報のみを使用して利用者個人を特定することはできません。')),
		setValueInBody('title', array('個人情報保護方針の変更要求'), 'h2'),
		setValueInBody('text', array('当社は、利用者の個人情報の取扱いに関する運用状況を適宜見直し、継続的な改善に努めるものとし、その必要に応じて、本個人情報保護方針を変更することがあります。変更した場合は、当ウェブサイトに掲載いたします。')),
		setValueInBody('title', array('個人情報の取扱いに関するご意見、お問い合わせ、苦情等の窓口'), 'h2'),
		setValueInBody('text', array('当社の個人情報の取扱いに関するご意見、お問い合わせ、苦情等につきましては、下記の窓口までご連絡ください。直接ご来社いただいてのお申し出は受けかねますので、その旨ご了承賜りますようお願い申し上げます。')),
	),
	'contact' => array(
		'text' => $client_name . ' 広報担当<br><a class="p-link" href="mailto:' . $email . '"><span>' . $email . '</span></a>'
	),
);


/*================
CONTACT ページ
=================*/
$p_key = "contact";
${'page_' . $p_key} = array(
	'pankuzu' => array('home'),
	'title' => setValue('title', 'CONTACT', 'お問い合わせ', 'ドロネーではWEB・ホームページ・LPの制作を承っております。<br class="show_pctb">ご依頼・ご相談がありましたらお気軽に下記フォーム、<br class="show_tb">または<a href="mailto:hello@delaunay.jp" class="tdu">メール</a>までご連絡ください。<br class="show_pctb">ドロネーでの制作の流れは<a href="' . $link_path . '/about#Flow" class="tdu">こちら</a>から確認いただけます。'),
	'form' => array(
		// type : radio,checkbox,select,text,textarea,date,num,tel,email,repeat,group
		setValue('form', 'radio', 'your-radio', 'カテゴリ', false, array('inputlist' => array(
			"doc" => "資料請求",
			"contact" => "お問い合わせ",
		),)),
		setValue('form', 'select', 'your-select', 'セレクトボックス', true, array('inputlist' => array(
			"doc" => "資料請求",
			"contact" => "お問い合わせ",
		),)),
		setValue('form', 'text', 'your-name', '氏名', true, array(
			'placeholder' => '例）山田 太郎',
			'error' => '必須項目です',
		)),
		setValue('form', 'text', 'your-company', '会社名', true, array(
			'placeholder' => '例）株式会社client',
		)),
		setValue('form', 'email', 'your-email', 'メールアドレス', true, array(
			'placeholder' => '例）info@client.com',
		)),
		setValue('form', 'text', 'your-tel', '電話番号', true, array(
			'placeholder' => '例）0364413614',
		)),
		setValue('form', 'date', 'your-date', '日付', true, array(
			'placeholder' => '例) 2021年11月30日',
		)),
		setValue('form', 'zip', 'your-zip', '郵便番号', true, array(
			'placeholder' => '例)100-0001',
		)),
		setValue('form', 'add', 'your-add', '住所', true, array(
			'placeholder' => '住所の続きを入力してください',
			"class" => "w12",
		)),
		setValue('form', 'textarea', 'your-message', 'お問合せ内容', true, array(
			"class" => "vat",
			'cap' => array('資料請求や見学についてのご要望、その他お問い合せなど自由にご記入ください。'),
		)),
	),
	'thanks' => array(
		'title' => 'このたびは、お問合せいただき、誠にありがとうございました。',
		'text' => 'お送りいただきました内容を確認の上、担当者より折り返しご連絡させていただきます。<br>また、ご記入いただきましたメールアドレスへ、自動返信の確認メールを送付しています。<br>自動返信メールが届かない場合、入力いただいたメールアドレスに誤りがあった可能性がございます。<br>メールアドレスをご確認の上、もう一度フォームよりお問合せ頂きますようお願い申し上げます。',
		'link' => array()
	),
);









/*================
業務委託契約の書類
=================*/
// $contract = array(
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '委託者' . $client_name . 'さま（以下「甲」という。）と受託者 DELAUNAY（以下「乙」という。）は、WEBサイト制作に関する以下に示す業務の委託につき契約を締結する。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '契約の目的',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '甲は、乙に対し第２条に記した業務について委託し、乙がこの業務の遂行を引受けることをその目的とする。甲及び乙は、委託業務の遂行には、甲乙双方の共同作業及び分担作業が必要とされることを認識し、互いの役割に応じて誠実に実施するとともに、相手方に対して誠意を持って協力する。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '委託業務の内容',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '乙が甲に提供する業務は次の通りとする。但し、第3条に定める仕様書において本契約と異なる事項を定めた場合は、その部分について仕様書を優先する。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '甲より提示された仕様に従い、甲から提供されるテキスト原稿、画像等のデータと、乙の提供する HTML によるデザイン・レイアウトデータ、および画像データ、スクリプト等と組み合わせて、ホームページを制作すること。'
// 			),
// 			array(
// 				'text' => '上記1により制作したホームページの内容を、甲からの指示に基づき更新すること。'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '※ただし、上記のうち、見積書に記載されていない内容については委託の範囲外とする。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '委託業務の遂行方法',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '甲は、乙に対し、個別の業務委託(以下「制作業務」という)につき、電子メールまたはチャットにて送信し、乙が甲に対し、当該の内容を確認の後、承諾した旨を内容とする電子メールまたはチャットを送信し、甲がこれを受信したとき、「制作業務」は成立する。なお、甲の通知から5営業日以上経過後、乙が甲に回答を送信しなかった場合、甲は乙に電話等で状況を確認する。'
// 			),
// 			array(
// 				'text' => '前項の「制作業務」においては、以下の各号の取引条件(以下「取引条件」という)を、乙は甲に電子メールまたはチャットにて通知する。<br>1.具体的受託作業内容（範囲、仕様等）<br>2.作業期間又は納期<br>3.委託料を明示した見積書<br>4.その他個別業務遂行に必要な事項'
// 			),
// 			array(
// 				'text' => '乙は、「制作業務」終了後、完成したホームページを甲に仮公開する。仮公開するホームページの URL は、別途乙から甲に通知する。。'
// 			),
// 			array(
// 				'text' => '甲は、仮公開から「取引条件」に定める期間内に、ホームページの仕様書との不一致、不具合、バグ等がないか検査を行わなければならない。 '
// 			),
// 			array(
// 				'text' => '検査の結果問題がなければ、甲は乙に文書又は電子メールまたはチャットで納品完了の通知をするものとする。ただし、「取引条件」に定める期限を過ぎた場合には、自動的に納品完了とする。'
// 			),
// 			array(
// 				'text' => '４項の理由で期間内に、甲から乙に対して修正の要求がある場合は、電子メールまたはチャットにてこれを乙に通知するものとする。乙は、当該文書を受領後速やかに修正の作業を行い、再度仮公開を行う。その後の取扱いは、４、５ 項に準ずるも のとする。 '
// 			),
// 			array(
// 				'text' => '前項で甲の責に帰すべき事由によるホームページのデザイン等の修正及び変更が発生した場合は、その変更作業にかかる乙の費用は甲に請求できるものとし、甲はその費用を支払わねばならない。この場合甲乙双方で改めて納期と公開時期について別途定めるものとする。'
// 			),
// 			array(
// 				'text' => '納品完了後、甲から乙に対し特段の申し出がなければ、乙はホームページを正式公開する。'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '契約期間',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '本契約の有効期間は、本契約締結の日から1年とする。ただし、期間満了の日から3か月前までに甲乙いずれからも何ら申し出のない場合は、同一条件をもってさらに1年延長されるものとし、以後も同様とする。<br>甲は乙の「制作業務」に協力するものとする。但し、甲の責により、ホームページに掲載する文章や画像等の提出が遅延する等乙の作業に支障が出た場合は、乙は納期とその遅延に関し一切の責任を負わないものとする。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '委託料及び支払方法',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '甲は乙に対し、「制作業務」の対価として「取引条件」内の見積書で定める委託料を乙に支払うものとし、 甲は納品完了後乙の請求に基づき「取引条件」内の見積書で定められた期限内に支払うものとする。'
// 			),
// 			array(
// 				'text' => '料金の支払は、毎月末締め切り翌月末支払とし、甲は乙が指定した銀行口座に振り込んで支払うものとする。振込手数料は甲の負担とする。ただし、乙が見積書に て料金の支払い条件を別途明示している場合は、見積書の記載を優先する。'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '再委託',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '乙は，本業務を第三者に再委託してはならない。ただし，乙が書面による甲の承諾を得たときは，この限りでない。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '非保証',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '甲は、乙が次に定める事項につき、明示・黙示を問わず、一切の保証を行わないことにつき合意する。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => 'ホームページ経由で売上が発生すること、問合せがくること及びそれらが増減すること'
// 			),
// 			array(
// 				'text' => 'ホームページのアクセス数及びアクセス応答時間が増減すること'
// 			),
// 			array(
// 				'text' => 'ホームページが検索エンジンの検索結果上位に表示されること'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '免責',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '乙は、次の各号につき一切の責任を負わないものとすることに甲は合意する。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '甲が自ら編集を行ったことによる不具合、故意・過失によるデータ等の毀損'
// 			),
// 			array(
// 				'text' => '甲が乙に提供した画像データ及びコンテンツ公開による、第三者から訴えの提起'
// 			),
// 			array(
// 				'text' => 'ホームページに対して来る閲覧者からのクレーム '
// 			),
// 			array(
// 				'text' => '甲がホームページ上に掲載する商品及びサービスの適法性'
// 			),
// 			array(
// 				'text' => 'ホームページを運営するために必要な特定商取引法表示及びプライバシー・ポリシー等の法律表記の適法性'
// 			),
// 			array(
// 				'text' => 'サーバ運営会社と及びそのメンテナンス等の理由により、一時的にホームページが閲覧できない状態になること'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '知的財産の帰属',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '本契約に基づき乙が自ら作成し、又は有償で第三者に制作させ、もしくは第三者から導入し又は購入したHTML データ、および画像データ、プログラム等一切の制作物（以下「成果物」という）に関する知的財産権は、乙に留保されるものとする。 また制作途中で乙が作成・提示したもので、成果物として採用されなかった制作物の知的財産権は乙に帰属する。'
// 			),
// 			array(
// 				'text' => '甲が提供した仕様書、テキスト原稿、写真等に関する知的財産権は甲に帰属する。'
// 			),
// 			array(
// 				'text' => '乙は、甲又は甲の顧客が当該ドメイン（URL）のみで成果物を無償で利用することを許諾するものとし、乙の文書による同意なしに甲はこれら成果物とその改変・複製・使用権等を自らも及び第三者に譲渡、移転も行うことはできない。 '
// 			),
// 			array(
// 				'text' => '乙は、制作物を自らが制作したものであると公開することができる。'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '瑕疵および損害賠償',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '乙は処理成果物の納品後、当該成果物に仕様書との不一致が発見された場合、甲は乙に対して瑕疵の修正を請求することができる。当該瑕疵が甲の責に帰すべきものである場合を除き、乙は無償で補修を行う。'
// 			),
// 			array(
// 				'text' => '乙が瑕疵修正責任を負うのは、納品完了後１年以内に甲から請求された場合に限るものとする。'
// 			),
// 			array(
// 				'text' => '前項で瑕疵が甲の提供した資料等又は甲の与えた指示等、甲の責任によって生じたときには乙は免責される。 '
// 			),
// 			array(
// 				'text' => '乙但し当該瑕疵の原因が、本制作物に対して乙以外の者による造作・工作がなされたことによる場合にはこの限りではない。'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '禁止事項',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '甲及び乙は、以下に該当する行為をしないことを承諾するものとする。なお、いずれか一方が　 下記に反した行為を行った場合、あるいは下記に反する行為を行う恐れがあると相手方が判断した 場合、相手方は、相当な期間を定めて催告の上、本契約を解除することができる。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '相手方または第三者の著作権その他の知的財産権を侵害または侵害するおそれのある行為。'
// 			),
// 			array(
// 				'text' => '相手方または第三者を誹謗中傷し、または名誉を傷つけるような行為。'
// 			),
// 			array(
// 				'text' => '相手方または第三者の財産、プライバシーを侵害し、または侵害するおそれのある行為。'
// 			),
// 			array(
// 				'text' => '公序良俗に反する内容の情報、文書および図形等を他人に公開する行為'
// 			),
// 			array(
// 				'text' => '法令に違反するもの、または違反するおそれのある行為。'
// 			),
// 			array(
// 				'text' => 'その他相手方が不適切と判断する行為。'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '秘密情報の取り扱い',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '甲及び乙は、委託業務の遂行に伴い相手方より提供を受け又は知り得た技術上、営業上、又はその他の業務上の情報（甲の顧客に関する情報を含み媒体を問わないもの、以下「秘密情報」という。）を、事前に相手方から書面による承諾を受けることなく第三者に開示又は漏洩してはならない。ただし、次の各号の何れか一つに該当する情報についてはこの限りでない。<br>1.相手方から提供を受けたとき、既に公知であった情報 <br>2.相手方から提供を受けた後、公知となった情報<br>3.秘密保持義務を負うことなく、既に保有している情報 <br>1.'
// 			),
// 			array(
// 				'text' => '秘密情報の提供を受けた甲又は乙は、当該秘密情報の管理に必要な措置を講ずるものとする。'
// 			),
// 			array(
// 				'text' => '甲及び乙は、相手方より提供を受けた秘密情報を本契約の目的の範囲内でのみ使用するものとし、当該秘密情報の複製又は改変が必要なときには、事前に相手方から書面による承諾を受けるものとする。'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '契約の解除',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '甲および乙は本契約期間中であっても、3か月前の予告期間をもって本契約を解約することができるものとする。'
// 			),
// 			array(
// 				'text' => '前項に基づく解約については、甲および乙は相手方に対しその事業に損害が生じないよう配慮するものとする。'
// 			),
// 			array(
// 				'text' => '甲は乙の「制作業務」完了前に中途解約をすることができる。この場合、乙は甲にそれまでの作業にかかった、又は既に再委託先に依頼した作業にかかる費用を含め請求することができるものとし、甲は乙が請求する費用を直ちに支払わなければならない。'
// 			),
// 			array(
// 				'text' => '甲及び乙は、相手方に次の各号のいずれか一つに該当する事由が生じたときは、相手方に通知することなく本契約を直ちに解除することができる。<br>1.差押え、仮差押え、仮処分、租税滞納処分、その他公権力の処分を受け、又は会社更生手続及び 民事再生手続の 開始、破産もしくは競売を申し立てられ、又は自ら会社更生手続、民事再生手続の開始もしくは破産申立てをしたとき 又は第三者からこれらの申立てがなされたとき<br>2.資本減少、営業の廃止もしくは変更、又は解散の決議をしたとき<br>3.公租公課の滞納処分を受けたとき<br>4.その他前各号に準ずる信用の悪化と認められる事実が発生したとき'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '不可抗力',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '本契約上の義務を、以下に定める不可抗力に起因して遅滞もしくは不履行となったときは、甲乙双方本契約の違反とせず、 その責を負わないものとする。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'ol',
// 		'li' => array(
// 			array(
// 				'text' => '自然災害（地震等）、伝染病、戦争及び内乱、テロ、火災及び爆発、ストライキ及び労働争議'
// 			),
// 			array(
// 				'text' => '政府機関による法改正で、本契約に重大な影響を与えると認められるもの'
// 			),
// 			array(
// 				'text' => 'その他前各号に準ずる非常事態'
// 			),
// 		)
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '合意管轄',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '本契約の準拠法は、日本法とする。 本契約につき訴訟の必要が生じた場合には、乙の所在地を管轄する裁判所を第一審の合意管轄裁判所とすることに甲及び乙は合意する。',
// 	),
// 	array(
// 		'acf_fc_layout' => 'title',
// 		'h' => 'h2',
// 		'text' => '協議',
// 	),
// 	array(
// 		'acf_fc_layout' => 'text',
// 		'text' => '本契約に定めのない事項および本契約各条項の解釈に疑義が生じた場合は、甲乙互いに信義・誠実の原則に従い、協議・決定するものとする。<br><br>以上、甲乙間に契約が成立したので、本契約書を2通作成し、甲乙各1通を保有するものとする。<br><br>' . date('Y年m月d日'),
// 	),
// );
