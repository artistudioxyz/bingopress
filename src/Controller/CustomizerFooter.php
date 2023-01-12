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

class CustomizerFooter extends Controller {

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
        $wp_customize->add_section('bingopress_component_footer', array(
            'title' => __('Footer','bingopress'),
            'description' => '',
            'panel' => 'bingopress_component_panel',
        ));

        /** Control: About Text */
        $wp_customize->add_setting('bingopress_footer_about_text', array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        ));
        $wp_customize->add_control('bingopress_footer_about_text', array(
            'label' => __('About Text','bingopress'),
            'type' => 'textarea',
            'section' => 'bingopress_component_footer',
            'priority' => 1,
        ));

        /** Control: Copyright Text */
        $wp_customize->add_setting('bingopress_footer_copyright_text', array(
            'default' => '',
            'sanitize_callback' => 'esc_attr'
        ));
        $wp_customize->add_control('bingopress_footer_copyright_text', array(
            'label' => __('Copyright Text','bingopress'),
            'section' => 'bingopress_component_footer',
            'priority' => 2,
        ));

        /** Control: Social Skype */
        foreach($this->Framework->getConfig()->default->bingopress_social_media as $social){
            $key = sprintf('bingopress_footer_social_%s',$social->ID);
            $label = sprintf('%s (%s)', __('Social Media','bingopress') ,ucwords($social->ID));
            $wp_customize->add_setting($key, array(
                'default' => '',
                'sanitize_callback' => 'esc_url'
            ));
            $wp_customize->add_control($key, array(
                'label' => $label,
                'section' => 'bingopress_component_footer',
                'priority' => 10,
            ));
        }
    }

}
