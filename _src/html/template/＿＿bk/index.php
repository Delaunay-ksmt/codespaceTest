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

<?php include($root_path . "/template/nav.php"); ?>
<section>
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>Color</span></div>
		<div class="sg-color--gra"></div>
		<ul class="sg-color">
			<?php for ($i = 1; $i <= $colornum; $i++) : ?>
				<li>
					<div class="main c<?php echo $i; ?>1"><span>color(<?php echo $i; ?>)</span></div>
					<dl>
						<dd class="dark c<?php echo $i; ?>0"><span>color(<?php echo $i; ?>,'d')</span></dd>
						<dd class="light c<?php echo $i; ?>2"><span>color(<?php echo $i; ?>,'l')</span></dd>
					</dl>
				</li>
			<?php endfor; ?>
		</ul>
		<ul class="sg-color">
			<?php for ($i = 1; $i < $gcolornum; $i++) : ?>
				<li>
					<div class="main g<?php echo $i; ?>"><span>color(<?php echo $i; ?>,'g')</span></div>
				</li>
			<?php endfor; ?>
		</ul>
	</div>
</section>
<section>
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>Text</span></div>
		<?php $langs = ['jp', 'en'];
		$dummytxt = array(
			'jp' => "これは正式な文章の代わりに入れて使うダミーテキストです。なお、組見本の「組」とは文字組のことです。活字印刷時代の用語だったと思います。",
			'en' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
		); ?>
		<div class="sg-font">
			<?php
			foreach ($langs as $lang) :
			?>
				<div class="<?php echo $lang; ?>">
					<p class="p-txt--1"><span>[h1]<?php echo $dummytxt; ?></span></p>
					<p class="p-txt--2"><span>[h2]<?php echo $dummytxt; ?></span></p>
					<p class="p-txt--3"><span>[h3]<?php echo $dummytxt; ?></span></p>
					<p class="p-txt--4"><span>[h4]<?php echo $dummytxt; ?></span></p>
					<p class="p-txt--5"><span>[h5]<?php echo $dummytxt; ?></span></p>
					<p class="p-txt--p"><span>[p]<?php echo $dummytxt; ?></span></p>
					<p class="p-txt--cap"><span><?php echo $dummytxt; ?></span></p>
				</div>
			<?php endforeach; ?>
		</div><br><br>
		<a href="#" class="p-link__c1"><span>テキストリンクです。サイズは外枠に付随します</span></a>
		<ul class="p-cap">
			<li>キャプションが入ります。</li>
			<li>キャプションが入ります。</li>
			<li>キャプションが入ります。</li>
			<li>キャプションが入ります。</li>
		</ul>
	</div>
