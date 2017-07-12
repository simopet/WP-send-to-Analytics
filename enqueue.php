<?php
// Enqueue and localize scripts

if ( ! function_exists( 'wps2a_scripts' ) ) {
	function wps2a_scripts() {
		$options = get_option('wps2a_settings');
		$tracker = $options['wps2a_customtracker'];

		$translation_array = array (
			'tracker' => $tracker,
			'category' => __('Interactions', 'wps2a'),
			'action'   => __('Element in view', 'wps2a'),
			'label' => __('End content reached', 'wps2a'),
		);

		wp_register_script( 'wps2a-front', plugins_url('/includes/js/front.js', __FILE__), array('jquery'), '', true);		
		wp_enqueue_script( 'wps2a-front');
		wp_localize_script( 'wps2a-front', 'wp2saLabels', $translation_array );		
	}

	add_action( 'wp_enqueue_scripts', 'wps2a_scripts', 100 );
}

if (!function_exists('wps2a_admin_style') ) {

	function wps2a_admin_style() {
		wp_enqueue_style( 'wps2a_admin_style', plugins_url('/style.css', __FILE__) );
	}

	add_action('admin_enqueue_scripts', 'wps2a_admin_style');
}

