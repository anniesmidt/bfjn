<?php
/**
 * The template for displaying the home page only.
 *
 * @package bfjn
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
		
			<div id="CTA">
			<button type="button" class="learn-button">Learn</button>
			<button type="button" class="act-button">Act</button>
      <button type="button" class="give-button">Give</button>
			</div><!--cta-->
			
			<?php endwhile; // End of the loop. ?>	
		</main><!-- #main -->
	</div><!-- #primary -->


<div id="home-offer">
  <h1 class="home-offer-title"><?php the_field('home_offer_title'); ?></h1>
  <div class="home-offer-description"><?php the_field('home_offer_description'); ?></div>
</div>







<?php get_footer(); ?>
