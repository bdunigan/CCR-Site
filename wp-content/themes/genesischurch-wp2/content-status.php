<?php
/*
 * The default template for displaying status
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper <?php post_class(); ?>">

<!-- Start of featured text nopad -->
<div class="featured_text_nopad">
<?php the_content(); ?>

</div><!-- End of featured text nopad -->

<!-- Start of clear fix --><div class="clear"></div>      

</article><!-- End of blog wrapper -->
