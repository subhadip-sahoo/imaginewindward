<?php

function post_type_htsvideos() {
	$labels = array(
    	'name' => _x('Videos', 'post type general name', THEMEDOMAIN),
    	'singular_name' => _x('video', 'post type singular name', THEMEDOMAIN),
    	'add_new' => _x('Add New video', 'book', THEMEDOMAIN),
    	'add_new_item' => __('Add New video', THEMEDOMAIN),
    	'edit_item' => __('Edit video', THEMEDOMAIN),
    	'new_item' => __('New video', THEMEDOMAIN),
    	'view_item' => __('View video', THEMEDOMAIN),
    	'search_items' => __('Search videos', THEMEDOMAIN),
    	'not_found' =>  __('No video found', THEMEDOMAIN),
    	'not_found_in_trash' => __('No video found in Trash', THEMEDOMAIN), 
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
    	'supports' => array('title', 'excerpt'),
		//'taxonomies' => array('post_tag'),
	); 		

	register_post_type( 'htsvideos', $args );	  
} 
								  
add_action('init', 'post_type_htsvideos');

?>