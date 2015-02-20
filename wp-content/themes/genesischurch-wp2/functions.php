<?php

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////       WP Default Functionality       ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_theme_support('post-thumbnails');
add_image_size( 'slide', 980, 9999, true );
add_image_size( 'small', 150, 110, true );

add_theme_support( 'custom-background' );

add_theme_support( 'custom-header' );

add_theme_support( 'automatic-feed-links' );

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Post Format     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_theme_support( 'post-formats', array( 'audio', 'link', 'gallery', 'video', 'quote', 'status' ) );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     2 WP Nav Menus     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
register_nav_menus( array(  
  'primary' => __( 'Primary Navigation', 'genesis' ),  
  'secondary' => __('Secondary Navigation', 'genesis'),
  'speakermenu' => __('Sermon Speaker Navigation', 'genesis'),  
  'sidebarmenu' => __('Sidebar Menu', 'genesis')  

) );  	


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Custom Backgrounds per post / page     //////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function intropage_create_meta_box()
{
	add_meta_box(
		'intropage-meta-box-subtitle',
		__('Page Intro', 'genesis' ),
		'intropage_meta_box_subtitle',
		'page',
		'normal',
		'high'
	);
	
}

function intropage_meta_box_subtitle()
{
	global $meta; intropage_post_meta( $post->ID );
?>

	<textarea rows="5" cols="100" name="intropage_meta[subtitle]"><?php echo htmlspecialchars ($meta[ 'subtitle' ]); ?></textarea><br />
	<p><?php _e('Enter some brief text here that will appear before the page content.  Leaving this blank will mean only the page title will appear on the background-image (or color) that you have set from the theme options.', 'genesis' ); ?></p>

<?php

}

add_action( 'admin_menu', 'intropage_create_meta_box' );

/**
 * Verify and save meta. Don't save if there is no specific meta, it is a revision,
 * or the current user can't edit posts.
 */
function intropage_save_meta_box( $post_id, $post )
{
	global $post, $type;

	$post = get_post( $post_id );

	if( !isset( $_POST[ "intropage_meta" ] ) )
		return;

	if( $post->post_type == 'revision' )
		return;

	$meta = apply_filters( 'intropage_post_meta', $_POST[ "intropage_meta" ] );

	foreach( $meta as $key => $meta_box )
	{
		$key = 'meta_' . $key;
		$curdata = $meta_box;
		$olddata = get_post_meta( $post_id, $key, true );

		if( $olddata == "" && $curdata != "" )
			add_post_meta( $post_id, $key, $curdata );
		elseif( $curdata != $olddata )
			update_post_meta( $post_id, $key, $curdata, $olddata );
		elseif( $curdata == "" )
			delete_post_meta( $post_id, $key );
	}

	do_action( 'intropage_saved_meta', $post );
}

add_action( 'save_post', 'intropage_save_meta_box', 1, 2 );

// check autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
 return $post_id;
}

/**
 * Gathers all meta objects attached to a certain posts.
 * Excludes WordPress internal meta and creates an array of data.
 */
function intropage_post_meta( $post_id = '' )
{
	global $meta, $post, $wpdb;

	if( empty( $post_id ) )
		$post_id = $post->ID;

	$meta = array();
	$custom_field_keys = get_post_custom_keys( $post_id );

	if( $custom_field_keys )
	{
		foreach( $custom_field_keys as $key => $value )
		{
			$valuet = trim( $value );

			if ( '_' == $valuet{0} )
				continue;

			$value_short = str_replace( 'meta_', "", $valuet );

			$meta[ $value_short ] = get_post_meta( $post_id, $value, true );
		}
	}

	return $meta;
}






function intropost_create_meta_box()
{
	add_meta_box(
		'intropost-meta-box-subtitle',
		__('Post Intro', 'genesis'),
		'intropost_meta_box_subtitle',
		'post',
		'normal',
		'high'
	);
	
}

function intropost_meta_box_subtitle()
{
	global $meta; intropost_post_meta( $post->ID );
?>

	<textarea rows="5" cols="100" name="intropost_meta[subtitle]"><?php echo htmlspecialchars ($meta[ 'subtitle' ]); ?></textarea><br />
	<p><?php _e('Enter some brief text here that will appear before the post content.  Leaving this blank will mean only the page title will appear on the background-image (or color) that you have set from the theme options.', 'genesis' ); ?></p>

<?php

}

