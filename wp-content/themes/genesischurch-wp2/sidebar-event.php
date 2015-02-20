<!-- Start of searchbox -->
<div id="searchbox">
<?php get_search_form(); ?>

</div><!-- End of searchbox -->

<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('event_page') ) : else : ?>		
<?php endif; ?>