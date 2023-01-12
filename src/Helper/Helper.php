<?php

namespace BingoPress\Helper;

!defined( 'WPINC ' ) or die;

/**
 * Helper library for BingoPress framework
 *
 * @package    BingoPress
 * @subpackage BingoPress\Includes
 */

class Helper {

    /** Load Trait */
    use File;
    use Directory;
    use Option;

    /**
     * Define const which will be used within the framework
     * @param   object   $theme     WordPress theme object
     * @return void
     */
    public function defineConst($theme){
        define('BINGOPRESS_NAME', $theme->getName());
        define('BINGOPRESS_VERSION', $theme->getVersion());
        define('BINGOPRESS_PRODUCTION', $theme->isProduction());
        define('BINGOPRESS_PATH', json_encode( $theme->getPath() ));
    }

}
