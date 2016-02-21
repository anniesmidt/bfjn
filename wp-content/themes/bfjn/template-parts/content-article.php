<?php
/**
 * Template part for displaying single article posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfjn
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title single">', '</h1>' ); ?>
</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->


</article><!-- #post-## -->

