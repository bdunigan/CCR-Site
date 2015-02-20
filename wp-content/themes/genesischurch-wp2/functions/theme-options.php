<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array(
      
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => __('General', 'genesis')
      ),
      array(
        'id'          => 'header_setup',
        'title'       => __('Header Setup', 'genesis')
      ),
      array(
        'id'          => 'body_setup',
        'title'       => __('Body Setup', 'genesis')
      ),
      array(
        'id'          => 'content_setup',
        'title'       => __('Content Setup', 'genesis')
      ),
      array(
        'id'          => 'typography_setup',
        'title'       => __('Typography', 'genesis')
      ),
      array(
        'id'          => 'homepage',
        'title'       => __('Homepage', 'genesis')
      ),
array(
        'id'          => 'social_setup',
        'title'       => __('Social Setup', 'genesis')
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'vn_logo',
        'label'       => __('Custom Top Logo', 'genesis'),
        'desc'        => __('Upload your top logo. Recommended size is 293 x 114 (transparent png).', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bottomlogo',
        'label'       => __('Custom Bottom Logo', 'genesis'),
        'desc'        => __('Upload your bottom logo. Recommended size is 177 x 70 (transparent png).', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_favicon',
        'label'       => __('Custom Favicon', 'genesis'),
        'desc'        => __('Upload your favicon. Recommended size is 16 x 16 (transparent png).', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_topbottombordercolor',
        'label'       => __('Top and Bottom Border Color', 'genesis'),
        'desc'        => __('Choose the color you want to use for the border at the top and bottom of your site.', 'genesis'),
        'std'         => '#3d3d3d',
        'type'        => 'colorpicker',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_readmore',
        'label'       => __('Read More Button Text', 'genesis'),
        'desc'        => __('Enter the text you want to appear on all your \'more\' buttons.  Standard text used generally is "Read More".  If no text is entered, "read more" will be used by default', 'genesis'),
        'std'         => __('read more', 'genesis'),
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
	  array(
        'id'          => 'vn_eventorder',
        'label'       => __( 'Event Order', 'genesis' ),
        'desc'        => __( 'Select how you want your events to be ordered by event start date, ASC or DESC', 'genesis' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'ASC',
            'label'       => __('ASC', 'genesis' ),
            'src'         => ''
          ),
          array(
            'value'       => 'DESC',
            'label'       => __('DESC', 'genesis' ),
            'src'         => ''
          )
        ),
      ), 
	  array(
        'id'          => 'vn_eventdateformat',
        'label'       => __( 'Event Date Format', 'genesis' ),
        'desc'        => __( 'Select how you want the event date to show on the single event page.', 'genesis' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => '12/31/2013',
            'src'         => ''
          ),
		  array(
            'value'       => '2',
            'label'       => '12/31/13',
            'src'         => ''
          ),
		  array(
            'value'       => '3',
            'label'       => '31/12/2013',
            'src'         => ''
          ),
		  array(
            'value'       => '4',
            'label'       => '31/12/13',
            'src'         => ''
          ),
		  array(
            'value'       => '5',
            'label'       => 'Tue 12/31/13',
            'src'         => ''
          ),
          array(
            'value'       => '6',
            'label'       => 'Tue 31/12/13',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_tracking',
        'label'       => __('Tracking Code', 'genesis'),
        'desc'        => __('Enter the tracking code here that will go in the footer of every page for your analytic reporting.', 'genesis'),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_default',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_custom_css',
        'label'       => __('Custom CSS', 'genesis'),
        'desc'        => __('Enter your custom css here that will over ride the stylesheet.', 'genesis'),
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general_default',
        'rows'        => '10',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_topbgroundimg',
        'label'       => __('Top Background Image', 'genesis'),
        'desc'        => __('Upload a background image that will appear on all pages before the content.  Recommended size is 1920 X 514.  The CSS is set to repeat (incase you want to upload a sliver of a texture or pattern).', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_topbgroundcolor',
        'label'       => __('Top Background Color', 'genesis'),
        'desc'        => __('Choose the color you want to use for the background color that will appear on all pages before the content.', 'genesis'),
        'std'         => '#0c0705',
        'type'        => 'colorpicker',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_copyright',
        'label'       => __('Copyright Information', 'genesis'),
        'desc'        => __('Enter your copyright info here.  HTML (links etc) are accepted here.  You do not need to enter the copyright symbol.', 'genesis'),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_default',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_headerbgroundimg',
        'label'       => __('Header Background Image URL', 'genesis'),
        'desc'        => __('Upload the image you have selected for your background image of your header.', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_headerrepeat',
        'label'       => __('Header Image Repeat', 'genesis'),
        'desc'        => __('Choose how you want your header background image to repeat.  Repeat=this image will repeat horizontally and vertically.  Repeat-x=this image will ONLY repeat horizontally.  Repeat-y=this image will ONLY repeat vertically.', 'genesis'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'header_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'repeat',
            'label'       => __('repeat', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __('repeat-x', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __('repeat-y', 'genesis'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_headerbackgroundcolor',
        'label'       => __('Header Background Color', 'genesis'),
        'desc'        => __('Choose the background color you want for your header.', 'genesis'),
        'std'         => '#f5f8f1',
        'type'        => 'colorpicker',
        'section'     => 'header_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_headermenubgroundimg',
        'label'       => __('Header Menu Background Image URL', 'genesis'),
        'desc'        => __('Upload the image you have selected for your background image of your header menu.', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'header_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_headermenurepeat',
        'label'       => __('Header Menu Image Repeat', 'genesis'),
        'desc'        => __('Choose how you want your header menu background image to repeat.  Repeat=this image will repeat horizontally and vertically.  Repeat-x=this image will ONLY repeat horizontally.  Repeat-y=this image will ONLY repeat vertically.', 'genesis'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'header_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'repeat',
            'label'       => __('repeat', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __('repeat-x', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __('repeat-y', 'genesis'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_headermenubackgroundcolor',
        'label'       => __('Header Menu Background Color', 'genesis'),
        'desc'        => __('Choose the background color you want for your header menu.', 'genesis'),
        'std'         => '#f0f5ea',
        'type'        => 'colorpicker',
        'section'     => 'header_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bodybgroundimg',
        'label'       => __('Body Background Image URL', 'genesis'),
        'desc'        => __('Upload the image you have selected for your background image of your body.', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'body_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bodyrepeat',
        'label'       => __('Body Image Repeat', 'genesis'),
        'desc'        => __('Choose how you want your body background image to repeat.  Repeat=this image will repeat horizontally and vertically.  Repeat-x=this image will ONLY repeat horizontally.  Repeat-y=this image will ONLY repeat vertically.', 'genesis'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'body_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'repeat',
            'label'       => __('repeat', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __('repeat-x', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __('repeat-y', 'genesis'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_bodybackgroundcolor',
        'label'       => __('Body Background Color', 'genesis'),
        'desc'        => __('Choose the background color you want for your body.', 'genesis'),
        'std'         => '#f5f8f1',
        'type'        => 'colorpicker',
        'section'     => 'body_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_contentbgroundimg',
        'label'       => __('Content Background Image URL', 'genesis'),
        'desc'        => __('Upload the image you have selected for your background image of your content area.', 'genesis'),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'content_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_contentrepeat',
        'label'       => __('Content Image Repeat', 'genesis'),
        'desc'        => __('Choose how you want your content background image to repeat.  Repeat=this image will repeat horizontally and vertically.  Repeat-x=this image will ONLY repeat horizontally.  Repeat-y=this image will ONLY repeat vertically.', 'genesis'),
        'std'         => '',
        'type'        => 'radio',
        'section'     => 'content_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'repeat',
            'label'       => __('repeat', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-x',
            'label'       => __('repeat-x', 'genesis'),
            'src'         => ''
          ),
          array(
            'value'       => 'repeat-y',
            'label'       => __('repeat-y', 'genesis'),
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'vn_contentbackgroundcolor',
        'label'       => __('Content Background Color', 'genesis'),
        'desc'        => __('Choose the background color you want for your content.', 'genesis'),
        'std'         => '#f9fcf5',
        'type'        => 'colorpicker',
        'section'     => 'content_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color1',
        'label'       => __('Color Option 1', 'genesis'),
        'desc'        => __('This option will set the color of li a:hover, all heading\'s that are links, regular links, meta information (date of post, posted by) hover state, button background color and background color hover state for video buttons, audio buttons, pdf buttons.', 'genesis'),
        'std'         => '#ac5037',
        'type'        => 'colorpicker',
        'section'     => 'typography_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color2',
        'label'       => __('Color Option 2', 'genesis'),
        'desc'        => __('This option will set the color of li, li a, all headings that are links hover state, all headings, regular text, regular links hover state, top menu items, bottom menu items hover state, blockquote, all pull quotes, toggle titles, top site border, bottom site border, meta information links (date of post, posted by), background color for calendar day box on events, event title in header hover state.', 'genesis'),
        'std'         => '#3d3d3d',
        'type'        => 'colorpicker',
        'section'     => 'typography_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color3',
        'label'       => __('Color Option 3', 'genesis'),
        'desc'        => __('This option will set the color of header event title, top menu items hover state, top menu items active state, toggle titles hover state, button background color hover state and background color regular state for video buttons, audio buttons, pdf buttons and calendar month box on events.', 'genesis'),
        'std'         => '#989101',
        'type'        => 'colorpicker',
        'section'     => 'typography_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color4',
        'label'       => __('Color Option 4', 'genesis'),
        'desc'        => __('This option will set the color of any meta information that is not a link and bottom menu items.', 'genesis'),
        'std'         => '#878787',
        'type'        => 'colorpicker',
        'section'     => 'typography_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_color5',
        'label'       => __('Slider Text Color', 'genesis'),
        'desc'        => __('This option will set the color of slider text that appears on the homepage.', 'genesis'),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
	  array(
        'id'          => 'vn_selectnumberblog',
        'label'       => __( 'Select # of Blog Articles', 'genesis' ),
        'desc'        => __( 'Choose the number of blog articles you want displayed on your homepage.', 'genesis' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => '1',
            'src'         => ''
          ),
		  array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          ),
          array(
            'value'       => '5',
            'label'       => '5',
            'src'         => ''
          ),
          array(
            'value'       => '6',
            'label'       => '6',
            'src'         => ''
          )
        ),
      ),
	  array(
        'id'          => 'vn_selectnumberevent',
        'label'       => __( 'Select # of Events', 'genesis' ),
        'desc'        => __( 'Choose the number of events to show on your homepage.', 'genesis' ),
        'std'         => '',
        'type'        => 'select',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1',
            'label'       => '1',
            'src'         => ''
          ),
		  array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          ),
          array(
            'value'       => '5',
            'label'       => '5',
            'src'         => ''
          ),
          array(
            'value'       => '6',
            'label'       => '6',
            'src'         => ''
          )
        ),
      ),  
      array(
        'id'          => 'vn_toprowtitle',
        'label'       => __('Top Row Loop Title', 'genesis'),
        'desc'        => __('Enter a title for the sermon loop. Example: Latest Sermons.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_toprowtext',
        'label'       => __('Top Row Text Block', 'genesis'),
        'desc'        => __('Enter some text that will appear under the above title. Intro text under the above title.', 'genesis'),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_toprowlinktext',
        'label'       => __('Top Row Link Text', 'genesis'),
        'desc'        => __('Enter the text that you want to appear under the above text. Example: View All Sermons', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_toprowlink',
        'label'       => __('Top Row Link', 'genesis'),
        'desc'        => __('Enter a URL for the above text link to point to, typically the page you have dedicated to display all your "Sermons".', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_eventlooptitle',
        'label'       => __('Event Loop Title', 'genesis'),
        'desc'        => __('Enter a title here that will appear above the event loop. Example: Upcoming Events.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_eventlooplinktext',
        'label'       => __('Event Loop Link Text', 'genesis'),
        'desc'        => __('Enter the text that you want to appear under the above text. Example: View all events.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_eventlooplink',
        'label'       => __('Event Loop Link', 'genesis'),
        'desc'        => __('Enter a URL for the above text link to point to, typically this would be the page you have dedicated to display all your "Events".', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bloglooptitle',
        'label'       => __('Blog Loop Title', 'genesis'),
        'desc'        => __('Enter a title here that will appear above the blog loop. Example: Latest News.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bloglooplinktext',
        'label'       => __('Blog Loop Link Text', 'genesis'),
        'desc'        => __('Enter the text that you want to appear under the above text. Example: View all news.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_bloglooplink',
        'label'       => __('Blog Loop Link', 'genesis'),
        'desc'        => __('Enter a URL for the above text link to point to, typically this would be the page you have told WordPress is your "post page" from the Settings / Reading seciton.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_socialicon1',
        'label'       => __('Social Icon 1', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink1',
        'label'       => __('Social Icon Link 1', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),		  
      array(
        'id'          => 'vn_socialicon2',
        'label'       => __('Social Icon 2', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink2',
        'label'       => __('Social Icon Link 2', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	
      array(
        'id'          => 'vn_socialicon3',
        'label'       => __('Social Icon 3', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink3',
        'label'       => __('Social Icon Link 3', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
	      array(
        'id'          => 'vn_socialicon4',
        'label'       => __('Social Icon 4', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink4',
        'label'       => __('Social Icon Link 4', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),  
      array(
        'id'          => 'vn_socialicon5',
        'label'       => __('Social Icon 5', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink5',
        'label'       => __('Social Icon Link 5', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialicon6',
        'label'       => __('Social Icon 6', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink6',
        'label'       => __('Social Icon Link 6', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialicon7',
        'label'       => __('Social Icon 7', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink7',
        'label'       => __('Social Icon Link 7', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
	  array(
        'id'          => 'vn_socialicon8',
        'label'       => __('Social Icon 8', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink8',
        'label'       => __('Social Icon Link 8', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
      array(
        'id'          => 'vn_socialicon9',
        'label'       => __('Social Icon 9', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink9',
        'label'       => __('Social Icon Link 9', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vn_socialicon10',
        'label'       => __('Social Icon 10', 'genesis'),
        'desc'        => __('Enter a letter (based on the list from the documentation) to represent your social icon.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),	  
      array(
        'id'          => 'vn_socialiconlink10',
        'label'       => __('Social Icon Link 10', 'genesis'),
        'desc'        => __('Enter a URL for the social icon letter above.', 'genesis'),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_setup',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ), 
    )
  );
   
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}