<?php get_header(); ?>	
welsomes
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
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>

<hr />

<?php endwhile; ?> 

<?php else: ?> 
<p><?php _e( 'There are no posts to display. Try using the search.', 'genesis' ); ?></p> 

<?php endif; ?>

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
<?php get_sidebar ('blog'); ?>            

</div><!-- End of blog right light -->  

<div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>