<?php

namespace BingoPress\Feature;

!defined( 'WPINC ' ) or die;

/**
 * Initiate framework
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Frontend extends Feature {

    /**
     * Feature construect
     * @return void
     * @var    object   $theme     Feature configuration
     * @pattern prototype
     */
    public function __construct($theme){
        parent::__construct($theme);
        $this->key = 'core_frontend';
        $this->name = 'Frontend';
        $this->description = 'Handles theme frontend core function';
    }

}