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

class Customizer404 extends Controller {

    /**
     * Admin constructor
     *
     * @return void
     * @var    object   $theme     Theme configuration
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
        $this->hooks[] = $action;
    }

    public function customize_register($wp_customize){
        /** Section: Footer */
        $wp_customize->add_section('bingopress_component_404', array(
            'title' => __('404','bingopress'),
            'description' => sprintf('<a href="%s" target="_blank" style="float:right;">Preview</a>',
                home_url() . '/404page'
            ) ,
            'panel' => 'bingopress_component_panel',
        ));

        /** Control: Title */
        $wp_customize->add_setting('bingopress_404_page_title', array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        ));
        $wp_customize->add_control('bingopress_404_page_title', array(
            'label' => __('Title','bingopress'),
            'section' => 'bingopress_component_404',
            'priority' => 1,
        ));

        /** Control: Description */
        $wp_customize->add_setting('bingopress_404_page_description', array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post'
        ));
        $wp_customize->add_control('bingopress_404_page_description', array(
            'label' => __('Description','bingopress'),
            'type' => 'textarea',
            'section' => 'bingopress_component_404',
            'priority' => 1,
        ));

        /** Control: Cover Image */
        $wp_customize->add_setting('bingopress_404_page_cover', array(
            'default' => '',
            'sanitize_callback' => array($this->Helper, 'sanitize_file')
        ));
        $wp_customize->add_control(
            new \WP_Customize_Image_Control(
                $wp_customize,
                'cover',
                array(
                    'label'      => __('Cover Image','bingopress'),
                    'section'    => 'bingopress_component_404',
                    'settings'   => 'bingopress_404_page_cover',
                )
            )
        );
    }

}
