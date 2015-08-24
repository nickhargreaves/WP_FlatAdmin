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


function flat_admin_theme_style() {
    wp_enqueue_style('flat-admin-theme', plugins_url('Flat-UI/dist/css/flat-ui.css', __FILE__));
    wp_enqueue_style('flat-admin-theme2', plugins_url('custom.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'flat_admin_theme_style');
add_action('login_enqueue_scripts', 'flat_admin_theme_style');