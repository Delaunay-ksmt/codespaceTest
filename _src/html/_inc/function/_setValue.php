<?php
/* ------------------------------------
*
* value設定用のfunction
*
------------------------------------ */


function setValue($type, $v1 = "", $v2 = "", $v3 = "", $v4 = "", $args = array())
{
	global $img_path;
	if ($type == 'title') :
		$array = array(
			'title' => (!empty($v1)) ? $v1 : "",
			'subtitle' => (!empty($v2)) ? $v2 : "",
			'lead' => (!empty($v3)) ? $v3 : "",
			'text' => (!empty($v4)) ? $v4 : "",
		);
	elseif ($type == 'link') :
		$array = array(
			'url' => (!empty($v1)) ? $v1 : "",
			'title' => (!empty($v2)) ? $v2 : "VIEW DETAIL",
			'target' => (!empty($v3)) ? $v3 : "_self",
		);
	elseif ($type == 'image') :
		$array = array(
			'title' => (!empty($v2)) ? $v2 : "画像タイトル",
			'sizes' => array(
				'large' => (!empty($v1)) ? $v1 : $img_path . '_dummy/dummy.png',
				'medium' => (!empty($v1)) ? $v1 : $img_path . '_dummy/dummy.png',
				'thumbnail' => (!empty($v1)) ? $v1 : $img_path . '_dummy/dummy.png',
			),
		);
	elseif ($type == 'video') :
		$array = array(
			'video' => $v1,
			'image' => $v2,
		);
	elseif ($type == 'map') :
		$array = array(
			'lat' => $v1,
			'lng' => $v2,
			'pin' => $v3,
		);
	elseif ($type == 'form') :
		$array = array(
			'type' => $v1,
			'name' => $v2,
			'label' => $v3,
			'req' => $v4
		);
		$array = array_merge($args, $array);
	else :
		$array = $v1;
	endif;
	return $array;
}
function setValueInBody($type, $value, $attr = "", $attr2 = "")
{
	$v1 = (!empty($value[0])) ? $value[0] : "";
	$v2 = (!empty($value[1])) ? $value[1] : "";
	$v3 = (!empty($value[2])) ? $value[2] : "";
	$v4 = (!empty($value[3])) ? $value[3] : "";
	$value = setValue($type, $v1, $v2, $v3, $v4);
	$array = array(
		$type => $value,
	);

	if ($type == 'title') :
		$array['h'] = $attr;
	elseif ($type == 'link') :
		$array['type'] = (!empty($attr)) ? $attr : "button";
		$array['icon'] = (!empty($attr2['icon'])) ? $attr2['icon'] : "";
		$array['svg_after'] = (!empty($attr2['svg_after'])) ? $attr2['svg_after'] : "";
		$array['modal'] = (!empty($attr2['modal'])) ? $attr2['modal'] : "";
	elseif ($type == 'image') :
		$array['type'] = (!empty($attr)) ? $attr : "image";
	elseif ($type == 'gallery') :
		$array['type'] = (!empty($attr)) ? $attr : "gallery";
	elseif ($type == 'list') :
		$array['type'] = (!empty($attr)) ? $attr : "ul";
	endif;
	$array['acf_fc_layout'] = $type;
	return $array;
}


function setTaxonmyArray($tax, $array)
{
	$taxonomy = array();
	foreach ($array as $key => $value) {
		$taxonomy[] =	(object) [
			'name' => $value[0],
			'slug' => $value[1],
			'taxonomy' => $tax,
		];
	}
	return $taxonomy;
}
