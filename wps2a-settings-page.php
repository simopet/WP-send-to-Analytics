<?php

if ( ! defined( 'ABSPATH' ) ) exit('You\'re not allowed to see this page'); // Exit if accessed directly

if ( !current_user_can( 'manage_options' ) ) {
	wp_die( __( 'You do not have sufficient permissions to access this page.', 'yet-another-stars-rating' ));
}

?>

<div class="wrap">

	<?php 

	if (isset($_GET['tab'])) {
    		$active_tab = $_GET[ 'tab' ];
		}

	else {
		$active_tab = 'info';
	}

	?>

	<h2 class="nav-tab-wrapper yasr-no-underline">
		
		<a href="?page=wps2a_options_page&tab=info" class="nav-tab <?php if ($active_tab == 'info') echo 'nav-tab-active'; ?>" > <?php _e("Info", 'dunp-admin'); ?> </a>
        <a href="?page=wps2a_options_page&tab=general_settings" class="nav-tab <?php if ($active_tab == 'general_settings') echo 'nav-tab-active'; ?>" > <?php _e("Options", 'wps2a'); ?> </a>
         
        
        <?php do_action( 'wps2a-add-settings-tab', $active_tab ); ?>
        
    </h2>

    <?php 

    if ($active_tab === 'general_settings') {

    	?>

		<form class="wps2a-page" action='options.php' method='post'>

			<?php
			settings_fields( 'wps2a_plugin_page' );
			do_settings_sections( 'wps2a_plugin_page' );
			submit_button();
			?>

		</form>

		<?php

    }

    if ($active_tab === 'info') {

    	?>

		<form class="wps2a-page" action='options.php' method='post'>

			<?php
			settings_fields( 'wps2a_info_page' );
			do_settings_sections( 'wps2a_info_page' );
			
			?>

		</form>

		<?php

    }

   
/*
    if ($active_tab === 'check') {

    	?>

    	<form action='options.php' method='post'>

	    	<?php

				settings_fields( 'wps2a_check_settings' );
				do_settings_sections( 'wps2a_check_settings' );
				submit_button();

			?>

		</form>

		<?php

    }*/

    do_action('wps2a_add_settings_tab_content', $active_tab);

?>   

</div> <!--End div wrap-->
<style>
	.wps2a-page .form-table th {width: 33%;}
</style>