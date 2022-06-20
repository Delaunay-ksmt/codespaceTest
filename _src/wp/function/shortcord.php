<?php

function shortcode_hurl()
{
	return home_url('/');
}
add_shortcode('hurl', 'shortcode_hurl');
function companyname()
{
	return get_field('siteinfo', 'setting')['company'];
}
add_shortcode('companyname', 'companyname');

function emailfunc()
{
	return get_field('siteinfo', 'setting')['email'];
}
add_shortcode('email', 'emailfunc');

function telfunc()
{
	return get_field('siteinfo', 'setting')['tel'];
}
add_shortcode('tel', 'telfunc');

function zipfunc()
{
	return get_field('siteinfo', 'setting')['zip'];
}
add_shortcode('zip', 'zipfunc');

function addfunc()
{
	return get_field('siteinfo', 'setting')['add'];
}
add_shortcode('add', 'addfunc');
function addfunc_notag()
{
	return strip_tags(get_field('siteinfo', 'setting')['add']);
}
add_shortcode('add_notag', 'addfunc_notag');
add_filter('acf/format_value/type=textarea', 'do_shortcode');
add_filter('acf/format_value/type=text', 'do_shortcode');

function mwwp_addshortcode($value, $key, $insert_contact_data_id)
{
	if ($key === 'companyname') {
		return get_field('siteinfo', 'setting')['company'];
	}
	if ($key === 'zip') {
		return get_field('siteinfo', 'setting')['zip'];
	}
	if ($key === 'add') {
		return strip_tags(get_field('siteinfo', 'setting')['add']);
	}
	if ($key === 'tel') {
		return get_field('siteinfo', 'setting')['tel'];
	}
	if ($key === 'email') {
		return get_field('siteinfo', 'setting')['email'];
	}
	return $value;
}
add_filter('mwform_custom_mail_tag', 'mwwp_addshortcode', 10, 3);
