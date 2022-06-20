<?php
function setHtmlImage($body, $class = "", $type = "image", $size = "medium")
{
	$img_src = $body['sizes'][$size];
	$img_title = $body['title']; ?>
	<?php if ($type == "bgimg") : ?>
		<div class="<?php echo $class; ?>"><span class="js-lazy_bgi" data-bgi="<?php echo $img_src ?>"></span></div>
	<?php else : ?>
		<figure class="<?php echo $class; ?>">
			<img src="<?php echo $img_src; ?>" alt="<?php echo $img_title; ?>">
			<span><?php echo $img_title; ?></span>
		</figure>
	<?php endif; ?>
<?php }

function setHtmlText($body, $class = "")
{ ?>
	<p class="<?php echo $class; ?>"><span><?php echo $body; ?></span></p>
<?php }

function setHtmlTitle($body, $class = "", $attr = "h1")
{ ?>
	<div class="<?php echo $class; ?>">
		<<?php echo $attr; ?> class="<?php echo $class . '__titlewrap'; ?>">
			<?php $title = (is_array($body)) ? $body['title'] : $body; ?>
			<span class="<?php echo $class; ?>__title"><?php echo $title; ?></span>
			<?php if (!empty($body['subtitle'])) : ?>
				<span class="<?php echo $class; ?>__subtitle"><?php echo $body['subtitle']; ?></span>
			<?php endif; ?>
		</<?php echo $attr; ?>>
		<?php if (!empty($body['lead'])) : ?>
			<p class="<?php echo $class; ?>__lead"><span><?php echo $body['lead']; ?></span></p>
		<?php endif; ?>
		<?php if (!empty($body['text'])) : ?>
			<p class="<?php echo $class; ?>__text"><span><?php echo $body['text']; ?></span></p>
		<?php endif; ?>
	</div>
<?php }

function setHtmlLink($body, $class = "", $attr = "")
{
	global $parts_image;
	$modal = (!empty($attr['modal'])) ? 'data-modal="' . $attr['modal'] . '"' : "";
	$class = (!empty($attr['modal'])) ? $class . ' js-modal__btn' : $class;
	$icon_after = (!empty($attr['icon']) && !empty($attr['svg_after']) && $attr['svg_after']) ? true : false;
	$icon_before = (!empty($attr['icon']) && !$icon_after) ? true : false;
	$link_title = addslashes($body['title']);
	$link_target = $body['target'] ? $body['target'] : '_self'; ?>
	<a href="<?php echo $body['url']; ?>" class="<?php echo $class; ?>" target="<?php echo $link_target; ?>" <?php echo $modal; ?>>
		<?php if ($icon_before) {
			setHtmlSvg($attr['icon']);
		} ?>
		<?php if (!empty($attr['image'])) : ?>
			<?php setHtmlImage($attr['image'], 'p-img__r33', 'bgimg'); ?>
		<?php else : ?>
			<?php if (!empty($link_title)) : ?>
				<span><?php echo $link_title ?></span>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ($icon_after) {
			setHtmlSvg($attr['icon']);
		} ?>
	</a>
<?php }

function setHtmlList($body, $class = "", $tag = "ul")
{
	$tag_start = '<' . $tag . ' class="' . $class . '__' . $tag . '">';
	$tag_end = '</' . $tag . '>';
?>
	<div class="<?php echo $class; ?>">
		<?php echo $tag_start; ?>
		<?php foreach ($body as $li) : ?>
			<li class="<?php echo $class . '__li'; ?>">
				<?php if (isset($li['text'])) : ?>
					<p class="<?php echo $class . '__text'; ?>"><span><?php echo $li['text']; ?></span></p>
				<?php elseif (isset($li['body'])) : ?>
					<?php setHtmlBody($li['body'], $class . '__li'); ?>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
		<?php echo $tag_end; ?>
	</div>
<?php }

