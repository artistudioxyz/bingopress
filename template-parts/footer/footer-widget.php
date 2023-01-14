<?php
$bingopress = \BingoPress\Theme::getInstance();
$description = get_theme_mod( 'bingopress_footer_about_text', get_bloginfo() );
$social_media =  $bingopress->getConfig()->default->bingopress_social_media;
?>
<section class="bg-white body-font border-t border-gray-100 md:px-6">
    <div id="footer-widgets" class="container grid md:grid-cols-6 gap-6 px-4 md:px-0 py-8 mx-auto bingopress-container sm:flex-row">
        <div class="footer-about col-span-2 pr-12">
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): ?>
				<?php the_custom_logo(); ?>
			<?php else: ?>
				<?php bloginfo(); ?> <?php bloginfo('description'); ?>
			<?php endif; ?>
            <div class="pt-4 text-gray-500"><?php echo wp_kses_post($description) ?></div>
            <div class="footer-social-media flex pt-3 text-gray-400">
                <?php if($social_media): ?>
                    <?php foreach($social_media as $social): ?>
                        <?php $social->link = get_theme_mod(sprintf('bingopress_footer_social_%s',$social->ID), ''); ?>
                        <?php if($social->link): ?>
                            <a href="<?php echo esc_url($social->link) ?>" target="_blank" class="mr-3 hover:text-gray-600">
                                <i class="<?php echo esc_attr($social->icon) ?>"></i>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="footer-widget"><?php dynamic_sidebar( 'footer-1' ); ?></div>
        <div class="footer-widget"><?php dynamic_sidebar( 'footer-2' ); ?></div>
        <div class="footer-widget"><?php dynamic_sidebar( 'footer-3' ); ?></div>
        <div class="footer-widget"><?php dynamic_sidebar( 'footer-4' ); ?></div>
    </div>
</section>