</section>
<section>
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>Button</span></div>
		<div class="sg-subttl"><span>色別</span></div>
		<div class="sg-button">
			<ul class="color">
				<?php for ($i = 1; $i <= $colornum; $i++) : ?>
					<li>
						<a href="javascript:void(0);" class="copy_html p-btn__m__c<?php echo $i; ?>"><span>Button</span></a>
						<a href="javascript:void(0);" class="copy_html p-btn__m__c<?php echo $i; ?>r"><span>Button</span></a>
					</li>
				<?php endfor; ?>
			</ul>
			<ul class="color">
				<?php for ($i = 1; $i <= $gcolornum; $i++) : ?>
					<li>
						<a href="javascript:void(0);" class="copy_html p-btn__m__g<?php echo $i; ?>"><span>Button</span></a>
						<a href="javascript:void(0);" class="copy_html p-btn__m__g<?php echo $i; ?>r"><span>Button</span></a>
					</li>
				<?php endfor; ?>
			</ul>
		</div>
		<br><br>
		<div class="sg-subttl"><span>サイズ/type別</span></div>
		<div class="sg-button">
			<ul class="size">
				<li>
					<a href="javascript:void(0);" class="copy_html p-btn__l__c1"><span>Button</span></a>
					<div class="copy_html p-btn__l__c1">
						<input type="submit" value="Button">
					</div>
					<button class="copy_html p-btn__l__c1"><span>Button</span></button>
				</li>
				<li>
					<a href="javascript:void(0);" class="copy_html p-btn__m__c1"><span>Button</span></a>
					<div class="copy_html p-btn__m__c1">
						<input type="submit" value="Button">
					</div>
					<button class="copy_html p-btn__m__c1"><span>Button</span></button>
				</li>
				<li>
					<a href="javascript:void(0);" class="copy_html p-btn__s__c1"><span>Button</span></a>
					<div class="copy_html p-btn__s__c1">
						<input type="submit" value="Button">
					</div>
					<button class="copy_html p-btn__s__c1"><span>Button</span></button>
				</li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>icon</span></div>
		<?php
		$xml = $root_path . "/assets/img/icon/sprite.svg"; //ファイルを指定
		$xmlData = simplexml_load_file($xml);
		?>
		<div class="sg-subttl"><span>[ FILL ]</span></div>
		<ul class="sg-icon">
			<?php foreach ($xmlData as $icon) : ?>
				<?php if (strpos($icon['id'], "stroke") === false && strpos($icon['id'], "arr") === false && strpos($icon['id'], "sns") === false) : ?>
					<li>
						<span class="copy_html">
							<?php set_svg($icon['id']); ?>
							<span><?php echo $icon['id']; ?></span>
						</span>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<br>
		<div class="sg-subttl"><span>[ STROKE ]</span></div>
		<ul class="sg-icon">
			<?php foreach ($xmlData as $icon) :
				$class = (strpos($icon['id'], "stroke") !== false) ? ' stroke' : '';
			?>
				<?php if (strpos($icon['id'], "stroke") !== false) : ?>
					<li>
						<span class="copy_html">
							<?php set_svg($icon['id']); ?>
							<span><?php echo $icon['id']; ?></span>
						</span>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>

		<div class="sg-subttl"><span>[ SNS ]</span></div>
		<ul class="sg-icon">
			<?php foreach ($xmlData as $icon) : ?>
				<?php if (strpos($icon['id'], "sns") !== false) : ?>
					<li>
						<span class="copy_html">
							<?php set_svg($icon['id']); ?>
							<span><?php echo $icon['id']; ?></span>
						</span>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
		<br>
		<div class="sg-subttl"><span>[ TICK ]</span></div>
		<ul class="sg-icon">
			<?php foreach ($xmlData as $icon) :
				$class = (strpos($icon['id'], "stroke") !== false) ? ' stroke' : '';
			?>
				<?php if (strpos($icon['id'], "arr") !== false) : ?>
					<li>
						<span class="copy_html">
							<?php set_svg($icon['id']); ?>
							<span><?php echo $icon['id']; ?></span>
						</span>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>


	</div>
</section>
<section>
	<div class="section__wrap sg_wrap">
		<div class="sg-ttl"><span>form</span></div>
		<form action="" class="">
			<div class="sg-form">
				<input class="p-input" type="text" name="" placeholder="山田 太郎"><br><br>
				<div class="p-input__wrap">
					<input class="p-input" type="tel" name="" placeholder="03">
					<p>-</p>
					<input class="p-input" type="tel" name="" placeholder="0000">
					<p>-</p>
					<input class="p-input" type="tel" name="" placeholder="0000">
				</div><br>
				<input class="p-input" type="email" name="your-email" placeholder="例）info@client.com" data-conv-half-alphanumeric="true"><br><br>
				<input class="p-input" type="text" name="your-zip" placeholder="100-0001" data-conv-half-alphanumeric="true" class="w12"><br><br>
				<div class="p-select">
					<select name="title">
						<option disabled value="" selected>選択してください</option>
						<option value="オプション1"> オプション1</option>
						<option value="オプション2"> オプション2</option>
						<option value="オプション3"> オプション3</option>
						<option value="オプション4"> オプション4</option>
					</select>
				</div><br>
				<div class="p-radio">
					<span>
						<label>
							<input type="radio" name="category" value="資料請求" checked="checked" class="">
							<span>資料請求</span>
						</label>
					</span>
					<span>
						<label>
							<input type="radio" name="category" value="お問い合わせ">
							<span>お問い合わせ</span>
						</label>
					</span>
				</div><br>
				<div class="p-checkbox">
					<label class="">
						<input type="checkbox" name="category" value="資料請求" checked="checked" class="">
						<span>資料請求</span>
					</label>
					<label class="">
						<input type="checkbox" name="category" value="お問い合わせ" class="">
						<span>お問い合わせ</span>
					</label>
				</div><br>
				<textarea class="p-textarea" name=" your-message" cols="30" rows="10"></textarea><br><br>
				<div class="sg-subttl"><span>OK系</span></div>
				<input type="text" name="" placeholder="山田 太郎" class="p-input p-input__ok"><br><br>
				<div class="sg-subttl"><span>NG系</span></div>
				<input type="text" name="" placeholder="山田 太郎" class="p-input p-input__ng"><br><br>
				<div class="sg-subttl"><span>アテンション系</span></div>
				<input type="text" name="" placeholder="山田 太郎" class="p-input sg-nomb">
				<p class="p-input__error"><span>エラーがあります</span></p>
			</div>
		</form>
	</div>
</section>


</body>

</html>
