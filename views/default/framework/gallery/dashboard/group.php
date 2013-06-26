<?php

$stream = get_input('photostream', false);
$page_owner = elgg_get_page_owner_entity();

$list_id = "gr$page_owner->guid";

if (!$stream) {

	$params = array(
		'list_id' => $list_id,
		'getter_options' => array(
			'types' => 'object',
			'subtypes' => array('hjalbum'),
			'container_guids' => $page_owner->guid
			));

	echo elgg_view('framework/gallery/list/albums', $params);
} else {

	if (!get_input("__ord_$list_id", false)) {
		set_input("__ord_$list_id", 'e.time_created');
		set_input("__dir_$list_id", 'DESC');
	}

	$params = array(
		'list_id' => $list_id,
		'getter_options' => array(
			'types' => 'object',
			'subtypes' => array('hjalbumimage'),
			'container_guids' => $page_owner->guid
			));

	echo elgg_view('framework/gallery/list/images', $params);
}