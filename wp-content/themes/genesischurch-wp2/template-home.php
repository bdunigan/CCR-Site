<?php
/*
Template Name: Home
*/

get_header ();
?>



<!-- ******************************************************************** This is the slider loop ********************************************************************-->

<!-- Start of bgrndslide -->
<div id="bgrndslide">

<!-- Start of slider wrapper -->
<div class="slider_wrapper">

<!-- Start of myslider -->
<div class="myslider">

<!-- Start of slider -->
<section class="slider">

<ul class="slides">

	<?php
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query('post_type=slider&showposts=10&orderby=date&order=DESC');
    $wp_query->query('post_type=slider&showposts=10&orderby=date&order=DESC');
    ?>
        
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
        
        <li>
        
        <div class="smallslidertitle"><?php the_content (); ?></div>
        
        </li>
        
        <?php endwhile; ?>
        
	</ul>
    
    <?php wp_reset_query(); ?>

</section><!-- End of slider -->

</div><!-- End of myslider -->

</div><!-- End of slider wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of bgrndslide -->

<!-- Start of bdywrapper -->
<div class="bdywrapper">

<!-- Start of main -->
<section id="main">





<!-- ******************************************************************** This is the sermon loop  ********************************************************************-->





<!-- Start of message center sermon -->
<div class="message_center_sermon">

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$toprowtitle = get_option_tree( 'vn_toprowtitle' );
} ?>

<?php if ($toprowtitle != ('')){ ?> 

<!-- Start of one fourth first -->
<div class="one_fourth_first">

<h3><?php echo stripslashes($toprowtitle); ?></h3>
<?php } else { } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$toprowtext = get_option_tree( 'vn_toprowtext' );
} ?>

<?php if ($toprowtext != ('')){ ?> 
<p><?php echo stripslashes($toprowtext); ?></p>
<?php } else { } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$toprowlinktext = get_option_tree( 'vn_toprowlinktext' );
$toprowlink = get_option_tree( 'vn_toprowlink' );
} ?>

<?php if ($toprowlinktext != ('')){ ?> 
<a href="<?php echo ($toprowlink); ?>"><?php echo stripslashes($toprowlinktext); ?></a>


</div><!-- End of one fourth first -->

<?php } else { } ?>

<?php
$featuredevent = new WP_Query('post_type=sermon&showposts=1');
while ($featuredevent->have_posts()) : $featuredevent->the_post();
?> 

<!-- Start of one fourth -->
<div class="one_fourth">

<?php
$videourl = get_post_meta($post->ID, 'videourl', $single = true); 
$pdfurl = get_post_meta($post->ID, 'pdfurl', $single = true);
?>

<!-- Start of event block -->
<div class="event_block">

<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>

<!-- Start of clear fix --><div class="clear"></div>

<br />

<h5><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h5>

    <?php 
	
	$args = array(
	'order'          => 'ASC',
	'orderby' => 'menu_order',
	'post_type'      => 'attachment',
	'post_parent'    => $post->ID,
	'post_mime_type' => 'audio',
	'post_status'    => null,
	'numberposts'    => 999,
	);
	
$attachments = get_children($args); 
	
	if(count( $attachments ) > 0) { ?>
 

<!-- Start of audio -->
<div class="audio">
<a href="<?php the_permalink (); ?>">1</a>

</div><!-- End of audio -->

<?php } else { } ?>

<?php if ($videourl != ('')){ ?> 

<!-- Start of video -->
<div class="video">
<a href="<?php the_permalink (); ?>">h</a>

</div><!-- End of video -->

<?php } else { } ?>

<?php if ($pdfurl != ('')){ ?> 

<!-- Start of pdf -->
<div class="pdf">
<a href="<?php echo wp_get_attachment_url( $pdfurl ); ?>">D</a>

</div><!-- End of pdf -->

<?php } else { } ?>

<!-- Start of clear fix --><div class="clear"></div>

<div class="time"></div>

<!-- Start of meta -->
<div class="meta">
<?php the_time(get_option('date_format')); ?>
<br />

</div><!-- End of meta -->

<div class="user"></div>

<!-- Start of meta -->
<div class="meta">
<?php 
//removed to show sermon speaker
//the_author(); 

$speaker=wp_get_object_terms($post->ID,"speakers",array("fields" => "names"));
$speakers=implode(", ",$speaker);
echo $speakers;
?>
<br />

</div><!-- End of meta -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of event block -->

</div><!-- End of one fourth -->

<?php endwhile; ?>
			
<?php wp_reset_query(); ?>

<?php
$featuredevent = new WP_Query('post_type=sermon&showposts=1&offset=1');
while ($featuredevent->have_posts()) : $featuredevent->the_post();
?> 

