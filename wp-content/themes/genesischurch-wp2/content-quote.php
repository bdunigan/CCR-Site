<?php
/*
 * The default template for displaying quote
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper <?php post_class(); ?>">

<div class="featured_text_quote_wrapper">

</div>

<!-- Start of featured text quote -->
<div class="featured_text_quote">

<blockquote><?php the_content(); ?></blockquote>

</div><!-- End of featured text quote -->

<!-- Start of featured text quote title -->
<div class="featured_text_quote_title">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

</div><!-- End of featured text quote title -->

<!-- Start of clear fix --><div class="clear"></div>      

</article><!-- End of blog wrapper -->

