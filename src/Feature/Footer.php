<?php

namespace BingoPress\Feature;

!defined( 'WPINC ' ) or die;

/**
 * Initiate themes
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Footer extends Feature {

    /**
     * Feature construect
     * @return void
     * @var    object   $theme     Feature configuration
     * @pattern prototype
     */
    public function __construct($theme){
        parent::__construct($theme);
        $this->WP           = $theme->getWP();
		$this->key          = 'core_footer';
        $this->name         = 'Footer';
        $this->description  = 'Handles theme frontend core function';
    }


    /**
     * Sanitize input
     */
    public function sanitize() {
        /** Grab Data */
        $this->params = $_POST;
        $this->params = $this->params['bingopress_footer'];

        /** Sanitize Text Field */
        $this->params = (object) $this->WP->sanitizeTextField( $this->params );
    }

}