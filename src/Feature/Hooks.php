<?php

namespace BingoPress\Feature;

! defined( 'WPINC ' ) or die;

/**
 * Initiate framework
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Hooks extends Feature {

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
        $this->key         = 'core_hooks';
        $this->name        = 'Hooks';
        $this->description = 'Handles theme hooks management';
    }

    /**
     * Sanitize input
     */
    public function sanitize() {
        /** Grab Data */
        $this->params = $_POST;
        $this->params = $this->params['bingopress_hooks'];

        /** Sanitize Text Field */
        $this->params = (object) $this->WP->sanitizeTextField( $this->params );
    }

}