<?php
/*
 * Plugin Name:       Floating Awesome Button
 * Plugin URI:        https://artistudio.xyz
 * Description:       Floating Awesome Button (BINGOPRESS) is customizable action button that can help you display custom content (modal, shortcodes, widgets, links, etc).
 * Version:           1.3.6
 * Author:            Agung Sundoro
 * Author URI:        https://wiki.artistudio.xyz/
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * SOFTWARE LICENSE INFORMATION
 *
 * Copyright 2021 Artistudio, all rights reserved.
 *
 * For detailed information regarding to the licensing of
 * this software, please review the license.txt
*/

! defined( 'WPINC ' ) || die;

/** Load Composer Vendor */
require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/** Load Freemius */
//require plugin_dir_path( __FILE__ ) . 'freemius.php';

/** Initiate Plugin */
$bingopress = new BingoPress\Theme();
$bingopress->run();

/** Activation Hook */
register_activation_hook( __FILE__, array( $bingopress, 'activate' ) );

/** Uninstall Hook */
register_uninstall_hook( __FILE__, 'bingopress_uninstall_theme' );
function bingopress_uninstall_theme() { delete_option( 'bingopress_config' ); }