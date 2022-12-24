<?php

namespace BingoPress\Controller;

! defined( 'WPINC ' ) or die;

/**
* Initiate framework
*
* @package    BingoPress
* @subpackage BingoPress/Controller
*/

use BingoPress\View;
use BingoPress\WordPress\Hook\Action;
use BingoPress\WordPress\Theme\Page;

class BackendPage extends Base {

	/**
	 * Admin constructor
	 *
	 * @return void
	 * @var    object   $theme     Theme configuration
	 * @pattern prototype
	 */
	public function __construct( $theme ) {
		parent::__construct( $theme );

		/** @backend - Add custom admin page under settings */
		$action = new Action();
		$action->setComponent( $this );
		$action->setHook( 'admin_menu' );
		$action->setCallback( 'page_setting' );
		$action->setMandatory( true );
		$action->setFeature( $theme->getFeatures()['core_backend'] );
		$this->hooks[] = $action;
	}

	/**
	 * Page Setting
	 *
	 * @backend @submenu setting
	 * @return  void
	 */
	public function page_setting() {
		/** Grab Data */
		$slug     = sprintf( '%s-setting', $this->Theme->getSlug() );
		$features = $this->page_setting_features();

        /** Ignored setting in production */
        $ignored = array( 'core_asset' );
        foreach($ignored as $key){
            if ( $this->Theme->getConfig()->production ) {
                unset($features['features'][$key]);
            }
        }

		/** Handle form submission */
		$this->page_setting_submission( $slug, $features );

		/** Section */
		$sections                    = array();
//		$sections['Backend.setting'] = array(
//			'name'   => 'Setting',
//			'active' => true,
//		);
		if ( ! $this->Theme->getConfig()->production ) {
			$sections['Backend.feature'] = array( 'name' => 'Feature' );
		}
		$sections['Backend.about'] = array( 'name' => 'About', 'active' => true );

		/** Set View */
		$view = new View( $this->Theme );
		$view->setTemplate( 'backend.default' );
		$view->setSections( $sections );
		$view->addData(
			array(
				'result'       => isset( $result ) ? $result : '',
				'background'   => 'bg-alizarin',
				'features'     => $features['features'],
				'featureHooks' => $features['featureHooks'],
                'options' => (object) (
                    (array) $this->WP->get_option( 'bingopress_config' ) +
                    (array) $this->Theme->getConfig()->default
                ),
			)
		);
		$view->setOptions( array( 'shortcode' => false ) );
        /**
         * Set Page.
         */
        $page = new Page();
        $page->setPageTitle(BINGOPRESS_NAME);
        $page->setMenuTitle(BINGOPRESS_NAME);
        $page->setCapability('manage_options');
        $page->setMenuSlug(strtolower(BINGOPRESS_NAME).'-setting');
        $page->setFunction([$page, 'loadView']);
        $page->setView($view);
        $page->build();
	}

	/**
	 * Handle Page Submission
	 */
	public function page_setting_submission( $slug, $features ) {
        $default = $this->Theme->getConfig()->default;
		$options = $this->Theme->getConfig()->options;
		if ( isset( $_GET['page'] ) && $_GET['page'] == $slug ) {
			if ( $_POST && isset( $_POST['clear-config'] ) ) { /** Clear Config */
				$this->WP->delete_option( 'bingopress_config' );
				$this->WP->update_option( 'bingopress_config', $this->Theme->getConfig()->default );
			} elseif ( $_POST ) { /** Save Config */
                $params = $_POST;

				/** Sanitize & Transform Animation */
                if ( isset( $params['bingopress_animation'] ) ) {
                    $feature = $features['features']['core_animation'];
                    $feature->sanitize();
                    $featureOption = (isset($options->bingopress_animation)) ? $options->bingopress_animation : $default->bingopress_animation;
                    $feature->setOptions( $featureOption );
                    $options->bingopress_animation = $feature->transform();
                }

				/** Sanitize & Transform Assets */
                if ( isset( $params['bingopress_assets'] ) ) {
                    $feature = $features['features']['core_asset'];
                    $feature->sanitize();
                    $featureOption = (isset($options->bingopress_assets)) ? $options->bingopress_assets : $default->bingopress_assets;
                    $feature->setOptions( $featureOption );
                    $options->bingopress_assets = $feature->transform();
                }

                /** Sanitize & Transform Order */
                if ( isset( $params['bingopress_design'] ) ) {
                    $feature = $features['features']['core_design'];
                    $featureOption = (isset($options->bingopress_design)) ? $options->bingopress_design : $default->bingopress_design;
                    $feature->setOptions( $featureOption );
                    $feature->sanitize();
                    $options->bingopress_design = $feature->transform();
                }

				/** Sanitize & Transform Order */
                if ( isset( $params['bingopress_order'] ) ) {
                    $feature = $features['features']['core_order'];
                    $feature->sanitize();
                    $options->bingopress_order = $feature->transform();
                }

                /** Sanitize & Transform Feature */
                if ( isset( $params['bingopress_hooks'] ) ) {
                    $feature = $features['features']['core_hooks'];
                    $feature->sanitize();
                    $options->bingopress_hooks = $feature->getParams();
                }

                /** Sanitize & Transform Page 404 (Site Identity) */
                if ( isset( $params['bingopress_page_404'] ) ) {
                    $feature = $features['features']['core_siteidentity'];
                    $feature->sanitize();
                    $options->bingopress_page_404 = $feature->getParams();
                }
				/** Save config */
				$this->WP->update_option( 'bingopress_config', $options );
			}
		}
	}

	/**
	 * Get Lists of registered features, controller, & APIs
	 */
	public function page_setting_features() {
		/** Transform features */
		$features     = $this->Theme->getFeatures();
		$featureHooks = array();

		/** Map Controller */
		foreach ( $this->Theme->getControllers() as $name => $controller ) {
			foreach ( $controller->getHooks() as $hook ) {
				$feature                    = ( $hook->getFeature() ) ? $hook->getFeature()->getKey() : 'others';
				$featureHooks[ $feature ][] = $hook;
			}
		}
		/** Map APIs */
		$APIs = $this->Theme->getApis();
		if ( $APIs ) {
			foreach ( $APIs as $name => $controller ) {
				foreach ( $controller->getHooks() as $hook ) {
					$feature                    = ( $hook->getFeature() ) ? $hook->getFeature()->getKey() : 'others';
					$featureHooks[ $feature ][] = $hook;
				}
			}
		}

		return array(
			'features'     => $features,
			'featureHooks' => $featureHooks,
		);
	}

}
