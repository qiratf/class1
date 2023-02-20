<?php
/**
 * Herbal Ayurveda Theme Customizer
 *
 * @package Herbal Ayurveda
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function herbal_ayurveda_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'herbal_ayurveda_custom_controls' );

function herbal_ayurveda_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'herbal_ayurveda_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'herbal_ayurveda_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'herbal_ayurveda_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'herbal-ayurveda' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'herbal_ayurveda_left_right', array(
    	'title' => esc_html__('General Settings', 'herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_panel_id'
	) );

	$wp_customize->add_setting('herbal_ayurveda_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','herbal-ayurveda'),
        'description' => esc_html__('Here you can change the width layout of Website.','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('herbal_ayurveda_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','herbal-ayurveda'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','herbal-ayurveda'),
            'Right Sidebar' => esc_html__('Right Sidebar','herbal-ayurveda'),
            'One Column' => esc_html__('One Column','herbal-ayurveda'),
            'Grid Layout' => esc_html__('Grid Layout','herbal-ayurveda')
        ),
	) );

	$wp_customize->add_setting('herbal_ayurveda_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','herbal-ayurveda'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','herbal-ayurveda'),
            'Right_Sidebar' => esc_html__('Right Sidebar','herbal-ayurveda'),
            'One_Column' => esc_html__('One Column','herbal-ayurveda')
        ),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'herbal_ayurveda_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'herbal_ayurveda_customize_partial_herbal_ayurveda_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'herbal_ayurveda_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_left_right'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'herbal_ayurveda_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'herbal_ayurveda_customize_partial_herbal_ayurveda_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'herbal_ayurveda_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'herbal_ayurveda_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','herbal-ayurveda' ),
        'section' => 'herbal_ayurveda_left_right'
    )));

	$wp_customize->add_setting('herbal_ayurveda_preloader_bg_color', array(
		'default'           => '#5b8c51',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_left_right',
	)));

	$wp_customize->add_setting('herbal_ayurveda_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'herbal_ayurveda_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'herbal-ayurveda'),
		'section'  => 'herbal_ayurveda_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'herbal_ayurveda_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_panel_id'
	) );

    $wp_customize->add_setting('herbal_ayurveda_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('herbal_ayurveda_email_address',array(
		'label'	=> __('Add Email Address','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( 'support@example.com', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_topbar_section',
		'type'=> 'text'
	));

    $wp_customize->add_setting('herbal_ayurveda_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'herbal_ayurveda_sanitize_phone_number'
	));	
	$wp_customize->add_control('herbal_ayurveda_phone_number',array(
		'label'	=> __('Add Phone number','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_topbar_section',
		'type'=> 'text'
	));

	//Slider
	$wp_customize->add_section( 'herbal_ayurveda_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_panel_id'
	) );

	$wp_customize->add_setting( 'herbal_ayurveda_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));  
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','herbal-ayurveda' ),
      'section' => 'herbal_ayurveda_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('herbal_ayurveda_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'herbal_ayurveda_customize_partial_herbal_ayurveda_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'herbal_ayurveda_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'herbal_ayurveda_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'herbal_ayurveda_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'herbal-ayurveda' ),
			'description' => __('Slider image size (1400 x 550)','herbal-ayurveda'),
			'section'  => 'herbal_ayurveda_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'herbal_ayurveda_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','herbal-ayurveda'),
		'section' => 'herbal_ayurveda_slidersettings',
		'type'  => 'text',
	) );

	//Slider height
	$wp_customize->add_setting('herbal_ayurveda_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_slider_height',array(
		'label'	=> __('Slider Height','herbal-ayurveda'),
		'description'	=> __('Specify the slider height (px).','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_slidersettings',
		'type'=> 'text'
	));

	//About Us Section
	$wp_customize->add_section('herbal_ayurveda_about_us_section',array(
		'title'	=> __('About Us Section','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_panel_id',
	));

	$wp_customize->add_setting('herbal_ayurveda_about_us_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'herbal_ayurveda_about_us_background_image',array(
        'label' => __('About Background Image','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_about_us_section'
	)));

	$wp_customize->add_setting( 'herbal_ayurveda_compaign_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'herbal_ayurveda_compaign_small_title', array(
		'label'    => __( 'Add Section Small Title', 'herbal-ayurveda' ),
		'input_attrs' => array(
            'placeholder' => __( 'ABOUT AYURVEDA', 'herbal-ayurveda' ),
        ),
		'section'  => 'herbal_ayurveda_about_us_section',
		'type'     => 'text'
	) );

	$args =  array('numberposts' => -1);
		$post_list = get_posts($args);
		$i = 0;
		$psts[]='Select';  
		foreach($post_list as $post){
			$psts[$post->post_title] = $post->post_title;
		}

	$wp_customize->add_setting('herbal_ayurveda_about_post',array(
		'default'	=> 'select',
		'sanitize_callback' => 'herbal_ayurveda_sanitize_choices',
	));
	$wp_customize->add_control('herbal_ayurveda_about_post',array(
		'type'    => 'select',
		'choices' => $psts,
		'label' => __('Select About Post','herbal-ayurveda'),
		'section' => 'herbal_ayurveda_about_us_section',
	));

	$wp_customize->add_setting('herbal_ayurveda_about_features_head',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)); 
	$wp_customize->add_control('herbal_ayurveda_about_features_head',array(
		'label'	=> esc_html__('Add Features','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '100% Orgaic and Toxic Free', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_about_us_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_about_features_head_two',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	)); 
	$wp_customize->add_control('herbal_ayurveda_about_features_head_two',array(
		'label'	=> esc_html__('Add Features','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Always Fresh & Hygienic Products', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_about_us_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( 'herbal_ayurveda_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'herbal_ayurveda_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'herbal_ayurveda_Customize_partial_herbal_ayurveda_toggle_postdate', 
	));

	$wp_customize->add_setting( 'herbal_ayurveda_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','herbal-ayurveda' ),
        'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_author',array(
		'label' => esc_html__( 'Author','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_comments',array(
		'label' => esc_html__( 'Comments','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_time',array(
		'label' => esc_html__( 'Time','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
	));
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_toggle_tags', array(
		'label' => esc_html__( 'Tags','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_post_settings'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'herbal_ayurveda_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'herbal_ayurveda_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','herbal-ayurveda' ),
		'section'     => 'herbal_ayurveda_post_settings',
		'type'        => 'range',
		'settings'    => 'herbal_ayurveda_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('herbal_ayurveda_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','herbal-ayurveda'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','herbal-ayurveda'),
		'section'=> 'herbal_ayurveda_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('herbal_ayurveda_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control('herbal_ayurveda_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','herbal-ayurveda'),
            'Excerpt' => esc_html__('Excerpt','herbal-ayurveda'),
            'No Content' => esc_html__('No Content','herbal-ayurveda')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'herbal_ayurveda_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'herbal_ayurveda_Customize_partial_herbal_ayurveda_button_text', 
	));

    $wp_customize->add_setting('herbal_ayurveda_button_text',array(
		'default'=> esc_html__('Read More','herbal-ayurveda'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_button_text',array(
		'label'	=> esc_html__('Add Button Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'herbal_ayurveda_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'herbal-ayurveda' ),
		'panel' => 'herbal_ayurveda_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'herbal_ayurveda_Customize_partial_herbal_ayurveda_related_post_title', 
	));

    $wp_customize->add_setting( 'herbal_ayurveda_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ) );
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_related_post',array(
		'label' => esc_html__( 'Related Post','herbal-ayurveda' ),
		'section' => 'herbal_ayurveda_related_posts_settings'
    )));

    $wp_customize->add_setting('herbal_ayurveda_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('herbal_ayurveda_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('herbal_ayurveda_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'herbal_ayurveda_sanitize_number_absint'
	));
	$wp_customize->add_control('herbal_ayurveda_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_related_posts_settings',
		'type'=> 'number'
	));

	//Responsive Media Settings
	$wp_customize->add_section('herbal_ayurveda_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_panel_id',
	));

    $wp_customize->add_setting( 'herbal_ayurveda_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));  
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_responsive_media'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));  
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_responsive_media'
    )));

    $wp_customize->add_setting( 'herbal_ayurveda_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));  
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('herbal_ayurveda_footer',array(
		'title'	=> esc_html__('Footer Settings','herbal-ayurveda'),
		'panel' => 'herbal_ayurveda_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'herbal_ayurveda_Customize_partial_herbal_ayurveda_footer_text', 
	));
	
	$wp_customize->add_setting('herbal_ayurveda_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('herbal_ayurveda_footer_text',array(
		'label'	=> esc_html__('Copyright Text','herbal-ayurveda'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'herbal-ayurveda' ),
        ),
		'section'=> 'herbal_ayurveda_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('herbal_ayurveda_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_footer',
        'settings' => 'herbal_ayurveda_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'herbal_ayurveda_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'herbal_ayurveda_switch_sanitization'
    ));  
    $wp_customize->add_control( new Herbal_Ayurveda_Toggle_Switch_Custom_Control( $wp_customize, 'herbal_ayurveda_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','herbal-ayurveda' ),
      	'section' => 'herbal_ayurveda_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('herbal_ayurveda_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'herbal_ayurveda_Customize_partial_herbal_ayurveda_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('herbal_ayurveda_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'herbal_ayurveda_sanitize_choices'
	));
	$wp_customize->add_control(new Herbal_Ayurveda_Image_Radio_Control($wp_customize, 'herbal_ayurveda_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','herbal-ayurveda'),
        'section' => 'herbal_ayurveda_footer',
        'settings' => 'herbal_ayurveda_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'herbal_ayurveda_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class herbal_ayurveda_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Herbal_Ayurveda_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Herbal_Ayurveda_Customize_Section_Pro( $manager,'herbal_ayurveda_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'AYURVEDA PRO', 'herbal-ayurveda' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'herbal-ayurveda' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/herbal-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'herbal-ayurveda-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'herbal-ayurveda-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
herbal_ayurveda_Customize::get_instance();