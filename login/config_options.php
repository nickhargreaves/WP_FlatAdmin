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

// Read in existing option value from database
$opt_val = get_option( $opt_name );

// See if the user has posted us some information
// If they did, this hidden field will be set to 'Y'
if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
// Read their posted value
    $opt_val = $_POST[ $data_field_name ];

// Save the posted value in the database
    update_option( $opt_name, $opt_val );

// Put a "settings saved" message on the screen

    ?>
    <div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
    <?php

}

// Now display the settings editing screen

echo '<div class="wrap">';

// header

echo "<h3>" . __( 'WP Flat Admin Settings', 'menu-test' ) . "</h3>";

// settings form

?>


<!--- stuff -->
<?php
   // wp_enqueue_media();
?>
<label for="upload_image">
    <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
    <input id="upload_image" type="text" name="<?php echo $data_field_name; ?>"  value="<?php echo $opt_val; ?>" class="form-control"/>
    <input id="upload_image_button" class="button" type="button" value="Upload Image" />
    <br />Enter a URL or upload an image
</label>

<div id="show_image"></div>

<?php
if (isset($_GET['page']) && $_GET['page'] == 'wpflatadmin') {
    wp_enqueue_media();
    wp_enqueue_script('logo-uploader-js', plugin_dir_url( __FILE__ ) .'../assets/js/logo-uploader.js', array('jquery'));
}
?>

</div>
