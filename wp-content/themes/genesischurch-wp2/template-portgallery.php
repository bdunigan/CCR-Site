<?php
/*
Template Name: Photos
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

<!-- Start of message center sermon -->
<div class="message_center_sermon">
<?php
$portgallery_query = new WP_Query();
$portgallery_query->query('post_type=portgallery' . '&paged=' . $paged . '&posts_per_page=600000000');
?>

<!-- Start of portgallery wrapper -->
<article class="portgallery_wrapper">

<ul id="da-thumbs" class="da-thumbs">
<?php while ( $portgallery_query->have_posts() ) : $portgallery_query->the_post(); sltws_post_meta(); ?>

<li class="box">
<a href="<?php echo $meta[ 'subtitle' ]; ?>" class="fancybox">
<?php the_post_thumbnail('large'); ?>
<div><span><?php the_title (); ?></span></div>
</a>
</li>
<?php endwhile; ?> 
</ul>

</article><!-- End of portgallery wrapper -->

</div><!-- End of message center sermon -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>