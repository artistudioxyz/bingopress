<?php
/**
 * The template for displaying all single posts
 *
 * @link https://artistudio.xyz
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-container' );
    comments_template();
endwhile; // End of the loop.

get_footer();
