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
$videourl = get_post_meta($post->ID, 'videourl', $single = true); 
$pdfurl = get_post_meta($post->ID, 'pdfurl', $single = true);
?>

<!-- Start of message center left -->
<div class="message_center_left">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">  

<h2><?php the_title (); ?></h2>
		
<!-- Start of sermon index -->
<div class="sermon_index">

<div class="time"></div>

<!-- Start of meta -->
<div class="meta">
<span class="eventdeats"><?php the_time(get_option('date_format')); ?></span>

</div><!-- End of meta -->

<div class="user"></div>

<!-- Start of meta -->
<div class="meta">
<span class="eventdeats">
<?php 
//removed to show sermon speaker
//the_author(); 

$speaker=wp_get_object_terms($post->ID,"speakers",array("fields" => "names"));
$speakers=implode(", ",$speaker);
echo $speakers;
?>
</span>

</div><!-- End of meta -->

<?php if ('open' == $post->comment_status) { ?>

<!-- Start of meta -->
<div class="metacomments">
<div class="comments"></div>

<?php comments_popup_link( '0', '1 comment', '% comments', 'comments-link', ''); ?>

</div><!-- End of meta -->

<?php } ?>

</div><!-- End of sermon index -->

<!-- Start of clear fix --><div class="clear_big"></div>

<!-- Start of sermon block -->
<div class="sermon_block">
  
<!-- Start of social share wrapper -->
<div class="social_share_wrapper">

<div id="description" class="content">
    <?php the_post_thumbnail('slide'); ?>
    
</div>

<div id="usage" class="content">
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
<div id="audio" class="content">
<audio class="cw-audio" preload> </audio>
        <ol class="audio-list">
          <?php foreach ($attachments as $attachment) {	
		     	
		     	$track_title = $attachment->post_title;
		     	
		     	$track_author = $attachment->post_excerpt; ?>
          <li><a href="#" data-src="<?php echo wp_get_attachment_url($attachment->ID); ?>"><?php echo $track_title; ?>&nbsp;</a>
            <?php if($track_author != '' ){ echo '-&nbsp;' . '<span>' . $track_author . '</span>'; }?>
          </li>
          <?php } ?>
        </ol>

</div><!-- End of audio -->

<?php } ?>

</div>

<div id="download" class="content">
    <?php if ($videourl != ('')){ ?> 

<!-- Start of video -->
<div id="video" class="content">
<iframe src="<?php echo $videourl;?>" frameborder="0" allowfullscreen width="960" height="380" style="z-index:999; position:relative;"></iframe>

</div><!-- End of video -->

<?php } else { } ?>
	
</div> 


<ul id="menu" class="menu">
    <li class="active"><a href="#description">*</a><?php _e( 'Main', 'genesis' ); ?></li>
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
    <li><a href="#usage">1</a><?php _e( 'Play Audio', 'genesis' ); ?></li>
    <?php } else { } ?>
    <?php if ($videourl != ('')){ ?>
    <li><a href="#download">h</a><?php _e( 'Play Video', 'genesis' ); ?></li>
    <?php } ?>
    
</ul>
<?php if ($pdfurl != ('')){ ?> 

<!-- Start of pdf -->
<div class="pdf">
<a href="<?php echo wp_get_attachment_url( $pdfurl ); ?>">D</a> <?php _e( 'PDF Download', 'genesis' ); ?>

</div><!-- End of pdf -->

<?php } ?>

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of social share wrapper -->

<?php the_content (); ?>

</div><!-- End of sermon block -->

</article><!-- End of blog wrapper -->

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 

<?php endif; ?>


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

<!-- Start of navigation -->
<div class="navigation">

<!-- Start of alignleft -->
<div class="alignleft">
<?php next_post_link(); ?>

</div><!-- End of alignleft -->

<!-- Start of alignright -->
<div class="alignright">
<?php previous_post_link(); ?> 

</div><!-- End of alignright -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of navigation -->  

<?php if ('open' == $post->comment_status) { ?>
<?php comments_template(); ?>
<?php comment_form(); ?>
<?php } ?>

</div><!-- End of message center left -->

<!-- Start of blog right light -->
<div class="blog_right_light">
<?php get_sidebar ('sermon'); ?>            

</div><!-- End of blog right light -->  

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer ('sermon'); ?>