function setHtmlDl($body, $class = "", $accordion = false)
{
	$js_dt = ($accordion) ? 'js-accordion_head' : '';
	$js_dd = ($accordion) ? 'js-accordion_body' : ''; ?>
	<div class="<?php echo $class; ?>">
		<?php foreach ($body as $dl) { ?>
			<dl class="<?php echo $class . '__dl'; ?>">
				<dt class="<?php echo $class . '__dt ' . $js_dt; ?>"><span><?php echo $dl['dt']; ?></span></dt>
				<dd class="<?php echo $class . '__dd ' . $js_dd; ?>">
					<?php if (isset($dl['body'])) : ?>
						<?php setHtmlBody($dl['body'], $class . '__dd'); ?>
					<?php else : ?>
						<span><?php echo $dl['dd']; ?></span>
					<?php endif; ?>
				</dd>
			</dl>
		<?php } ?>
	</div>
<?php }


function setHtmlTable($body, $class = "")
{ ?>
	<div class="<?php echo $class; ?>">
		<table>
			<?php if (!empty($body['header'])) : ?>
				<thead>
					<tr>
						<?php foreach ($body['header'] as $th) : ?>
							<th><span><?php echo $th['c']; ?></span></th>
						<?php endforeach; ?>
					</tr>
				</thead>
			<?php endif; ?>
			<tbody>
				<?php foreach ($body['body'] as $tr) : ?>
					<tr>
						<?php foreach ($tr as $td) : ?>
							<td><span><?php echo $td['c'] ?></span></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
<?php
}

function setHtmlImagetext($body, $class = "")
{ ?>
	<div class="<?php echo $class; ?>">
		<?php
		foreach ($body as $value) :
			$r = ($value['text']['r']) ? 'r' : '';
		?>
			<div class="<?php echo $class . '__box ' . $r; ?>">
				<?php setHtmlImage($value['image'], $class . "__image", "bgimg"); ?>
				<div class="<?php echo $class; ?>__textwrap">
					<p class="<?php echo $class; ?>__title"><span><?php echo $value['text']['title']; ?></span></p>
					<p class="<?php echo $class; ?>__text"><span><?php echo $value['text']['text']; ?></span></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php
}

function setHtmlProfile($body, $class = "")
{ ?>
	<div class="<?php echo $class; ?>">
		<?php setHtmlImage($body['image'], $class . "__image", "bgimg"); ?>
		<div class="<?php echo $class; ?>__textwrap">
			<p class="<?php echo $class; ?>__name"><span><?php echo $body['text']['name']; ?></span></p>
			<p class="<?php echo $class; ?>__title"><span><?php echo $body['text']['title']; ?></span></p>
			<p class="<?php echo $class; ?>__text"><span><?php echo $body['text']['detail']; ?></span></p>
		</div>
	</div>
<?php
}

function setHtmlInterview($body, $class = "")
{ ?>
	<div class="<?php echo $class; ?>">
		<ul class="<?php echo $class; ?>__ul">
			<?php foreach ($body as $interview) :
				$liclass = ($interview['r']) ? "r" : "";
			?>
				<li class="<?php echo $class; ?>__li <?php echo $liclass; ?>">
					<div class="<?php echo $class; ?>__left">
						<?php setHtmlImage($interview['image']['image'], $class . "__image", "bgimg"); ?>
						<p class="<?php echo $class; ?>__name"><span><?php echo $interview['image']['name'] ?></span></p>
					</div>
					<div class="<?php echo $class; ?>__textwrap">
						<p class="<?php echo $class; ?>__text"><span><?php echo $interview['text'] ?></span></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php
}
function setHtmlYoutube($body, $class = "")
{ ?>
	<div class="<?php echo $class; ?>">
		<iframe class="" width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $body; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
<?php }

function setHtmlMap($body, $class = "")
{
?>
	<div class="<?php echo $class; ?>">
		<div class="js-map" data-lat="<?php echo $body['lat']; ?>" data-lng="<?php echo $body['lng']; ?>" data-pin="<?php echo $body['pin']['url']; ?>">
			<div class="js-map_area"></div>
		</div>
	</div>
<?php }

