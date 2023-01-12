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
     * @param   object  WordPress object
     * @return void
     */
    public function defineConst($framework){
        define('BINGOPRESS_NAME', $framework->getName());
        define('BINGOPRESS_VERSION', $framework->getVersion());
        define('BINGOPRESS_PRODUCTION', $framework->isProduction());
        define('BINGOPRESS_PATH', json_encode( $framework->getPath() ));
    }

}
