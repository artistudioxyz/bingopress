<?php
/**
 * Template part for displaying posts
 *
 * @link https://artistudio.xyz
 */
?>

<div id="primary-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if(!is_front_page()): ?>
			<div class="section-hero-heading relative w-full h-32 md:h-80">
				<?php
					the_title(
						'<h1 class="text-4xl md:text-6xl font-bold text-center relative pt-4 md:pt-0 md:top-32 mb-24">',
						'</h1>'
					);
				?>
			</div>
		<?php endif; ?>

		<div class="container mx-auto bingopress-container mb-6 relative">
			<div class="lg:-mx-2">
				<div class="max-w-none entry-content px-8 lg:my-2 lg:px-2 w-full">

					<div class="md:mt-12">
						<?php the_content() ?>
					</div>

				</div>
			</div>
		</div>

	</article><!-- #post-<?php the_ID(); ?> -->
</div>
