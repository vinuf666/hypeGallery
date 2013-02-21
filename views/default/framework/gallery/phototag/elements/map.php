<?php

$entity = elgg_extract('entity', $vars);

$tags = hj_gallery_get_image_tags($entity);

echo "<ul class=\"elgg-list hj-gallery-tags-map\" data-uid=\"$entity->guid\">";
foreach ($tags as $tag) {
	echo "<li class=\"elgg-item\" data-uid=\"$tag->guid\">";
	echo elgg_view_entity($tag, array(
		'return_type' => 'map'
	));
	echo '</li>';
}
echo '</ul>';