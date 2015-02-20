<?php
/*
 * The default template for displaying audio
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper <?php post_class(); ?>">

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
<div class="featured_image">

<?php 
if ( has_post_thumbnail() ) {  ?>

<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a>

<?php } ?> 

</div><!-- End of featured image --> 

<!-- Start of featured text nopad -->
<div class="featured_text_nopad">

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

</div><!-- End of featured text nopad -->

<!-- Start of clear fix --><div class="clear"></div>      

</article><!-- End of blog wrapper -->
