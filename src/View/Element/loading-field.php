<div
	id="<?php echo ( isset( $args['id'] ) ) ? esc_attr( $args['id'] ) : ''; ?>"
	class="<?php echo ( isset( $args['class'] ) ) ? esc_attr( $args['class'] ) : ''; ?>"
>
	<div class="bingopress-loading-field">
		<div class="row">
			<div class="">
				<img src="<?php echo esc_url( json_decode( BINGOPRESS_PATH )['plugin_url'] ); ?>/assets/img/loading.gif" class="ico-loading" alt="Loading...">
			</div>
			<div class="loading-label">
                <?php echo esc_html__('Loading ...','bingopress') ?>
			</div>
		</div>
	</div>
</div>
