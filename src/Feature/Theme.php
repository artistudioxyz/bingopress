<?php

namespace BingoPress\Feature;

!defined( 'WPINC ' ) or die;

/**
 * Initiate themes
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Theme extends Feature {

    /**
     * Feature construect
     * @return void
     * @var    object   $theme     Feature configuration
     * @pattern prototype
     */
    public function __construct($theme){
        parent::__construct($theme);
        $this->key = 'core_theme';
        $this->name = 'Theme';
        $this->description = 'Handles theme core function & option';
    }

}