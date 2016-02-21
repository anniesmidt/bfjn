<?php
/**
 * bfjn functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bfjn
 */

if ( ! function_exists( 'bfjn_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bfjn_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bfjn, use a find and replace
	 * to change 'bfjn' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bfjn', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bfjn' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bfjn_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bfjn_setup
add_action( 'after_setup_theme', 'bfjn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bfjn_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bfjn_content_width', 640 );
}
add_action( 'after_setup_theme', 'bfjn_content_width', 0 );


/*disable comments on pages*/
add_filter( 'comments_open', 'my_comments_open', 10, 2 );

function my_comments_open( $open, $post_id ) {

	$post = get_post( $post_id );

	if ( 'page' == $post->post_type )
		$open = false;

	return $open;
}


/*remove edit link*/
function bfjn_remove_edit_post_link( $link ) {
return '';
}
add_filter('edit_post_link', 'bfjn_remove_edit_post_link');





/* add Learn Tiles post type*/
function bfjn_post_type_1() {
    $args = array(
      'public' => true,
      'label'  => 'Learn tiles'
    );
    register_post_type( 'learn_tiles', $args );
}
add_action( 'init', 'bfjn_post_type_1' );



/*Modify read more text on blog excerpts*/
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> continue reading &raquo;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');







/**
 * Register widget areas.
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/


function bfjn_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bfjn' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}
add_action( 'widgets_init', 'bfjn_widgets_init' );



//add widget area for blog and single
function bfjn_widgets_init2() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'bfjn' ),
		'id'            => 'sidebar-blog',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}
add_action( 'widgets_init', 'bfjn_widgets_init2' );


//add widget area for learn articles (single)
function bfjn_widgets_init3() {
	register_sidebar( array(
		'name'          => esc_html__( 'Learn Articles Sidebar', 'bfjn' ),
		'id'            => 'sidebar-articles',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}
add_action( 'widgets_init', 'bfjn_widgets_init3' );









/* enable featured images */
add_theme_support( 'post-thumbnails' ); 

/*set thumbnail size and cropping*/
set_post_thumbnail_size( 350, 250, array( 'center', 'center')  ); // 800 pixels wide by 250 pixels tall, crop from the center


/**
 * Enqueue scripts and styles.
 */
 
function bfjn_add_google_fonts() {

wp_enqueue_style( 'bfjn-google-fonts', 'https://fonts.googleapis.com/css?family=Quicksand:400,300,700|Roboto+Slab:400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'bfjn_add_google_fonts' );
 

	wp_enqueue_style( 'bfjn-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' ); 
 
 
function bfjn_scripts() {
	wp_enqueue_style( 'bfjn-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bfjn-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'bfjn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bfjn_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
