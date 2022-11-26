<?php

/** Load Freemius */
if ( ! function_exists( 'bingopress_freemius' ) ) {
    // Create a helper function for easy SDK access.
    function bingopress_freemius() {
        return true;
        global $bingopress_freemius;

        if ( ! isset( $bingopress_freemius ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/vendor/freemius/wordpress-sdk/start.php';

            $bingopress_freemius = fs_dynamic_init( array(
                'id'                  => '9157dummy',
                'slug'                => 'bingopress',
                'type'                => 'theme',
                'public_key'          => 'pk_572cd99e98775de85c0a9aa4c28fb',
                'is_premium'          => true,
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'           => 'bingopress-setting',
                    'contact'        => false,
                    'support'        => false,
                    'parent'         => array(
                        'slug' => 'themes.php',
                    ),
                ),
            ) );
        }

        return $bingopress_freemius;
    }

    // Init Freemius.
    bingopress_freemius();
    // Signal that SDK was initiated.
    do_action( 'bingopress_freemius_loaded' );
}