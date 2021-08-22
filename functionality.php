<?php

require_once ABSPATH . 'wp-admin/includes/plugin.php';
$plugin_name = "file-download-counter";
$param = "/$plugin_name/$plugin_name.php";

date_default_timezone_set('Asia/Karachi');

$activation_time = get_option('auto_ad_activation_time');
$deactivation_time = get_option('auto_ad_deactivation_time');

$activation_time = new DateTime($activation_time);
$activation_time = $activation_time->format('Y-m-d h:i:s a');

$deactivation_time = new DateTime($deactivation_time);
$deactivation_time = $deactivation_time->format('Y-m-d h:i:s a');

$currentTime = date("Y-m-d h:i:s a", time());

if ($currentTime > $activation_time && !is_plugin_active("$plugin_name/$plugin_name.php")) {

	activate_plugin($param);
}
if ($currentTime > $deactivation_time && is_plugin_active("$plugin_name/$plugin_name.php")) {

	deactivate_plugins($param);
}
