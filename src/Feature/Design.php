<?php

namespace BingoPress\Feature;

! defined( 'WPINC ' ) or die;

/**
 * Initiate plugins
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Design extends Feature {

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
		$this->key         = 'core_design';
		$this->name        = 'Design';
		$this->description = 'Handles plugin core design';
	}

	/**
	 * Sanitize input
	 */
	public function sanitize() {
		/** Grab Data */
		$this->params = $_POST;
		$this->params = $this->params['bingopress_design'];

		/** Sanitize Text Field */
		$this->params = (object) $this->WP->sanitizeTextField( $this->params );
	}

	/**
	 * Transform data before save
	 */
	public function transform() {
        $this->params->size = (object) $this->params->size;
        $this->options = (object) array_merge(
            (array) $this->options,
            (array) $this->params);
		return $this->options;
	}

}
