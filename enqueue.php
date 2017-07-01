<?php
// Enqueue and localize scripts

if ( ! function_exists( 'wps2a_scripts' ) ) {
	function wps2a_scripts() {

		$translation_array = array (
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