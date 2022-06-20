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
$page_class       = "s-body";
$page_title       = "";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
include($root_path . "/assets/inc/_l-head.php");
?>
<link async rel="stylesheet" href="<?php echo $rocal_path; ?>/assets/css/styleguide.css" media="screen,print">
<div id="CopySign"></div>
<?php
$colornum = 3;
$gcolornum = 7;
$iconnum = 7;
?>
<!-- TODO -->
<!-- SPNAV -->
<!-- FOOTER -->
<!-- modalの前・次がちゃんと動かない -->
<!-- SLIDEの前・次がちゃんと動かない -->
<!-- 各レスポンシブ -->
<!-- SNSシェア、アイコン追加。rss追加 -->
<!-- 追加レイアウト -->
<!-- WPに移植 -->
<!-- Vueに移植 -->
<?php include($root_path . "/template/nav.php"); ?>



<?php
$settitle = "HAMBERGER";
$secmodal = "modal_src_hbg";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<?php include($root_path . "/assets/inc/block/header_hamberger.php"); ?>
	</div>
</section>
<div class="b-modal__hide">
	<div class="js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<?php include($root_path . "/assets/inc/block/header_hamberger.php"); ?>]]></math></code></pre>
				<p><span>※ bodyに'is-nav_open'クラスをつけ外しで制御。モーダル内、aタグ以外をクリックで閉じる仕様になってます。</span></p>
			</div>
		</div>
	</div>
</div>


<?php
$settitle = "SLIDE";
$secmodal = "modal_src_slide";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<?php
		$SlideData = array(
			'interval' => 3000,
			'arrows' => true,
			'dots' => true
		);
		?>
		<div class="js-slide" data-slide='<?php echo json_encode($SlideData); ?>'>
			<ul class="js-slide_ul" style="width: 200px; height: 200px;">
				<li class="is-active">1</li>
				<li>2</li>
				<li>3</li>
			</ul>
		</div>
		<div class="js-slide" data-slide='<?php echo json_encode($SlideData); ?>'>
			<ul class="js-slide_ul" style="width: 200px; height: 200px;">
				<li class="is-active" data-thum="<?php echo $img_path; ?>_dummy/1.jpg" style="background-image:url(<?php echo $img_path; ?>_dummy/1.jpg)"></li>
				<li data-thum="<?php echo $img_path; ?>_dummy/2.jpg" style="background-image:url(<?php echo $img_path; ?>_dummy/2.jpg)"></li>
				<li data-thum="<?php echo $img_path; ?>_dummy/3.jpg" style="background-image:url(<?php echo $img_path; ?>_dummy/3.jpg)"></li>
			</ul>
		</div>
	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<div class="js-slide" data-slide='{"interval":3000,"arrows":true,"dots":true}'>
	<ul class="js-slide_ul">
		<li class="is-active">1</li>
		<li>2</li>
		<li>3</li>
	</ul>
</div>

<div class="js-slide" data-slide='{"interval":3000,"arrows":true,"dots":true}'>
	<ul class="js-slide_ul">
		<li class="is-active" data-thum="画像パス">1</li>
		<li data-thum="画像パス">2</li>
		<li data-thum="画像パス">3</li>
	</ul>
</div>]]></math></code></pre>
				<p><span>※ 矢印とぽちぽち、スライドのインターバルはdata属性で管理。</span></p>
			</div>
		</div>
	</div>
</div>


<?php
$settitle = "ACCORDION";
$secmodal = "modal_src_accordion";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn p-btn__s__c1" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<?php $accordion_class = "b-accordion"; ?>
		<div class="<?php echo $accordion_class; ?>">
			<div class="<?php echo $accordion_class; ?>_box">
				<div class="js-accordion_head <?php echo $accordion_class; ?>_head">HEAD</div>
				<div class="js-accordion_body <?php echo $accordion_class; ?>_body">BODY</div>
			</div>
			<div class="<?php echo $accordion_class; ?>_box">
				<div class="js-accordion_head <?php echo $accordion_class; ?>_head">HEAD</div>
				<div class="js-accordion_body <?php echo $accordion_class; ?>_body">BODY</div>
			</div>
			<div class="<?php echo $accordion_class; ?>_box">
				<div class="js-accordion_head <?php echo $accordion_class; ?>_head">HEAD</div>
				<div class="js-accordion_body <?php echo $accordion_class; ?>_body">BODY</div>
			</div>
		</div>

	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<div class="js-accordion_head <?php echo $accordion_class; ?>_head">HEAD</div>
