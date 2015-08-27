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

function smallenvelop_login_message( $message ) {
    return '<div class="login-form">
            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="login-name">
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass">
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>
            <div class="form-group btn-primary btn-lg btn-block submit_login">
                <a class="" href="#">Log in</a>
            </div>
            <a class="login-link" href="#">Lost your password?</a>
          </div>';
}

add_filter( 'login_message', 'smallenvelop_login_message' );

//login screen
//include_once(plugins_url('login.php'));