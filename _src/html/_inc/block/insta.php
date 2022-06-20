<?php
/* User ID, Token */
$instagramUserID = 00000000;
$instagramToken  = '';

/* Get API ( Require HTTPS ) JSON Convert */
$instagramApiURI    = 'https://api.instagram.com/v1/users/'.$instagramUserID.'/media/recent?access_token='.$instagramToken.'&count=12';

$instagramDates = json_decode(file_get_contents($instagramApiURI));
if( $instagramDates != null):
?>
<section class="photobase__instagram">
	<h3 class="photobase__instagram__title">
		INSTAGRAM
		<span>インスタグラム</span>

		<a class="pc" href="https://www.instagram.com/photobase_official/" target="_blank">
			インスタグラムを見る
			<img src="<?php echo $rocal_path; ?>/dist/images/common/arrow_blue.svg" alt="instagram">
		</a>
	</h3>
	<div class="photobase__instagram__images">
		<?php
		$instanum = 1;
		foreach ((array) $instagramDates->data as $instagramData):
		?>
		<div><a href="<?php echo $instagramData->link;?>" target="_blank"><img src="<?php echo $instagramData->images->standard_resolution->url; ?>" alt="<?php echo str_replace(PHP_EOL, '', $instagramData->caption->text); ?>"></a></div>
		<?php
			$instanum++;
			 endforeach;
		?>
	</div>
</section>
<?php endif;?>