<!-- Start of one fourth -->
<div class="one_fourth">

<?php
$videourl = get_post_meta($post->ID, 'videourl', $single = true); 
$pdfurl = get_post_meta($post->ID, 'pdfurl', $single = true);
?>

<!-- Start of event block -->
<div class="event_block">

<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>

<!-- Start of clear fix --><div class="clear"></div>

<br />

<h5><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h5>

    <?php 
	
	$args = array(
	'order'          => 'ASC',
	'orderby' => 'menu_order',
	'post_type'      => 'attachment',
	'post_parent'    => $post->ID,
	'post_mime_type' => 'audio',
	'post_status'    => null,
	'numberposts'    => 999,
	);
	
$attachments = get_children($args); 
	
	if(count( $attachments ) > 0) { ?>


<!-- Start of audio -->
<div class="audio">
<a href="<?php the_permalink (); ?>">1</a>

</div><!-- End of audio -->

<?php } else { } ?>

<?php if ($videourl != ('')){ ?> 

<!-- Start of video -->
<div class="video">
<a href="<?php the_permalink (); ?>">h</a>

</div><!-- End of video -->

<?php } else { } ?>

<?php if ($pdfurl != ('')){ ?> 

<!-- Start of pdf -->
<div class="pdf">
<a href="<?php echo wp_get_attachment_url( $pdfurl ); ?>">D</a>

</div><!-- End of pdf -->

<?php } else { } ?>

<!-- Start of clear fix --><div class="clear"></div>

<div class="time"></div>

<!-- Start of meta -->
<div class="meta">
<?php the_time(get_option('date_format')); ?>
<br />

</div><!-- End of meta -->

<div class="user"></div>

<!-- Start of meta -->
<div class="meta">
<?php 
//removed to show sermon speaker
//the_author(); 

$speaker=wp_get_object_terms($post->ID,"speakers",array("fields" => "names"));
$speakers=implode(", ",$speaker);
echo $speakers;
?>
<br />

</div><!-- End of meta -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of event block -->

</div><!-- End of one fourth -->

<?php endwhile; ?>
			
<?php wp_reset_query(); ?>

<?php
$featuredevent = new WP_Query('post_type=sermon&showposts=1&offset=2');
while ($featuredevent->have_posts()) : $featuredevent->the_post();
?> 

<!-- Start of one fourth -->
<div class="one_fourth">

<?php
$videourl = get_post_meta($post->ID, 'videourl', $single = true); 
$pdfurl = get_post_meta($post->ID, 'pdfurl', $single = true);
?>

<!-- Start of event block -->
<div class="event_block">

<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>

<!-- Start of clear fix --><div class="clear"></div>

<br />

<h5><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h5>

    <?php 
	
	$args = array(
	'order'          => 'ASC',
	'orderby' => 'menu_order',
	'post_type'      => 'attachment',
	'post_parent'    => $post->ID,
	'post_mime_type' => 'audio',
	'post_status'    => null,
	'numberposts'    => 999,
	);
	
$attachments = get_children($args); 
	
	if(count( $attachments ) > 0) { ?>


<!-- Start of audio -->
<div class="audio">
<a href="<?php the_permalink (); ?>">1</a>

</div><!-- End of audio -->

<?php } else { } ?>

<?php if ($videourl != ('')){ ?> 

<!-- Start of video -->
<div class="video">
<a href="<?php the_permalink (); ?>">h</a>

</div><!-- End of video -->

<?php } else { } ?>

<?php if ($pdfurl != ('')){ ?> 

<!-- Start of pdf -->
<div class="pdf">
<a href="<?php echo wp_get_attachment_url( $pdfurl ); ?>">D</a>

</div><!-- End of pdf -->

<?php } else { } ?>

<!-- Start of clear fix --><div class="clear"></div>

<div class="time"></div>

<!-- Start of meta -->
<div class="meta">
<?php the_time(get_option('date_format')); ?>
<br />

</div><!-- End of meta -->

<div class="user"></div>

<!-- Start of meta -->
<div class="meta">
<?php 
//removed to show sermon speaker
//the_author(); 

$speaker=wp_get_object_terms($post->ID,"speakers",array("fields" => "names"));
$speakers=implode(", ",$speaker);
echo $speakers;
?>
<br />

</div><!-- End of meta -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of event block -->

</div><!-- End of one fourth -->

<?php endwhile; ?>
			
<?php wp_reset_query(); ?>




<div id="midsectionhr"></div>




<!-- ******************************************************************** This is event loop ********************************************************************-->

<!-- Start of one half first -->
<div class="one_half_first">

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$eventlooptitle = get_option_tree( 'vn_eventlooptitle' );
} ?>

