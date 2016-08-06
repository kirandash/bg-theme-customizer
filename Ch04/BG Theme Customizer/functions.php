<?php

function kd_theme_customizer_live_previw(){
	wp_enqueue_script('kdtheme-customize-preview',get_template_directory_uri().'/js/theme-customizer.js', array('jquery','customize-preview'), '1.0.0' , true);
}

add_action('customize_preview_init','kd_theme_customizer_live_previw');

function kd_theme_customizer_css() {
	
	// This will add css css to the head section of page
	?>
    <style type="text/css">
		<?php if('' != get_theme_mod('kdtheme_paragraph_color')): ?>
		p {
			color: <?php echo get_theme_mod('kdtheme_paragraph_color'); ?>;
		}
		<?php endif; ?>
		<?php if('' != get_theme_mod('kdtheme_header_color')): ?>
		h1, h2, h3, h4, h5, h6 {
			color: <?php echo get_theme_mod('kdtheme_header_color'); ?>;
		}
		<?php endif; ?>	
		<?php if('' != get_theme_mod('kdtheme_background_image')): ?>
		h1 { font-size: <?php echo get_theme_mod('kdtheme_heading_font_size'); ?>; }
		<?php endif; ?>
		<?php if('' != get_theme_mod('kdtheme_background_image')): ?>
		body { background: url(<?php echo get_theme_mod('kdtheme_background_image'); ?>) repeat; }
		<?php endif; ?>			
	</style>
    <?php
}

add_action('wp_head','kd_theme_customizer_css');

function kd_theme_customizer( $kd_customize ) {
	
	// All our sections, settings and controls will be added here
	
	// Adds a new section to our customizer screen
	$kd_customize->add_section(
		'kdtheme_text_options',
		array(
			'title' => 'Text Options',
			'priority' => 300
		)
	);
	
	$kd_customize->add_setting(
		'kdtheme_paragraph_color',
		array(
			'default' => '#f00',
			'transport' => 'refresh'
		)
	);
	
	$kd_customize->add_control(
		'kdtheme_paragraph_color',
		array(
			'section' => 'kdtheme_text_options',
			'label' => 'Paragraph Color',
			'type' => 'text'
		)
	);
	
	$kd_customize->add_setting(
		'kdtheme_header_color',
		array(
			'default' => '#333',
			'transport' => 'postMessage'
		)
	);
	
	$kd_customize->add_control(
		new WP_Customize_Color_Control(
			$kd_customize,
			'kdtheme_header_color',
			array(
				'section' => 'kdtheme_text_options',
				'settings' => 'kdtheme_header_color',
				'label' => 'Header Color'
			)
		)
	);

	$kd_customize->add_setting(
		'kdtheme_heading_font_size',
		array(
			'default' => '42px',
			'transport' => 'postMessage'
		)
	);
	
	$kd_customize->add_control(
		'kdtheme_heading_font_size',
		array(
			'section' => 'kdtheme_text_options',
			'setting' => 'kdtheme_heading_font_size',
			'type' => 'select',
			'choices' => array(
				'42px' => '42',
				'38px' => '38',
				'36px' => '36',
				'34px' => '34',
				'32px' => '32',
			),
			'label' => 'H1 font size'
		)
	);
		
	$kd_customize->add_section(
		'kdtheme_extra_features',
		array(
			'title' => 'Extra Features',
			'priority' => 301
		)
	);
	
	$kd_customize->add_setting(
		'kdtheme_background_image',
		array(
			'default' => '',
			'transport' => 'postMessage'
		)
	);
	
	$kd_customize->add_control(
		new WP_Customize_Image_Control(
			$kd_customize,
			'kdtheme_background_image',
			array(
				'section' => 'kdtheme_extra_features',
				'label' => 'Background Image',
				'settings' => 'kdtheme_background_image'
			)
		)
	);
			
}

// The 'customize_register' action hook is used to customize and manipulate the Theme Customization admin screen
add_action('customize_register', 'kd_theme_customizer');

function kd_load_script(){
	wp_enqueue_style('main_css',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'kd_load_script');

?>