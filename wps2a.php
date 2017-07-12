<?php
/*
Plugin Name: WP send to Analytics
Plugin URI: https://wordpress.org/plugins/wp-send-to-analytics/
Description: Send events to Google Analytics
Author: simone.p
Version: 1.1.3
Tested up to: 4.8
Text Domain: wps2a
Author URI: https://www.simonepetrucci.com
*/

if (!defined('ABSPATH'))
    exit;

define( 'WPS2A_VERSION', '1.1.3' );
define( 'WPS2A_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPS2A_MODULES', WPS2A_DIR .  '/modules'  );
define( 'WPS2A_WIDGETS', WPS2A_DIR . '/widget' );
define( 'WPS2A_SHORTCODES', WPS2A_DIR . '/shortcodes' );

global $wps2a_options;
$wps2a_options = get_option( 'wps2a_settings' );

require 'wps2a-settings-functions.php';

require_once WPS2A_DIR . '/enqueue.php'; 

function wps2a_txt() {
  load_plugin_textdomain( 'wps2a', false, dirname( plugin_basename( __FILE__ ) ) . '/language/' );
}
add_action('plugins_loaded', 'wps2a_txt');


// metabox.php
require_once WPS2A_DIR . '/metabox/metabox-init.php'; 
// inject.php
require_once WPS2A_DIR . '/includes/inject.php'; 


