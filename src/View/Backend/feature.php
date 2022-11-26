<form method="POST" id="feature-form">
    <div class="-mx-2 my-2 px-2">

        <!-- Features -->
        <?php foreach ( $features as $slug => $feature ) : ?>
            <?php $active_hooks = 0; ?>
            <?php if ( isset( $featureHooks[ $slug ] ) ) : ?>
            <div class="bg-white shadow-sm rounded-lg px-6 py-3">
                <div class="float-right flex relative">
                    <h3 class="text-3xl font-medium inline-block p-2 mt-2 text-center transition focus:outline-none waves-effect">
							<span id="bingopress_active_hooks_<?php echo esc_attr( $slug ); ?>" class="text-primary-600 border-r-2 border-gray-100 px-5">
								0
							</span>
                        <span class="text-gray-600 px-3">
								<?php echo esc_attr( count( $featureHooks[ $slug ] ) ); ?>
							</span>
                    </h3>
                </div>
                <div class="flex items-center relative">
                    <div class="text-gray-600 inline-block p-2 mr-4 text-center transition focus:outline-none waves-effect">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <h2 class="text-gray-600 text-xl">
                        <?php echo esc_attr( $feature->getName() ); ?>
                    </h2>
                </div>
                <p class="ml-2">
                    <?php echo esc_attr( $feature->getDescription() ); ?>
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 mt-4 mb-12">
                <?php foreach ( $featureHooks[ $slug ] as $hook ) : ?>
                    <?php
                    $namespace    = ( new \ReflectionClass( $hook->getComponent() ) )->getNamespaceName();
                    $name         = ( new \ReflectionClass( $hook->getComponent() ) )->getShortName();
                    $namespaceKey = str_replace( '\\', '_', strtolower( $namespace ) );
                    $hookName     = preg_replace( '/[^A-Za-z0-9_]/', '', strtolower( $hook->getHook() ) );
                    $callbackName = preg_replace( '/[^A-Za-z0-9_]/', '', strtolower( $hook->getCallback() ) );
                    $bingopress_status       = sprintf( 'hooks_%s_%s_%s_%s', $namespaceKey, strtolower( $name ), $hookName, $callbackName );
                    $bingopress_status       = ( isset( $options->bingopress_hooks->$bingopress_status ) ) ? $options->bingopress_hooks->$bingopress_status : $hook->isStatus(); // Option Exists
                    $bingopress_status       = ( $bingopress_status=='true' ) ? true : false; // Grab option status
                    if ( $bingopress_status == true || $hook->isMandatory() ) {
                        $active_hooks++;
                    }
                    $key = sprintf( 'hooks_%s_%s_%s_%s', $namespaceKey, strtolower( $name ), $hookName, $callbackName );
                    ?>
                    <div class="bg-white shadow-sm rounded-lg px-6 py-4">
                        <div class="border-b-2 border-gray-100 mb-2">
                            <div class="float-right mt-2">
                                <?php if ( ! $hook->isMandatory() ) { ?>
                                    <label for="switch_option_<?php echo esc_attr( $key ); ?>" class="flex cursor-pointer">
                                        <div class="relative">
                                            <input
                                                    type="checkbox"
                                                    id="switch_option_<?php echo esc_attr( $key ); ?>"
                                                    class="option_settings switch sr-only"
                                                    data-option="field_option_<?php echo esc_attr( $key ); ?>"
                                                <?php echo ( esc_attr( $bingopress_status ) == true || esc_attr( $hook->isMandatory() ) ) ? 'checked' : ''; ?>
                                            >
                                            <div class="block bg-gray-300 w-8 h-5 rounded-full"></div>
                                            <div class="bingopress dot absolute left-1 top-1 bg-white w-3 h-3 rounded-full transition"></div>
                                        </div>
                                    </label>
                                    <input type="hidden"
                                           id="field_option_<?php echo esc_attr( $key ); ?>"
                                           name="bingopress_hooks[<?php echo esc_attr( $key ); ?>]"
                                           value="<?php echo ( esc_attr( $bingopress_status ) == true || esc_attr( $hook->isMandatory() ) ) ? 'true' : 'false'; ?>"
                                    >
                                <?php } else { ?>
                                    <svg class="w-3 h-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="asterisk" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="#4b5563" d="M478.21 334.093L336 256l142.21-78.093c11.795-6.477 15.961-21.384 9.232-33.037l-19.48-33.741c-6.728-11.653-21.72-15.499-33.227-8.523L296 186.718l3.475-162.204C299.763 11.061 288.937 0 275.48 0h-38.96c-13.456 0-24.283 11.061-23.994 24.514L216 186.718 77.265 102.607c-11.506-6.976-26.499-3.13-33.227 8.523l-19.48 33.741c-6.728 11.653-2.562 26.56 9.233 33.037L176 256 33.79 334.093c-11.795 6.477-15.961 21.384-9.232 33.037l19.48 33.741c6.728 11.653 21.721 15.499 33.227 8.523L216 325.282l-3.475 162.204C212.237 500.939 223.064 512 236.52 512h38.961c13.456 0 24.283-11.061 23.995-24.514L296 325.282l138.735 84.111c11.506 6.976 26.499 3.13 33.227-8.523l19.48-33.741c6.728-11.653 2.563-26.559-9.232-33.036z"></path>
                                    </svg>
                                <?php } ?>
                            </div>
                            <h3 class="text-gray-600 font-semibold py-2">
                                <?php echo esc_attr( $namespace ); ?> : <?php echo esc_attr( $name ); ?>
                            </h3>
                        </div>
                        <div>
                            Hook : <?php echo esc_attr( $hook->getHook() ); ?> <br/>
                            Callback : <?php echo esc_attr( $hook->getCallback() ); ?> <br/>
                            Description : <?php echo ( esc_attr( $hook->getDescription() ) ) ? esc_attr( $hook->getDescription() ) : ''; ?> <br>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
            <script>
                /** Show number of active hooks */
                jQuery('#bingopress_active_hooks_<?php echo esc_attr( $slug ); ?>').html('<?php echo esc_attr( $active_hooks ); ?>');
            </script>
        <?php endforeach; ?>
        <!-- Features -->

        <input type="submit" class="hidden md:block my-3 py-4 px-12 float-right bg-primary-600 text-white rounded-md cursor-pointer" value="Save">

        <button type="submit" class="md:hidden fixed right-6 bottom-6 md:right-8 md:bottom-12 w-16 h-16 bg-primary-600 rounded-full hover:bg-primary-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
            <svg class="w-6 h-6 inline-block" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="#FFFFFF" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"></path>
            </svg>
        </button>

    </div>

</form>
