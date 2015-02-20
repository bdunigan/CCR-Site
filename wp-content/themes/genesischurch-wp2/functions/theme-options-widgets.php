<?php
if ( function_exists('register_sidebars') ) {
register_sidebar(array(
	'name' => __( 'Header Widget', 'genesis' ),
	'id' => 'header_side',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h6>',
    'after_title' => '</h6>'
));
register_sidebar(array(
	'name' => __( 'Page', 'genesis' ),
	'id' => 'page',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
	'name' => __( 'Blog', 'genesis' ),
	'id' => 'blog',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
	'name' => __( 'Sermon Page', 'genesis' ),
	'id' => 'sermon_page',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
	'name' => __( 'Event Page', 'genesis' ),
	'id' => 'event_page',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
	'name' => __( 'Contact Map', 'genesis' ),
	'id' => 'map',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
register_sidebar(array(
	'name' => __( '404 Widget', 'genesis' ),
	'id' => 'error',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h5>',
    'after_title' => '</h5>'
));
}
?>