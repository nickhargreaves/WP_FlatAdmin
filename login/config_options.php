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

// Now display the settings editing screen

echo '<div class="wrap">';

// header

echo "<h4>" . __( 'WP Flat Admin Settings', 'menu-test' ) . "</h4>";

// settings form

?>


<!--- stuff -->
<?php
   // wp_enqueue_media();
?>
<label for="upload_image">
    <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
    <input type="hidden" id="save_url" value="<?php echo plugin_dir_url( __FILE__ ) .'save_url.php'?>">
    <input id="upload_image" type="text" name="<?php echo $data_field_name; ?>"  value="<?php echo $opt_val; ?>" class="form-control"/>
    <input id="upload_image_button" class="button" type="button" value="Upload Custom Logo" />
</label>
<div id="show_image">

    <?php
        if(!empty($opt_val)){
            print "<img src='" .$opt_val. "' width='150px'>";
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
