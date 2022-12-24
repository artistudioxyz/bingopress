<?php

namespace BingoPress\Controller;

!defined('WPINC ') or exit;

/*
 * Theme hooks in a backend
 *
 * @package    BingoPress
 * @subpackage BingoPress/Controller
 */

use BingoPress\Elementor\ElementorBannerSimpleWidget;
use BingoPress\View;
use BingoPress\WordPress\Hook\Action;

class Frontend extends Base
{
    /**
     * Frontend constructor.
     *
     * @return void
     *
     * @var object Theme configuration
     * @pattern prototype
     */
    public function __construct($theme)
    {
        parent::__construct($theme);

        /**
         * @frontend - Enqueue scripts
         */
        $action = new Action();
        $action->setComponent($this);
        $action->setHook('wp_enqueue_scripts');
        $action->setCallback('frontend_enequeue');
        $action->setAcceptedArgs(1);
        $action->setMandatory(true);
        $action->setDescription(__('Enqueue frontend styles and scripts','bingopress') );
        $action->setFeature($theme->getFeatures()['core_frontend']);
        $this->hooks[] = $action;

        /**
         * @frontend - Load Modals
         */
        $action = clone $action;
        $action->setHook('wp_footer');
        $action->setCallback('load_modals');
        $action->setAcceptedArgs(0);
        $action->setDescription( __('Load Modals','bingopress') );
        $action->setFeature($theme->getFeatures()['core_frontend']);
        $this->hooks[] = $action;

        /**
         * @frontend - Add After Content Widget
         */
        add_action('widgets_init',function(){
            register_sidebar(
                [
                    'name' => __('Single Content Widget', 'bingopress'),
                    'id' => 'bingopress-single-content-widget',
                    'before_widget' => '<div id="%1$s" class="widget bingopress-container %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widgettitle">',
                    'after_title' => '</h3>',
                ]
            );
        });

        /**
         * @frontend - Register footer sidebar
         */
        add_action('widgets_init',function(){
            for($i = 1; $i <= 4; $i++){
                register_sidebar( array(
                    'name'          => sprintf('Footer %s', $i),
                    'id'            => sprintf('footer-%s', $i),
                    'before_widget' => '<li id="%1$s" class="widget %2$s">',
                    'after_widget'  => '</li>',
                    'before_title'  => '<h2 class="widgettitle pb-4 text-xl font-semibold">',
                    'after_title'   => '</h2>',
                ) );
            }
        });
    }

    /**
     * Eneque scripts to @frontend.
     *
     * @return void
     *
     * @var array The current admin page
     */
    public function frontend_enequeue($hook_suffix)
    {
        define('BINGOPRESS_SCREEN', json_encode($this->WP->getScreen()));
        $config = $this->WP->get_option('bingopress_config');

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
                'premium' => $this->Helper->isPremiumPlan(),
                'rest_url'=> esc_url_raw( rest_url() ),
            )
        );

        /** Load WP Core jQuery */
        wp_enqueue_script( 'jquery' );

        /** Load Assets */
        $this->WP->enqueue_assets($config->bingopress_assets->frontend);

        /** Animate.css */
        if(isset($config->bingopress_animation) && $config->bingopress_animation) $this->WP->wp_enqueue_style( 'animatecss', 'vendor/animatecss/animate.min.css' );

        /** Load Special Theme Components */
        $components = ['search'];
        foreach($components as $component){
            $this->WP->wp_enqueue_style( sprintf('bingopress-%s-component', $component), sprintf('build/components/%s/bundle.css', $component) );
            $this->WP->wp_enqueue_script(sprintf('bingopress-%s-component', $component), sprintf('build/components/%s/bundle.js', $component), array(), '1.0', true);
        }

        /** Styles and Scripts */
        $this->WP->wp_enqueue_style('bingopress_css', "build/css/frontend.min.css");
        $this->WP->wp_enqueue_style('bingopress_theme_css', "../style.css");
        $this->WP->wp_enqueue_script('bingopress_page_js', "build/js/frontend/theme.min.js", [], '', true);
    }

    /**
     * Load Modals.
     *
     * @return void
     */
    public function load_modals()
    {
        /**
         * Set View.
         */
        $view = new View($this->Theme);
        $view->setTemplate('backend.blank');
        $view->setSections(['Frontend.modals.modal-search' => ['name' => 'Search', 'active' => true]]);
        $view->setOptions(['shortcode' => false]);
        $view->build();
    }
}