function setHtmlGallery($body, $class = "", $type = "slide", $SlickData = "")
{
	global $parts_image;
	$js_class = ($type == "slide") ? 'js-slick' : "";
	$SlickData = (!empty($SlickData)) ? $SlickData : array(
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
	); ?>
	<div class="<?php echo $class . ' ' . $type; ?>">
		<ul class="<?php echo $class . '__ul ' . $js_class; ?>" data-slick='<?php echo json_encode($SlickData) ?>'>
			<?php foreach ($body as $image) : ?>
				<li class="<?php echo $class; ?>__li">
					<?php setHtmlImage($image, $class . '__image', 'bgimg'); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php
}

function setHtmlVideo($body, $class = "")
{ ?>
	<div class="<?php echo $class; ?> p-video">
		<div class="p-video__wrap">
			<div class="p-video__inner">
				<video class="p-video__player" playsinline="" autoplay="" muted="" loop="" data-src="<?php echo $body['video']; ?>" poster="<?php echo $body['image']['sizes']['large']; ?>">
					<source type="video/mp4" src="<?php echo $body['video']; ?>">
				</video>
			</div>
		</div>
	</div>
<?php
}

function setHtmlBlockquote($body, $class = "")
{ ?>
	<blockquote class="<?php echo $class; ?>">
		<?php setHtmlBody($body, $class); ?>
	</blockquote>
<?php
}

function setHtmlBody($array, $class, $setting = array())
{

	$class = $class . '__body';
	echo '<div class="' . $class . '">';
	// var_dump($array);
	foreach ($array as $body) {
		$type = $body['acf_fc_layout'];
		$thisclass = $class . '__' . $type;
		echo '<div class="' . $thisclass . '__wrap ' . $class . '__box">';
		// var_dump($body);
		// var_dump($type);
		global ${'parts_' . $type};
		if ($type == 'textarea') {
			$type  = 'text';
		}
		$func = 'setHtml' . ucfirst($type);
		$attr = array();
		if ($type == 'title') :
			$attr = $body['h'];
			$thisclass = $thisclass . '__' . $body['h'];
		elseif ($type == 'image') :
			$attr = $body['type'];
			$thisclass = $thisclass . ' ' . $body['type'];
		elseif ($type == 'video') :
			$body[$type] = (!isset($body[$type][$type])) ? $body : $body[$type];
		elseif ($type == 'map') :
			$body[$type] = (!isset($body[$type])) ? $body : $body[$type];
		elseif ($type == 'gallery') :
			$attr = $body['type'];
		elseif ($type == 'link') :
			$thisclass = $thisclass . ' ' . $body['type'];
			$attr = array('type' => $body['type'], 'icon' => $body['icon'], 'svg_after' => $body['svg_after'], 'modal' => $body['modal']);
		elseif ($type == 'list' || $type == 'list-body' || $type == 'cap') :
			$func = 'setHtmlList';
			$attr = ($type == "cap") ? 'ul' : $body['type'];
			$thisclass = str_replace("-body", "", $thisclass);
		elseif ($type == 'dl' || $type == 'dl-body' || $type == 'faq') :
			$func = 'setHtmlDl';
			$thisclass = str_replace("-body", "", $thisclass);
			$attr = ($type == "faq") ? true : '';
		elseif ($type == 'blockquote') :
		endif;
		$func($body[$type], $thisclass, $attr);
		echo '</div>';
	}
	echo '</div>';
}

