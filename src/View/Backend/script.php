<script type="text/javascript">
    window.bingopressTheme = {
        name: '<?php echo esc_attr(BINGOPRESS_NAME) ?>',
        version: '<?php echo esc_attr(BINGOPRESS_VERSION) ?>',
        screen: <?php echo esc_attr( json_encode($screen) ) ?>,
        path: <?php echo esc_attr( json_encode($path) ) ?>,
        options: {
            animation_tab: '<?php echo esc_attr($options->bingopress_animation->elements->tab) ?>',
            animation_content: '<?php echo esc_attr($options->bingopress_animation->elements->content) ?>',
        }
    };
</script>