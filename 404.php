<?php
/**
 * Template Name: 404 Page
 *
 * @package WordPress
 * @subpackage BingoPress
 */

get_header();
$bingopress = \BingoPress\Theme::getInstance();
$bingopress_options = $bingopress->getConfig()->options;
$bingopress_title = get_theme_mod('bingopress_404_page_title', '');
$bingopress_description = get_theme_mod('bingopress_404_page_description', '');
$bingopress_image_attributes = get_theme_mod('bingopress_404_page_cover', '');
$bingopress_image_attributes = isset($bingopress_image_attributes->ID) ? wp_get_attachment_image_url($bingopress_image_attributes->ID) : $bingopress_image_attributes;
?>
<!-- Hero -->
<section id="primary-content" class="bg-animated-rectangle w-full px-6 antialiased">

    <ul class="circles hidden md:block lg:block z-1">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>

    <div class="mx-auto max-w-7xl relative z-10">

        <!-- Main Hero Content -->
        <div class="container max-w-lg px-4 sm:py-12 md:py-12 lg:py-32 text-left md:max-w-none md:text-center flex flex-wrap overflow-hidden">
            <div class="py-12 md:py-0 w-full overflow-hidden md:order-last md:my-2 md:px-2 md:w-1/2">
                <?php if ( $bingopress_image_attributes ) : ?>
                    <img src="<?php echo esc_url($bingopress_image_attributes); ?>" />
                <?php endif; ?>
            </div>
            <div class="sm:py-24  w-full overflow-hidden md:my-2 md:px-2 md:w-1/2">
                <h1 class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 sm:leading-none md:text-6xl lg:text-7xl">
                    <?php echo esc_html($bingopress_title); ?>
                </h1>
                <div class="mt-5 text-left text-gray-500 md:mt-12 md:max-w-lg lg:text-lg">
                	<?php echo wp_kses_post($bingopress_description); ?>
                </div>

            </div>
        </div>
        <!-- End Main Hero Content -->

    </div>
</section>

<?php get_footer(); ?>
