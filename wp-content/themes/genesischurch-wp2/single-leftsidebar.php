<?php
/*
Single Post Template: [Blog Single Left Sidebar]
Description: This part is optional, but helpful for describing the Post Template
*/
?>

<?php get_header(); ?>	

<?php if(have_posts()) : while(have_posts()) : the_post(); intropost_post_meta(); ?>

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

<!-- Start of bdywrapper -->
<div class="bdywrapper">

<!-- Start of main -->
<section id="main">

<!-- Start of content right page -->
<div class="content_right_page">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<!-- Start of posted details -->
<div class="posted_details">

<!-- Start of post content first -->
<div class="post_content_first">
<span class="meta"><?php the_time(get_option('date_format')); ?></span>

</div><!-- End of post content first -->

<!-- Start of post content -->
<div class="post_content">
<span class="meta"><?php _e( 'Posted by:', 'genesis' ); ?> <?php the_author() ?></span>

</div><!-- End of post content -->

<!-- Start of post content -->
<div class="post_content">
<span class="meta"><?php _e( 'Posted In:', 'genesis' ); ?> <?php the_category(', '); ?></span>

</div><!-- End of post content -->

<?php
if (has_tag()) { ?>
<!-- Start of post content -->
<div class="post_content">
<span class="meta"><?php _e( 'Tags:', 'genesis' ); ?> <?php the_tags('', '&nbsp; ', ''); ?></span>

</div><!-- End of post content -->

<?php } ?>

<?php if ('open' == $post->comment_status) { ?>

<!-- Start of meta -->
<div class="metacomments">
<div class="comments"></div>

<?php comments_popup_link( '0', '1 comment', '% comments', 'comments-link', ''); ?>

</div><!-- End of meta -->

<?php } ?>


</div><!-- End of posted details -->

<!-- Start featured image -->
<div class="featured_image_gallery">

<?php 
    if (has_post_format('gallery')) { ?>

<?php
$attachments = get_children(
array(
'post_type' => 'attachment',
'post_mime_type' => 'image',
'post_parent' => $post->ID
));
if(count($attachments) > 1) { ?>

<!-- Start of slider -->
<section class="slider">

<ul class="slides">
<?php 

$args = array(
'post_type' => 'attachment',
'numberposts' => -1,
'post_status' => null,
'post_parent' => $post->ID,
'order' => 'ASC', 'orderby' => 'menu_order'
);

$attachments = get_posts( $args );
if ( $attachments ) {
foreach ( $attachments as $attachment ) {
echo '<li>';
echo wp_get_attachment_image( $attachment->ID, 'slide' );
echo '</li>';
}
}

?>

</ul><!-- End of slides -->	

</section><!-- End of slider -->

<?php } } else { ?>

<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a>

<?php }?>

</div><!-- End of featured image --> 

<!-- Start of featured text nopad -->
<div class="featured_text_nopad">
<?php the_content('        '); ?> 

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
        <?php } ?>

<?php if ( $numpages > '1' ) { ?>
      
      <!-- Start of pagination -->
      <div id="pagination2"> 
        
        <!-- Start of pagination class -->
        <div class="pagination2">
          <?php wp_link_pages(); ?>
        </div>
        <!-- End of pagination class --> 
        
      </div>
      <!-- End of pagination -->
      
      <?php } ?>

</div><!-- End of featured text nopad -->

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

<!-- Start of blog left light -->
<div class="blog_left_light">
<?php get_sidebar ('blog'); ?>            

</div><!-- End of blog left light -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>