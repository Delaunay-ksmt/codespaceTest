</main>
<?php $footer_class = "l-footer"; ?>
<footer class="<?php echo $footer_class; ?>">
	<a href="javascript:void(0);" class="js-totop__float"><span></span></a>
	<?php if (isset($this_page_value['pankuzu'])) {
		setHtmlPankuzu($this_page_value);
	} ?>
	<div class="<?php echo $footer_class; ?>__wrap">
		<div class="<?php echo $footer_class; ?>__inner">
			<div class="<?php echo $footer_class; ?>__head">
				<div class="<?php echo $footer_class; ?>__head__wrap">
					<div class="<?php echo $footer_class; ?>__col">
						<div class="p-info__w">
							<a href="<?php echo $link_path; ?>/" class="p-info__logo"><span class="p-svg__logo"><?php setHtmlSvg('logo'); ?><span><?php echo $site_title; ?></span></span></a>
							<p class="p-info__add">
								<?php echo $zip; ?><br>
								<?php echo $add; ?><br>
								<?php echo $buil; ?><br>
							</p>
							<p class="p-info__add">
								TEL : <?php setHtmlLink(array('url' => setHtmlTel($tel), 'title' => $tel, 'target' => ''), 'p-link__c1'); ?> / FAX : <?php setHtmlLink(array('url' => setHtmlTel($fax), 'title' => $fax, 'target' => ''), 'p-link__c1'); ?><br>
								営業時間 : 8:00 -17:00 / 定休日 : 土・日・祝
							</p>
						</div>
					</div>
					<div class="<?php echo $footer_class; ?>__col">
						<div class="p-info__w">
							<ul class="p-info__sns">
								<?php foreach ($snslist as $sns) : ?>
									<li>
										<a href="<?php echo $sns['link'] ?>" target="_blank" class="<?php echo $footer_class; ?>__sns__link">
											<?php setHtmlSvg($sns['icon']); ?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="<?php echo $footer_class; ?>__body">
				<div class="<?php echo $footer_class; ?>__body__wrap">
					<?php
					$footerCol = array(
						'footer1' => 'COMPANY',
						'footer2' => 'SERVICE',
						'footer3' => 'BLOG',
						'footer4' => 'INFO',
					);
					foreach ($footerCol as $footerkey => $footervalue) : ?>
						<div class="<?php echo $footer_class; ?>__col">
							<nav class="<?php echo $footer_class; ?>__nav">
								<p class="<?php echo $footer_class; ?>__col__ttl"><span> <?php echo $footervalue; ?></span></p>
								<ul class="<?php echo $footer_class; ?>__nav__ul">
									<?php foreach ($menu_list as $slug => $value) {
										setHtmlNavLink($slug, $value, $footerkey, $footer_class . '__nav', "");
									} ?>
								</ul>
							</nav>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="<?php echo $footer_class; ?>__foot">
				<div class="<?php echo $footer_class; ?>__foot__wrap">
					<div class="<?php echo $footer_class; ?>__col">
						<p class="<?php echo $footer_class; ?>__copyright"><span><?php echo $copyright; ?></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>

</footer>
</div>
<?php if (!isset($_GET["amp"])) : ?>
	<script src="https://cdn.jsdelivr.net/npm/viewport-extra@1.0.3/dist/viewport-extra.min.js"></script>
	<script>
		new ViewportExtra(375)
	</script>
	<!-- <script src="//maps.google.com/maps/api/js?key=<?php echo $map_api; ?>"></script> -->
	<script src="<?php echo $rocal_path; ?>/assets/js/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/css-vars-ponyfill@2"></script>
	<script>
		cssVars({
			rootElement: document
		});
	</script>
	<link async rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<script async type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<?php endif; ?>
