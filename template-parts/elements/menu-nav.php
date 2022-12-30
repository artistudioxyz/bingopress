<div class="w-full h-auto md:h-full overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none relative md:flex md:flex-row">
	<a href="#" class="site-mobile-nav-hide rounded-full absolute right-0 mr-4 mt-4 md:hidden">
		<svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
		</svg>
	</a>
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
		<a href="<?php echo esc_url(site_url() . '?s')  ?>" class="hidden md:inline-block">
			<div class="top-0 left-0 py-2 mt-6 ml-10 mr-2 text-gray-600 md:mt-0 md:ml-2 lg:mx-6 md:relative cursor-pointer">
				<svg class="inline w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
			</div>
		</a>
	</div>
</div>
