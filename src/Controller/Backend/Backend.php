<?php

namespace BingoPress\Controller;

! defined( 'WPINC ' ) or die;

/**
 * Plugin hooks in a backend
 *setComponent
 *
 * @package    BingoPress
 * @subpackage BingoPress/Controller
 */

use BingoPress\Wordpress\Hook\Action;

class Backend extends Base {

	/**
	 * Admin constructor
	 *
	 * @return void
	 * @var    object   $theme     Plugin configuration
	 * @pattern prototype
	 */
	public function __construct( $theme ) {
		parent::__construct( $theme );

        /** @backend - Handle plugin upgrade */
		$action = new Action();
		$action->setComponent( $this );
        $action->setHook( 'upgrader_process_complete' );
        $action->setCallback( 'upgrade_plugin' );
        $action->setAcceptedArgs( 2 );
        $action->setMandatory( false );
        $action->setDescription( __('Handle plugin upgrade','bingopress') );
        $action->setFeature( $theme->getFeatures()['core_backend'] );
		$this->hooks[] = $action;

		/** @backend - Eneque scripts */
		$action = clone $action;
		$action->setHook( 'admin_enqueue_scripts' );
		$action->setCallback( 'backend_enequeue' );
		$action->setAcceptedArgs( 0 );
		$action->setMandatory( true );
		$action->setDescription( __('Enqueue backend plugins assets','bingopress') );
		$action->setFeature( $theme->getFeatures()['core_backend'] );
		$this->hooks[] = $action;

		/** @backend - Add setting link for plugin in plugins page */
		$action = clone $action;
		$action->setHook( sprintf( 'plugin_action_links_%s/%s.php', $this->Theme->getSlug(), $this->Theme->getSlug() ) );
		$action->setCallback( 'plugin_setting_link' );
		$action->setMandatory( false );
		$action->setAcceptedArgs( 1 );
		$action->setDescription( __('Add setting link for plugin in plugins page','bingopress') );
		$action->setFeature( $theme->getFeatures()['core_backend'] );
		$this->hooks[] = $action;
	}

    /**
     * Handle plugin upgrade
     *
     * @return void
     */
    public function upgrade_plugin( $upgrader_object, $options ){
        $current_plugin_path_name = plugin_basename( $this->Theme->getConfig()->path );
        if ($options['action'] === 'update' && $options['type'] === 'plugin' ) {
            foreach($options['plugins'] as $each_plugin) {
                if ($each_plugin == $current_plugin_path_name) {
                    /** Update options */
                    $this->WP->update_option( 'bingopress_config', (object) (
                        (array) $this->Theme->getConfig()->options + (array) $this->Theme->getConfig()->default)
                    );
                }
            }
        }
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
			'BINGOPRESS_PLUGIN',
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

		/** Load Plugin Assets */
		$this->WP->wp_enqueue_style( 'bingopress', 'build/css/backend.min.css' );
		$this->WP->wp_enqueue_script( 'bingopress', 'build/js/backend/plugin.min.js', array(), '', true );
	}

	/**
	 * Add setting link in plugin page
	 *
	 * @backend
	 * @return  void
	 * @var     array   $links     Plugin links
	 */
	public function plugin_setting_link( $links ) {
		$slug = sprintf( '%s-setting', $this->Theme->getSlug() );
        $slug = sprint('<a href="options-general.php?page=%s">%s</a>', $slug, __('Settings','bingopress') );
		return array_merge( $links, array( $slug ) );
	}

}
