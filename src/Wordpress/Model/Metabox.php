<?php

namespace BingoPress\Wordpress\Model;

!defined( 'WPINC ' ) or die;

/**
 * Abstract class for WordPress model
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes\WordPress
 */

abstract class Metabox {

    /**
     * sanitize parameters
     * @return  void
     */
    abstract function sanitize();

    /**
     * save metabox data
     * @return  void
     */
    abstract function save();

}