add_action( 'admin_menu', 'intropost_create_meta_box' );

/**
 * Verify and save meta. Don't save if there is no specific meta, it is a revision,
 * or the current user can't edit posts.
 */
function intropost_save_meta_box( $post_id, $post )
{
	global $post, $type;

	$post = get_post( $post_id );

	if( !isset( $_POST[ "intropost_meta" ] ) )
		return;

	if( $post->post_type == 'revision' )
		return;

	$meta = apply_filters( 'intropost_post_meta', $_POST[ "intropost_meta" ] );

	foreach( $meta as $key => $meta_box )
	{
		$key = 'meta_' . $key;
		$curdata = $meta_box;
		$olddata = get_post_meta( $post_id, $key, true );

		if( $olddata == "" && $curdata != "" )
			add_post_meta( $post_id, $key, $curdata );
		elseif( $curdata != $olddata )
			update_post_meta( $post_id, $key, $curdata, $olddata );
		elseif( $curdata == "" )
			delete_post_meta( $post_id, $key );
	}

	do_action( 'intropost_saved_meta', $post );
}

add_action( 'save_post', 'intropost_save_meta_box', 1, 2 );

// check autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
 return $post_id;
}

/**
 * Gathers all meta objects attached to a certain posts.
 * Excludes WordPress internal meta and creates an array of data.
 */
function intropost_post_meta( $post_id = '' )
{
	global $meta, $post, $wpdb;

	if( empty( $post_id ) )
		$post_id = $post->ID;

	$meta = array();
	$custom_field_keys = get_post_custom_keys( $post_id );

	if( $custom_field_keys )
	{
		foreach( $custom_field_keys as $key => $value )
		{
			$valuet = trim( $value );

			if ( '_' == $valuet{0} )
				continue;

			$value_short = str_replace( 'meta_', "", $valuet );

			$meta[ $value_short ] = get_post_meta( $post_id, $value, true );
		}
	}

	return $meta;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Setting up Option Tree includes     /////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
/* START OPTION TREE */ 
add_filter( 'ot_show_pages', '__return_false' );  
add_filter( 'ot_theme_mode', '__return_true' );
//add_filter( 'ot_show_pages', '__return_true' );  
//add_filter( 'ot_theme_mode', '__return_false' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'functions/theme-options.php' );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Comments     ////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   
   <div class="comment-author-avatar">
   <?php echo get_avatar($comment,$size='35', $default=''); ?>
         
   </div>
   
   <div class="comment-main">
   
     <div class="comment-meta">
     <?php printf(__('<span class="comment-author">%s</span>', 'genesis'), get_comment_author_link()) ?> <br />
     <span class="comment-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
	 <?php printf(__('%1$s at %2$s', 'genesis'), get_comment_date(),  get_comment_time()) ?></a>
     &nbsp;- <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
     </span>
     </div>   
     
     </div>
     
     <div class="comment-content">      
     <?php if ($comment->comment_approved == '0') : ?>
     <p><em><?php _e('Your comment is awaiting moderation.', 'genesis' ) ?></em></p>
     <?php comment_text() ?>
 
     </div> 
     
     
     <?php else : { ?>
 
     <?php comment_text() ?>  
     
     <?php } ?>  
     
	 <?php endif; ?>
	 
	 <?php
       }
				
	
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Content width set     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
if ( ! isset( $content_width ) ) 
    $content_width = 980;
		
		
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Slider post type     ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_action('init', 'slider_register');
 
