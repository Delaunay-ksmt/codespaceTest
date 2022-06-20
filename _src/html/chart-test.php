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
?>
<?php include($root_path . "/assets/inc/_l-header.php"); ?>

<section class="b-top__link">
	<div class="section_wrap">
		<div>
			<?php
			$chartCommonSetting = array(
				'type' => 'bar',
				'options' => array(
					'layout' => array(
						'padding' => array('top' => 60, 'bottom' => 30, 'left' => 60, 'right' => 60,),
					),
					'plugins' => array(
						'title' => array(
							'display' => true,
							'text' => '売上高',
							'padding' => array('bottom' => 30),
							'font' => array(
								'size' => 18,
								'family' => 'Noto Sans JP',
								'weight' => '700',
							),
						),
						'legend' => array(
							'position' => 'bottom',
							'labels' => array(
								'boxWidth' => 18,
								'boxHeight' => 18,
								'padding' => 30,
								'font' => array(
									'size' => 11,
									'family' => 'Noto Sans JP',
									'weight' => '700',
								)
							),
							'title' => array()
						),
					),
					'scales' => array(
						'x' => array(
							// 'type' => 'time',
							// 'ticks' => array(
							// 'maxTicksLimit' => 5,
							// )
							'ticks' => array(
								'display' => true,
								'padding' => 3,
								'font' => array(
									'size' => 11,
									'family' => 'Noto Sans JP',
									'weight' => '600',
								),
							),
							'grid' => array(
								'display' => false,
								'color' => ''
							)
						),
						'y' => array(
							'ticks' => array(
								'display' => true,
								'padding' => 3,
								'font' => array(
									'size' => 11,
									'family' => 'Noto Sans JP',
									'weight' => '600',
								),
							),
							'title' => array(
								'display' => true,
								'padding' => 20,
								'font' => array(
									'size' => 11,
									'family' => 'Noto Sans JP',
									'weight' => '600',
								),
							)
						)
					),
				),
			);
			?>
			<div>
				<?php
				$config = $chartCommonSetting;
				$config['options']['scales']['y']['title']['text'] = '売上高 (百万円)';
				$config['data'] = array(
					'labels' => array(
						'33期 2017/3',
						'34期 2018/3',
						'35期 2019/3',
						'36期 2020/3',
						'37期 2021/3',
						'38期 2022/3',
					),
					'datasets' => array(
						array(
							'label' => 'アールビバン単体',
							'backgroundColor' => 'rgb(255, 99, 132)',
							'borderColor' => 'rgb(255, 99, 132)',
							'data' => array(4254, 4474, 4909, 5340, 5099, 6000),
						),
						array(
							'label' => 'アールビバン連結',
							'backgroundColor' => 'rgb(99,255,  132)',
							'borderColor' => 'rgb(99,255,132)',
							'data' => array(6607, 7180, 8168, 8770, 7886, 8000),
						)
					)
				);
				?>
				<canvas class="irChart" data-chart='<?php echo json_encode($config); ?>'></canvas>
			</div>
			<div>
				<?php
				$config = $chartCommonSetting;
				$config['options']['scales']['y']['title']['text'] = '売上高 (百万円)';
				$config['data'] = array(
					'labels' => array(
						'33期 2017/3',
						'34期 2018/3',
						'35期 2019/3',
						'36期 2020/3',
						'37期 2021/3',
						'38期 2022/3',
					),
					'datasets' => array(
						array(
							'label' => 'アールビバン単体',
							'backgroundColor' => 'rgb(255, 99, 132)',
							'borderColor' => 'rgb(255, 99, 132)',
							'data' => array(4254, 4474, 4909, 5340, 5099, 6000),
						),
						array(
							'label' => 'アールビバン連結',
							'backgroundColor' => 'rgb(99,255,  132)',
							'borderColor' => 'rgb(99,255,132)',
							'data' => array(6607, 7180, 8168, 8770, 7886, 8000),
						)
					)
				);
				?>
				<canvas class="irChart" data-chart='<?php echo json_encode($config); ?>'></canvas>
			</div>
		</div>
	</div>
</section>
<?php include($root_path . "/assets/inc/_l-foot.php"); ?>
<script>
	var canvas = document.getElementsByClassName('irChart');
	Object.keys(canvas).forEach(function(_t) {
		let chart = canvas[_t].getContext('2d');
		let config = JSON.parse(canvas[_t].dataset.chart);
		const myChart = new Chart(
			chart,
			config
		);
	});
</script>
</body>

</html>
