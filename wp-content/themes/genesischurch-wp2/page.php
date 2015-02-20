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

<!-- Start of bdywrapper -->
<div class="bdywrapper">

<!-- Start of main -->
<section id="main">

<!-- Start of message center left -->
<div class="message_center_left">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of featured text nopad -->
<div class="featured_text_nopad">

<?php the_content('        '); ?> 

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 

<?php endif; ?>

</div><!-- End of featured text nopad -->

<!-- Start of clear fix --><div class="clear"></div>

</article><!-- End of blog wrapper -->

</div><!-- End of message center left -->

<!-- Start of blog right light -->
<div class="blog_right_light">
<?php get_sidebar ('page'); ?>            

</div><!-- End of blog right light -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>