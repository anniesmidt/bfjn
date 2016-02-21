<?php
/**
 * The sidebar containing the blog widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bfjn
 */

if ( ! is_active_sidebar( 'sidebar-articles' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-articles' ); ?>
</div><!-- #secondary -->
