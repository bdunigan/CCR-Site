<?php $path = get_template_directory_uri();
if(!isset($_REQUEST['error']))  $error_code = '404';
else  $error_code = $_REQUEST['error'];
?>

<?php get_header(); ?>

<!-- Start of bgrndslide3 -->
<div id="bgrndslide3">

<!-- Start of slider wrapper2 -->
<div class="slider_wrapper3">

<!-- Start of page title wrapper -->
<div class="page_title_wrapper">

<!-- Start of slidertitle -->
<div class="slidertitle">
<?php _e( 'Page Not Found', 'genesis' ); ?>

</div><!-- End of slidertitle -->

<!-- Start of smallslidertitle -->
<div class="smallslidertitle">
<p><?php _e( 'No worries you probably mistyped something, looked for something that does not exist anymore or just downright broke stuffs - just carry on with the menu at the top!', 'genesis' ); ?></p>

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

<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('error') ) : else : ?>		
<?php endif; ?>

</div><!-- End of message center sermon -->

<!-- Start of clear fix --><div class="clear"></div>
            
</section><!-- End of main -->

<?php get_footer (); ?>