function slider_register() {
 
	$labels = array(
		'name' => __('Slider Images', 'post type general name', 'genesis' ),
		'singular_name' => __('Slider Item', 'post type singular name', 'genesis' ),
		'add_new' => __('Add New', 'slider item', 'genesis' ),
		'add_new_item' => __('Add New Slider Item', 'genesis' ),
		'edit_item' => __('Edit Slider Item', 'genesis' ),
		'new_item' => __('New Slider Item', 'genesis' ),
		'view_item' => __('View Slider Item', 'genesis' ),
		'search_items' => __('Search Slider', 'genesis' ),
		'not_found' =>  __('Nothing found', 'genesis' ),
		'not_found_in_trash' => __('Nothing found in Trash', 'genesis' ),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'slider' , $args );
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Text Domain     /////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
load_theme_textdomain ('genesis');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Multi Language Ready     ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
load_theme_textdomain( 'genesis', get_template_directory().'/languages' );

$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Contact Form 7     //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Functions:	Optimize and style Contact Form 7 - WPCF7
 *
 */
// Remove the default Contact Form 7 Stylesheet
function remove_wpcf7_stylesheet() {
	remove_action( 'wp_head', 'wpcf7_wp_head' );
}

// Add the Contact Form 7 scripts on selected pages
function add_wpcf7_scripts() {
	if ( is_page('contact') )
		wpcf7_enqueue_scripts();
}

// Change the URL to the ajax-loader image
function change_wpcf7_ajax_loader($content) {
	if ( is_page('contact') ) {
		$string = $content;
		$pattern = '/(<img class="ajax-loader" style="visibility: hidden;" alt="ajax loader" src=")(.*)(" \/>)/i';
		$replacement = "$1".get_template_directory_uri()."/images/ajax-loader.gif$3";
		$content =  preg_replace($pattern, $replacement, $string);
	}
	return $content;
}

// If the Contact Form 7 Exists, do the tweaks
if ( function_exists('wpcf7_contact_form') ) {
	if ( ! is_admin() && WPCF7_LOAD_JS )
		remove_action( 'init', 'wpcf7_enqueue_scripts' );

	add_action( 'wp', 'add_wpcf7_scripts' );
	add_action( 'init' , 'remove_wpcf7_stylesheet' );
	add_filter( 'the_content', 'change_wpcf7_ajax_loader', 100 );
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Include post, page and portfolio in search     //////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function filter_search($query) {
    if ($query->is_search) {
	$query->set('post_type', array('post', 'page', 'event', 'portgallery', 'sermon'));
    };
    return $query;
};
add_filter('pre_get_posts', 'filter_search');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove the jump on read more     ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Load JS & Stylesheet Scripts     ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
include_once( 'functions/theme-scripts.php' );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Theme Options for widget and metabox   /////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
include_once( 'functions/theme-options-widgets.php' );
include('simple-widget.php');
include_once( 'metaboxes/meta_box.php' );

////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove shortcode from excerpt     ///////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_trim_excerpt');

function custom_trim_excerpt($text = '')
{
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
 
		//$text = strip_shortcodes( $text );
 
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = apply_filters('excerpt_length', 55);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

add_filter('get_the_excerpt','do_shortcode');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Change excerpt length     ///////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


////////////////////////////////////////////////////////////////////////////////////////////
/////////////////    Extract first occurance of text from a string     /////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
// Extract first occurance of text from a string
function my_extract_from_string($start, $end, $tring) {
	$tring = stristr($tring, $start);
	$trimmed = stristr($tring, $end);
	return substr($tring, strlen($start), -strlen($trimmed));
}


function get_content_link( $content = false, $echo = false )
{
    // allows using this function also for excerpts
    if ( $content === false )
        $content = get_the_content(); // You could also use $GLOBALS['post']->post_content;

    $content = preg_match_all( '/href\s*=\s*[\"\']([^\"\']+)/', $content, $links );
    $content = $links[1][0];
    $content = make_clickable( $content );

    // if you set the 2nd arg to true, you'll echo the output, else just return for later usage
    if ( $echo === true )
        echo $content;

    return $content;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Allow Shortcodes in Widgets     /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_filter('widget_text', 'do_shortcode');


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Remove height/width on images for responsive     ////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Event post type     /////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_action('init', 'create_event');

function create_event() {
    	$event_args = array(
        	'label' => __('Events', 'genesis' ),
        	'singular_label' => __('Event Item', 'genesis' ),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => array('slug' => __('event', 'genesis' )) ,
        	'supports' => array('title', 'editor', 'thumbnail','comments'),
			'taxonomies' => array('post_tag')
        );
    	register_post_type('event',$event_args);
	}
	
// Add the Meta Box
function add_custom_meta_box() {
    add_meta_box(
		'custom_meta_box', // $id
		__('Event Details', 'genesis'), // $title 
		'show_custom_meta_box', // $callback
		'event', // $page
		'normal', // $context
		'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box');

// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
	array(
		'label'	=> __('Start Date', 'genesis' ),
		'desc'	=> __('Start date of the event.', 'genesis' ),
		'id'	=> $prefix.'date',
		'type'	=> 'date'
	),
	array(
		'label'	=> __('End Date', 'genesis' ),
		'desc'	=> __('End date of the event.', 'genesis' ),
		'id'	=> $prefix.'enddate',
		'type'	=> 'date'
	),
	array(
            'label' => __('Start Time', 'genesis' ),
            'desc' => __('Enter the start time of the event.', 'genesis' ),
            'id' => 'eventtime',
            'type' => 'text',
            'std' => ""
        ),
	array(
            'label' => __('End Time', 'genesis' ),
            'desc' => __('Enter the end time of the event.', 'genesis' ),
            'id' => 'eventtimeend',
            'type' => 'text',
            'std' => ""
        ),
	array(
            'label' => __('Event Notes', 'genesis' ),
            'desc' => __('Enter any special notes about this event, parking etc', 'genesis' ),
            'id' => 'eventnotes',
            'type' => 'textarea',
            'std' => ""
        ),
	array(
            'label' => __('Name of Venue', 'genesis' ),
            'desc' => __('Enter the venue name on this event.', 'genesis' ),
            'id' => 'eventvenuename' ,
            'type' => 'text',
            'std' => ""
        ),
	array(
            'label' => __('Venue Address / Location', 'genesis' ),
            'desc' => __('Enter the venue address / location on this event.', 'genesis' ),
            'id' => 'eventaddress' ,
            'type' => 'textarea',
            'std' => ""
        ),
	array(
            'label' => __('Google Map Link', 'genesis' ),
            'desc' => __('Enter the url for the google map link (leave blank to disable).', 'genesis' ),
            'id' => 'eventmaplink',
            'type' => 'text',
            'std' => ""
        ),
	array(
            'label' => __('Google Map iFrame', 'genesis' ),
            'desc' => __('Enter the embed code to place a map on this event.', 'genesis' ),
            'id' => 'eventmap' ,
            'type' => 'textarea',
            'std' => ""
        ),
	array(
            'label' => __('Price / Cost of Event', 'genesis' ),
            'desc' => __('Enter the price/cost of this event (if any).', 'genesis' ),
            'id' => 'eventcost' ,
            'type' => 'textarea',
            'std' => ""
        )
);


//Hook on admin_enqueue_scripts
add_action('admin_enqueue_scripts' , 'my_scripts' );
 
//Do enqueue
function my_scripts(){
   //jQuery datepicker is already bundled with WordPress
   //See link above
   wp_enqueue_script('jquery-ui-datepicker');
   //But jQuery theme is unbundled. Load you own.
   wp_enqueue_style('jquery-ui-custom', get_template_directory_uri().'/css/jquery-ui-custom.css', false ,'1.1', 'all' );
}

// add some custom js to the head of the page
add_action('admin_head','add_custom_scripts');

function add_custom_scripts() {
	global $custom_meta_fields, $post;
	
	$output = '<script type="text/javascript">
				jQuery(function() {';
	
	foreach ($custom_meta_fields as $field) { // loop through the fields looking for certain types
		// date
		if($field['type'] == 'date')
			$output .= 'jQuery(".datepicker").datepicker();';
	}
	
	$output .= '});
		</script>';
		
	echo $output;
}

// The Callback
function show_custom_meta_box() {
	global $custom_meta_fields, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	
	// Begin the field table and loop
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					// text
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// textarea
					case 'textarea':
						echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// date
					case 'date':
						echo '<input type="text" class="datepicker" name="'.$field['id'].'" id="'.$field['id'].'" value="', '' !== $meta ? date( 'm\/d\/Y', $meta ) : $meta, '" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
				} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}


add_action('save_post', 'save_event_details');
 
function save_event_details(){
   global $post;
 
   if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return;
 
   if ( get_post_type($post) != 'event')
      return;
 
   if(isset($_POST["custom_date"])) {
      update_post_meta($post->ID, "custom_date", strtotime($_POST["custom_date"]));
   }
   
   if(isset($_POST["custom_enddate"])) {
      update_post_meta($post->ID, "custom_enddate", strtotime($_POST["custom_enddate"]));
   }
 
   save_event_field("eventtime");
   save_event_field("eventtimeend");
   save_event_field("eventnotes");
   save_event_field("eventvenuename");
   save_event_field("eventaddress");
   save_event_field("eventmaplink");
   save_event_field("eventmap");
   save_event_field("eventcost");
}

function save_event_field($event_field) {
    global $post;
 
    if(isset($_POST[$event_field])) {
        update_post_meta($post->ID, $event_field, $_POST[$event_field]);
    }
}

add_post_type_support( 'event', array( 'comments' ) );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Gallery post type     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_action('init', 'create_portgallery');

function create_portgallery() {
    	$portgallery_args = array(
        	'label' => __('Galleries', 'genesis' ),
        	'singular_label' => __('Gallery Item', 'genesis' ),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => array('slug' => __('galleries', 'genesis')) ,
        	'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array('post_tag')
        );
    	register_post_type('portgallery',$portgallery_args);
	}


function sltws_create_meta_box()
{
	add_meta_box(
		'sltws-meta-box-subtitle',
		__('URL goes here', 'genesis'),
		'sltws_meta_box_subtitle',
		'portgallery',
		'normal',
		'high'
	);
	
}

function sltws_meta_box_subtitle()
{
	global $meta; sltws_post_meta( $post->ID );
?>

	<input type="text" name="sltws_meta[subtitle]" value="<?php echo htmlspecialchars ($meta[ 'subtitle' ]); ?>" style="width:99%;" rows="5" /><br />
	<p><?php _e('Enter a URL of the image or video you want the featured image to open in the lightbox.', 'genesis' ); ?></p>

<?php

}

add_action( 'admin_menu', 'sltws_create_meta_box' );

/**
 * Verify and save meta. Don't save if there is no specific meta, it is a revision,
 * or the current user can't edit posts.
 */
function sltws_save_meta_box( $post_id, $post )
{
	global $post, $type;

	$post = get_post( $post_id );

	if( !isset( $_POST[ "sltws_meta" ] ) )
		return;

	if( $post->post_type == 'revision' )
		return;

	$meta = apply_filters( 'sltws_post_meta', $_POST[ "sltws_meta" ] );

	foreach( $meta as $key => $meta_box )
	{
		$key = 'meta_' . $key;
		$curdata = $meta_box;
		$olddata = get_post_meta( $post_id, $key, true );

		if( $olddata == "" && $curdata != "" )
			add_post_meta( $post_id, $key, $curdata );
		elseif( $curdata != $olddata )
			update_post_meta( $post_id, $key, $curdata, $olddata );
		elseif( $curdata == "" )
			delete_post_meta( $post_id, $key );
	}

	do_action( 'sltws_saved_meta', $post );
}

add_action( 'save_post', 'sltws_save_meta_box', 1, 2 );

// check autosave
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
 return $post_id;
}

/**
 * Gathers all meta objects attached to a certain posts.
 * Excludes WordPress internal meta and creates an array of data.
 */
function sltws_post_meta( $post_id = '' )
{
	global $meta, $post, $wpdb;

	if( empty( $post_id ) )
		$post_id = $post->ID;

	$meta = array();
	$custom_field_keys = get_post_custom_keys( $post_id );

	if( $custom_field_keys )
	{
		foreach( $custom_field_keys as $key => $value )
		{
			$valuet = trim( $value );

			if ( '_' == $valuet{0} )
				continue;

			$value_short = str_replace( 'meta_', "", $valuet );

			$meta[ $value_short ] = get_post_meta( $post_id, $value, true );
		}
	}

	return $meta;
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Custom taxonomies     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_action( 'init', 'types', 0 );
function types()	{
	register_taxonomy( 
		'types', 
		'portgallery', 
			array( 
				'hierarchical' => true, 
				'label' => __('Types', 'genesis' ), 
				'query_var' => true, 
				'rewrite' => array( 'slug' => __('types', 'genesis' ) ),
			) 
	);
 
}

add_action( 'init', 'speakers', 0 );
function speakers()	{
	register_taxonomy( 
		'speakers', 
		'sermon', 
			array( 
				'hierarchical' => true, 
				'label' => __('Speakers', 'genesis' ), 
				'query_var' => true, 
				'rewrite' => array( 'slug' => __('speakers', 'genesis' ) ),
			) 
	);
 
}

add_action( 'init', 'sermoncats', 0 );
function sermoncats()	{
	register_taxonomy( 
		'sermoncats', 
		'sermon', 
			array( 
				'hierarchical' => true, 
				'label' => __('Sermon Categories', 'genesis' ), 
				'query_var' => true, 
				'rewrite' => array( 'slug' => __('sermoncategory', 'genesis' ) ),
			) 
	);
 
}

add_action( 'init', 'eventcats', 0 );
function eventcats()	{
	register_taxonomy( 
		'eventcats', 
		'event', 
			array( 
				'hierarchical' => true, 
				'label' => __('Event Categories', 'genesis' ), 
				'query_var' => true, 
				'rewrite' => array( 'slug' => __('eventcategory', 'genesis' ) ),
			) 
	);
 
}


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Exclude Thumbnail     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function exclude_thumbnail_from_gallery($null, $attr)
{
    if (!$thumbnail_ID = get_post_thumbnail_id())
        return $null; // no point carrying on if no thumbnail ID

    // temporarily remove the filter, otherwise endless loop!
    remove_filter('post_gallery', 'exclude_thumbnail_from_gallery');

    // pop in our excluded thumbnail
    if (!isset($attr['exclude']) || empty($attr['exclude']))
        $attr['exclude'] = array($thumbnail_ID);
    elseif (is_array($attr['exclude']))
        $attr['exclude'][] = $thumbnail_ID;

    // now manually invoke the shortcode handler
    $gallery = gallery_shortcode($attr);

    // add the filter back
    add_filter('post_gallery', 'exclude_thumbnail_from_gallery', 10, 2);

    // return output to the calling instance of gallery_shortcode()
    return $gallery;
}
add_filter('post_gallery', 'exclude_thumbnail_from_gallery', 10, 2);



////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////     Sermon post type     ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
add_action('init', 'create_sermon');

function create_sermon() {
    	$sermon_args = array(
        	'label' => __('Sermons', 'genesis' ),
        	'singular_label' => __('Sermon Item', 'genesis' ),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => array('slug' => __('sermon', 'genesis' )) ,
        	'supports' => array('title', 'editor', 'thumbnail','comments'),
			'taxonomies' => array('post_tag')
        );
    	register_post_type('sermon',$sermon_args);
	}

// Field Array
$custom_meta_fields_sermon = array(
	array(
            'label' => __('Video File URL', 'genesis' ),
            'desc' => __('Enter the URL for the video file.', 'genesis' ),
            'id' => 'videourl',
            'type' => 'url',
            'std' => ''
        ),
	array(
            'label' => __('PDF File URL', 'genesis'),
            'desc' => __('Choose the pdf list from the dropdown. It is populated with the pdf docs that are listed in the Media Library.', 'genesis'),
            'id' => 'pdfurl',
            'type' => 'pdf_list',
            'std' => ''
        )
);

$sermon_box = new custom_add_meta_box( 'sermon_box', __('Sermon Info', 'genesis'), $custom_meta_fields_sermon, 'sermon', true );


add_post_type_support( 'sermon', array( 'comments' ) );


////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////    Link Extraction for Post Format Link     /////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
// Extract first occurance of text from a string
if( !function_exists ('extract_from_string') ) :
function extract_from_string($start, $end, $tring) {
	$tring = stristr($tring, $start);
	$trimmed = stristr($tring, $end);
	return substr($tring, strlen($start), -strlen($trimmed));
}
endif;


?>