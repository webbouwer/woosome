<?php

function ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', false, null, false);
  wp_enqueue_script('afp_script');

  wp_localize_script( 'afp_script', 'afp_vars', array(
    'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
    'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
  )
  );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);

// Get posts
function ajax_get_post() {

  	// Verify nonce
  	if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    	die('Permission denied');

	if( isset( $_POST['postid'] ) ){
		$data = array(
  		'post' =>  get_post( $_POST['postid'] ),
  		'thumb' => wp_get_attachment_image_src( get_post_thumbnail_id( $_POST['postid'] ), 'post') ,
      'meta' => get_post_meta( $_POST['postid'] ),
  		'custom' => get_post_custom_keys( $_POST['postid'] )
		);
		echo json_encode( $data );
	}
    	exit();

}
add_action('wp_ajax_filter_posts', 'ajax_get_post');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_get_post');
