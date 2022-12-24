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

class Plugin extends Base {

    /**
     * Admin constructor
     *
     * @return void
     * @var    object   $theme     Theme configuration
     * @pattern prototype
     */
    public function __construct( $theme ) {
        parent::__construct( $theme );

        /** @backend - Add setting link for theme in framework page */
        $action = new Action();
        $action->setComponent( $this );
        $action->setHook( sprintf( 'theme_action_links_%s/%s.php', $this->Theme->getSlug(), $this->Theme->getSlug() ) );
        $action->setCallback( 'theme_setting_link' );
        $action->setMandatory( false );
        $action->setAcceptedArgs( 1 );
        $action->setDescription( __('Add setting link for theme in framework page','bingopress') );
        $action->setFeature( $theme->getFeatures()['core_backend'] );
        $this->hooks[] = $action;
    }

    /**
     * Add setting link in theme page
     *
     * @backend
     * @return  void
     * @var     array   $links     Theme links
     */
    public function theme_setting_link( $links ) {
        $slug = sprintf( '%s-setting', $this->Theme->getSlug() );
        $slug = sprint('<a href="options-general.php?page=%s">%s</a>', $slug, __('Settings','bingopress') );
        return array_merge( $links, array( $slug ) );
    }

}
