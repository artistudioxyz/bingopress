<?php
/**
 * Template part for displaying posts
 *
 * @link https://artistudio.xyz
 */

/** Get Post & Featured Image */
global $post;
$post->featured = get_the_post_thumbnail_url($post->ID, 'full');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if(!is_front_page()) get_template_part('template-parts/elements/section-hero-heading', null, ['title' => $post->post_title]) ?>

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