<div class="js-accordion_body <?php echo $accordion_class; ?>_body">BODY</div>]]></math></code></pre>
				<p><span>※ '.b-accordion__head'のクラスをつけて、before要素などで矢印を装飾</span></p>
			</div>
		</div>
	</div>
</div>

<?php
$settitle = "MODAL";
$secmodal = "modal_src_modal";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>


		<a href="javascript:void(0);" class="js-modal__btn b-modal__btn test" data-modal="modal_test1">モーダル1</a>
		<a href="javascript:void(0);" class="js-modal__btn b-modal__btn test" data-modal="modal_test2">モーダル2</a>
		<div class="b-modal__hide">
			<div class="b-modal js-modal" data-modal="modal_test1">
				<div class="b-modal__wrap js-modal__wrap">
					<div class="b-modal__inner">
						モーダル1
					</div>
				</div>
			</div>
			<div class="b-modal js-modal" data-modal="modal_test2">
				<div class="b-modal__wrap js-modal__wrap" style="max-width: 500px;">
					<div class="b-modal__inner">
						<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
						<br>
						<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
						<br>
						<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
						<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
						<br>
						<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
							この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
					</div>
				</div>
			</div>


		</div>
	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>

				<p><span>モーダルボタン</span></p>
				<pre class="source"><code><math><![CDATA[// モーダルボタン
<a href="javascript:void(0);" class="js-modal__btn b-modal__btn test" data-modal="modal_test1">モーダル1</a>

// 共通パーツとコンテンツ（フッターに配置）
<div class="js-modal__window b-modal__window">
	<div class="js-modal__close b-modal__close base"></div>
</div>
<a class="js-modal__close b-modal__close top"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-close"></use></svg></a>
<a class="js-modal__close b-modal__close bottom"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-close"></use></svg><span class="txt">閉じる</span></a>

// 格納
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="modal_test1">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				中身
			</div>
		</div>
	</div>
</div>]]></math></code></pre>
				<p><span>※ モーダルのコンテンツ幅は各'.b-modal__wrap js-modal__wrap'にcssで指定する。'.b-modal__inner'がなくても機能する</span></p>
			</div>
		</div>
	</div>

</div>


