<?php  
/* 
Template Name: Sitemap 
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

<!-- Start of message center left -->
<div class="message_center_left">

<!-- Start of blog wrapper -->
<article class="blog_wrapper">
<h2><?php _e( 'Pages', 'genesis' ); ?></h2>

<!-- Start of featured_text nopad -->
<div class="featured_text_nopad">
<br />

<ul><?php wp_list_pages("title_li=" ); ?></ul>

</div><!-- End of featured_text nopad -->  

</article><!-- End of blog wrapper -->

<hr />

<!-- Start of blog wrapper -->
<article class="blog_wrapper">
<h2><?php _e( 'Feeds', 'genesis' ); ?></h2>

<!-- Start of featured_text nopad -->
<div class="featured_text_nopad">
<br />
<ul>

<li><a title="<?php _e( 'Full content', 'genesis' ); ?>" href="feed:<?php bloginfo('rss2_url'); ?>"><?php _e( 'Main RSS', 'genesis' ); ?></a></li>
<li><a title="<?php _e( 'Comment Feed', 'genesis' ); ?>" href="feed:<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comment Feed', 'genesis' ); ?></a></li>

</ul>

</div><!-- End of featured_text nopad -->  

</article><!-- End of blog wrapper -->

<hr />

<!-- Start of blog wrapper -->
<article class="blog_wrapper">
<h2><?php _e( 'Categories', 'genesis' ); ?></h2>

<!-- Start of featured_text nopad -->
<div class="featured_text_nopad">
<br />
<ul>

<?php $args = array(
    'show_option_all'    => '',
    'orderby'            => 'name',
    'order'              => 'ASC',
    'style'              => 'list',
    'show_count'         => 1,
    'hide_empty'         => 1,
    'use_desc_for_title' => 0,
    'child_of'           => 0,
    'feed'               => '',
    'feed_type'          => '',
    'feed_image'         => '',
    'exclude'            => '',
    'exclude_tree'       => '',
    'include'            => '',
    'hierarchical'       => true,
    'title_li'           => '',
    'show_option_none'   => __('No categories', 'genesis' ),
    'number'             => NULL,
    'echo'               => 1,
    'depth'              => 0,
    'current_category'   => 0,
    'pad_counts'         => 0,
    'taxonomy'           => 'category',
    'walker'             => 'Walker_Category' ); ?> 
	
	<?php wp_list_categories( $args ); ?>
    
</ul>

</div><!-- End of featured_text nopad -->  

</article><!-- End of blog wrapper -->

<hr />

<!-- Start of blog wrapper -->
<article class="blog_wrapper">
<h2><?php _e( 'All Blog Posts', 'genesis' ); ?></h2>

<!-- Start of featured_text nopad -->
<div class="featured_text_nopad">
<br />
<ul>

<?php $archive_query = new WP_Query('showposts=1000&cat=-8');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>

<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'genesis' ); ?><?php the_title(); ?>"><?php the_title(); ?></a>
(<?php comments_number('0', '1', '%'); ?>)
</li>

<?php endwhile; ?>
    
</ul>

</div><!-- End of featured_text nopad -->  

</article><!-- End of blog wrapper -->

<hr />

<!-- Start of blog wrapper -->
<article class="blog_wrapper">
<h2><?php _e( 'Archives', 'genesis' ); ?></h2>

<!-- Start of featured_text nopad -->
<div class="featured_text_nopad">
<br />
<ul>

<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
    
</ul>

</div><!-- End of featured_text nopad -->  

</article><!-- End of blog wrapper -->

<hr />

</div><!-- End of message center left -->

<!-- Start of blog right light -->
<div class="blog_right_light">
<?php get_sidebar ('page'); ?>            

</div><!-- End of blog right light -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>