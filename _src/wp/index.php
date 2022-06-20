<?php

// 共通変数はfunction.phpに設定
if (have_posts()) :
	while (have_posts()) :
		the_post();
		$page_class       = "";
		$page_title       = "";
		$page_description = "";
		$page_ogimage     = "";
		$page_type        = "website"; // or blog
		$page_value_name = 'page_top';
		include('header.php');
?>



<?php endwhile;
endif;  ?>
<?php include('footer.php'); ?>