<?php
$settitle = "MODAL SLIDE";
$secmodal = "modal_src_modal_slide";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="0">スライド1-0を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="1">スライド1-1を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="2">スライド1-2を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="3">スライド1-3を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="4">スライド1-4を開く</a>
		<br><br>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="0">スライド2-0を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="1">スライド2-1を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="2">スライド2-2を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="3">スライド2-3を開く</a>
		<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="4">スライド2-4を開く</a>
		<div class="b-modal__hide">
			<div class="b-modal js-modal" data-modal="modal_slide_01">
				<div class="b-modal__wrap js-modal__wrap" style="max-width: 500px;">
					<div class="b-modal__inner">
						<div class="b-modal__slide">
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド1-0<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド1-1<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド1-2<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド1-4<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド1-5<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
						</div>
					</div>
					<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr prev">
						<svg class="p-icon__stroke">
							<use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use>
						</svg>
					</a>
					<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr next">
						<svg class="p-icon__stroke">
							<use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use>
						</svg>
					</a>

				</div>
			</div>
			<div class="b-modal js-modal" data-modal="modal_slide_02">
				<div class="b-modal__wrap js-modal__wrap" style="max-width: 500px;">
					<div class="b-modal__inner">
						<div class="b-modal__slide">
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド2-0<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド2-1<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド2-2<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド2-4<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
							<div class="js-modal__slide__content b-modal__slide__content">
								<p>モーダルスライド2-5<br><br>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
								<br>
								<p>この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。
									この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。</p>
							</div>
						</div>
					</div>
					<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr prev">
						<svg class="p-icon__stroke">
							<use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use>
						</svg>
					</a>
					<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr next">
						<svg class="p-icon__stroke">
							<use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use>
						</svg>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[// モーダルボタン
<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="0">スライド1-0を開く</a>
<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="1">スライド1-1を開く</a>
<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_01" data-slide_num="2">スライド1-2を開く</a>

<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="0">スライド2-0を開く</a>
<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="1">スライド2-1を開く</a>
<a href="javascript:void(0);" class="js-modal__slide__btn test" data-modal="modal_slide_02" data-slide_num="2">スライド2-2を開く</a>

// 格納
<div class="b-modal__hide">

	<div class="b-modal js-modal" data-modal="modal_slide_01">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<div class="b-modal__slide">
					<div class="js-modal__slide__content b-modal__slide__content">スライド1-0の中身</div>
					<div class="js-modal__slide__content b-modal__slide__content">スライド1-1の中身</div>
					<div class="js-modal__slide__content b-modal__slide__content">スライド1-2の中身</div>
				</diV>
			</div>
			<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr prev"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use></svg></a>
			<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr next"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use></svg></a>
		</div>
	</div>

	<div class="b-modal js-modal" data-modal="modal_slide_02">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<div class="b-modal__slide">
					<div class="js-modal__slide__content b-modal__slide__content">スライド1-0の中身</div>
					<div class="js-modal__slide__content b-modal__slide__content">スライド1-1の中身</div>
					<div class="js-modal__slide__content b-modal__slide__content">スライド1-2の中身</div>
				</diV>
			</div>
			<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr prev"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use></svg></a>
			<a href="javascript:void(0);" class="b-modal__slide__arr js-modal__slide__arr next"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use></svg></a>
		</div>
	</div>

</div>

※ モーダルの共通パーツ必要。モーダルのコンテンツ幅は各'.b-modal__wrap js-modal__wrap'にcssで指定する。'data-slide_num'がある場合は値がindexになる。]]></math></code></pre>
			</div>
		</div>
	</div>
</div>



<?php
$settitle = "LAGYBGI";
$secmodal = "modal_src_lazybgi";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<div class="js-lazy_bgi" style="width: 100px; height: 100px; background-size: cover;display: inline-block;margin-right: 10px;" data-bgi="<?php echo $img_path; ?>_dummy/1.jpg"></div>
		<div class="js-lazy_bgi" style="width: 100px; height: 100px; background-size: cover;display: inline-block;margin-right: 10px;" data-bgi="<?php echo $img_path; ?>_dummy/2.jpg"></div>
		<div class="js-lazy_bgi" style="width: 100px; height: 100px; background-size: cover;display: inline-block;margin-right: 10px;" data-bgi="<?php echo $img_path; ?>_dummy/3.jpg"></div>

	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<div class="js-lazy_bgi" data-bgi="画像パス"></div>
]]></math></code></pre>
			</div>
		</div>
	</div>
</div>

<?php
$settitle = "SECTIONCHECK";
$secmodal = "modal_src_sectioncheck";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>

	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<
<ul>
	<li><a href="javascript:void(0);" class="js-sec_nav"></a></li>...
</ul>
]]></math></code></pre>
				<p>※ window4割位置でセクションに'.is-active'クラス付与。<br>
					※ '.js-sec_nav'クラスにも同様に'.is-active'クラス付与。</p>
			</div>
		</div>
	</div>
</div>

<?php
$settitle = "TOOGLE";
$secmodal = "modal_src_toggle";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<a href="javascript:void(0);" class="js-toggle test"></a>
	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<a href="javascript:void(0);" class="js-toggle"></a>
※ クリックで'is-active'クラスの付け外し。よくよく考えたらあまり使わない。テスト環境でのボタンの挙動確認用とかで使えるかも。]]></math></code></pre>
			</div>
		</div>
	</div>
</div>


<?php
$settitle = "ANCHOR";
$secmodal = "modal_src_anchor";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<a href="#JS-ANCHOR" class="js-toggle test"></a>
	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<a href="#TargetId"></a>
]]></math></code></pre>
			</div>
		</div>
	</div>
