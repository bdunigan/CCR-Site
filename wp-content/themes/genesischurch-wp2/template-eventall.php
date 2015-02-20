<?php
/*
Template Name: AllEvents-Page
*/
?>

<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); intropage_post_meta(); ?>

<!-- Start of bgrndslide2 -->
<div id="bgrndslide2">

<!-- Start of slider wrapper2 -->
<div class="slider_wrapper2">

<!-- Start of page title wrapper -->
<div class="page_title_wrapper">

<!-- Start of slidertitle -->
<div class="slidertitle">
<?php the_title (); ?>

</div><!-- End of slidertitle -->

<!-- Start of smallslidertitle -->
<div class="smallslidertitle">
<p><?php echo $meta[ 'subtitle' ]; ?></p>

</div><!-- End of smallslidertitle -->

</div><!-- End of page title wrapper -->

</div><!-- End of slider wrapper2 -->

</div><!-- End of bgrndslide2 -->

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 

<?php endif; ?>

<!-- Start of bdywrapper -->
<div class="bdywrapper">

<!-- Start of main -->
<section id="main">

<!-- Start of message center left -->
<div class="message_center_left">

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$eventorder = get_option_tree( 'vn_eventorder' );
} ?>

<?php $eventargs = array(
		'post_type' => 'event',
		'paged' => $paged,
		'order' => $eventorder,
		'orderby' => 'meta_value',
		'meta_key' => 'custom_date'
		);
		?>

<?php query_posts( $eventargs ); while ( have_posts() ) : the_post(); ?>

<?php
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

<!-- Start of blog wrapper -->
<article class="blog_wrapper">  

<h2><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h2>

<br />

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


<!-- Start of featured text full -->
<div class="featured_text_nopad">
<div class="eventmonth"><?php echo date( 'M', $extract_date ); ?></div>
<div class="eventday"><?php echo date( 'd', $extract_date ); ?></div>

		<?php 
		if ( function_exists( 'get_option_tree' ) ) {
		$readmoretext = get_option_tree( 'vn_readmore' );
		} ?>

        <!-- Start of read more -->
        <div class="read_more">
          <?php
				global $more;
				$more = 0;
				ob_start();
				the_content(('<span class="more-link">' . $readmoretext . '</span>'),true);
				$postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
				ob_end_clean();
				echo $postOutput;
				?>
        </div>
        <!-- End of read more -->

<a href="<?php the_permalink(); ?>"><?php echo stripslashes($readmoretext); ?></a>

</div><!-- End of featured text full -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of event index -->

</article><!-- End of blog wrapper -->

<hr />
        
<?php endwhile; ?> 

<div class="clear"></div>

<!-- Start of navigation -->
<div class="navigation">

<!-- Start of alignleft -->
<div class="alignleft">
<?php next_posts_link( __('Older','genesis') ) ?>

</div><!-- End of alignleft -->

<!-- Start of alignright -->
<div class="alignright">
<?php previous_posts_link( __('Newer','genesis') ) ?>  

</div><!-- End of alignright -->

</div><!-- End of navigation -->  

</div><!-- End of message center left -->

<!-- Start of blog right light -->
<div class="blog_right_light">
<?php get_sidebar ('event'); ?>            

</div><!-- End of blog right light -->  

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>
