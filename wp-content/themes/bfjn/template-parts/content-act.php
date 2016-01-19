<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bfjn
 */

?>
<section class="pattern2"></section>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title white act">', '</h1>' ); ?>
	</header><!-- .entry-header -->


	<div class="entry-content">
		
		<section id="act-buttons-area">
      <button href="#" class="act-buttons act-button1">get educated</button>
      <button href="#" class="act-buttons act-button2">give
meaningfully</button>		
      <button href="#" class="act-buttons act-button3">join with 
others</button>
      <button href="#" class="act-buttons act-button4">buy 
ethically</button>
		</section>
		
		
  <h1 class="special2">Events Calendar &raquo; Get involved.</h1>
		
<section class="month-holder">		

<?php

// check if the repeater field has rows of data
if( have_rows('month_block') ):

 	// loop through the rows of data
    while ( have_rows('month_block') ) : the_row();

        // display a sub field value
        the_sub_field('month_and_year');
        while ( have_rows('event_info') ) : the_row();
            ?>
            <div class="event-styles">
            <?php 
            the_sub_field('date');
            the_sub_field('name');
            ?>
            </div>
            <?php

        endwhile;

    endwhile;

else :

    // no rows found

endif;

?>










 
		
</section>


		
		
		<?php the_content(); ?>
		
		
		
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