</div>

<?php
$settitle = "TOTOP";
$secmodal = "modal_src_totop";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<a href="javascript:void(0);" class="test js-totop js-totop"></a>
	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<a href="javascript:void(0);" class="js-totop"></a>
<a href="javascript:void(0);" class="js-totop float js-totop"></a>
※ 'float'クラスで追従。]]></math></code></pre>
			</div>
		</div>
	</div>
</div>


<?php
$settitle = "SLICK";
$secmodal = "modal_src_slick";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<?php
		$SlickData = array(
			'slidesToShow' => 3,
			'centerMode' => true,
			'centerPadding' => "12%",
			'arrows' => false,
			'dots' => false,
			'infinite' => true,
			'autoplay' => true,
			'pauseOnFocus' => false,
			'autoplaySpeed' => 3000,
			"responsive" => array(
				array(
					'breakpoint' => 1000,
					'settings' => array(
						"slidesToShow" => 2
					)
				),
				array(
					'breakpoint' => 600,
					'settings' => array(
						"slidesToShow" => 1
					)
				)
			)
		);
		?>
		<ul class="js-slick" data-slick='<?php echo json_encode($SlickData) ?>'>
			<li>
				<div class="js-lazy_bgi" style="width: 100%; height: 100px; background-size: cover;" data-bgi="<?php echo $img_path; ?>_dummy/1.jpg"></div>
			</li>
			<li>
				<div class="js-lazy_bgi" style="width: 100%; height: 100px; background-size: cover;" data-bgi="<?php echo $img_path; ?>_dummy/2.jpg"></div>
			</li>
			<li>
				<div class="js-lazy_bgi" style="width: 100%; height: 100px; background-size: cover;" data-bgi="<?php echo $img_path; ?>_dummy/3.jpg"></div>
			</li>
			<li>
				<div class="js-lazy_bgi" style="width: 100%; height: 100px; background-size: cover;" data-bgi="<?php echo $img_path; ?>_dummy/1.jpg"></div>
			</li>
			<li>
				<div class="js-lazy_bgi" style="width: 100%; height: 100px; background-size: cover;" data-bgi="<?php echo $img_path; ?>_dummy/2.jpg"></div>
			</li>
			<li>
				<div class="js-lazy_bgi" style="width: 100%; height: 100px; background-size: cover;" data-bgi="<?php echo $img_path; ?>_dummy/3.jpg"></div>
			</li>
		</ul>

	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[※ PHPでオプション管理
<？php
	$SlickData = array(
			'slidesToShow' => 3,
			'centerMode' => true,
			'centerPadding' => "12%",
			'arrows' => false,
			'dots' => false,
			'infinite' => true,
			'autoplay' => true,
			'pauseOnFocus' => false,
			'autoplaySpeed' => 3000,
			"responsive" => array(
				array(
					'breakpoint' => 1000,
					'settings' => array(
						"slidesToShow" => 2
					)
				),
				array(
					'breakpoint' => 600,
					'settings' => array(
						"slidesToShow" => 1
					)
				)
			)
		);
？>
<ul class="js-slick" data-slick='<？php echo  json_encode($SlickData) ？>'>
	<li></li>.....
</ul>
]]></math></code></pre>
				※ phpの？が全角になってるので小文字に書き換えて使ってください。カンマとクォーテーション間違うと壊れます。
			</div>
		</div>
	</div>
</div>




<?php
$settitle = "MASONRY";
$secmodal = "modal_src_masonry";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<?php
		$MasonryData = array(
			'pc' => 4,
			'tb' => 3,
			'sp' => 2
		);
		?>
		<ul class="js-masonry b-masonry" data-masonry='<?php echo json_encode($MasonryData) ?>'>
			<?php for ($i = 1; $i <= 15; $i++) : ?>
				<li><img src="https://placehold.jp/<?php echo rand(100, 200) ?>x<?php echo rand(100, 200) ?>.png" alt=""></li>
			<?php endfor; ?>
		</ul>
	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<ul class="js-masonry b-masonry">
	<li></li>...
