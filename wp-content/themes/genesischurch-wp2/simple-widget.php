<?php
/*
Plugin Name: Event Loop Widget
Plugin URI: http://themeforest.net/user/jonathan01
Description: Event Loop Widget
Version: 1.0
Author: Jonathan Atkinson
Author URI: http://themeforest.net/user/jonathan01
License: GPL
*/
?>
<?php 

class cr3ativ_events extends WP_Widget {

	// constructor
	function cr3ativ_events() {
        parent::WP_Widget(false, $name = __('Event Loop', 'genesis') );
    }

	// widget form creation
	function form($instance) { 
// Check values
 if( $instance) { 
     $title = esc_attr($instance['title']); 
     $numbertodisplay = esc_attr($instance['numbertodisplay']); 
     $sortby = esc_attr($instance['sortby']); 
     $pastevents = esc_attr($instance['pastevents']); 
} else { 
     $title = ''; 
     $text = ''; 
     $sortby = '';
     $pastevents = ''; 
} 
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'genesis'); ?></label>
<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" style="margin-left:4px; width:86%;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('numbertodisplay'); ?>"><?php _e('Event # Display?', 'genesis'); ?></label>
<input id="<?php echo $this->get_field_id('numbertodisplay'); ?>" name="<?php echo $this->get_field_name('numbertodisplay'); ?>" type="text" value="<?php echo $numbertodisplay; ?>" style="float:right; width:56%;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('sortby'); ?>"><?php _e('Event Date Sort by ASC?', 'genesis'); ?></label>
<input id="<?php echo $this->get_field_id('sortby'); ?>" name="<?php echo $this->get_field_name('sortby'); ?>" type="checkbox" value="1" <?php checked( '1', $sortby ); ?> style="float:right; margin-right:6px;" />
</p>
<p>
<label for="<?php echo $this->get_field_id('pastevents'); ?>"><?php _e('Show Past Events?', 'genesis'); ?></label>
<input id="<?php echo $this->get_field_id('pastevents'); ?>" name="<?php echo $this->get_field_name('pastevents'); ?>" type="checkbox" value="1" <?php checked( '1', $pastevents ); ?> style="float:right; margin-right:6px;" />
</p>
<?php }
	// widget update
	function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['numbertodisplay'] = strip_tags($new_instance['numbertodisplay']);
      $instance['sortby'] = strip_tags($new_instance['sortby']);
      $instance['pastevents'] = strip_tags($new_instance['pastevents']);
     return $instance;
}

	// widget display
	function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = apply_filters('widget_title', $instance['title']);
   $numbertodisplay = $instance['numbertodisplay'];
   $sortby = $instance['sortby'];
   $pastevents = $instance['pastevents'];
   echo $before_widget;
   if( $sortby == '1' ) {
   $sortby = 'ASC';
   } else {
   $sortby = 'DESC';
   }
   if( $pastevents AND $pastevents == '1' ) {
		global $post;  
		$eventquery = array(
		'post_type' => 'event',
		'order' => $sortby,
		'orderby' => 'meta_value',
		'meta_key' => 'custom_date'
		);
   
   } else {
   
		global $post;  
		$today6am = strtotime('today 6:00') + ( get_option( 'gmt_offset' ) * 3600 );
		$eventquery = array(
		'post_type' => 'event',
		'order' => $sortby,
		'meta_key' => 'custom_date',
		'meta_compare' => '>=',
		'meta_value' => $today6am,
		'orderby' => 'custom_date',
		'order' => $sortby,
		'posts_per_page' => $numbertodisplay,
		);   
   
   }
   // Check if title is set
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }	
   
   // Display the widget
?> 
		<?php 
   		query_posts($eventquery); if (have_posts()) : while (have_posts()) : the_post();
        
		$date = get_post_meta($post->ID, 'custom_date', $single = true); 
        $eventtime = get_post_meta($post->ID, 'eventtime', $single = true); 
		$eventtimeend = get_post_meta($post->ID, 'eventtimeend', $single = true);
        $eventvenuename = get_post_meta($post->ID, 'eventvenuename', $single = true);  
        $eventaddress = get_post_meta($post->ID, 'eventaddress', $single = true);  
        $eventmaplink = get_post_meta($post->ID, 'eventmaplink', $single = true); 
        $eventmap = get_post_meta($post->ID, 'eventmap', $single = true);  
        $eventcost = get_post_meta($post->ID, 'eventcost', $single = true);   
        
        $extract_date = get_post_meta($post->ID, 'custom_date', $single = true); 
		?>
        <!-- Start of sidebarevent -->
        <article class="sidebarevent">  
        
        <!-- Start of featured text full -->
        <div class="featured_text_nopad">
        <div class="eventmonth"><?php echo date( 'M', $extract_date ); ?></div>
		<div class="eventday"><?php echo date( 'd', $extract_date ); ?></div>
        
        </div><!-- End of featured text full -->
        
        <h6><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h6>
        
        <!-- Start of event index -->
        <div class="event_index">
        
        <!-- Start of meta -->
        <div class="meta">
        
        <?php if ($eventtime != ('')){ ?> 
        <div class="time"></div>
        <span class="eventdeats">
        
        <?php echo ($eventtime); ?>
        
        <?php if ($eventtimeend != ('')){ ?> 
        &nbsp; - &nbsp;<?php echo ($eventtimeend); ?>
        <?php } ?>
        </span>
        
        <?php } ?>
        
        </div><!-- End of meta -->
        
        <!-- Start of meta -->
        <div class="meta">
        
        <?php if ($eventvenuename != ('')){ ?> 
        
        <div class="venue"></div>
        <span class="eventdeats"><?php echo ($eventvenuename); ?></span>
        
        <?php } ?>
        
        </div><!-- End of meta -->
        
        <!-- Start of clear fix --><div class="clear"></div>
        
        </div><!-- End of event index -->
        
        </article><!-- End of sidebarevent -->

<?php endwhile; ?>
<div class="clear"></div>

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 

<?php endif; ?>

  
<?php     
   
   echo $after_widget;
}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("cr3ativ_events");'));

?>