function setHtmlForm($forminput, $wptype)
{
	$form_opts = array('type', 'name', 'cap', 'placeholder', 'inputlist', 'count');
	foreach ($form_opts as $form_opt) {
		${$form_opt} = (isset($forminput[$form_opt])) ? $forminput[$form_opt] : "";
	}
	// この書き方に変更したい
	$attr = "";
	$attr = (!empty($type)) ? $attr . ' type="' . $type . '"' : "";
	$attr = (!empty($name)) ? $attr . ' name="' . $name . '"' : "";
	$attr = (!empty($placeholder)) ? $attr . ' placeholder="' . $placeholder . '"' : "";
	$attr = (!empty($id)) ? $attr . ' id="' . $id . '"' : "";
	$attr = (!empty($count)) ? $attr . ' data-count="' . $count . '"' : "";


	$countclass = ($count != "") ? "countform" : "";
	$datacount = ($count != "") ? 'data-count="' . $count . '"' : ""; ?>
	<?php if ($wptype == "wpform") :
		if ($type == "img") :
			return '<div class="dnd"><div class="dragarea"><div class="inner"><p class="">ここにファイルをドロップ<br>または</p><label for="' . $name . '" class="clickarea">[mwform_image name="' . $name . '" id="' . $name . '" class="dndfileinput"]<span>ファイルを選択</span></label><div class="remove"></div></div></div>';
		elseif ($type == "file") :
			return '<div class="file"><label for="' . $name . '">[mwform_' . $type . ' name="' . $name . '" id="' . $name . '"]<span>ファイルを選択</span></label></div>';
		elseif ($type == "checkbox" || $type == "radio" || $type == "select") :
			$inputoption = array();
			foreach ($inputlist as $radio) {
				array_push($inputoption, $radio);
			}
			return '<div class="p-' . $type . '">[mwform_' . $type . ' name="' . $name . '" children="' . implode(',', $inputoption) . '" value="1" separator=","]</div>';
		elseif ($type == "zip") :
			return ' <div class="p-zip"><span class="p-country-name" style="display:none;">Japan</span>[mwform_text class="p-input p-postal-code" name="' . $name . '" placeholder="' . $placeholder . '" autocomplete="postal-code"]<div class="postal-search"><span>自動入力</span></div></div>';
		elseif ($type == "add") :
			return '<div class="p-add">[mwform_text name="your-add1" placeholder="都道府県・市区町村" class="p-region p-locality p-street-address p-extended-address p-input"][mwform_text name="your-add2" class="p-input" placeholder="住所の続きを入力"]</div>';
		elseif ($type == "textarea") :
			return '[mwform_' . $type . '  class="' . $countclass . ' p-textarea" name="' . $name . '" placeholder="' . $placeholder . '"]';
		elseif ($type == "date") :
			return '[mwform_text name="' . $name . '" placeholder="' . $placeholder . '" class="p-input hasDatepicker ' . $countclass . '" ' . $datacount . ']';
		else :
			return '[mwform_' . $type . ' name="' . $name . '" placeholder="' . $placeholder . '" class="p-input ' . $countclass . '" ' . $datacount . ']';
		endif;  ?>
	<?php elseif ($wptype == "confirm") : ?>
		<?php if ($type == "img") : ?>
		<?php else : ?>
			xxxxxxxxxxxxx
			<input type="hidden">
		<?php endif; ?>
	<?php else : ?>
		<?php if ($type == "img") : ?>
			<div class="dnd">
				<div class="dragarea">
					<div class="inner">
						<p class="txt_jp_m mb_s">ここにファイルをドロップ<br>または</p>
						<label for="<?php echo $name; ?>" class="clickarea p-button xs bl"><input class="dndfileinput" id="<?php echo $name; ?>" type="file" name="<?php echo $name; ?>"></input>
							<span>ファイルを選択する</span>
						</label>
					</div>
					<div class="remove"></div>
				</div>
			</div>
		<?php elseif ($type == "file") : ?>
			<div class="file">
				<label for="file_01">
					<input type="file" id="file_01">
					<span>ファイルを選択</span>
				</label>
			</div>
		<?php elseif ($type == "select") : ?>
			<div class="p-select">
				<select name="">
					<option disabled value="" selected>選択してください</option>
					<?php foreach ($inputlist as $select) : ?>
						<option value="<?php echo $select; ?>"><?php echo $select; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		<?php elseif ($type == "checkbox" || $type == "radio") : ?>
			<div class="p-<?php echo $type ?>">
				<?php foreach ($inputlist as $radio) : ?>
					<span>
						<label>
							<input type="<?php echo $type ?>" name="<?php echo $name ?>" value="<?php echo $radio; ?>" class="">
							<span><?php echo $radio; ?></span>
						</label>
					</span>
				<?php endforeach; ?>
			</div>
		<?php elseif ($type == "zip") : ?>
			<div class="p-zip">
				<span class="p-country-name" style="display:none;">Japan</span>
				<input type="text" class="p-input p-postal-code" name="your-zip" placeholder="<?php echo $placeholder; ?>">
				<div class="postal-search"><span>自動入力</span></div>
			</div>
		<?php elseif ($type == "add") : ?>
			<div class="p-add">
				<input type="text" name="your-add1" placeholder="都道府県・市区町村" class="p-region p-locality p-street-address p-extended-address p-input" autocomplete="name">
				<input class="p-input" type="text" name="your-add2" placeholder="住所の続きを入力">
			</div>
		<?php elseif ($type == "textarea") : ?>
			<textarea class="<?php echo $countclass; ?> p-textarea" name="<?php echo $name; ?>" placeholder="<?php echo $placeholder; ?>" <?php echo $datacount; ?>></textarea>
		<?php elseif ($type == "date") : ?>
			<input id="target" type="text" name="<?php echo $name; ?>" placeholder="<?php echo $placeholder; ?>" class="p-input hasDatepicker <?php echo $countclass; ?>" <?php echo $datacount; ?>>
		<?php else : ?>
			<input type="<?php echo $type; ?>" name="<?php echo $name; ?>" placeholder="<?php echo $placeholder; ?>" class="p-input <?php echo $countclass; ?>" <?php echo $datacount; ?>>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ($count != "") : ?>
		<p class="p-count"><span class="num">0</span><span>/ <?php echo $count; ?>文字</span></p>
	<?php endif; ?>
	<?php if ($cap != "") : ?>
		<ul class="p-cap">
			<?php foreach ($cap as $captxt) : ?>
				<li><span><?php echo $captxt; ?></span></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
<?php
}

