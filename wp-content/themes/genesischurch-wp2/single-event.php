<?php get_header(); ?>

<!-- Start of bgrndslide3 -->
<div id="bgrndslide3">

<!-- Start of slider wrapper3 -->
<div class="slider_wrapper3">

<!-- Start of page title wrapper -->
<div class="page_title_wrapper">

<!-- Start of slidertitle -->
<div class="slidertitle">
<?php the_title (); ?>

</div><!-- End of slidertitle -->

<!-- Start of smallslidertitle -->
<div class="smallslidertitle">

</div><!-- End of smallslidertitle -->

</div><!-- End of page title wrapper -->

</div><!-- End of slider wrapper3 -->

</div><!-- End of bgrndslide3 -->

<!-- Start of bdywrapper -->
<div class="bdywrapper">

<!-- Start of main -->
<section id="main">
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<?php
$date = get_post_meta($post->ID, 'custom_date', $single = true); 
$enddate = get_post_meta($post->ID, 'custom_enddate', $single = true); 
$eventtime = get_post_meta($post->ID, 'eventtime', $single = true);
$eventtimeend = get_post_meta($post->ID, 'eventtimeend', $single = true);  
$eventvenuename = get_post_meta($post->ID, 'eventvenuename', $single = true);  
$eventaddress = get_post_meta($post->ID, 'eventaddress', $single = true);  
$eventmaplink = get_post_meta($post->ID, 'eventmaplink', $single = true); 
$eventmap = get_post_meta($post->ID, 'eventmap', $single = true);  
$eventcost = get_post_meta($post->ID, 'eventcost', $single = true);
$eventnotes = get_post_meta($post->ID, 'eventnotes', $single = true);   
?>

<!-- Start of message center left -->
<div class="message_center_left">

<!-- Start of blog wrapper -->
<article class="blog_wrapper"> 
<?php the_post_thumbnail('slide'); ?>

<!-- Start of clear fix --><div class="clear"></div>

<br />
        
<h4><?php the_title (); ?> 
<?php if ($eventvenuename != ('')){ ?> 
<?php _e( 'will be held at', 'genesis' ); ?> <?php echo stripslashes($eventvenuename); ?>
<?php } ?></h4>
<br />

<!-- Start of event table -->
<div class="event_table">


<?php if ($eventvenuename != ('')){ ?> 

<hr />

<!-- Start of one third first -->
<div class="one_third_first">
<?php _e( 'Location:', 'genesis' ); ?>

</div> <!-- End of one third first -->

<div class="two_third">
<?php echo stripslashes($eventvenuename); ?>

<?php if ($eventaddress != ('')){ ?>

, <?php echo stripslashes($eventaddress); ?>

</div> <!-- End of two third -->

<?php } } ?>

<?php if ($date != ('')){ ?> 

<hr />

<!-- Start of one third first -->
<div class="one_third_first">
<?php _e( 'Date:', 'genesis' ); ?>

</div> <!-- End of one third first -->

<div class="two_third">
<?php 
if ( function_exists( 'get_option_tree' ) ) {
$eventdateformat = get_option_tree( 'vn_eventdateformat' );
} ?>
<?php if ($eventdateformat == ('1')){ ?> 
<?php echo date( 'm', $date ); ?>/<?php echo date( 'd', $date ); ?>/<?php echo date( 'Y', $date ); ?>
<?php if ($enddate != ('')){ ?> <?php _e('to', 'genesis'); ?> <?php echo date( 'm', $enddate ); ?>/<?php echo date( 'd', $enddate ); ?>/<?php echo date( 'Y', $enddate ); ?>
<?php } ?>
<?php } ?>

<?php if ($eventdateformat == ('2')){ ?> 
<?php echo date( 'm', $date ); ?>/<?php echo date( 'd', $date ); ?>/<?php echo date( 'y', $date ); ?>
<?php if ($enddate != ('')){ ?> <?php _e('to', 'genesis'); ?> <?php echo date( 'm', $enddate ); ?>/<?php echo date( 'd', $enddate ); ?>/<?php echo date( 'y', $enddate ); ?>
<?php } ?>
<?php } ?>

<?php if ($eventdateformat == ('3')){ ?> 
<?php echo date( 'd', $date ); ?>/<?php echo date( 'm', $date ); ?>/<?php echo date( 'Y', $date ); ?>
<?php if ($enddate != ('')){ ?> <?php _e('to', 'genesis'); ?> <?php echo date( 'd', $enddate ); ?>/<?php echo date( 'm', $enddate ); ?>/<?php echo date( 'Y', $enddate ); ?>
<?php } ?>
<?php } ?>

<?php if ($eventdateformat == ('4')){ ?> 
<?php echo date( 'd', $date ); ?>/<?php echo date( 'm', $date ); ?>/<?php echo date( 'y', $date ); ?>
<?php if ($enddate != ('')){ ?> <?php _e('to', 'genesis'); ?> <?php echo date( 'd', $enddate ); ?>/<?php echo date( 'm', $enddate ); ?>/<?php echo date( 'y', $enddate ); ?>
<?php } ?>
<?php } ?>

<?php if ($eventdateformat == ('5')){ ?> 
<?php echo date( 'D', $date ); ?>&nbsp;<?php echo date( 'm', $date ); ?>/<?php echo date( 'd', $date ); ?>/<?php echo date( 'y', $date ); ?>
<?php if ($enddate != ('')){ ?> <?php _e('to', 'genesis'); ?> <?php echo date( 'D', $enddate ); ?>&nbsp;<?php echo date( 'm', $enddate ); ?>/<?php echo date( 'd', $enddate ); ?>/<?php echo date( 'y', $enddate ); ?>
<?php } ?>
<?php } ?>

<?php if ($eventdateformat == ('6')){ ?> 
<?php echo date( 'D', $date ); ?>&nbsp;<?php echo date( 'd', $date ); ?>/<?php echo date( 'm', $date ); ?>/<?php echo date( 'y', $date ); ?>
<?php if ($enddate != ('')){ ?> <?php _e('to', 'genesis'); ?> <?php echo date( 'D', $eventdateend ); ?>&nbsp;<?php echo date( 'd', $enddate ); ?>/<?php echo date( 'm', $enddate ); ?>/<?php echo date( 'y', $enddate ); ?>
<?php } ?>
<?php } ?>

</div> <!-- End of two third -->

<?php } ?>

