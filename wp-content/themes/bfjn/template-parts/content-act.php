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
  $posts = get_posts(array(
  	'numberposts' => -1,
  	'post_type' => 'calendar_event',
/*     'meta_key' => 'month', */
/*     'meta_value' => 'December 2015', */
    'orderby' => 'date',
    'order' => 'ASC'  	
  	  ));

  
  if($posts)
  {
 
    $previous_month = '';
  
  	foreach($posts as $post)
  	{

      
      if($previous_month != get_field('month'))  {
        ?>
 
        <h2 class="calendar-month"><?php the_field('month'); ?></h2>
        <?php
       }

      $previous_month = get_field('month');
      ?> 		
   
      <h3 class="event-date"><?php echo bfjn_format_date (get_field('date')); ?></h3>
      <p class="event-name"><?php the_field('name'); ?></p>
      <p class="event-description"><?php the_field('description');?>
      
      <br>
             
      <button href="<?php the_field('learn_more_URL'); ?>" class="calendar-learn-more">
        learn more
      </button>
      
       <button href="<?php the_field('sign_up_URL'); ?>"class="calendar-sign-up">
        sign up
       </button>

      </p>	
      
   
           
      <?php
      
////////need a loop here that checks if it's the last listing for the month and if it is add the closing tag for the section class month-holder///////

//////refactor using repeater fields http://www.advancedcustomfields.com/resources/repeater//////
    }
  }




 
  function bfjn_format_date($str) {
    $year = substr ($str, 0, 4);
    $month = substr ($str, 4, 2);
    $day = substr ($str, 6, 2);
    
    $month_str = bfjn_convert_number_to_month_name($month);
    return $month_str . ' ' . $day;
    }
    
    
   function bfjn_convert_number_to_month_name($num) {
     switch($num) {
       case 1: 
        $month = 'January';
        break;
        
      case 2: 
        $month = 'February';
        break;
        
     case 3: 
        $month = 'March';
        break;
        
     case 4: 
        $month = 'April';
        break;        
        
     case 5: 
        $month = 'May';
        break;        
     
     case 6: 
        $month = 'June';
        break;        
     
     case 7: 
        $month = 'July';
        break;        
     
     case 8: 
        $month = 'August';
        break;
                
     case 9: 
        $month = 'September';
        break;
                
     case 10: 
        $month = 'October';
        break;
                
     case 11: 
        $month = 'November';
        break;
                
     case 12: 
        $month = 'December';
        break;
     }
     return $month;
   }  

   
    
  
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

