<?php if ( (array) $options->bingopress_assets->backend ) : ?>
<h2 class="text-lg py-4 my-4 border-b border-gray-200">Backend</h2>
<div class="flex flex-wrap overflow-hidden">
	<?php foreach ( $options->bingopress_assets->backend as $asset_id => $asset ) : ?>
		<?php $asset_key = preg_replace( '/[^\p{L}\p{N}\s]/u', '-', $asset_id ); ?>
		<div class="w-full overflow-hidden lg:w-1/4 px-2 py-2">
			<div class="bg-white shadow-md border border-gray-200 rounded-lg grid grid-cols-3 px-6 pt-4">
				<div class="font-medium text-gray-600 col-span-2">
					<?php
                        $bingopress_path = json_decode( BINGOPRESS_PATH )->framework_url . 'assets/';
					if ( ! strpos( $asset->src, '//' ) ) {
						$asset->src = $bingopress_path . $asset->src;
					}
					?>
					<a href="<?php echo esc_url( $asset->src ); ?>" target="_blank"><?php echo esc_html( $asset_id ); ?></a>
				</div>
				<div>
					<div class="flex mb-4 float-right">
						<label for="switch_option_backend_assets_<?php echo esc_attr( $asset_key ); ?>" class="flex cursor-pointer">
							<div class="relative">
								<input
									type="checkbox"
									id="switch_option_backend_assets_<?php echo esc_attr( $asset_key ); ?>"
									class="option_settings switch sr-only"
									data-option="field_option_backend_assets_<?php echo esc_attr( $asset_key ); ?>"
									<?php echo ( $asset->status ) ? 'checked' : ''; ?>
								>
								<div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
								<div class="bingopress absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"></div>
							</div>
						</label>
						<input type="hidden"
						   class="field_option_backend_assets"
                           name="bingopress_assets[backend][<?php echo esc_attr( $asset_key ); ?>][status]"
						   id="field_option_backend_assets_<?php echo esc_attr( $asset_key ); ?>"
						   value="<?php echo ( esc_attr( $asset->status ) ) ? true : false; ?>"
						   data-option="<?php echo esc_attr( $asset_id ); ?>"
						>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>

<?php if ( (array) $options->bingopress_assets->frontend ) : ?>
<h2 class="text-lg py-4 my-4 border-b border-gray-200">Frontend</h2>
<div class="flex flex-wrap overflow-hidden">
	<?php foreach ( $options->bingopress_assets->frontend as $asset_id => $asset ) : ?>
		<?php $asset_key = preg_replace( '/[^\p{L}\p{N}\s]/u', '-', $asset_id ); ?>
		<div class="w-full overflow-hidden lg:w-1/4 px-2 py-2">
			<div class="bg-white shadow-md border border-gray-200 rounded-lg grid grid-cols-3 px-6 pt-4">
				<div class="font-medium text-gray-600 col-span-2">
					<?php
						$bingopress_path = json_decode( BINGOPRESS_PATH )->framework_url . 'assets/';
					if ( ! strpos( $asset->src, '//' ) ) {
						$asset->src = $bingopress_path . $asset->src;
					}
					?>
					<a href="<?php echo esc_url( $asset->src ); ?>" target="_blank"><?php echo esc_html( $asset_id ); ?></a>
				</div>
				<div>
					<div class="flex mb-4 float-right">
						<label for="switch_option_frontend_assets_<?php echo esc_attr( $asset_key ); ?>" class="flex cursor-pointer">
							<div class="relative">
								<input
										type="checkbox"
										id="switch_option_frontend_assets_<?php echo esc_attr( $asset_key ); ?>"
										class="option_settings switch sr-only"
										data-option="field_option_frontend_assets_<?php echo esc_attr( $asset_key ); ?>"
									<?php echo ( esc_attr( $asset->status ) ) ? 'checked' : ''; ?>
								>
								<div class="block bg-gray-300 w-10 h-6 rounded-full"></div>
								<div class="bingopress absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"></div>
							</div>
						</label>
						<input type="hidden"
							   class="field_option_frontend_assets"
                               name="bingopress_assets[frontend][<?php echo esc_attr( $asset_key ); ?>][status]"
							   id="field_option_frontend_assets_<?php echo esc_attr( $asset_key ); ?>"
							   value="<?php echo ( esc_attr( $asset->status ) ) ? true : false; ?>"
							   data-option="<?php echo esc_attr( $asset_id ); ?>"
						>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>