<?php if ($eventtime != ('')){ ?> 

<hr />

<!-- Start of one third first -->
<div class="one_third_first">
<?php _e( 'Time:', 'genesis' ); ?>

</div> <!-- End of one third first -->

<!-- Start of two third -->
<div class="two_third">
<?php echo stripslashes($eventtime); ?>
<?php if ($eventtimeend != ('')){ ?> 
&nbsp; - &nbsp;<?php echo ($eventtimeend); ?>
<?php } ?>

</div> <!-- End of two third -->

<?php } else { } ?>

<?php if ($eventcost != ('')){ ?> 

<hr />

<!-- Start of one third first -->
<div class="one_third_first">
<?php _e( 'Price:', 'genesis' ); ?>

</div> <!-- End of one third first -->

<!-- Start of two third -->
<div class="two_third">
<?php echo stripslashes($eventcost); ?>

</div> <!-- End of two third -->

<?php } else { } ?>

<?php if ($eventmaplink != ('')){ ?> 

<hr />

<!-- Start of one third first -->
<div class="one_third_first">
<?php _e( 'Map Link:', 'genesis' ); ?>

</div> <!-- End of one third first -->

<!-- Start of two third -->
<div class="two_third">
<a href="<?php echo stripslashes($eventmaplink); ?>"><?php _e( 'Click here to view a larger map and receive driving directions', 'genesis' ); ?></a>

</div> <!-- End of two third -->

<?php } else { } ?>

<?php if ($eventnotes != ('')){ ?> 

<hr />

<!-- Start of one third first -->
<div class="one_third_first">
<?php _e( 'Notes:', 'genesis' ); ?>

</div> <!-- End of one third first -->

<!-- Start of two third -->
<div class="two_third">
<?php echo stripslashes($eventnotes); ?>

</div> <!-- End of two third -->

<?php } else { } ?>


</div><!-- End of event table -->

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of featured text nopad -->
<div class="featured_text_nopad">
<h4><?php the_title (); ?></h4>

<?php the_content('        '); ?> 

<!-- Start of social share wrapper -->
<div class="social_share_wrapper">

<div class="socialpic"></div>

<!-- Start of social share links -->
<div class="social_share_links">

<a class="socialsharing" target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink (); ?>"><?php _e( 'facebook', 'genesis' ); ?></a>

<a class="socialsharing" target="_blank" href="https://plus.google.com/share?url=<?php the_permalink (); ?>"><?php _e( 'google', 'genesis' ); ?></a>

<a class="socialsharing" target="_blank" href="http://twitter.com/home?status=<?php the_permalink (); ?>"><?php _e( 'twitter', 'genesis' ); ?></a>

<a class="socialsharing" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink (); ?>"><?php _e( 'pinterest', 'genesis' ); ?></a>
        
</div><!-- End of social share links -->

</div><!-- End of social share wrapper -->

<?php if ($eventmap != ('')){ ?> 
<?php echo stripslashes($eventmap); ?>
<?php } else { } ?>

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 

<?php endif; ?>

</div><!-- End of featured text nopad -->

</article><!-- End of blog wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

<?php if ('open' == $post->comment_status) { ?>
<?php comments_template(); ?>
<?php comment_form(); ?>
<?php } ?>

</div><!-- End of message center left -->

<!-- Start of blog right light -->
<div class="blog_right_light">
<?php get_sidebar ('event'); ?>            

</div><!-- End of blog right light -->  

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>