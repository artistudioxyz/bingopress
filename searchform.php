<?php
/**
 * WordPress custom searchform for get_search_form() function
 */
?>

<form method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="w-full">
	<input type="text" name="s" class="w-full text-xl font-medium"
		   placeholder="<?php echo esc_attr__('Search ...','bingopress') ?>">
</form>
