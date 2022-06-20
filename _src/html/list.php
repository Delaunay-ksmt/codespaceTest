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
$page_class       = "";
$page_title       = "";
$page_description = "";
$page_type        = "website"; // or blog
$page_ogimage     = "";
include($root_path . "/assets/inc/_l-head.php");
$this_page_value = $page_value;
$pankuzu = $this_page_value['pankuzu'];
?>
<!-- <link rel="stylesheet" href="個別で読み込むCSS"> -->
<?php include($root_path . "/assets/inc/_l-header.php"); ?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<section>
	<div class="section__wrap">
		<div class="">
			<?php
			$sitemaps = dirToArray('./');
			function dirToArray($dir)
			{
				$result = array();
				$sitemap = "<ul></ul>";
				$cdir = scandir($dir, 1);
				foreach ($cdir as $key => $value) {
					if (!in_array($value, array(".", ".."))) {
						if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
							if ($value  != "assets") {
								$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
							}
						} else {
							if ($value  != ".DS_Store") {
								$result[] = $value;
							}
						}
					}
				}
				$sitemap .= "</ul>";
				return $result;
			}
			function sitemapHtml($sitemaps, $rocal_path, $dir)
			{
				$sitemap = "<div>";
				foreach ($sitemaps as $key => $value) {
					if (is_array($value)) {
						// $thisdir = $dir;
						$thisdir = $dir . '/' . $key;
						$sitemap .= '<a href="' . $rocal_path  . $thisdir . '/'  . '"><span>' . $key . '</span></a>';
						$sitemap .= sitemapHtml($value, $rocal_path,	$thisdir);
					} else {
						$thisdir = $dir;
						if ($value != "index.php") {
							$sitemap .= '<a href="' . $rocal_path . $thisdir . '/' . $value . '"><span>' . $value . '</span></a>';
						}
					}
				}
				$sitemap .= "</div>";
				return $sitemap;
			}
			?>
			aaaaatest
			<div class="sitemap">
				<a href="<?php echo $rocal_path; ?>/"><span>TOP</span></a>
				<?php echo  sitemapHtml($sitemaps, $rocal_path, ""); ?>
			</div>
			aaatesttestst
			aaatesttestst
			aaatesttestst
		</div>
	</div>
</section>
<div class="container">
	<div class="bg"></div>
	<div class="bg c01"></div>
	<div class="bg c02"></div>
	<div class="bg c03"></div>
	<div class="bg c04"></div>
	<div class="bg c05"></div>
</div>

<?php include($root_path . "/assets/inc/_l-foot.php"); ?>
</body>

</html>
