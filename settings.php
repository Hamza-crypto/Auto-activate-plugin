<?php

function auto_ad_settings_html_func() {
	if (!is_admin()) {
		return;
	}

	?>
    <div class="wrap">
        <h1 style="
        background: black;
        color: white;
        padding: 10px;">
            <?=esc_html(get_admin_page_title());?> </h1>
        <form action="options.php" method="post">
            <?php
settings_fields('plugin-settings');
	do_settings_sections('plugin-settings');
	submit_button('Save Changes');

	?>
        </form>
    </div>

    <?php

}


function add_menu_page_func() {
	add_submenu_page(
		'plugins.php',
		'Activating Deactivating Plugin System',
		'Plugin Manager',
		'manage_options',
		'plugin-settings',
		'auto_ad_settings_html_func'
	);

}

add_action('admin_menu', 'add_menu_page_func');

function setting_section_func_cb() {
	//echo '<p> Define Button Labels </p>';
}

function section_activation_func_cb() {
	$setting = get_option('auto_ad_activation_time');
	?>
    <input type="datetime-local" name="auto_ad_activation_time" value="<?php echo isset($setting) ? $setting : '' ?>">
    <?php

}

function section_deactivation_func_cb() {
	$setting = get_option('auto_ad_deactivation_time');
	?>
    <input type="datetime-local" name="auto_ad_deactivation_time" value="<?php echo isset($setting) ? $setting : '' ?>">
    <?php

}

function auto_ad_register_my_setting() {

    $page_name = "plugin-settings";
	register_setting($page_name, 'auto_ad_activation_time');
	register_setting($page_name, 'auto_ad_deactivation_time');

	// register a new section in the "reading" page
	add_settings_section(
		'auto_ad_label_settings_section',
		'Choose activation and Deactivation time',
		'setting_section_func_cb',
		$page_name
	);

	add_settings_field(
		'auto_ad_like_label_field',
		'Activation Time',
		'section_activation_func_cb',
		$page_name,
		'auto_ad_label_settings_section'
	);

	add_settings_field(
		'auto_ad_dislike_label_field',
		'Deactivation Time',
		'section_deactivation_func_cb',
		$page_name,
		'auto_ad_label_settings_section'
	);

}

add_action('admin_init', 'auto_ad_register_my_setting');
