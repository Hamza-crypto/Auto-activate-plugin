<?php
/**
 * Plugin Name: Auto Activate Plugin
 * Description: It automatically activates the plugins at specified time
 * Version: 1.0
 * Author: Hamza
 * Author URI: https://www.upwork.com/freelancers/~01d452dc67bce01a15
 **/

if (!defined('WPINC')) {
	die();
}

require plugin_dir_path(__FILE__) . 'settings.php';
require plugin_dir_path(__FILE__) . 'functionality.php';
