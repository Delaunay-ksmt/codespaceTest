<?php $class = "b-privacy" ?>
<section class="<?php echo $class; ?>">
	<div class="section__wrap">
		<?php setHtmlTitle($this_page_value['title'], 'b-title__page', 'h1'); ?>
		<div class="<?php echo $class; ?>__wrap">
			<?php setHtmlBody($this_page_value['body'], $class); ?>
			<dl class="<?php echo $class; ?>__contact">
				<dt><span>お問い合わせ先</span></dt>
				<dd><?php echo $this_page_value['contact']['text'] ?></dd>
			</dl>
		</div>
	</div>
</section>
