<?php

namespace BingoPress\WordPress\Helper;

! defined( 'WPINC ' ) or die;

/**
 * Add extra layer for WordPress functions
 *
 * @package    BingoPress
 * @subpackage BingoPress\WordPress
 */

use BingoPress\View;

trait Page {

	/**
	 * WordPress get screen
	 */
	public function getScreen() {
		global $post, $pagenow;
		try {
			$screen = function_exists( 'get_current_screen' ) ?
				get_current_screen() : (object) array();
			$screen = ( $screen ) ? $screen : (object) array();
		} catch ( Exception $e ) {
			try {
				$screen = new \stdClass();
			} catch ( Exception $e ) {
				$screen = (object) array();
			}
		}
		$screen->post    = $post;
		$screen->pagenow = $pagenow;
		return $screen;
	}

}
