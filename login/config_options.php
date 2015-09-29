<?php

//must check that the user has the required capability
if (!current_user_can('manage_options'))
{
    wp_die( __('You do not have sufficient permissions to access this page.') );
}

// variables for the field and option names
$opt_name = 'wp_flat_admin_custom_logo_path';
$hidden_field_name = 'wp_flat_admin_submit_hidden';
$data_field_name = 'wp_flat_admin_custom_logo_path';

//check for post
if(isset($_POST[$data_field_name])){
    $opt_val = $_POST[ $data_field_name ];

    //Save the posted value in the database
    update_option( 'wp_flat_admin_custom_logo_path', $opt_val );
}

// Read in existing option value from database
$opt_val = get_option( $opt_name );


// Now display the settings editing screen

echo '<div class="wrap" id="manage-login-logo">';

// header

echo "<h4>" . __( 'WP Flat Admin Settings', 'menu-test' ) . "</h4>";

// settings form

?>


<!--- stuff -->
<?php
   // wp_enqueue_media();
?>

Upload image or add url:
<br />
<label for="upload_image">

    <form action="" method="post" id="submit_picture">
    <input id="upload_image" type="text" name="<?php echo $data_field_name; ?>"  value="<?php echo $opt_val; ?>" class="form-control"/>
    <input id="upload_image_button" class="button" type="button" value="Upload Custom Logo" />
    <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
    <input type="submit" id="save_image" class="button button-primary" value="save"></form>

</label>
<div id="show_image">

    <?php
        if(!empty($opt_val)){
            print "<img src='" .$opt_val. "'>";
        }
    ?>

</div>

<?php

if (isset($_GET['page']) && $_GET['page'] == 'wpflatadmin') {
    wp_enqueue_media();
    wp_enqueue_script('logo-uploader-js', plugin_dir_url( __FILE__ ) .'../assets/js/logo-uploader.js', array('jquery'));
}

?>

</div>
