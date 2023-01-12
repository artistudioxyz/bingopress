<?php

namespace BingoPress\Controller;

!defined( 'WPINC ' ) or die;

/**
 * Theme hooks in a backend
 *setComponent
 * @package    BingoPress
 * @subpackage BingoPress/Controller
 */

use BingoPress\Controller;
use BingoPress\WordPress\Hook\Action;

class Theme extends Controller {

    /**
     * Admin constructor
     * @return void
     * @var    object   $theme     Theme configuration
     * @pattern prototype
     */
    public function __construct($theme){
        parent::__construct($theme);

        /** @theme - Theme Support */
        $action = new Action();
        $action->setComponent($this);
        $action->setHook('init');
        $action->setCallback('theme_support');
        $action->setDescription(__('Theme Support','bingopress') );
        $action->setAcceptedArgs(0);
        $action->setMandatory(true);
        $this->hooks[] = $action;

        /** @theme - Nav Menu */
        $action = clone $action;
        $action->setHook('after_setup_theme');
        $action->setCallback('nav_menu');
        $action->setDescription(__('Nav Menu','bingopress') );
        $this->hooks[] = $action;

        /** @theme - WP Media */
        $action = clone $action;
        $action->setHook('admin_enqueue_scripts');
        $action->setCallback('load_media_files');
        $action->setDescription(__('Load Media Files','bingopress') );
        $this->hooks[] = $action;

    }


    /**
     * Load Media Scripts
     * @return void
     */

    public function load_media_files() {
        wp_enqueue_media();
    }

    /**
     * Theme Support
     * @return  void
     */
    public function theme_support(){
        add_theme_support('title-tag');
        add_theme_support('get_avatar');
        add_theme_support('wp_list_comments');
        add_theme_support('widgets');
        add_theme_support('custom-logo',
            [
                'height'               => 24,
                'width'                => 145,
                'flex-height'          => true,
                'flex-width'           => true,
                'header-text'          => array( 'site-title', 'site-description' ),
                'unlink-homepage-logo' => true,
            ]
        );
        add_theme_support( 'post-thumbnails' );
        add_editor_style('style-editor.css' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( "responsive-embeds" );
        add_theme_support( "wp-block-styles" );
        add_theme_support( "align-wide" );
    }

    /**
     * Nav Menu
     * @return  void
     */
    public function nav_menu(){
        register_nav_menu( 'primary', __( 'Primary Menu', 'bingopress' ) );
    }

}
