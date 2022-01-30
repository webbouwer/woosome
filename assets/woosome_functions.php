<?php

/*** woocommerce ***/



/* photoswipe custom
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-slider' );

add_action( 'wp_enqueue_scripts', 'gallery_scripts', 20 );

function gallery_scripts() {
    if ( is_archive() ) {
        if ( current_theme_supports( 'wc-product-gallery-zoom' ) ) {
            wp_enqueue_script( 'zoom' );
        }
        if ( current_theme_supports( 'wc-product-gallery-slider' ) ) {
            wp_enqueue_script( 'flexslider' );
        }
        if ( current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
            wp_enqueue_script( 'photoswipe-ui-default' );
            wp_enqueue_style( 'photoswipe-default-skin' );
            add_action( 'wp_footer', 'woocommerce_photoswipe' );
        }
        wp_enqueue_script( 'wc-single-product' );
    }

}
*/


function pswp_box_html() {
echo '<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true"><div class="pswp__bg"></div><div class="pswp__scroll-wrap"><div class="pswp__container"><div class="pswp__item"></div><div class="pswp__item"></div><div class="pswp__item"></div></div><div class="pswp__ui pswp__ui--hidden"><div class="pswp__top-bar"><div class="pswp__counter"></div><button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button><button class="pswp__button pswp__button--share" aria-label="Share"></button><button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button><button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button><div class="pswp__preloader"><div class="pswp__preloader__icn"><div class="pswp__preloader__cut"><div class="pswp__preloader__donut"></div></div></div></div></div><div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"><div class="pswp__share-tooltip"></div></div><button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button><div class="pswp__caption"><div class="pswp__caption__center"></div></div></div></div></div>';
}
add_action( 'woocommerce_after_shop_loop', 'pswp_box_html' );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_photoswipe' ); // woocommerce_after_shop_loop


// add js libs
function wp_main_theme_woosome_shop_js() {
    // add jquery
    wp_enqueue_script("jquery"); // default wp jquery
    if(is_product_category()){
		  wp_enqueue_script( 'woosome-swiper-js', 'https://unpkg.com/swiper@7.2.0/swiper-bundle.min.js', [], null, true );
		  wp_enqueue_script( 'woosome-swiper-functions', get_template_directory_uri() . '/js/woosome_swiper.js', [], null, true );
		  //wp_enqueue_script( 'woosome-lightbox-functions', get_template_directory_uri() . '/js/woosome_lightbox.js', 99, null, true );
      wp_enqueue_script( 'photoswipe-ui-default' );
      wp_enqueue_style( 'photoswipe-default-skin' );
    }
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
