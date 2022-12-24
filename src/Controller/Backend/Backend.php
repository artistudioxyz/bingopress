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

use BingoPress\WordPress\Hook\Action;

class Backend extends Base {

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
		$action->setFeature( $theme->getFeatures()['core_backend'] );
		$this->hooks[] = $action;
	}

	/**
	 * Eneque scripts @backend
	 *
	 * @return  void
	 */
	public function backend_enequeue() {
		define( 'BINGOPRESS_SCREEN', json_encode( $this->WP->getScreen() ) );
        $default = $this->Theme->getConfig()->default;
		$config  = $this->Theme->getConfig()->options;
        $screen  = $this->WP->getScreen();
		$slug    = sprintf( '%s-setting', $this->Theme->getSlug() );
		$screens = array( sprintf( 'appearance_page_%s', $slug ) );
		$types   = array( 'bingopress' );

		/** Load Inline Script */
		$this->WP->wp_enqueue_script( 'bingopress-local', 'local/bingopress.js', array(), '', true );
		$this->WP->wp_localize_script(
			'bingopress-local',
			'BINGOPRESS_THEME',
			array(
				'name'    => BINGOPRESS_NAME,
				'version' => BINGOPRESS_VERSION,
				'screen'  => BINGOPRESS_SCREEN,
				'path'    => BINGOPRESS_PATH,
                'options' => (object) ((array) $config + (array) $default),
			)
		);

		/** Load Core Vendors */
        wp_enqueue_script('jquery');

		/** Load Vendors */
		if ( isset( $config->bingopress_animation->enable ) && $config->bingopress_animation->enable ) {
			$this->WP->wp_enqueue_style( 'animatecss', 'vendor/animatecss/animate.min.css' );
		}
        if ( in_array( $screen->base, $screens )  ) {
            $this->WP->enqueue_assets( $config->bingopress_assets->backend );
		}

		/** Load Theme Assets */
		$this->WP->wp_enqueue_style( 'bingopress', 'build/css/backend.min.css' );
		$this->WP->wp_enqueue_script( 'bingopress', 'build/js/backend/theme.min.js', array(), '', true );
	}

}