<?php if ($eventlooptitle != ('')){ ?> 
<h3><?php echo stripslashes($eventlooptitle); ?></h3>
<?php } else { } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$eventorder = get_option_tree( 'vn_eventorder' );
$selectnumberevent = get_option_tree( 'vn_selectnumberevent' );
} ?>

<?php 
global $post;  
$today6am = strtotime('today 6:00') + ( get_option( 'gmt_offset' ) * 3600 );
$args = array(
'post_type' => 'event',
'order' => $eventorder,
'posts_per_page' => $selectnumberevent,
'order' => $eventorder,
'meta_key' => 'custom_date',
'meta_compare' => '>=',
'meta_value' => $today6am,
'orderby' => 'custom_date',
);
?>
	
<?php query_posts( $args ); while ( have_posts() ) : the_post(); ?>

<?php
$date = get_post_meta($post->ID, 'custom_date', $single = true); 
$eventtime = get_post_meta($post->ID, 'eventtime', $single = true); 
$eventvenuename = get_post_meta($post->ID, 'eventvenuename', $single = true);  
$eventaddress = get_post_meta($post->ID, 'eventaddress', $single = true);  
$eventmaplink = get_post_meta($post->ID, 'eventmaplink', $single = true); 
$eventmap = get_post_meta($post->ID, 'eventmap', $single = true);  
$eventcost = get_post_meta($post->ID, 'eventcost', $single = true);   

$extract_date = get_post_meta($post->ID, 'custom_date', $single = true); 
?>

<!-- Start of event column -->
<div class="event_column">

<!-- Start of event block -->
<div class="event_block">

<h5><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h5>

<div class="eventmonth"><?php echo date( 'M', $extract_date ); ?></div>
<div class="eventday"><?php echo date( 'd', $extract_date ); ?></div>

<!-- Start of home event text -->
<div class="home_event_text">
<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,15); ?></p>

</div><!-- End of home event text -->

<br />

<div class="time"></div>

<!-- Start of meta -->
<div class="meta">

<?php echo ($eventtime); ?>
<br />

</div><!-- End of meta -->

<div class="venue"></div>

<!-- Start of meta -->
<div class="meta">
<?php echo ($eventvenuename); ?>
<br />

</div><!-- End of meta -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of event block -->

</div><!-- End of event column -->

<?php endwhile; ?>
        
<?php wp_reset_query(); ?>

<!-- Start of clear fix --><div class="clear"></div>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$eventlooplinktext = get_option_tree( 'vn_eventlooplinktext' );
$eventlooplink = get_option_tree( 'vn_eventlooplink' );
} ?>

<?php if ($eventlooplinktext != ('')){ ?> 
<a href="<?php echo ($eventlooplink); ?>"><?php echo stripslashes($eventlooplinktext); ?></a>
<?php } else { } ?>

</div><!-- End of one half first -->


<!-- ******************************************************************** This is the blog loop ********************************************************************-->



<!-- Start of one half -->
<div class="one_half">

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$bloglooptitle = get_option_tree( 'vn_bloglooptitle' );
$selectnumberblog = get_option_tree( 'vn_selectnumberblog' );
} ?>

<?php if ($bloglooptitle != ('')){ ?> 
<h3><?php echo stripslashes($bloglooptitle); ?></h3>
<?php } ?>

<?php
    $my_query = new WP_Query('post_type=post&showposts=' . $selectnumberblog);
    $my_query->query('post_type=post&showposts=' . $selectnumberblog);
    ?>    
    
<div style="padding-top:10px;"></div>
<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
<?php 
if ( has_post_thumbnail() ) {  ?>

<div class="alignleft"><a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a></div>

<?php } ?>

<h5><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h5>

<!-- Start of meta -->
<div class="metahome">
<span style="padding-right:5px;"><?php the_time(get_option('date_format')); ?></span>   <span style="padding-right:5px;">Posted by: <?php the_author() ?> </span>  <span style="padding-right:5px;">Posted in: <?php the_category(', '); ?> </span>

</div><!-- End of meta -->

<p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,20); ?></p>	

<!-- Start of clear fix --><div class="clear"></div>
   
<?php endwhile; ?>
        
<?php wp_reset_query(); ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$bloglooplinktext = get_option_tree( 'vn_bloglooplinktext' );
$bloglooplink = get_option_tree( 'vn_bloglooplink' );
} ?>

<?php if ($bloglooplinktext != ('')){ ?> 
<a href="<?php echo ($bloglooplink); ?>"><?php echo stripslashes($bloglooplinktext); ?></a>
<?php } ?>

</div><!-- End of one half -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of message center sermon -->
            
</section><!-- End of main -->

<?php get_footer(); ?>