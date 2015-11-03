<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfjn
 */

?>
<section class="pattern3"></section>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title white act">', '</h1>' ); ?>
	</header><!-- .entry-header -->

  <div class="big-text-container"><!-- flex parent -->
  	<div class="entry-content big-text">	
		<?php the_content(); ?>
	<button class="vet-button brown-button">learn how to vet non-profits</button>	
 	</div>	
  </div>

  <h1 class="special2">Places to Give &raquo; Vetted by BFJN.</h1>
		

		
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bfjn' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		</footer><!-- .entry-footer -->
</article><!-- #post-## -->

