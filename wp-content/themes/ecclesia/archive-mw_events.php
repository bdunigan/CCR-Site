<?php if (!defined('MW_THEME')) die('No direct script access allowed');

$time_format = get_option('time_format');
$events = MW_Events::get_instance()->get_events();
?>

<?php get_header(); ?>

<!-- Main content -->

<div class="grid-wrap with-sidebar">

    <?php if ( mw_theme_option('sidebar_position') == 'left' ): ?>
    <div class="grid-2 widgets-container">
        <?php get_sidebar(); ?>
    </div>
    <?php endif; ?>

    <div class="grid-4">
        <h1><?php _e('Upcoming events', 'mw_theme') ?></h1>
		<!--GOOGLE CAL WIDGET-->
        <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=p92fl4qha7k1ucuarisucqbeto%40group.calendar.google.com&amp;color=%23B1440E&amp;ctz=America%2FNew_York" style=" border-width:0 " width="600" height="600" frameborder="0" scrolling="no"></iframe>

    </div>
    
    <?php if ( mw_theme_option('sidebar_position') == 'right' ): ?>
    <div class="grid-2 widgets-container">
        <?php get_sidebar(); ?>
    </div>
    <?php endif; ?>

</div>

<!-- End of main content -->

<?php get_footer(); ?>