<?php
/*
Template Name: Contact
*/

get_header ();
?>

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

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of map div -->
<div id="map_div">

<!-- ****************************THIS IS THE START OF THE CONTACT MAP WIDGET & DYNAMIC CONTACT DETAILS FROM ADMIN**************************** -->


<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('contact map')) : ?>
<?php endif; ?>

</div><!-- End of map div -->

<!-- Start of main fullwidth wrapper -->
<div id="main_fullwidth_wrapper">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<!-- Start of clear fix --><div class="clear"></div>

<!-- Start of featured text full -->
<div class="featured_text_full">
<?php the_content('        '); ?> 

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 

<?php endif; ?>

</div><!-- End of featured text full -->

</article><!-- End of blog wrapper -->

</div><!-- End of main fullwidth wrapper -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>