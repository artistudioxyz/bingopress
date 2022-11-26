<form method="POST" id="setting-form">

	<div class="grid grid-cols-5 -mx-2">

		<main class="my-2 px-2 w-full overflow-hidden col-span-5 lg:col-span-4">
			<?php foreach ( $features as $key => $feature ) : ?>
				<?php
				/** Grab Data */
				$config_path = sprintf(
					'%s/src/View/Backend/Settings/%s.php',
					json_decode( BINGOPRESS_PATH )->plugin_path,
					$feature->getName()
				);
				if ( file_exists( $config_path ) ) :
					?>
					<div id="setting-<?php echo esc_attr( $key ); ?>" class="bg-white shadow-sm rounded-lg px-6 py-2 mb-4 z-0">

						<div class="px-1 py-4">
							<div class="flex items-center relative pb-4">
								<div class="text-gray-600 inline-block p-2 mr-4 text-center transition focus:outline-none waves-effect">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
									</svg>
								</div>
								<h2 class="text-gray-600 text-2xl">
									<?php echo esc_attr( $feature->getName() ); ?>
								</h2>
							</div>

							<?php $this->loadContent( 'Backend/Settings/.' . esc_attr( $feature->getName() ) ); ?>

						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</main>

		<aside class="sticky top-0 my-2 px-2 w-full overflow-hidden invisible lg:visible">

			<div class="w-full bg-white shadow-sm rounded-lg overflow-hidden">
				<div class="bg-cover-image shadow-sm bg-center bg-cover px-6 py-16">
					<div class="w-3/4 mx-auto">
						<img
								class="animate__animated animate__<?php echo esc_attr( $options->bingopress_animation->elements->logo ); ?>"
								src="<?php echo esc_url( json_decode( BINGOPRESS_PATH )->plugin_url ); ?>/assets/img/logo.png"
								alt="<?php echo esc_attr( $this->Page->getPageTitle() ); ?>"
						>
					</div>
				</div>

				<ul class="flex flex-col w-full p-4">
					<li class="my-px">
						<span class="flex font-medium text-sm text-gray-400 px-4 my-2 uppercase">Options</span>
					</li>
					<?php foreach ( $features as $key => $feature ) : ?>
						<?php
						$config_path = sprintf(
							'%s/src/View/Backend/Settings/%s.php',
							json_decode( BINGOPRESS_PATH )->plugin_path,
							$feature->getName()
						);
						if ( ! file_exists( $config_path ) ) {
							continue;
						}
						?>
						<li class="my-px">
							<a href="#setting-<?php echo esc_attr( $key ); ?>"
							   class="smooth-scroll flex flex-row items-center h-12 px-4 rounded-lg text-gray-600 hover:bg-gray-100">
								<span class="flex items-center justify-center text-lg text-gray-400">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
									</svg>
								</span>
								<span class="ml-3">
									<?php echo esc_attr( $feature->getName() ); ?>
								</span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<input type="submit" class="hidden md:block my-3 py-3 w-full bg-primary-600 text-white rounded-md cursor-pointer" value="Save">
			<a class="reset-option hidden md:block my-3 py-3 w-full bg-danger-600 text-white text-center rounded-md cursor-pointer">Reset</a>
		</aside>

		<a class="reset-option md:hidden fixed right-6 bottom-24 w-16 h-16 bg-danger-600 rounded-full hover:bg-red-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none text-center">
			<em class="fas fa-sync text-xl text-white my-4"></em>
		</a>

		<button type="submit" class="md:hidden fixed right-6 bottom-6 w-16 h-16 bg-primary-600 rounded-full hover:bg-primary-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none">
			<svg class="w-6 h-6 inline-block" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="save" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
				<path fill="#FFFFFF" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM272 80v80H144V80h128zm122 352H54a6 6 0 0 1-6-6V86a6 6 0 0 1 6-6h42v104c0 13.255 10.745 24 24 24h176c13.255 0 24-10.745 24-24V83.882l78.243 78.243a6 6 0 0 1 1.757 4.243V426a6 6 0 0 1-6 6zM224 232c-48.523 0-88 39.477-88 88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88zm0 128c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.944 40-40 40z"></path>
			</svg>
		</button>

	</div>
</form>

<!--Clear Config Modal-->
<div id="clear-config" style="display:none;">
	<form method="POST" id="clear-config-form">
		<input type="hidden" name="clear-config" value="1">
		Are you sure you want to reset the setting?
	</form>
</div>
<script type="text/javascript">
	/** Initiate Setting Scripts */
	jQuery(function($) {
		window.BINGOPRESS_PLUGIN.init_setting();
	});
</script>

<!-- Alert when form is saved -->
<?php if ( $result ) : ?>
	<script type="text/javascript">
		jQuery.dialog({
			icon: 'fas fa-check',
			closeIcon: true,
			animation: 'scale',
			columnClass: 'j-small',
			title: 'Success',
			content: 'Options saved successfully!',
		});
	</script>
<?php endif; ?>
