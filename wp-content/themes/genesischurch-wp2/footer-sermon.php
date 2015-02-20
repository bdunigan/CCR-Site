<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of bdywrapper -->

<!-- Start of outer footer wrapper -->
<footer id="outer_footer_wrapper">

<!-- Start of footer wrapper -->
<div id="footer_wrapper">

<a href="<?php bloginfo('siteurl'); ?>"><?php 
if ( function_exists( 'get_option_tree' ) ) {
$bottomlogo = get_option_tree( 'vn_bottomlogo' );
} ?><img src="<?php echo $bottomlogo; ?>" alt="bottom logo" /></a>

<!-- Start of bottom nav -->
<nav id="bottom_nav">
<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?> 

<!-- Start of clear fix --><div class="clear"></div>

</nav><!-- end of bottom nav -->

<!-- Start of copyright message -->
<div class="copyright_message">
<?php 
if ( function_exists( 'get_option_tree' ) ) {
$copyright = get_option_tree( 'vn_copyright' );
} ?>     
 
&copy;<?php echo stripslashes($copyright); ?>

</div><!-- End of copyright message -->

<!-- Start of social -->
<section class="social">

<ul class="icons">

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon1 = get_option_tree( 'vn_socialicon1' );
$socialiconlink1 = get_option_tree( 'vn_socialiconlink1' );
} ?>

<?php if (isset($socialicon1)) { ?>

<li><a href="<?php echo $socialiconlink1; ?>"><?php echo $socialicon1; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon2 = get_option_tree( 'vn_socialicon2' );
$socialiconlink2 = get_option_tree( 'vn_socialiconlink2' );
} ?>

<?php if (isset($socialicon2)) { ?>

<li><a href="<?php echo $socialiconlink2; ?>"><?php echo $socialicon2; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon3 = get_option_tree( 'vn_socialicon3' );
$socialiconlink3 = get_option_tree( 'vn_socialiconlink3' );
} ?>

<?php if (isset($socialicon3)) { ?>

<li><a href="<?php echo $socialiconlink3; ?>"><?php echo $socialicon3; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon4 = get_option_tree( 'vn_socialicon4' );
$socialiconlink4 = get_option_tree( 'vn_socialiconlink4' );
} ?>

<?php if (isset($socialicon4)) { ?>

<li><a href="<?php echo $socialiconlink4; ?>"><?php echo $socialicon4; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon5 = get_option_tree( 'vn_socialicon5' );
$socialiconlink5 = get_option_tree( 'vn_socialiconlink5' );
} ?>

<?php if (isset($socialicon5)) { ?>

<li><a href="<?php echo $socialiconlink5; ?>"><?php echo $socialicon5; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon6 = get_option_tree( 'vn_socialicon6' );
$socialiconlink6 = get_option_tree( 'vn_socialiconlink6' );
} ?>

<?php if (isset($socialicon6)) { ?>

<li><a href="<?php echo $socialiconlink6; ?>"><?php echo $socialicon6; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon7 = get_option_tree( 'vn_socialicon7' );
$socialiconlink7 = get_option_tree( 'vn_socialiconlink7' );
} ?>

<?php if (isset($socialicon7)) { ?>

<li><a href="<?php echo $socialiconlink7; ?>"><?php echo $socialicon7; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon8 = get_option_tree( 'vn_socialicon8' );
$socialiconlink8 = get_option_tree( 'vn_socialiconlink8' );
} ?>

<?php if (isset($socialicon8)) { ?>

<li><a href="<?php echo $socialiconlink8; ?>"><?php echo $socialicon8; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon9 = get_option_tree( 'vn_socialicon9' );
$socialiconlink9 = get_option_tree( 'vn_socialiconlink9' );
} ?>

<?php if (isset($socialicon9)) { ?>

<li><a href="<?php echo $socialiconlink9; ?>"><?php echo $socialicon9; ?></a></li>

<?php } ?>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$socialicon10 = get_option_tree( 'vn_socialicon10' );
$socialiconlink10 = get_option_tree( 'vn_socialiconlink10' );
} ?>

<?php if (isset($socialicon10)) { ?>

<li><a href="<?php echo $socialiconlink10; ?>"><?php echo $socialicon10; ?></a></li>

<?php } ?>

</ul>

</section><!-- End of social -->

</div><!-- End of footer wrapper -->

<!-- Start of clear fix --><div class="clear"></div>

</footer><!-- End of outer footer wrapper -->

<div id="footerborder"></div>

<?php 
if ( function_exists( 'get_option_tree' ) ) {
$analytics = get_option_tree( 'vn_tracking' );
} ?>     

<?php echo ($analytics); ?>


<script type="text/javascript">
	// <![CDATA[
		
jQuery(document).ready(function () {
		
/* This is Tabify minified script */
(function(a){a.fn.extend({tabify:function(e){function c(b){hash=a(b).find("a").attr("href");return hash=hash.substring(0,hash.length-4)}function f(b){a(b).addClass("active");a(c(b)).show();a(b).siblings("li").each(function(){a(this).removeClass("active");a(c(this)).hide()})}return this.each(function(){function b(){location.hash&&a(d).find("a[href="+location.hash+"]").length>0&&f(a(d).find("a[href="+location.hash+"]").parent())}var d=this,g={ul:a(d)};a(this).find("li a").each(function(){a(this).attr("href", a(this).attr("href")+"-tab")});location.hash&&b();setInterval(b,100);a(this).find("li").each(function(){a(this).hasClass("active")?a(c(this)).show():a(c(this)).hide()});e&&e(g)})}})})(jQuery);

jQuery('#menu').tabify();
        location.hash = 'description-tab';

	});
	
selectnav('menu-primary', {
				label: 'Menu',
				nested: true,
				indent: '-'
			});
			
	// ]]>
</script>

<?php wp_footer(); ?>

</body>
</html>