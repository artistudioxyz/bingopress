<?php

namespace BingoPress\Wordpress\Hook;

!defined( 'WPINC ' ) or die;

/**
 * Abstract class for hook
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes\Wordpress
 */

class Shortcode extends Hook {

    /**
     * Run hook
     * @return  void
     * NOTE: Theme can not run add_shortcode function
     */
    public function run(){}

}