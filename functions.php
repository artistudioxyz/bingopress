<?php

! defined( 'WPINC ' ) || die;

/** Load Composer Vendor */
require get_template_directory( __FILE__ ) . '/vendor/autoload.php';

/** Initiate */
$bingopress = new BingoPress\Theme();
$bingopress->run();

/** Activation and Deactivation */
add_action('admin_init', function(){
    global $pagenow;
    if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
        delete_option( 'bingopress_config' );
    }
});
