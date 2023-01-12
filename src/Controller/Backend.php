<?php

namespace BingoPress\Controller;

! defined( 'WPINC ' ) or die;

/**
 * Theme hooks in a backend
 *setComponent
 *
 * @package    BingoPress
 * @subpackage BingoPress/Controller
 */

use BingoPress\Controller;
use BingoPress\WordPress\Hook\Action;

class Backend extends Controller {

	/**
	 * Admin constructor
	 *
	 * @return void
	 * @var    object   $theme     Theme configuration
	 * @pattern prototype
	 */
	public function __construct( $theme ) {
		parent::__construct( $theme );

		/** @backend - Eneque scripts */
        $action = new Action();
        $action->setComponent( $this );
		$action->setHook( 'admin_enqueue_scripts' );
		$action->setCallback( 'backend_enequeue' );
		$action->setAcceptedArgs( 0 );
		$action->setMandatory( true );
		$action->setDescription( __('Enqueue backend framework assets','bingopress') );
		$this->hooks[] = $action;
	}

	/**
	 * Eneque scripts @backend
	 *
	 * @return  void
	 */
	public function backend_enequeue() {
		define( 'BINGOPRESS_SCREEN', json_encode( $this->WP->getScreen() ) );
        $default = $this->Framework->getConfig()->default;
		$config  = $this->Framework->getConfig()->options;
        $screen  = $this->WP->getScreen();
		$slug    = sprintf( '%s-setting', $this->Framework->getSlug() );
		$screens = array( sprintf( 'appearance_page_%s', $slug ) );

		/** Load Core Vendors */
        wp_enqueue_script('jquery');

		/** Load Vendors */
        if ( in_array( $screen->base, $screens )  ) {
            $this->WP->enqueue_assets( $config->bingopress_assets->backend );
			$this->WP->wp_enqueue_style( 'animatecss', 'vendor/animatecss/animate.min.css' );

			/** Load Theme Assets */
			$this->WP->wp_enqueue_style( 'bingopress', 'build/css/backend.min.css' );
			$this->WP->wp_enqueue_script( 'bingopress', 'build/js/backend/backend.min.js', array(), '', true );
		}

	}

}
