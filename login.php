<?php
function smallenvelop_login_message( $message ) {
    return '<div class="custom_logo"><a href="'.get_site_url().'"><img title="'.get_bloginfo( 'name', 'display' ).'" src="'.plugins_url().'/FlatUI_WP_Admin/images/dashboard-icon.png"></a></div>
            <div class="login-form">
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


//hide custom logo
function hide_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            display: none;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'hide_login_logo' );
?>