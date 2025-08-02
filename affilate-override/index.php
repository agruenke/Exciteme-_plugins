<?php

/*
 * Plugin Name: Auto approve affilate
 * Description: Auto Approve Affilate Users
 * Version: 1.0.0
 * Author: Jasmeet
 * Author URI: 
 * Text Domain: my-custom-yith-page
*/

function my_admin_menu() {
    add_menu_page(
        __( 'Auto Approve Affilates', 'my-textdomain' ),
        __( 'Auto Approve Affilates', 'my-textdomain' ),
        'manage_options',
        'yith-page',
        'my_admin_page_contents',
        'dashicons-schedule',
        3
    );
}
add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_page_contents() {
    ?>
     
    <form method="POST" action="options.php">
    <?php
    settings_fields( 'yith-page' );
    do_settings_sections( 'yith-page' );
    submit_button();
    ?>
    </form>
    <?php
}


add_action( 'admin_init', 'my_settings_init' );

function my_settings_init() {

    add_settings_section(
        'sample_page_setting_section',
        __( 'Settings', 'my-textdomain' ),
        'my_setting_section_callback_function',
        'yith-page'
    );

		add_settings_field(
		   'yith_wcaf_referral_registration_auto_enable',
		   __( 'Please enter yes to change status of affilate users', 'my-textdomain' ),
		   'my_setting_markup',
		   'yith-page',
		   'sample_page_setting_section'
		);

		register_setting( 'yith-page', 'yith_wcaf_referral_registration_auto_enable' );
}


function my_setting_section_callback_function() {
     
}


function my_setting_markup() {
    ?>
    
    <input type="text" id="yith_wcaf_referral_registration_auto_enable" name="yith_wcaf_referral_registration_auto_enable" value="<?php echo get_option( 'yith_wcaf_referral_registration_auto_enable' ); ?>">
    <?php
}