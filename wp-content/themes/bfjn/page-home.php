<?php
/**
 * The template for displaying the home page only.
 *
 * @package bfjn
 */

get_header(); ?>

<div id ="home-specific">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'home' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
		
			<div id="CTA">
			<button type="button" class="learn-button"><a href="http://localhost/bfjn/learn/Learn">Learn</a></button>
			<button type="button" class="act-button"><a href="http://localhost/bfjn/learn/Act">Act</a></button>
      <button type="button" class="give-button"><a href="http://localhost/bfjn/learn/Give">Give</a></button>
			</div><!--cta-->
			
			<?php endwhile; // End of the loop. ?>	
		</main><!-- #main -->
	</div><!-- #primary -->


<section id="home-offer">

    <h1 class="home-offer-title" a name="LATG-download-offer"><?php the_field('home_offer_title'); ?></h1>
    
    
    
    <!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<div id="mc_embed_signup">
<form action="//bostonfaithjustice.us5.list-manage.com/subscribe/post?u=a3af660228b6703660ad6b68e&amp;id=ae8b1fd6cb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2><span class="fa fa-file-pdf-o"></span>&nbsp;Get your free download</h2>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address </label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="email">
</div>
<div class="mc-field-group">
	<label for="mce-FNAME">First Name </label>
	<input type="text" value="" name="FNAME" class="" id="mce-FNAME" placeholder="first name">
</div>
<div class="mc-field-group">
	<label for="mce-LNAME">Last Name </label>
	<input type="text" value="" name="LNAME" class="" id="mce-LNAME" placeholder="last name">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_a3af660228b6703660ad6b68e_ae8b1fd6cb" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="send" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';fnames[4]='MMERGE4';ftypes[4]='text';fnames[5]='MMERGE5';ftypes[5]='text';fnames[6]='MMERGE6';ftypes[6]='phone';fnames[7]='MMERGE7';ftypes[7]='phone';fnames[8]='MMERGE8';ftypes[8]='address';fnames[9]='MMERGE9';ftypes[9]='text';fnames[10]='MMERGE10';ftypes[10]='text';fnames[11]='MMERGE11';ftypes[11]='text';fnames[12]='MMERGE12';ftypes[12]='text';fnames[13]='MMERGE13';ftypes[13]='text';fnames[14]='MMERGE14';ftypes[14]='text';fnames[15]='MMERGE15';ftypes[15]='text';fnames[16]='MMERGE16';ftypes[16]='text';fnames[17]='MMERGE17';ftypes[17]='text';fnames[18]='MMERGE18';ftypes[18]='text';fnames[19]='MMERGE19';ftypes[19]='text';fnames[20]='MMERGE20';ftypes[20]='text';fnames[21]='MMERGE21';ftypes[21]='text';fnames[22]='MMERGE22';ftypes[22]='text';fnames[23]='MMERGE23';ftypes[23]='text';fnames[24]='MMERGE24';ftypes[24]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
<!--End mc_embed_signup-->

      
    <div class="home-offer-description"><?php the_field('home_offer_description'); ?>
    </div><!-- end home offer description -->

</section><!-- end home offer section-->


<!-- Case Study Section -->

<section id="action-model">  
      <h2 class="home-action-model-title">The BFJN Action Model</h2>
      <img src="http://localhost/bfjn/wp-content/uploads/2015/10/actionmodel.png">
      <br>
       <a href=" http://localhost/bfjn/learn_tiles/the-model-for-action/"><button class="action-model-button">learn more</button></a>
      
</section>

 
<!-- About BFJN Section -->
<section id="home-about-bfjn">
  
  <figure id="home-about-picture"><img src="http://localhost/bfjn/wp-content/uploads/2015/10/about-fpo.jpg"></figure>
  
  <div class="home-about-text">
    <div class="home-about-title">About BFJN</div>
    <p>The Boston Faith & Justice Network brings Christians from many traditions together to move from personal religious commitment to transformative action against poverty and oppression. We foster a dialogue about money and responsibility while presenting opportunities for practical lifestyle shifts and justice-oriented engagement. Economic discipleship—following Jesus with our money—is one of the foundations of our vision for Christ-centered just living.</p>

<a href=" http://localhost/bfjn/about/"><button class="about-learn-more-button">learn more</button></a>

  </div>

</section>


</div><!--home specific-->

<?php get_footer(); ?>
