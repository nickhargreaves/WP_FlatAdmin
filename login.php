<?php
//hide custom logo
function hide_login_logo() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo plugins_url(); ?>/FlatUI_WP_Admin/images/dashboard-icon.png);
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'hide_login_logo' );
?>