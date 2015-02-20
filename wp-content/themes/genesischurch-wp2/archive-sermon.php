<?php get_header(); ?>	

<!-- Start of bgrndslide3 -->
<div id="bgrndslide3">

<!-- Start of slider wrapper3 -->
<div class="slider_wrapper3">

<!-- Start of page title wrapper -->
<div class="page_title_wrapper">

<!-- Start of slidertitle -->
<div class="slidertitle">
<?php wp_title('',1,''); ?>

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

<!-- Start of message center left -->
<div class="message_center_left">

<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

query_posts($query_string.'&posts_per_page=6000000000&paged='.$paged. ''); if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
$videourl = get_post_meta($post->ID, 'videourl', $single = true); 
$pdfurl = get_post_meta($post->ID, 'pdfurl', $single = true);
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">  

<h2><a href="<?php the_permalink (); ?>"><?php the_title (); ?></a></h2>

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


</div><!-- End of sermon index -->

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of sermon block -->
<div class="sermon_block">

<a href="<?php the_permalink (); ?>"><?php the_post_thumbnail('slide'); ?></a>

<!-- Start of clear fix --><div class="clear"></div>

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

</div><!-- End of sermon block -->

</article><!-- End of blog wrapper -->

<hr />
        
<?php endwhile; ?> 
<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 
<?php endif; ?> 

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
<?php get_sidebar ('sermon'); ?>            

</div><!-- End of blog right light -->  

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>
