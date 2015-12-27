<?php
session_start();
global $post, $wpdb;

function wp_image_refresh_activated() {
    global $wpdb;
    $charset_collate = '';
    $table_name = $wpdb->prefix . "image_refresh";
    if (!empty($wpdb->charset)) {
        $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset} ";
    }

    if (!empty($wpdb->collate)) {
        $charset_collate .= "COLLATE {$wpdb->collate}";
    }

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
  		id_pk mediumint(9) NOT NULL AUTO_INCREMENT,
  		slideTitle  text NOT NULL,
  		slideText text NOT NULL,
  		slideImage text NOT NULL,
  		slideOrder int,
  		UNIQUE KEY id_pk (id_pk)
		)$charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function app_output_buffer() {
    ob_start();
}

// soi_output_buffer
add_action('init', 'app_output_buffer');

function wp_image_refresh_deactivated() {

}

function wp_image_refresh_delete() {
    global $wpdb;
    $table_name = $wpdb->prefix . "image_refresh";
    $wpdb->query("DROP TABLE {$table_name}");
}

function wp_image_refresh() {
    add_menu_page("Wp Image Refresh", "Wp Image Refresh", "edit_posts", "wp_image_refresh", "wp_image_refresh_page");
    add_submenu_page("wp_image_refresh", "Manage Images", "Add New", "edit_posts", "wp_image_refresh_add", "wp_image_refresh_add_page");
    global $wpdb;
}

function wp_image_refresh_page() {
    include_once dirname(__FILE__) . '/admin.php';
}

function wp_image_refresh_add_page() {
    include_once dirname(__FILE__) . '/add.php';
}

/* Functions used by admin.php */

function wp_image_refresh_admin_scripts() {

    $url = '';
    if (isset($_REQUEST['page'])) {
        $url = $_REQUEST['page'];
    }

    /* Register and queue the style sheet */
    wp_register_style('wp_image_refresh_admin_css', plugins_url('css/admin.css', __FILE__));
    wp_enqueue_style('wp_image_refresh_admin_css');

    if ($url == 'wp_image_refresh_add') {
        /* Register and queue the Javascript */
        wp_register_script('wp_image_refresh_admin_js', plugins_url('js/admin.js', __FILE__));
        $urldata = array('urlstring' => $url);
        wp_localize_script('wp_image_refresh_admin_js', 'url_object', $urldata);
        wp_enqueue_script('wp_image_refresh_admin_js');
    }

    /* Load the jQuery that is already included in WordPress */
    wp_enqueue_script('jquery');

    wp_enqueue_script('media-upload'); //Provides all the functions needed to upload, validate and give format to files.
    wp_enqueue_script('thickbox');   //Responsible for managing the modal window.
    wp_enqueue_style('thickbox');
}

//Function to get image by src

function get_attachment_id_from_src ($image_src) {
		global $wpdb;
		$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
		$id = $wpdb->get_var($query);
		return $id;
	}

//Create dynamic containers and set class
function getCont($cont,$class,$value,$cont1,$class1,$value1,$slideText){
    $allowed = array('div' , 'span');
	
	if(!empty($slideText) && filter_var($slideText, FILTER_VALIDATE_URL) !== false){
		$value = "<a href='".$slideText."'>".$value."</a>";
	}

    if(!empty($value1)){
          if(in_array($cont , $allowed) && in_array($cont1 , $allowed)){
              echo '<'.$cont.' class="'.strip_tags($class).'">'.$value.'<'.$cont1.' class="'.strip_tags($class1).'">'.$value1.'</'.$cont1.'> </'.$cont.'>';
          }elseif (in_array($cont , $allowed) && !in_array($cont1 , $allowed)) {
                echo '<'.$cont.' class="'.strip_tags($class).'">'.$value.$value1.'</'.$cont.'>';
          }elseif (!in_array($cont , $allowed) && in_array($cont1 , $allowed)) {
              echo $value.'<'.$cont1.' class="'.strip_tags($class1).'">'.$value1.'</'.$cont1.'>';
          }else{
            echo $value.$value1;
          }
    }else{
          if(in_array($cont , $allowed)){
              echo '<'.$cont.' class="'.strip_tags($class).'">'.$value.'</'.$cont.'>';
          }else{
              echo $value;
          }
    }
}


function loadslider($atts) {
    global $wpdb;

    $atts = shortcode_atts( array(
    	'type' => 'full',
		'class'=> '',
        'title'=> false,
        'container' => '',
        'container_class' => '',
        'title_container' => '',
        'title_container_class' => ''


	), $atts, 'wp-image-refresh' );

    $table_name = $wpdb->prefix . "image_refresh";

    if (count($_SESSION['slideimageall']) == 0) {
        $images = $wpdb->get_results("SELECT slideTitle,slideImage,slideText FROM $table_name ORDER BY rand()", OBJECT);

        //Hold complete Image array
        $_SESSION['slideimageall'] = array();

        foreach ($images as $images1) {
            array_push($_SESSION['slideimageall'], array('slideImage' => $images1->slideImage, 'slideTitle' => $images1->slideTitle, 'slideText' => $images1->slideText));
        }
    }

    //Check if slide images are available otherwise copy from main array

    if (!empty($_SESSION['slideimage']) && is_array($_SESSION['slideimage'])) {
        $myarr = array_pop($_SESSION['slideimage']);
    } elseif (!empty($_SESSION['slideimageall']) && is_array($_SESSION['slideimageall'])) {
        $_SESSION['slideimage'] = $_SESSION['slideimageall'];
        shuffle($_SESSION['slideimage']);
        $myarr = array_pop($_SESSION['slideimage']);
    } else {
        echo "Error occurred when extracting header image";
        return;
    }



    if (!empty($myarr) && is_array($myarr)) {

    $imgid = get_attachment_id_from_src($myarr['slideImage']);
    if(!empty($imgid)){
            $myarr['st'] = 1;
            $myarr['slideImage'] = wp_get_attachment_image( $imgid, $atts['type'], false, array('class' => $atts['class'],'alt'=> $myarr['slideTitle']));
    }else{
            $myarr['st'] = 2;
    }

    $imgs_src = '';
    $imgs_title = '';
    if (!empty($myarr['slideImage'])) {
        $imgs_src = $myarr['slideImage'];
    }

	 if (!empty($myarr['slideText'])) {
        $slideText = $myarr['slideText'];
    }

    if (!empty($myarr['slideTitle'])) {
        $imgs_title = $myarr['slideTitle'];
    }

    if($myarr['st'] == 2){
        $outimg =  '<img class="'.$atts['class'].'" src="'.$imgs_src.'" alt="'.$imgs_title.'">';
    } else{
         $outimg = $myarr['slideImage'];
         //getCont($atts['container'] , $atts['container_class'] , $outimg);
    }


    if($atts['title'] == 'true'){
          getCont($atts['container'] , $atts['container_class'], $outimg , $atts['title_container'] , $atts['title_container_class'], $myarr['slideTitle'],$slideText);
    }else{ 
          getCont($atts['container'] , $atts['container_class'], $outimg, '' , '' , '',$slideText);
    }



   } else {
        echo 'Error occurred when extracting header image ';
    }
}

add_filter('widget_text', 'do_shortcode');
?>
