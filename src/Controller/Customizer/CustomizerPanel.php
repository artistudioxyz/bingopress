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

class CustomizerPanel extends Base {

    /**
     * Admin constructor
     *
     * @return void
     * @var    object   $theme     Plugin configuration
     * @pattern prototype
     */
    public function __construct( $theme ) {
        parent::__construct( $theme );

        /** @customizer */
        $action = new Action();
        $action->setComponent( $this );
        $action->setHook( 'customize_register' );
        $action->setCallback( 'customize_register' );
        $action->setAcceptedArgs( 1 );
        $action->setMandatory( true );
        $action->setFeature( $theme->getFeatures()['core_backend'] );
        $this->hooks[] = $action;
    }

    public function customize_register($wp_customize){
        /** Add Panel */
        $wp_customize->add_panel('bingopress_component_panel', array(
            'title' => __('Components','bingopress'),
            'priority' => 100,
        ));
    }

}
