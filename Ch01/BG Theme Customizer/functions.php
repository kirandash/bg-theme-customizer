<?php

function kd_theme_customizer_css() {
	
	// This will add css css to the head section of page
	?>
    <style type="text/css">
		<?php if('' != get_theme_mod('kdtheme_paragraph_color')): ?>
		p {
			color: <?php echo get_theme_mod('kdtheme_paragraph_color'); ?>;
		}
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
			
}

// The 'customize_register' action hook is used to customize and manipulate the Theme Customization admin screen
add_action('customize_register', 'kd_theme_customizer');

function kd_load_script(){
	wp_enqueue_style('main_css',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'kd_load_script');

?>