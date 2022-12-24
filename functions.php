<?php

! defined( 'WPINC ' ) || die;

/** Load Composer Vendor */
require get_template_directory( __FILE__ ) . '/vendor/autoload.php';

/** Load Freemius */
//require get_template_directory( __FILE__ ) . '/freemius.php';

/** Initiate */
$bingopress = new BingoPress\Theme();
$bingopress->run();

/** Activation Hook */
register_activation_hook( __FILE__, array( $bingopress, 'activate' ) );

/** Uninstall Hook */
register_uninstall_hook( __FILE__, 'bingopress_uninstall_theme' );
function bingopress_uninstall_theme() { delete_option( 'bingopress_config' ); }