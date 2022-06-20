<?php $class = "b-contact" ?>
<section class="<?php echo $class; ?>">
	<div class="section__wrap">
		<?php setHtmlTitle($this_page_value['title'], 'b-title__page', 'h1'); ?>
		<div class="<?php echo $class; ?>__wrap">
			<script src="//yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
			<?php if ($wpflg) : ?>
				<?php echo do_shortcode('[mwform_formkey key="' . $this_page_value['form'] . '"]'); ?>
			<?php else : ?>
				<?php
				$contact_opt = $this_page_value['form'];
				?>
				<?php if ($form_type == "thanks") : ?>
					<div class="mw_wp_form mw_wp_form_complete">
						<div class="p-form">
							<div class="<?php echo $class; ?>__thanks">
								<p class="<?php echo $class; ?>__thanks__ttl"><?php echo $this_page_value['thanks']['title']; ?></p>
								<p class="<?php echo $class; ?>__thanks__txt"><?php echo $this_page_value['thanks']['text']; ?></p>
								<div class="<?php echo $class; ?>__thanks__btnwrap"><a href="/" class="<?php echo $class; ?>__thanks__btn"><span>Back to Top</span></a></div>
							</div>
						</div>
					</div>
				<?php else : ?>
					<form method="post" action="" class="">
						<div class="<?php echo $class; ?>__wrap h-adr">
							<?php setHtmlFormDl($contact_opt, $form_type); ?>
							<div class="<?php echo $class; ?>__check">
								<p><a href="<?php echo $link_path; ?>/privacy"><span>個人情報保護方針</span></a>に同意の上送信をしてください。</p>
							</div>
							<div class="<?php echo $class; ?>__btn__wrap">
								<div class="<?php echo $class; ?>__btn__r">
									<input type="submit" name="submitConfirm" class="<?php echo $class; ?>__btn__r" value="戻る">
								</div>
								<div class="<?php echo $class; ?>__btn">
									<input type="submit" name="submitConfirm" value="同意の上確認画面へ進む" class="">
								</div>
							</div>
						</div>
					</form>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
