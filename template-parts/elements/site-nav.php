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
                <div id="menu-nav" class="top-0 left-0 items-start w-full h-screen md:h-full p-4 md:p-0 text-sm lg:text-base bg-gray-900 bg-opacity-50 md:bg-transparent md:items-center md:w-3/4 fixed md:relative hidden md:block transition-all ease-in-out duration-100">
					<?php get_template_part('template-parts/elements/menu-nav', null, array()); ?>
                </div>
				<div id="menu-mobile-nav" class="top-0 left-0 items-start w-full h-screen md:h-full p-4 md:p-0 text-sm lg:text-base bg-gray-900 bg-opacity-50 md:bg-transparent md:items-center md:w-3/4 fixed md:relative md:hidden transition-all ease-in-out duration-100">
					<?php get_template_part('template-parts/elements/menu-nav', null, array()); ?>
				</div>
                <div class="flex flex-row gap-x-2 items-center items-end justify-center rounded-full h-full cursor-pointer md:hidden">
                    <a href="<?php echo esc_url(site_url() . '?s')  ?>">
                        <svg class="site-mobile-nav-hide w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </a>
					<a href="#" class="site-mobile-nav-show" tabindex="0">
						<svg class="w-6 h-6 text-gray-700" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak="">
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</a>
                </div>
            </div>
        </nav>
    </div>
</section>

