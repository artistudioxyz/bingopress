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
							<?php bloginfo(); ?> <?php bloginfo('description'); ?>
                        <?php endif; ?>
                    </a>
                </div>
                <div id="menu-nav" class="top-0 left-0 items-start w-full h-screen md:h-full p-4 md:p-0 text-sm lg:text-base bg-gray-900 bg-opacity-50 md:bg-transparent md:items-center md:w-3/4 fixed md:relative hidden md:block transition-all ease-in-out duration-100">
					<div class="w-full h-auto md:h-full overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none relative md:flex md:flex-row">
						<div class="mx-6 my-4 md:hidden">
							<a href="<?php echo esc_url(home_url()) ?>">
								<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): ?>
									<?php the_custom_logo(); ?>
								<?php else: ?>
									<?php bloginfo(); ?> <?php bloginfo('description'); ?>
								<?php endif; ?>
							</a>
						</div>
						<div class="flex flex-col items-start justify-end w-full pb-4 md:items-center md:flex-row md:py-0">
							<?php
							wp_nav_menu([
									'menu_id'			=> "menu_desktop_nav",
									'menu_class'        => "menu_primary",
									'theme_location'    => "primary",
							]);
							?>
						</div>
					</div>
                </div>
				<div id="menu-mobile-nav" class="top-0 left-0 items-start w-full h-screen md:h-full p-4 md:p-0 text-sm lg:text-base bg-gray-900 bg-opacity-50 md:bg-transparent md:items-center md:w-3/4 fixed md:relative md:hidden transition-all ease-in-out duration-100">
					<div class="w-full h-auto md:h-full overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none relative md:flex md:flex-row">
						<div class="mx-6 my-4 md:hidden">
							<a href="<?php echo esc_url(home_url()) ?>">
								<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): ?>
									<?php the_custom_logo(); ?>
								<?php else: ?>
									<?php bloginfo(); ?> <?php bloginfo('description'); ?>
								<?php endif; ?>
							</a>
						</div>
						<a href="#" id="site-mobile-nav-close-button" class="site-mobile-nav-hide rounded-full absolute top-0 right-0 mr-4 mt-4 md:hidden">
							<svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
							</svg>
						</a>
						<div class="flex flex-col items-start justify-end w-full pb-4 md:items-center md:flex-row md:py-0">
							<?php
							wp_nav_menu([
									'menu_id'			=> "menu_mobile_nav",
									'menu_class'        => "menu_primary",
									'theme_location'    => "primary",
							]);
							?>
						</div>
					</div>
					<a href="#" id="last-menu-mobile-nav"></a>
				</div>
                <div class="flex flex-row gap-x-2 items-center items-end justify-center rounded-full h-full cursor-pointer md:hidden">
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