</div>
※ 全体のワイドはリストからパッディング分を逆マージンでレイアウト]]></math></code></pre>
			</div>
		</div>
	</div>
</div>

<?php
$settitle = "Googlemap";
$secmodal = "modal_src_ map";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<div class="js-map" data-lat="35.640523" data-lng="139.685171" data-pin="<?php echo $img_path; ?>common/pin.svg">
			<div class="js-map_area"></div>
		</div>

	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<div class="js-map" data-lat="35.640523" data-lng="139.685171" data-pin="ピンのパス">
	<div class="js-map_area"></div>
</div>
※ サイズはcssで設定。]]></math></code></pre>
			</div>
		</div>
	</div>
</div>


<?php
$settitle = "Youtube";
$secmodal = "modal_src_youtube";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<div class="js-xxxx">
			xxxx
		</div>

	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<div class="js-xxxx">
	xxxx
</div>
※ 注意書き]]></math></code></pre>
			</div>
		</div>
	</div>
</div>


<?php
$settitle = "Scroll Action";
$secmodal = "modal_src_sa";
?>
<section>
	<div class="section__wrap sg_wrap" id="JS-<?php echo $settitle; ?>">
		<div class="sg-ttl">
			<span><?php echo $settitle; ?></span><br>
			<a href="javascript:void(0);" class="js-modal__btn b-modal__btn" data-modal="<?php echo $secmodal; ?>"><span>VIEW CODE</span></a>
		</div>
		<ul class="test_list">
			<li>
				<div class="js-sa d-sa__op"></div>
			</li>
			<li>
				<div class="js-sa d-sa__op d-sa__delay"></div>
			</li>
			<li>
				<div class="js-sa d-sa__up"></div>
			</li>
			<li>
				<div class="js-sa d-sa__up d-sa__delay"></div>
			</li>
			<li>
				<div class="js-sa d-sa__scale"></div>
			</li>
			<li>
				<div class="js-sa d-sa__scale d-sa__delay"></div>
			</li>
		</ul>
		<br><br>
		<ul class="js-sa d-sa__list_op test_list">
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
		</ul>
		<br><br>
		<ul class="js-sa d-sa__list_up test_list">
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
			<li>
				<div></div>
			</li>
		</ul>
		<br><br>
		<a href="javascript:void(0);" class="js-toggle sa_guide_btn test"></a>

	</div>
</section>
<div class="b-modal__hide">
	<div class="b-modal js-modal" data-modal="<?php echo $secmodal; ?>">
		<div class="b-modal__wrap js-modal__wrap">
			<div class="b-modal__inner">
				<p><span><?php echo $settitle; ?></span></p>
				<pre class="source"><code><math><![CDATA[<div class="js-sa"></div>
<div class="js-sa d-sa__op"></div>
<div class="js-sa d-sa__up"></div>
<div class="js-sa d-sa__scale"></div>

<ul class="js-sa d-sa__list_op">
	<li></li>...
</ul>

<ul class="js-sa d-sa__list_up">
	<li></li>...
</ul>

※ '.js-sa'クラスにはトリガーにしてスタイルをつけない。'.d-sa__delay'クラスで遅延]]></math></code></pre>
			</div>
		</div>
	</div>
</div>



<!-- TITLE -->
<!-- <section>
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>TITLE</span></div>

	</div>
</section> -->





