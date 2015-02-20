<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<!--[if IE 7 ]>    <html class= "ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class= "ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class= "ie9"> <![endif]-->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->
<head>
<title><?php echo get_option('blogname'); ?><?php wp_title(); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

 <!-- *************************************************************************
*****************                FAVICON               ********************
************************************************************************** -->
<?php 
if ( function_exists( 'get_option_tree') ) {
  $favicon = get_option_tree( 'vn_favicon' );
}
?>
<link rel="shortcut icon" href="<?php echo ($favicon); ?>" />

  <!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- *************************************************************************
*****************              CUSTOM CSS              ********************
************************************************************************** -->
<style type="text/css">
<?php 
if ( function_exists( 'get_option_tree') ) {
  $css = get_option_tree( 'vn_custom_css' );
}
?>
<?php echo ($css); ?>
</style>
<?php wp_head(); ?>
</head>

<?php $theme_options = get_option('option_tree'); ?>

<!-- *************************************************************************
*****************             ACCENT COLOR            ********************
************************************************************************** -->
<?php 
if ( function_exists( 'get_option_tree') ) {
  $headerbgroundimg = get_option_tree( 'vn_headerbgroundimg' );
  $headerrepeat = get_option_tree( 'vn_headerrepeat' );
  $headerbackgroundcolor = get_option_tree( 'vn_headerbackgroundcolor' );
  $topborder = get_option_tree( 'vn_topbottombordercolor' );
  $headermenubackgroundcolor = get_option_tree( 'vn_headermenubackgroundcolor' );
  $headermenubgroundimg = get_option_tree( 'vn_headermenubgroundimg' );
  $headermenurepeat = get_option_tree( 'vn_headermenurepeat' );
  $bodybackgroundcolor = get_option_tree( 'vn_bodybackgroundcolor' );
  $bodybgroundimg = get_option_tree( 'vn_bodybgroundimg' );
  $bodyrepeat = get_option_tree( 'vn_bodyrepeat' );
  $color1 = get_option_tree( 'vn_color1' );
  $color2 = get_option_tree( 'vn_color2' );
  $color3 = get_option_tree( 'vn_color3' );
  $color4 = get_option_tree( 'vn_color4' );
  $contentbgroundimg = get_option_tree( 'vn_contentbgroundimg' );
  $contentbackgroundcolor = get_option_tree( 'vn_contentbackgroundcolor' );
  $contentrepeat = get_option_tree( 'vn_contentrepeat' );
  $topbgroundimg = get_option_tree( 'vn_topbgroundimg' );
  $topbgroundcolor = get_option_tree( 'vn_topbgroundcolor' );
  $color5 = get_option_tree( 'vn_color5' );
}
?>

<style type="text/css">
	
.headerwrapper {
	background-image:url('<?php echo ($headerbgroundimg);?>');
	background-repeat:<?php echo ($headerrepeat); ?>;
	background-color:<?php echo ($headerbackgroundcolor);?>
	}
	
#topborder, #footerborder {
	border-top:5px solid <?php echo ($topborder);?>
	}
	
#topmenu_wrapper {
	background-image:url('<?php echo ($headermenubgroundimg);?>');
	background-repeat:<?php echo ($headermenurepeat); ?>;
	background-color:<?php echo ($headermenubackgroundcolor);?>
	}
	
.sf-menu li ul li {
	background-image:url('<?php echo ($headermenubgroundimg);?>');
	background-repeat:<?php echo ($headermenurepeat); ?>;
	background-color:<?php echo ($headermenubackgroundcolor);?>
	}
	
.bdywrapper, #outer_footer_wrapper {
	background-image:url('<?php echo ($bodybgroundimg);?>');
	background-repeat:<?php echo ($bodyrepeat); ?>;
	background-color:<?php echo ($bodybackgroundcolor);?>
	}
	
.slider_wrapper, .slider_wrapper2, .slider_wrapper3 {
	background-image:url('<?php echo ($topbgroundimg);?>');
	background-repeat:repeat;
	background-color:<?php echo ($topbgroundcolor);?>;
	}

ul li a, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, a, .meta a:hover, .one_half a, .one_half_first a, .one_third a, .one_third_first a, .two_third a, .two_third_first a, .one_fourth a, .one_fourth_first a, .three_fourth a, .three_fourth_first a, .social_share_links a, .event_block .meta a:hover, .meta span a:hover, .copyright_message a:hover, ul.icons li a:hover, .at, .tweet_text a, .tweet_time a, .socialpic:after, .social_share_links a.socialsharing:hover, .comment-date a:hover, .cancel-comment-reply a:hover, a.comment-reply-link:hover, .spacing a:hover, .featured_text_quote_title a:hover, .intro a, .intro a:hover {
	color:<?php echo ($color1); ?>;
	}
	
.button a, .button_reverse a:hover, input[type=submit], body .creativ-shortcode-button-colour-theme {
	background-color:<?php echo ($color1); ?> !important;
	color:#ffffff !important;
	}
	
.message_center_sermon .one_fourth .audio a, .message_center_sermon .one_fourth .pdf a, .message_center_sermon .one_fourth .video a, .sermon_index .audio a, .sermon_index .pdf a, .sermon_index .video a, .social_share_wrapper #audio a, .social_share_wrapper .pdf a, .social_share_wrapper ul li a {
	background-color:<?php echo ($color1); ?>;
	color:#ffffff;
	}
	
