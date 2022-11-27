<?php

global $wp;
global $post;
global $authordata;

$bingopress_query_search = empty($_GET['s'])? '': sanitize_text_field( wp_unslash($_GET['s']));
/** Page Title */
$bingopress_title = ($authordata) ? sprintf("Author: %s", ucwords($authordata->data->display_name)) : '';
$bingopress_title = (!$bingopress_title && strpos( home_url($wp->request), "category")) ? sprintf("Category: %s", (isset(get_the_category()[0])) ? get_the_category()[0]->name : '') : $bingopress_title;
$bingopress_title = (!$bingopress_title && $bingopress_query_search) ? sprintf("Search result for: %s", $bingopress_query_search) : $bingopress_title;
$bingopress_title = (!$bingopress_title) ? 'Archive' : $bingopress_title;

?>

<div class="container mx-auto max-w-4xl -mt-12 mb-6 relative">
    <div class="overflow-hidden lg:-mx-2">
        <div class="max-w-none entry-content overflow-hidden px-8 lg:my-2 lg:px-2 w-full">

            <div class="prose mx-auto text-center w-full max-w-4xl py-12 mt-20 block sm:hidden">
                <h1 class="prose text-5xl">
                    <?php echo esc_html($bingopress_title) ?>
                </h1>
            </div>

            <div class="w-full mx-auto overflow-hidden px-4 mb-2 md:px-12 rounded-md shadow-md bg-white border border-gray-100">
                <div class="item-center relative py-6">
                    <div class="flex">
                        <div class="text-gray-600 inline-block mt-1 mr-4 text-center transition focus:outline-none waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <form method="GET" action="<?php echo esc_url_raw( wp_unslash(home_url())) ?>" class="w-full">
                            <input type="text" name="s" class="w-full text-xl font-medium"
                                   placeholder="<?php echo esc_attr__('Search ...','bingopress') ?>">
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if ( have_posts() ) : ?>
    <div class="post-grid container mx-auto max-w-7xl content-center">
        <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content/content-archive');
        endwhile;
        ?>
    </div>

    <div class="archive-pagination container mx-auto max-w-7xl content-center text-center py-8">
        <?php
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('Previous', 'bingopress'),
            'next_text' => __('Next', 'bingopress'),
        ));
        ?>
    </div>

<?php else : ?>

    <div class="block mx-auto text-center pt-6 pb-8">
        <h2 class="text-2xl"><?php echo esc_html__('Not Found','bingopress') ?></h2>
    </div>

<?php endif; ?>