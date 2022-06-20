<?php
/* ------------------------------------------------
 MW WP Form Getを有効
------------------------------------------------ */
$form_id = 92;
add_filter('mwform_value_mw-wp-form-' . $form_id, 'my_mwform_value', 10, 2);
function my_mwform_value($value, $name)
{
	$form_slugs = array(
		'id'
	);
	foreach ($form_slugs as  $form_slug) {
		if ($name === $form_slug && !empty($_GET[$form_slug]) && !is_array($_GET[$form_slug])) {
			return $_GET[$form_slug];
		}
	}
	return $value;
}

/* ------------------------------------------------
フォームを設定する
------------------------------------------------ */
function my_mwform_post_content($content, $Data)
{
	global $page_contact, $link_path;
	$class = "b-contact";
	$content = '<div class="' . $class . '__wrap h-adr">';
	$content .= setHtmlFormDl($page_contact['form'], 'wpform');
	$content .= '<div class="' . $class . '__check"><p><a href="' . $link_path . '/privacy"><span>個人情報保護方針</span></a>に同意の上送信をしてください。</p></div><div class="' . $class . '__btn__wrap"><div class="' . $class . '__btn__r">[mwform_backButton value="戻る"  class="' . $class . '__btn__r"]</div><div class="' . $class . '__btn">[mwform_submitButton name="submit" confirm_value="同意の上確認画面へ進む" submit_value="送信する"]</div></div>';
	$content .=	'</div>';
	// $content = '[mwform_text name="your-name" placeholder="例）山田 太郎" class="p-input " ]';
	return $content;
}
add_filter('mwform_post_content_mw-wp-form-' . $form_id, 'my_mwform_post_content', 10, 2);


/* ------------------------------------------------
完了ページの設定
------------------------------------------------ */
function my_mwform_complete_content($content, $Data)
{
	$content = '<div class="b-contact__thanks lazyloaded"><p class="b-contact__thanks__ttl">このたびは、お問合せいただき、誠にありがとうございました。</p><p class="b-contact__thanks__txt">お送りいただきました内容を確認の上、担当者より折り返しご連絡させていただきます。<br>また、ご記入いただきましたメールアドレスへ、自動返信の確認メールを送付しています。<br>自動返信メールが届かない場合、入力いただいたメールアドレスに誤りがあった可能性がございます。<br>メールアドレスをご確認の上、もう一度フォームよりお問合せ頂きますようお願い申し上げます。</p><div class="b-contact__thanks__btnwrap"><a href="/" class="b-contact__thanks__btn"><span>Back to Top</span></a></div></div>';
	return $content;
}
add_filter('mwform_complete_content_mw-wp-form-' . $form_id, 'my_mwform_complete_content', 10, 2);


/* ------------------------------------------------
バリデーションを設定する
[TODO]　バリデーション　うまく動いてない
------------------------------------------------ */

function my_validation_rule($Validation, $data)
{
	global $page_contact;
	foreach ($page_contact['form'] as $value) {
		if ($value['req'] == true) {
			$Validation->set_rule($value['name'], 'required', array('message' => $value['label'] . 'は必ずご記入ください。'));
		}
		if ($value['name'] == "email") {
			$Validation->set_rule($value['name'], 'mail', array('message' => 'メールアドレスの形式でご記入ください。'));
		}
		if ($value['name'] == "tel") {
			$Validation->set_rule($value['name'], 'tel', array('message' => '電話番号の形式でご記入ください。'));
		}
	}
	return $Validation;
}
add_filter('mwform_validation_mw-wp-form-' . $forim_id, 'my_validation_rule', 10, 3);


/* ------------------------------------------------
フォームの値を動的に変更する
------------------------------------------------ */
function contact_form_my_radio($children, $atts)
{
	// if ($atts['name'] === 'syuka_date' || $atts['name'] === 'kit_date') {
	// 	$children = [];
	// 	for ($i = 1; $i < 15; $i++) {
	// 		$day = date("Y年m月d日 (D)", strtotime('+' . $i . ' day'));
	// 		$children[$i] = $day;
	// 	}
	// }
	// if ($atts['name'] === 'syuka_time' || $atts['name'] === 'kit_time') {
	// 	$children = ['午前中', '14:00-16:00', '16:00-18:00', '18:00-20:00', '19:00-21:00'];
	// }
	return $children;
}
add_filter('mwform_choices_mw-wp-form-' . $form_id, 'contact_form_my_radio', 10, 2);



/* ------------------------------------------------
ユーザーに返すメールの設定
------------------------------------------------ */
function entry_user($Mail_raw, $values, $Data)
{
	global $page_contact;
	global $client_name, $zip, $add,  $email;
	$Mail_raw->from = $email;
	$Mail_raw->subject = 'WEBにお問い合わせがありました';
	$Mail_raw->body = $Data->get('your-name') . '様' . PHP_EOL . PHP_EOL;
	$Mail_raw->body .= 'この度は、私共にお問い合わせいただき誠にありがとうございます。' . PHP_EOL . '下記の内容でお問合せを受付ました。3営業日以内に担当者より追ってご連絡させていただきますので、少々お待ちくださいませ。' . PHP_EOL . PHP_EOL;
	$Mail_raw->body .= '===========================' . PHP_EOL;
	foreach ($page_contact['form'] as $key => $value) {
		# code...
		$Mail_raw->body .= '◆' . $value['label'] . PHP_EOL . $Data->get($value['name']);
		if ($value['name'] == "your-name") {
			$Mail_raw->body .= '様';
		}
		$Mail_raw->body .= PHP_EOL . PHP_EOL;
	}
	$Mail_raw->body .= '===========================' . PHP_EOL . PHP_EOL;
	$Mail_raw->body .= '本メールは、自動送信メールとなっており配信専用です。' . PHP_EOL;
	$Mail_raw->body .= 'このメッセージに返信いただくことはできません。' . PHP_EOL . PHP_EOL;
	$Mail_raw->body .=  $client_name . PHP_EOL;
	$Mail_raw->body .= '〒' . $zip . $add . PHP_EOL;
	return $Mail_raw;
}
add_filter('mwform_auto_mail_raw_mw-wp-form-' . $form_id, 'entry_user', 10, 3);


/* ------------------------------------------------
管理者に返すメールの設定
------------------------------------------------ */
function my_mail($Mail_raw, $values, $Data)
{
	global $email, $page_contact;
	$Mail_raw->from = $email; // 送信元を変更
	// $Mail->to = 'hoge@example.jp'; // 送信先を変更
	// $Mail->sender = 'hoge'; // 送信者を変更
	$Mail_raw->subject = 'WEBにお問い合わせがありました'; // 件名を変更
	$Mail_raw->body = 'ご担当者様' . PHP_EOL . PHP_EOL;
	$Mail_raw->body .= 'WEBサイトに問い合わせがありましたので、3営業日以内にご対応をお願いいたします。' . PHP_EOL . PHP_EOL;
	$Mail_raw->body .= '===========================' . PHP_EOL;
	foreach ($page_contact['form'] as $key => $value) {
		$Mail_raw->body .= '◆' . $value['label'] . PHP_EOL . $Data->get($value['name']);
		if ($value['name'] == "your-name") {
			$Mail_raw->body .= '様';
		}
		$Mail_raw->body .= PHP_EOL . PHP_EOL;
	}
	$Mail_raw->body .= '===========================' . PHP_EOL;
	// $Mail->send(); で送信もできます。
	return $Mail_raw;
}
add_filter('mwform_admin_mail_mw-wp-form-' . $form_id, 'my_mail', 10, 3);