function setHtmlFormDl($contact_opt, $form_type, $class = "b-contact")
{ ?>
	<?php if ($form_type != "wpform") : ?>
		<div class=" <?php echo $class; ?>__dlwrap">
			<?php
			foreach ($contact_opt as $forminput) :
				$req = (isset($forminput["req"]) && $forminput["req"]) ? "req" : "";
				$dlclass = (isset($forminput["class"])) ? $forminput["class"] : "";
			?>
				<dl class="<?php echo $dlclass; ?>">
					<dt class="<?php echo $req; ?>"><span><?php echo $forminput["label"]; ?></span></dt>
					<dd>
						<?php
						if (isset($forminput["sub"])) {
							setHtmlFormDl($forminput["sub"], $form_type, $class . '__sub');
						} else {
							setHtmlForm($forminput, $form_type);
						}
						?>
					</dd>
				</dl>
			<?php endforeach; ?>
		</div>
		<?php else :
		$content = '';
		$content .= '<div class="' . $class . '__dlwrap">';
		foreach ($contact_opt as $forminput) :
			$req = (isset($forminput["req"]) && $forminput["req"]) ? "req" : "";
			$dlclass = (isset($forminput["class"])) ? $forminput["class"] : "";
			$content .= '<dl class="' . $dlclass . '"><dt class="' . $req . '"><span>' . $forminput["label"] . '</span></dt><dd>';
			if (isset($forminput["sub"])) {
				$content .= setHtmlFormDl($forminput["sub"], $form_type);
			} else {
				$content .=	setHtmlForm($forminput, $form_type);
			}
			$content .= '</dd></dl>';
		endforeach;
		$content .= '</div>';
		return $content;
	endif;
}