ul li, ul li a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, .sf-menu li a, #bottom_nav ul li a:hover, h1, h2, h3, h4, h5, h6, p, blockquote, .intro, .meta a, .calendarday, .one_half, .one_half_first, .one_third, .one_third_first, .two_third, .two_third_first, .one_fourth, .one_fourth_first, .three_fourth, .three_fourth_first, .one_half a:hover, .one_half_first a:hover, .one_third a:hover, .one_third_first a:hover, .two_third a:hover, .two_third_first a:hover, .one_fourth a:hover, .one_fourth_first a:hover, .three_fourth a:hover, .three_fourth_first a:hover, .social_share_links a:hover, #countdownbox .textwidget h3 a:hover, #bottom_nav ul li a:hover, #searchbox input, #searchbox input:focus, a:hover, .social_share_links a.socialsharing, .social_share_wrapper .audio, .social_share_wrapper .pdf, .social_share_wrapper .video, .comment_title, a.comment-reply-link, .commentlist p, .spacing a, .featured_text_quote_title a, ul.sf-menu li.current_page_item ul.sub-menu li a, div.wpcf7-validation-errors, div.wpcf7-mail-sent-ok, span.wpcf7-not-valid-tip  { 
	color:<?php echo ($color2); ?> ;
	}
	
.creativ-shortcode-alertbox-colour-theme.creativ-shortcode-alertbox p, .creativ-shortcode-alertbox-colour-theme.creativ-shortcode-alertbox a  { 
	color:<?php echo ($color2); ?> !important;
	}
	
.button_reverse a, .button a:hover, input[type=submit]:hover, body .creativ-shortcode-button-colour-theme:hover {
	background-color:<?php echo ($color3); ?> !important;
	color:#ffffff !important;
	}
	
.message_center_sermon .one_fourth .audio a:hover, .message_center_sermon .one_fourth .pdf a:hover, .message_center_sermon .one_fourth .video a:hover, .sermon_index .audio a:hover, .sermon_index .pdf a:hover, .sermon_index .video a:hover, .social_share_wrapper .audio a:hover, .social_share_wrapper .pdf a:hover, .social_share_wrapper .video a:hover, .social_share_wrapper ul li a:hover {
	background-color:<?php echo ($color3); ?>;
	color:#ffffff;
	text-decoration:none;
	}
	
.calendarmonth, .sf-menu li a:hover, ul.sf-menu li.current_page_item a, ul.sf-menu li ul.sub-menu li.current-menu-item a, #countdownbox .textwidget h3 a, ul.sf-menu li.current_page_item ul.sub-menu li a:hover {
	color:<?php echo ($color3); ?>;
	}
	
.eventmonth {
	background-color:<?php echo ($color3); ?>;
	}
	
.eventday {
	background-color:<?php echo ($color2); ?>;
	}
	
.meta, #bottom_nav ul li a, a.more-link:after, .datepic:after, .event_social_share_wrapper .socialpic:after, .da-thumbs li a div:after, .copyright_message, .copyright_message a, .time, .venue, #bottom_nav ul li a, ul.icons li a, .user, .searchme:after, .blog_left_light h5, .blog_right_light h5, .metacomments, .comment-date a, .cancel-comment-reply a, .sermon_deats {
	color:<?php echo ($color4); ?>;
	}
	
#main {
	background-image:url('<?php echo ($contentbgroundimg);?>');
	background-repeat:<?php echo ($contentrepeat); ?>;
	background-color:<?php echo ($contentbackgroundcolor);?>
	}
	
.slidertitle, ul.slides li .smallslidertitle, ul.slides li .smallslidertitle p, ul.slides li .smallslidertitle h1, ul.slides li .smallslidertitle h2, ul.slides li .smallslidertitle h3, ul.slides li .smallslidertitle h4, ul.slides li .smallslidertitle h5, ul.slides li .smallslidertitle h6, .smallslidertitle blockquote, .smallslidertitle .intro, .smallslidertitle .one_half, .smallslidertitle .one_half_first, .smallslidertitle .one_third, .smallslidertitle .one_third_first, .smallslidertitle .two_third, .smallslidertitle .two_third_first, .smallslidertitle .one_fourth, .smallslidertitle .one_fourth_first, .smallslidertitle .three_fourth, .smallslidertitle .three_fourth_first, .smallslidertitle p, .smallslidertitle div.wpcf7-validation-errors, .smallslidertitle div.wpcf7-mail-sent-ok, .smallslidertitle span.wpcf7-not-valid-tip  {
	color:<?php echo ($color5); ?> !important;
	}

</style>

<body <?php body_class(); ?>>

<div class="clear"></div>

<div id="topborder"></div>

<!-- Start of headerwrapper -->
<div class="headerwrapper">

<!-- Start of nav wrapper -->
<div id="nav_wrapper">

<!-- Start of top logo -->
<div id="top_logo">
<a href="<?php bloginfo('siteurl'); ?>"><?php 
if ( function_exists( 'get_option_tree' ) ) {
$logopath = get_option_tree( 'vn_logo' );
} ?><img src="<?php echo $logopath; ?>" alt="logo" /></a>

</div><!-- End of top logo -->

<!-- Start of countdownbox -->
<div id="countdownbox">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('header_side') ) : else : ?>		
	<?php endif; ?>

</div><!-- End of countdownbox -->

<!-- Start of clear fix --><div class="clear"></div>

</div><!-- End of nav wrapper --> 

</div><!-- End of headerwrapper -->

<!-- Start of topmenu wrapper -->
<div id="topmenu_wrapper">

<!-- Start of topmenu -->
<nav id="topmenu">  
        <?php

		$defaults = array(
			'theme_location'  => 'primary',
			'menu_class'      => 'sf-menu'
		);
		
		wp_nav_menu( $defaults );
		
		?>

<!-- Start of clear fix --><div class="clear"></div>

</nav><!-- End of topmenu -->

</div><!-- End of topmenu wrapper -->
