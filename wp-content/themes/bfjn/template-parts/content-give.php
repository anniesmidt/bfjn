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
		<?php the_field('big_giving_quote'); ?>
<!-- 	<button class="vet-button brown-button">learn how to vet non-profits</button>	 -->
 	</div>	
  </div>


<div class="non-profit-holder non-profit-holder-text">
  <?php the_field('transformative_giving_text'); ?>
</div>

<!--
  <h1 class="special2">Places to Give &raquo; Vetted by BFJN.</h1>
		<section class="non-profit-holder">

<?php
$posts = get_posts(array(
	'numberposts' => -1,
	'post_type' => 'organizations'
));

if($posts)
{
	foreach($posts as $post)
	{
		echo '<h2 class="organization-type">' .
		  get_field(organization_type) . '</h2>' .
		  
		  '<p class="organization-name"><a href="#" target="_blank">' .
		  get_field(organization_name) . '</a></p>' .
		  
		  '<p class="organization-description">' .
		  get_field(organization_description) . 
		  '</p>';

	}

}

?>
		
		</section>

-->
		
		
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

