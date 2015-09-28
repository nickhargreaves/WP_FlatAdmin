<?php

/**
 * Created by PhpStorm.
 * User: nick
 * Date: 28/09/15
 * Time: 12:23
 */
require(realpath(dirname(__FILE__)) . '/../../../../wp-blog-header.php');

// See if the user has posted us some information
// If they did, this hidden field will be set to 'Y'
// Read their posted value
$opt_val = $_POST[ 'url' ];

// Save the posted value in the database
update_option( 'wp_flat_admin_custom_logo_path', $opt_val );

?>


