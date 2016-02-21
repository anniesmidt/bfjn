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
            
        <a href="http://localhost/bfjn/learn_tiles/lazarus-at-the-gate-workshops/" class="button-text">
          <button class="act-buttons act-button1">learn more</button>
        </a>
      
        <a href="http://localhost/bfjn/give/" class="button-text">
          <button class="act-buttons act-button2">give
meaningfully</button>
        </a>
      
        <a href="http://localhost/bfjn/give/#LATG-download-offer" class="button-text">
          <button class="act-buttons act-button3">join with 
others</button>
        </a>
      
      <a href="http://localhost/bfjn/learn_tiles/buying-justly-and-ethical-consumption/" class="button-text">
          <button class="act-buttons act-button4">buy ethically</button>
      </a>
          
		</section>
     		
  <h1 class="special2">Events Calendar &raquo; Get involved.</h1>
		

<?php

// check if the repeater field has rows of data
if( have_rows('month_block') ):

 	// loop through the rows of data
    while ( have_rows('month_block') ) : the_row(); ?>
      <div class="each-month">
        <h2 class="calendar-month">
          <?php the_sub_field('month_and_year'); ?>
        </h2>

        <?php while ( have_rows('event_info') ) : the_row(); ?>
          <div class="each-event">
            <h3 class="event-date">
              <?php the_sub_field('date'); ?>
              </br>
            </h3>

            <p class="event-name">
              <?php the_sub_field('name'); ?>
            </p>

            <p class="event-description">
              <?php the_sub_field('description'); ?>
            </p>

            <div class="calendar-button-area">
              <?php if (get_sub_field('learn_more_button')) { ?>
                <div class="learn-more-button">
                  <a href="<?php the_sub_field('learn_more_url');?>" class="button">Learn more</a>
                </div>
                <?php } ?>

                <?php if (get_sub_field('sign_up_button')) { ?>
                  <div class="sign-up-button">
                    <a href="<?php the_sub_field('sign_up_url');?>" class="button">Sign up</a>
                  </div>
                <?php } ?>
            </div>
          </div><!--each event-->

        <? endwhile; ?>
      </div> <!-- each month -->

    <? endwhile;

else :

// no rows found
      ?></div><!--each month--><?

endif;

?>  









 
		


		
		
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






