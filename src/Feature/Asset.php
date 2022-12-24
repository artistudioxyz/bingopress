<?php

namespace BingoPress\Feature;

! defined( 'WPINC ' ) or die;

/**
 * Initiate framework
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Asset extends Feature {

	/**
	 * Feature construect
	 *
	 * @return void
	 * @var    object   $theme     Feature configuration
	 * @pattern prototype
	 */
	public function __construct( $theme ) {
		parent::__construct( $theme );
		$this->WP          = $theme->getWP();
		$this->key         = 'core_asset';
		$this->name        = 'Asset';
		$this->description = 'Handles theme core asset';
	}

	/**
	 * Sanitize input
	 */
	public function sanitize() {
		/** Grab Data */
		$this->params = $_POST;
		$this->params = $this->params['bingopress_assets'];

		/** Sanitize Text Field */
		$this->params = (object) $this->WP->sanitizeTextField( $this->params );
	}

	/**
	 * Transform data before save
	 */
	public function transform() {
		/** Validate active/inactive asset */
		foreach ( $this->options as $base => $assets ) {
			foreach ( $assets as $key => &$value ) {
				$value->status = $this->params->{$base[ $key ]['status']} === '1';
			}
		}

		return $this->options;
	}

}
