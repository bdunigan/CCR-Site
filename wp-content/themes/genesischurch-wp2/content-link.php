<?php
/*
 * The default template for displaying link
 */
?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper <?php post_class(); ?>">

<?php // Get the text & url from the first link in the content
$content = get_the_content();
$link_string = extract_from_string('<a href=', '/a>', $content);
$link_bits = explode('"', $link_string);
foreach( $link_bits as $bit ) {
	if( substr($bit, 0, 1) == '>') $link_text = substr($bit, 1, strlen($bit)-2);
	if( substr($bit, 0, 4) == 'http') $link_url = $bit;
}?>

<!-- Start of blog wrapper -->
<article class="blog_wrapper">

<div class="featured_text_link_wrapper">

</div>

<!-- Start of featured text link -->
<div class="featured_text_link">
<?php 
		if ( function_exists( 'get_option_tree' ) ) {
		$readmoretext = get_option_tree( 'vn_readmore' );
		} ?>

        <!-- Start of read more -->
        <div class="read_more">
          <?php
				global $more;
				$more = 0;
				ob_start();
				the_content(('<span class="more-link">' . $readmoretext . '</span>'),true);
				$postOutput = preg_replace('/<img[^>]+./','', ob_get_contents());
				ob_end_clean();
				echo $postOutput;
				?>
        </div>
        <!-- End of read more -->

</div><!-- End of featured text link -->

<!-- Start of featured text quote title -->
<div class="featured_text_quote_title">
<a href="<?php echo $link_url;?>"><?php echo $link_text;?></a>

</div><!-- End of featured text quote title -->

<!-- Start of clear fix --><div class="clear"></div>      

</article><!-- End of blog wrapper -->