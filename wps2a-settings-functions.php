<?php

if ( ! defined( 'ABSPATH' ) ) exit('You\'re not allowed to see this page'); // Exit if accessed directly


add_action( 'admin_menu', 'wps2a_add_admin_menu' );

	function wps2a_add_admin_menu() {
		add_menu_page( 'WPs2A', 'WPs2A', 'manage_options', 'wps2a_options_page' );
		add_submenu_page( 'wps2a_options_page', 'Generali', 'Generali', 'manage_options', 'wps2a_options_page', 'wps2a_options_page_callback' );
		
	}

	function wps2a_options_page_callback () {

		if ( ! current_user_can( 'manage_options' ) ) {
        	wp_die( __( 'You do not have sufficient permissions to access this page.', 'wps2a' ) );
    	}

    	include(WPS2A_DIR . 'wps2a-settings-page.php');

	}

add_action( 'admin_init', 'wps2a_settings_init' );

	function wps2a_settings_init() {
		register_setting( 
			'wps2a_plugin_page', // A settings group name. Must exist prior to the register_setting call. This must match the group name in settings_fields()
			'wps2a_settings' //The name of an option to sanitize and save.
		);

		$options = get_option('wps2a_settings');
		if(empty($options)) {
			$options['wps2a_enable_global_endcontent'] = '0';
		}

			add_settings_section(
				'wps2a_pluginPage_section', 
				__( 'Global Settings', 'wps2a' ), 
				'wps2a_settings_section_callback', //callback function
				'wps2a_plugin_page'
			);

				add_settings_field(
					'wps2a_checkbox_field_1',
					__( 'Enable global end-content monitor in Pages and Posts', 'wps2a' ),
					'wps2a_enable_global_endcontent_render', //callback
					'wps2a_plugin_page',
					'wps2a_pluginPage_section',
					$options
				);

	}

	function wps2a_settings_section_callback(  ) {

		
	}

	function wps2a_enable_global_endcontent_render($options) {
		?>
		<div class="onoffswitch">
		<input type='checkbox' name='wps2a_settings[wps2a_enable_global_endcontent]' class="onoffswitch-checkbox" id="enable_global_endcontent" value='1' <?php if ($options['wps2a_enable_global_endcontent']==1) echo " checked='checked' "; ?> >
		<label class="onoffswitch-label" for="enable_global_endcontent">
	        <span class="onoffswitch-inner"></span>
	        <span class="onoffswitch-switch"></span>
	    </label>
	    </div>
		<?php
	}


// Info Page
add_action( 'admin_init', 'wps2a_info_page_init' );

		function wps2a_info_page_init() {

			register_setting( 
				'wps2a_info_page', // A settings group name. Must exist prior to the register_setting call. This must match the group name in settings_fields()
				'wps2a_info_settings' //The name of an option to sanitize and save.
			);

			add_settings_section(
				'wps2a_info_section', 
				__( 'How it works', 'wps2a' ),
				'wps2a_info_page_settings_callback', //callback function
				'wps2a_info_page'
			);


			function wps2a_info_page_settings_callback () {
				?>
				<p>
				<?php _e('This plugin extends the standard <b>analytics.js</b> script in 2 ways:', 'wps2a'); ?>
				</p>
				<ul>
					<li>
						<?php _e('- <b>Auto-monitor</b>: detects when a reader reaches the end of <i>the_content</i> in Pages and Posts, sending Google Analytics an event; ', 'wps2a'); ?>
					</li>
					<li>
						<?php _e('- A dedicated option is enabled in Pages and Posts and lets you ask the plugin to monitor a specific ID (something like #myselector); when the html item with that ID is on screen, the plugin will send Analytics an event;', 'wps2a'); ?>
					</li>
				</ul>
				<p>
					<h3><?php _e('<b>WP Send to Analytics</b> also associates a "Value" to events.', 'wps2a') ?></h3>
					<h3><?php _e('That Value represents the time <b>in seconds</b> that user needed to reach the end of the Post or Page.', 'wps2a'); ?></h3>
				</p>

			<?php	}

	}

?>