function setHtmlPankuzu($value, $type = "html")
{
	global $link_path, $menu_list;
	$pankuzu = '';
	if (!empty($value['pankuzu'])) {
		$pankuzu = $value['pankuzu'];
		$title = $value['title']['subtitle'];
	}
	if (!empty($pankuzu)) :
		if ($type == "html") : ?>
			<ol class="b-pankuzu">
				<?php foreach ($pankuzu as $page) : ?>
					<?php if ($page == "home") : ?>
						<li><a href="<?php echo $link_path; ?>"><span>ホーム</span></a></li>
					<?php else : ?>
						<li><a href="<?php echo $menu_list[$page]['link']['url']; ?>"><span><?php echo $menu_list[$page]['title']['subtitle']; ?></span></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
				<li>
					<div><span><?php echo $title; ?></span></div>
				</li>
			</ol>
		<?php elseif ($type == "scheme") :
			$pankuzu_scheme = array(
				"@context" => "https://schema.org",
				"@type" => "BreadcrumbList",
				"itemListElement" => array()
			);
			$pankuzunum = 0;
			foreach ($pankuzu as $pos => $page) {
				$array = array(
					"@type" => "ListItem",
				);
				$array['position'] = $pos + 1;
				$pankuzunum = $pos + 1;
				$array['name'] = $menu_list[$page]['title']['title'];
				if (isset($menu_list[$page]['link']['url'])) {
					$array['item'] = $menu_list[$page]['link']['url'];
				}
				array_push($pankuzu_scheme['itemListElement'], $array);
			}
			$array = array(
				"@type" => "ListItem",
			);
			$array['position'] = $pankuzunum + 1;
			$array['name'] 	= $title;
			array_push($pankuzu_scheme['itemListElement'], $array);
			echo '<script type="application/ld+json">' . json_encode($pankuzu_scheme) . '</script>';
		endif;
	endif;
}

function setHtmlTel($tel)
{
	return 'tel:' . str_replace("-", "", $tel);
}

function setHtmlNavLink($slug, $nav, $pos, $class)
{
	// [TODO] modalとかjs発火したいときどうしたらいい？
	global $page_class, $link_path;
	$link  = (isset($nav['link']['url']) && $nav['link']['url'] == "") ? $link_path . '/' . $slug : $nav['link']['url'];
	$target = $nav['link']['target'] ? $nav['link']['target'] : '_self';
	$pageactive = (strpos($page_class, 'page-' . $nav['class']) !== false) ? "is-active" : "";
	$display = $nav['display'][$pos];
	$child = (isset($nav['children'])) ? ' has-child' : '';
	if ($display) : ?>
		<li class="<?php echo $class; ?>__li <?php echo $pageactive; ?><?php echo $child; ?>">
			<?php setHtmlNavLinkA($nav, $slug, $class, $link_path); ?>
			<?php if (isset($nav['children'])) : ?>
				<div class="<?php echo $class; ?>__child">
					<div class="<?php echo $class; ?>__child__wrap">
						<ul class="<?php echo $class; ?>__child__ul">
							<?php
							$childtype = $nav['children']['type'];
							foreach ($nav['children']['list'] as $childslug => $child) :
								$childnav = array();
								if ($childtype == 'taxonomy') {
									$childnav['link']['url'] = $link_path . '/' . $child->taxonomy . '/' . $child->slug;
									$childnav['title']['title'] = $child->name;
									$childnav['title']['subtitle'] = $child->slug;
								} else {
									$childnav['title']  = $child['title'];
									$childnav['link'] = $child['link'];
								}
								$childpageactive = ($_SERVER['REQUEST_URI'] == $childnav['link']['url']) ? "is-active" : "";
							?>
								<li class="<?php echo $class; ?>__child__li <?php echo $childpageactive; ?>"><?php setHtmlNavLinkA($childnav, $childslug, $class . '__child', $link_path . '/' . $slug); ?></li>
							<?php
							endforeach;
							?>
						</ul>
					</div>
				</div>
			<?php endif; ?>
		</li>
	<?php
	endif;
}

function setHtmlNavLinkA($navlink, $slug, $class, $parentlink)
{
	$link  = (isset($navlink['link']['url']) && $navlink['link']['url'] == "") ? $parentlink . '/' . $slug : $navlink['link']['url'];
	$target = (!empty($navlink['link']['target'])) ? $navlink['link']['target'] : '_self';
	$navclass = (!empty($navlink['class'])) ? $navlink['class'] : '';
	?>
	<a href="<?php echo $link; ?>" target="<?php echo $target; ?>" class="<?php echo $class; ?>__link <?php echo $navclass; ?>">
		<span class="<?php echo $class; ?>__ttl">
			<span class="<?php echo $class; ?>__ttl__ttl"><?php echo $navlink['title']['title']; ?></span>
			<span class="<?php echo $class; ?>__ttl__subttl"><?php echo $navlink['title']['subtitle']; ?></span>
		</span>
	</a>
<?php
}

