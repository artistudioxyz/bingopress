<?php
/**
 * Template part for displaying posts
 *
 * @link https://artistudio.xyz
 */
?>

<div id="primary-content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if(!is_front_page()) get_template_part('template-parts/elements/section-hero-heading', null, ['title' => get_the_title()]) ?>

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
