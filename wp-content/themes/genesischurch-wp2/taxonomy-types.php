<?php
/*
Template Name: Photos
*/
?>

<?php get_header(); ?>

<!-- Start of bgrndslide3 -->
<div id="bgrndslide3">

<!-- Start of slider wrapper3 -->
<div class="slider_wrapper3">

<!-- Start of page title wrapper -->
<div class="page_title_wrapper">

<!-- Start of slidertitle -->
<div class="slidertitle">
<span style="text-transform:uppercase;"><?php echo $term; ?></span>

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

<!-- Start of message center sermon -->
<div class="message_center_sermon">

<!-- Start of portgallery wrapper -->
<article class="portgallery_wrapper">

<ul id="da-thumbs" class="da-thumbs">
<?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

query_posts($query_string.'&posts_per_page=6000000000&paged='.$paged. ''); if (have_posts()) : while (have_posts()) : the_post(); sltws_post_meta(); ?>

<?php
$portgallerylink = get_post_meta($post->ID, 'portgallerylink', $single = true);   
?>

<li class="box">
<a href="<?php echo $meta[ 'subtitle' ]; ?>">
<?php the_post_thumbnail('large'); ?>
<div><span><?php the_title (); ?></span></div>
</a>
</li>
<?php endwhile; ?> 
<?php else: ?> 
<p>There are no posts to display. Try using the search.</p> 
<?php endif; ?> 
</ul>

</article><!-- End of portgallery wrapper -->

</div><!-- End of message center sermon -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>