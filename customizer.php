<?php
/**
 * Theme main customizer functions
 */

function wp_main_theme_register_theme_customizer( $wp_customize ) {

	$wp_customize->remove_control('display_header_text');
	//$wp_customize->remove_section('title_tagline'); // remove default title / site-identity
	$wp_customize->remove_control('header_textcolor'); // remove default colors
	$wp_customize->remove_control('background_color'); // remove default colors
	$wp_customize->remove_panel('colors'); // remove default colors


	// add panels
     	$wp_customize->add_panel('wp_main_theme_elements_identity', array(
         	'title'    => __('Identity', 'woosome'),
         	'priority' => 10,
     	));

			$wp_customize->add_panel('wp_main_theme_elements_woocommerce', array(
					'title'    => __('Woocommerce', 'woosome'),
					'priority' => 10,
			));

			// move sections
				    $wp_customize->add_section('title_tagline', array(
			        	'title'    => __('Title, Tagline & Icon image', 'woosome'),
			        	'panel'  => 'wp_main_theme_elements_identity',
					'priority' => 20,
			    	));

						// add sections
						$wp_customize->add_section('wp_main_theme_identity_panel_seo', array(
						        	'title'    => __('SEO', 'woosome'),
						        	'panel'  => 'wp_main_theme_elements_identity',
									'priority' => 40,
						  ));


							$wp_customize->add_section('wp_main_theme_identity_panel_api', array(
							        	'title'    => __('API', 'woosome'),
							        	'panel'  => 'wp_main_theme_elements_woocommerce',
										'priority' => 40,
							  ));


    $wp_customize->add_setting( 'wp_main_theme_identity_logo', array(
		'sanitize_callback' => 'wp_main_theme_sanitize_default',
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wp_main_theme_identity_logo', array(
        'label'    => __( 'Site Logo Image', 'resource' ),
        'section'  => 'title_tagline',
        'settings' => 'wp_main_theme_identity_logo',
        'description' => __( 'Upload or select a medium sized image to use as site logo (replacing the site-title text on top).', 'resource' ),
        'priority' => 10,
    )));

		$wp_customize->add_setting( 'wp_main_theme_identity_trackcode' , array(
		'default' => '',
		'sanitize_callback' => 'wp_main_theme_sanitize_default',
    	));

    	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_main_theme_identity_trackcode', array(
            	'label'          => __( 'Analytics Code', 'woosome' ),
            	'section'        => 'wp_main_theme_identity_panel_seo',
            	'settings'       => 'wp_main_theme_identity_trackcode',
            	'type'           => 'textarea',
 	    		'description'    => __( 'Analytics Javascript Codes (ie. google js tracking). The code is place right after the body open tag.', 'woosome' ),
    	)));


			$wp_customize->add_setting( 'wp_main_theme_identity_api_wc_key' , array(
			'default' => '',
			'sanitize_callback' => 'wp_main_theme_sanitize_default',
				));

				$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_main_theme_identity_api_wc_key', array(
								'label'          => __( 'WC Consumer Key', 'woosome' ),
								'section'        => 'wp_main_theme_identity_panel_api',
								'settings'       => 'wp_main_theme_identity_api_wc_key',
								'type'           => 'text',
						'description'    => __( 'Place WC api consumer key token here', 'woosome' ),
				)));

				$wp_customize->add_setting( 'wp_main_theme_identity_api_wc_secret' , array(
				'default' => '',
				'sanitize_callback' => 'wp_main_theme_sanitize_default',
					));

					$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'wp_main_theme_identity_api_wc_secret', array(
									'label'          => __( 'WC Consumer Secret', 'woosome' ),
									'section'        => 'wp_main_theme_identity_panel_api',
									'settings'       => 'wp_main_theme_identity_api_wc_secret',
									'type'           => 'text',
							'description'    => __( 'Place WC api consumer secret token here', 'woosome' ),
					)));

}
add_action( 'customize_register', 'wp_main_theme_register_theme_customizer' );

// default sanitize functions
function wp_main_theme_sanitize_default($obj){
    	return $obj; //.. global sanitizer
}
function wp_main_theme_sanitize_array( $values ) {
    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
?>
