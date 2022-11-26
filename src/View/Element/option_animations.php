<optgroup label="Attention Seekers">
    <?php $opts = [ 'bounce', 'flash', 'pulse', 'rubberBand', 'shake', 'swing', 'tada', 'wobble', 'jello', 'heartBeat' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Bouncing Entrances">
    <?php $opts = [ 'bounceIn', 'bounceInDown', 'bounceInLeft', 'bounceInRight', 'bounceInUp', ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Bouncing Exits">
    <?php $opts = [ 'bounceOut', 'bounceOutDown', 'bounceOutLeft', 'bounceOutRight', 'bounceOutUp', ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Fading Entrances">
    <?php $opts = [ 'fadeIn', 'fadeInDown', 'fadeInDownBig', 'fadeInLeft', 'fadeInLeftBig', 'fadeInRight', 'fadeInRightBig', 'fadeInUp', 'fadeInUpBig' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Fading Exits">
    <?php $opts = [ 'fadeOut', 'fadeOutDown', 'fadeOutDownBig', 'fadeOutLeft', 'fadeOutLeftBig', 'fadeOutRight', 'fadeOutRightBig', 'fadeOutUp', 'fadeOutUpBig' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Flippers">
    <?php $opts = [ 'flip', 'flipInX', 'flipInY', 'flipOutX', 'flipOutY' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Lightspeed">
    <?php $opts = [ 'lightSpeedIn', 'lightSpeedOut' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Rotating Entrances">
    <?php $opts = [ 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Rotating Exits">
    <?php $opts = [ 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Sliding Entrances">
    <?php $opts = [ 'slideInUp', 'slideInDown', 'slideInLeft', 'slideInRight' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Sliding Exits">
    <?php $opts = [ 'slideOutUp', 'slideOutDown', 'slideOutLeft', 'slideOutRight' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Zoom Entrances">
    <?php $opts = [ 'zoomIn', 'zoomInDown', 'zoomInLeft', 'zoomInRight', 'zoomInUp' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Zoom Exits">
    <?php $opts = [ 'zoomOut', 'zoomOutDown', 'zoomOutLeft', 'zoomOutRight', 'zoomOutUp' ]; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>
<optgroup label="Specials">
    <?php $opts = [ 'hinge', 'jackInTheBox', 'rollIn', 'rollOut']; ?>
    <?php foreach($opts as $key => $opt): ?>
        <option value="<?php echo esc_attr($opt) ?>" <?php echo ($opt==$args['value']) ? 'selected' : '' ?>><?php echo esc_html($opt) ?></option>
    <?php endforeach; ?>
</optgroup>