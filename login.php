<?php
function dlf_form() {

?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="login-form">
        <div class="form-group">
            <input name="login_name" type="text" class="form-control login-field" value="" placeholder="Username" id="login-name" />
            <label class="login-field-icon fui-user" for="login-name"></label>
        </div>

        <div class="form-group">
            <input  name="login_password" type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
            <label class="login-field-icon fui-lock" for="login-pass"></label>
        </div>
        <input class="btn btn-primary btn-lg btn-block" type="submit"  name="dlf_submit" value="Log in" />
    </div>
</form>

<?php
}
function dlf_auth( $username, $password ) {
global $user;
$creds = array();
$creds['user_login'] = $username;
$creds['user_password'] =  $password;
$creds['remember'] = true;
$user = wp_signon( $creds, false );
if ( is_wp_error($user) ) {
echo $user->get_error_message();
}
if ( !is_wp_error($user) ) {
wp_redirect(home_url('wp-admin'));
}
}

function dlf_process() {
if (isset($_POST['dlf_submit'])) {
    dlf_auth($_POST['login_name'], $_POST['login_password']);
}

dlf_form();
}

function dlf_shortcode() {
ob_start();
dlf_process();
return ob_get_clean();
}

add_filter('login_message', 'dlf_form');
?>