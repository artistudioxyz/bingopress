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

class Upgrade extends Base {

    /**
     * Admin constructor
     *
     * @return void
     * @var    object   $theme     Theme configuration
     * @pattern prototype
     */
    public function __construct( $theme ) {
        parent::__construct( $theme );

        /** @backend - Handle theme upgrade */
        $action = new Action();
        $action->setComponent( $this );
        $action->setHook( 'upgrader_process_complete' );
        $action->setCallback( 'upgrade_theme' );
        $action->setAcceptedArgs( 2 );
        $action->setMandatory( false );
        $action->setDescription( __('Handle theme upgrade','bingopress') );
        $action->setFeature( $theme->getFeatures()['core_backend'] );
        $this->hooks[] = $action;
    }

    /**
     * Handle theme upgrade
     *
     * @return void
     */
    public function upgrade_theme( $upgrader_object, $options ){
        $current_framework_path_name = theme_basename( $this->Theme->getConfig()->path );
        if ($options['action'] === 'update' && $options['type'] === 'theme' ) {
            foreach($options['framework'] as $each_theme) {
                if ($each_theme == $current_framework_path_name) {
                    /** Update options */
                    $this->WP->update_option( 'bingopress_config', (object) (
                        (array) $this->Theme->getConfig()->options + (array) $this->Theme->getConfig()->default)
                    );
                }
            }
        }
    }
}
