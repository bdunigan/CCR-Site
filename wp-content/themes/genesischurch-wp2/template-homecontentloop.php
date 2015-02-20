<?php
/*
Template Name: Home-SliderOnly
*/

get_header ();
?>



<!-- ******************************************************************** This is the slider loop ********************************************************************-->

<!-- Start of bgrndslide -->
<div id="bgrndslide">

<!-- Start of slider wrapper -->
<div class="slider_wrapper">

<!-- Start of myslider -->
<div class="myslider">

<!-- Start of slider -->
<section class="slider">

<ul class="slides">

	<?php
    $temp = $my_query;
    $my_query = null;
    $my_query = new WP_Query('post_type=slider&showposts=10&orderby=date&order=DESC');
    $my_query->query('post_type=slider&showposts=10&orderby=date&order=DESC');
    ?>
        
    <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        
        <li>
        
        <div class="smallslidertitle"><?php the_content (); ?></div>
        
        </li>
        
        <?php endwhile; ?>
        
	</ul>
    
    <?php wp_reset_query(); ?>

</section><!-- End of slider -->

</div><!-- End of myslider -->

</div><!-- End of slider wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of bgrndslide -->

<!-- Start of bdywrapper -->
<div class="bdywrapper">

<!-- Start of main -->
<section id="main">





<!-- ******************************************************************** This is the sermon loop  ********************************************************************-->


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



<!-- Start of message center sermon -->
<div class="message_center_sermon">

<?php the_content('        '); ?> 

<?php endwhile; endif; ?>

<?php wp_reset_query(); ?>

</div><!-- End of message center sermon -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer(); ?>