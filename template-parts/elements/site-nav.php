<!-- Navigation -->
<section id="site-nav" class="w-full t-0 px-4 md:px-6 antialiased <?php echo (is_front_page() || is_404()) ? 'md:bg-transparent md:border-transparent' : 'md:absolute' ?> z-10">
    <div class="mx-auto bingopress-container">
        <nav class="relative z-50 h-24 select-none">
            <div class="container relative flex flex-wrap items-start justify-between h-24 mx-auto font-medium md:overflow-visible lg:justify-center sm:px-4 md:px-0">
                <div class="flex items-center justify-start sm:w-3/4 md:w-1/4 h-full">
                    <a href="<?php echo esc_url(home_url()) ?>" class="inline-block py-4 md:py-0">
                        <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): ?>
                            <?php the_custom_logo(); ?>
                        <?php else: ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.png') ?>" class="h-6" alt="Logo">
                        <?php endif; ?>
                    </a>
                </div>
                <div id="menu-nav" class="transition-all ease-in-out duration-100 top-0 left-0 items-start w-full h-screen md:h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 fixed md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex hidden md:block">
                    <div class="menu_primary_container w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                        <div class="rounded-full cursor-pointer absolute right-0 mr-8 mt-4 md:hidden">
                            <svg class="site-mobile-nav-hide w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div class="mx-6 my-4 md:hidden">
                            <a href="<?php echo esc_url(home_url()) ?>">
                                <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): ?>
                                    <?php the_custom_logo(); ?>
                                <?php else: ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logo.png') ?>" class="h-4" alt="Logo">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="flex flex-col items-start justify-end w-full pb-4 md:items-center md:flex-row md:py-0">
                            <?php
                            wp_nav_menu([
                                'menu_class'        => "menu_primary",
                                'theme_location'    => "primary",
                            ]);
                            ?>
                            <div class="bingopress-search-button top-0 left-0 hidden py-2 mt-6 ml-10 mr-2 text-gray-600 lg:inline-block md:mt-0 md:ml-2 lg:mx-6 md:relative cursor-pointer">
                                <svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row gap-x-2 items-center items-end justify-center rounded-full h-full cursor-pointer md:hidden">
                    <div class="bingopress-search-button cursor-pointer">
                        <svg class="site-mobile-nav-hide w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </div>
                    <svg class="site-mobile-nav-show w-6 h-6 text-gray-700" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak="">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </div>
            </div>
        </nav>
    </div>
</section>

