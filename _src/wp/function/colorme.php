<?php
define("OAUTH2_TOKEN", 'APIキー');
$request_options = array(
	'http' => array(
		'method' => 'GET',
		'header' => "Authorization: Bearer " . OAUTH2_TOKEN . "\r\n"
	)
);
define("CONTEXT", stream_context_create($request_options));

function getItem($id)
{
	$geturl = 'https://api.shop-pro.jp/v1/products.json?ids=' . $id . '&limit=50';
	$response_body = file_get_contents($geturl, false, CONTEXT);
	$productjson = mb_convert_encoding($response_body, 'UTF-8', 'auto');
	$product = json_decode($productjson, true);
	return $product["products"];
}

function getPrice($thisproduct)
{
	$thisprice = number_format($thisproduct["sales_price_including_tax"]);
	$pricelist = array();
	foreach ((array)$thisproduct['variants'] as $thisvalue) {
		$opt_price = $thisvalue['option_price_including_tax'];
		if (isset($opt_price)) {
			if (!in_array($opt_price, $pricelist)) {
				array_push($pricelist, $opt_price);
			}
		}
	}
	if (!empty($pricelist)) {
		if (count($pricelist) > 1) {
			$thisprice = number_format(min($pricelist)) . " ~ ¥" . number_format(max($pricelist));
		}
	}
	return '¥' . $thisprice;
}


function getSaleStatus($thisproduct)
{
	// trueが売り切れ
	$status = true;
	$status = ($thisproduct["stock_managed"] == true && $thisproduct["stocks"] == 0) ? true : false;
	return $status;
}
