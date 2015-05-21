<?php

function post_type_products() {
	$labels = array(
    	'name' => _x('Products', 'post type general name', THEMEDOMAIN),
    	'singular_name' => _x('Product', 'post type singular name', THEMEDOMAIN),
    	'add_new' => _x('Add New Product', 'product', THEMEDOMAIN),
    	'add_new_item' => __('Add New Product', THEMEDOMAIN),
    	'edit_item' => __('Edit Product', THEMEDOMAIN),
    	'new_item' => __('New Product', THEMEDOMAIN),
    	'view_item' => __('View Product', THEMEDOMAIN),
    	'search_items' => __('Search Products', THEMEDOMAIN),
    	'not_found' =>  __('No Products found', THEMEDOMAIN),
    	'not_found_in_trash' => __('No Products found in Trash', THEMEDOMAIN), 
    	'parent_item_colon' => ''
	);		
	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title','editor', 'thumbnail', 'excerpt', 'custom-fields'),
    	//'menu_icon' => get_template_directory_uri().'/images/sign.png'
	); 		

	register_post_type( 'product', $args );
		  
} 
								  
add_action('init', 'post_type_products');

?>