<!-- PHOTOGALLERY -->
<!-- <section class="sg" id="JS-PHOTOGALLERY">
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>PHOTO GALLERY</span>
		</div>
		<div class="b-modal__window_pg">
			<div class="pg_wrap">
				<div class="pg_inner">
					<div class="pg_img">
						<a href="javascript:void(0);" class="pg_modal_close top">
							<svg class="p-icon__stroke">
								<use xlink:href="<?php echo $icon_path; ?>stroke-close"></use>
							</svg>
						</a>
						<a href="javascript:void(0);" class="pg_modal_arr prev">
							<svg class="p-icon__stroke">
								<use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use>
							</svg>
						</a>
						<a href="javascript:void(0);" class="pg_modal_arr next">
							<svg class="p-icon__stroke">
								<use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use>
							</svg>
						</a>
					</div>
					<p class="pg_txt"></p>
				</div>
			</div>
		</div>

		<ul class="p-photo_gallery">
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/1.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/1.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/tate.jpg" data-txt="">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/tate.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/3.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/3.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/1.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/1.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/tate.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/tate.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/3.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/3.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/1.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/1.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/tate.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/tate.jpg"></span>
				</a>
			</li>
			<li>
				<a href="javascript:void(0);" class="gallery_pic" data-src="<?php echo $img_path; ?>_dummy/3.jpg" data-txt="この文章はダミーです。<br>文字の大きさ、量、字間、行間等を確認するために入れています。">
					<span class="js-lazy_bgi" data-bgi="<?php echo $img_path; ?>_dummy/3.jpg"></span>
				</a>
			</li>
		</ul>
		<pre class="source"><code><math><![CDATA[// 共通パーツ（フッターに配置）
<div class="b-modal__window_pg">
	<div class="pg_wrap">
		<div class="pg_inner">
			<div class="pg_img">
				<a href="javascript:void(0);" class="pg_modal_close top"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-close"></use></svg></a>
				<a href="javascript:void(0);" class="pg_modal_arr prev"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use></svg></a>
				<a href="javascript:void(0);" class="pg_modal_arr next"><svg class="p-icon__stroke"><use xlink:href="<?php echo $icon_path; ?>stroke-arr"></use></svg></a>
			</div>
			<p class="pg_txt"></p>
		</div>
	</div>
</div>

// サムネイル
<ul class="p-photo_gallery">
	<li>
		<a href="javascript:void(0);" class="gallery_pic" data-src="画像パス" data-txt="テキスト">
			<span class="js-lazy_bgi" data-bgi="画像パス"></span>
		</a>
	</li>.....
</ul>

※ '.pg-modal_btn'内のspanは影響しないので、画像でもOK。]]></math></code></pre>
	</div>
</section> -->


<!-- PARALLAX -->
<!-- <section class="sg" id="JS-PARALLAX">
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>PARALLAX</span>
		</div>
		<ul class="test_list">
			<li>
				<div class="pa" data-name="xxxx"></div>
			</li>
		</ul>
		<br><br>
		<a href="javascript:void(0);" class="js-toggle sa_guide_btn guide2 test"></a>
		<pre class="source"><code><math><![CDATA[<div class="pa" data-name="xxxx"></div>

※ '.pa'クラスにはトリガーにしてスタイルをつけない。スクロール制御負荷が多めなので多様しない。
　 JS内、ParallaxFunc.Style()にdata-name属性で指定して制御。]]></math></code></pre>
	</div>
</section> -->




<?php include($root_path . "/assets/inc/_l-foot.php"); ?>
<script type="text/javascript">
	$('.d-sa__guide_btn').on("click", function() {
		if ($(this).hasClass('guide2')) {
			$('body').toggleClass("is-guide2");
		} else {
			$('body').toggleClass("is-guide");
		}

	});
	$(".font-family").each(function() {
		var txt = $(this).css("font-family").split(",")[0];
		txt = txt.replace(/"/g, '');
		$(this).html("[ " + txt + " ]")
	})
	var php = "";
	php += "<";
	php += "?php echo $rocal_path";
	php += ";";
	php += " ?>";

	$(".copy_html").on("click", function() {
		// if(execCopy($(this).html())){
		//   alert('コピーできました');
		// } else {
		//   alert('このブラウザでは対応していません');
		// }
		var copyFrom = document.createElement("textarea");
		var copytarget = $(this);
		// var copyhtml = copytarget.html();
		var copyhtml = copytarget.prop("outerHTML");
		copyhtml = copyhtml.replace(/ class="copy_html"+/g, "");
		copyhtml = copyhtml.replace(/ copy_html +/g, "");
		copyhtml = copyhtml.replace(/ copy_html+/g, "");
		copyhtml = copyhtml.replace(/copy_html +/g, "");
		copyhtml = copyhtml.replace("/assets/", php + "/assets/");
		copyhtml = copyhtml.replace(/\t+/g, "");
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
	$(".copy_html").on('mousemove', function(event) {
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
</script>

</body>

</html>
