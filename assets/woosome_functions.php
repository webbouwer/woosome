<?php

/*** woocommerce ***/

// add js libs
function wp_main_theme_woosome_shop_js() {
    // add jquery
    wp_enqueue_script("jquery"); // default wp jquery
    if(is_product_category()){
		  wp_enqueue_script( 'woosome-swiper-js', 'https://unpkg.com/swiper@7.2.0/swiper-bundle.min.js', [], null, true );
		  wp_enqueue_script( 'woosome-swiper-functions', get_template_directory_uri() . '/js/woosome_swiper.js', [], null, true );
		  //wp_enqueue_script( 'woosome-lightbox-functions', get_template_directory_uri() . '/js/woosome_lightbox.js', [], null, true ); 
    }
    //wp_register_script( 'woosome_shop_js', 'https://unpkg.com/swiper@7.2.0/swiper-bundle.min.js', 99, '7.2.0', false); // register swiperjs
    //wp_enqueue_script( 'woosome_shop_js');
}
add_action('wp_enqueue_scripts', 'wp_main_theme_woosome_shop_js');

// register style sheet swiperjs
function wp_main_swiperjs_stylesheet(){
  if(is_product_category()){
    $stylesheet = 'https://unpkg.com/swiper@7.2.0/swiper-bundle.min.css';
    echo '<link rel="stylesheet" id="swiperjs-style"  href="'.$stylesheet.'" type="text/css" media="all" />';
  }
}
add_action( 'wp_head', 'wp_main_swiperjs_stylesheet', 9999 );



// https://woocommerce.com/document/woocommerce_breadcrumb/
function woo_breadcrumbs_display(){
	$args = array(
			'delimiter' => '/',
			//'before' => '<span class="breadcrumb-title">' . __( 'This is where you are:', 'woosome' ) . '</span>'
	);
	woocommerce_breadcrumb( $args );
}