function setHtmlSvg($path)
{
	global $icon_path;
	$class = (strpos($path, "stroke") !== false) ? 'p-icon__stroke' : ''; ?>
	<svg class="<?php echo $class; ?>">
		<use xlink:href="<?php echo $icon_path . $path; ?>"></use>
	</svg>
	<?php
}

function setHtmlTaxonomy($taxonomy, $li_flg = 'false', $link_flg = 'true')
{
	global $link_path;
	foreach ($taxonomy as $term) {
		$link = $link_path . '/' . $term->taxonomy . '/' . $term->slug
	?>
		<?php if ($link_flg) : ?>

			<?php if ($li_flg) : ?><li><?php endif; ?>
				<a class="" href="<?php echo $link; ?>"><span><?php echo $term->name; ?></span></a>
				<?php if ($li_flg) : ?>
				</li><?php endif; ?>
		<?php else : ?>
			<p><span><?php echo $term->name; ?></span></p>
		<?php endif; ?>
	<?php }
}
function setHtmlSnsshare()
{
	global $url, $title, $icon_path; ?>
	<ul class="b-snsshare">
		<li class="fb">
			<a href="https://www.facebook.com/sharer.php?u=<?php echo $url; ?>" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;">
				<svg class="p-icon m">
					<use xlink:href="<?php echo $icon_path; ?>sns-facebook"></use>
				</svg>
			</a>
		</li>

		<!-- Twitter -->
		<li class="tw">
			<a href="//twitter.com/intent/tweet?url=<?php echo urlencode($url); ?>&text=<?php echo urlencode($title); ?>" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;">
				<svg class="p-icon m">
					<use xlink:href="<?php echo $icon_path; ?>sns-twitter"></use>
				</svg>
			</a>
		</li>
		<!-- はてブ -->
		<li class="hatena">
			<a target="_blank" href="http://b.hatena.ne.jp/entry/<?php echo $url; ?>&title=<?php echo $title; ?>">
				<svg class="p-icon m">
					<use xlink:href="<?php echo $icon_path; ?>sns-hatena"></use>
				</svg>
			</a>
		</li>

		<!-- LINE -->
		<li class="line">
			<a href="//line.me/R/msg/text/?<?php echo $title; ?><?php echo $url; ?>" target="_blank">
				<svg class="p-icon m">
					<use xlink:href="<?php echo $icon_path; ?>sns-line"></use>
				</svg>
			</a>
		</li>

		<!-- pocket -->
		<li class="pocket">
			<a href="http://getpocket.com/edit?url=<?php echo $url; ?>&title=<?php echo $title; ?>" onclick="window.open(this.href, 'PCwindow', 'width=550, height=350, menubar=no, toolbar=no, scrollbars=yes'); return false;">
				<svg class="p-icon m">
					<use xlink:href="<?php echo $icon_path; ?>sns-pocket"></use>
				</svg>
			</a>
		</li>
	</ul>
<?php
}
function setHtmlColumnAside($class, $column_value)
{ ?>
	<aside class="<?php echo $class . '__aside'; ?>">
		<div class="<?php echo $class . '__aside__wrap'; ?>">
			<div class="<?php echo $class . '__aside__inner'; ?>">
				<div class="<?php echo $class . '__aside__box'; ?>">
					<h2 class="<?php echo $class . '__aside__ttl' ?>"><span>カテゴリーから探す</span></h2>
					<div class="category">
						<?php setHtmlTaxonomy($column_value['category'], false); ?>
					</div>
				</div>
				<div class="<?php echo $class . '__aside__box'; ?>">
					<h2 class="<?php echo $class . '__aside__ttl' ?>"><span>タグから探す</span></h2>
					<div class="b-column__tag">
						<?php setHtmlTaxonomy($column_value['tag'], false); ?>
					</div>
				</div>
			</div>
		</div>
	</aside>
<?php
}
