<?php
add_action('init', function () {
	global $custompostarray;
	foreach ($custompostarray as $cpt) {
		register_post_type($cpt['slug'], array(
			'label' => $cpt['name'],
			'public' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-admin-page',
			'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
			'has_archive' => true,
			'show_in_rest' => true,
			'rest_base' => $cpt['slug'],
		));
		foreach ($cpt['taxonomy'] as $tax) {
			register_taxonomy(
				$cpt['slug'] . '_' . $tax['slug'],
				$cpt['slug'],
				array(
					'hierarchical' => $tax["category"], // tagならfalse
					'label' => $tax["name"],
					'show_ui' => true,
					'show_admin_column' => true,
					'query_var' => true,
					'show_in_rest' => true,
				)
			);
		}
	}
});
foreach ($custompostarray as $cpt) {
	foreach ($cpt['taxonomy'] as $tax) {
		if ($tax["category"]) {
			add_filter("radio_buttons_for_taxonomies_no_term_" . $cpt['slug'] . '_' . $tax['slug'], "__return_FALSE");
		}
	}
}
