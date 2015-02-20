<?php get_header(); ?>

<!-- Start of bgrndslide3 -->
<div id="bgrndslide3">

<!-- Start of slider wrapper3 -->
<div class="slider_wrapper3">

<!-- Start of page title wrapper -->
<div class="page_title_wrapper">

<!-- Start of slidertitle -->
<div class="slidertitle">
<?php _e( 'Results for ', 'genesis' ); ?><?php echo($s); ?>

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
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<!-- Start of posted details -->
<div class="posted_details">

</div><!-- End of posted details -->

<!-- Start featured image -->
<div class="featured_image">

</div><!-- End of featured image --> 

<!-- Start of featured text nopad -->
<div class="featured_text_nopad">

<?php the_excerpt(); ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$readmoretext = get_option_tree( 'vn_readmore' );
} ?>

<a href="<?php the_permalink(); ?>"><?php echo stripslashes($readmoretext); ?></a>

</div><!-- End of featured text nopad -->

<!-- Start of clear fix --><div class="clear"></div>      

</article><!-- End of blog wrapper -->

<hr />

<div class="big"></div>
        
<?php endwhile; ?> 
            
<?php else: ?> 
	<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'genesis' ); ?></p> 
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
<?php get_sidebar ('page'); ?>            

</div><!-- End of blog right light -->  

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>
