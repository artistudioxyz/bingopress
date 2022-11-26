<?php

namespace BingoPress\Feature;

! defined( 'WPINC ' ) or die;

/**
 * Initiate plugins
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Animation extends Feature {

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
		$this->key         = 'core_animation';
		$this->name        = 'Animation';
		$this->description = 'Handles plugin core animation';
	}

	/**
	 * Sanitize input
	 */
	public function sanitize() {
		/** Grab Data */
		$this->params = $_POST;
		$this->params = $this->params['bingopress_animation'];

		/** Sanitize Text Field */
		$this->params = (object) $this->WP->sanitizeTextField( $this->params );
	}

	/**
	 * Transform data before save
	 */
	public function transform() {
		$this->options->enable   = ( in_array( $this->params->enable, array( 'true', '1', 1 ) ) ) ? 1 : 0;
        $this->params->elements = isset($this->params->elements) ? $this->params->elements : [];
		$this->options->elements = (object) array_merge(
            (array) $this->options->elements,
            (array) $this->params->elements);
		return $this->options;
	}

}
