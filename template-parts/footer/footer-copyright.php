<?php
$bingopress = \BingoPress\Theme::getInstance();
$copyright = sprintf('© %s %s.', date('Y'), get_bloginfo('title'));
$copyright = get_theme_mod('bingopress_footer_copyright_text', $copyright);
$social_media =  $bingopress->getConfig()->default->bingopress_social_media;
?>
<!--footer copyright-->
<section class="bg-white text-gray-500 body-font border-t border-gray-100 md:px-6">
    <div class="container flex flex-col justify-between items-center py-6 mx-auto bingopress-container sm:flex-row">
        <div class="copyright">
            <?php echo empty($copyright) ? '' : wp_kses_data($copyright) ?>
        </div>
        <div class="footer-social-media flex">
            <?php if($social_media): ?>
                <?php foreach($social_media as $social): ?>
                    <?php $social->link = get_theme_mod(sprintf('bingopress_footer_social_%s',$social->ID), ''); ?>
                    <?php if($social): ?>
                        <a href="<?php echo esc_url($social->link) ?>" target="_blank" class="ml-3 hover:text-gray-600">
                            <i class="<?php echo esc_attr($social->icon) ?>"></i>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--footer copyright-->
