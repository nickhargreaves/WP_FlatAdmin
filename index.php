<?php
/**
* Plugin Name: Flat UI Wordpress Admin Theme
* Plugin URI: http://github.com/nickhargreaves/flat_ui_wp_admin
* Description: This plugin turns a Wordpress Admin backend into a nice looking dashboard based on the Flat UI kit by http://designmodo.com/flat
* Version: 1.0.0
* Author: Nick Hargreaves
* Author URI: http://nickhargreaves.com
* License: GPL2
*/

//add css
function flat_admin_theme_style() {
    wp_enqueue_style('flat-admin-theme', plugins_url('Flat-UI/dist/css/flat-ui.css', __FILE__));
    wp_enqueue_style('flat-admin-theme2', plugins_url('custom.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'flat_admin_theme_style');
add_action('login_enqueue_scripts', 'flat_admin_theme_style');


//add custom class to admin menu
add_action( 'admin_init','wpse_60168_custom_menu_class' );

function wpse_60168_custom_menu_class()
{
    global $menu;

    foreach( $menu as $key => $value )
    {
        //if(startsWith(($value[4]), "menu-top"))
            //$menu[$key][4] .= " btn btn-block btn-lg btn-primary";
    }

}

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}