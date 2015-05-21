<?php

function post_type_htsgallerys() {
	$labels = array(
    	'name' => _x('Gallerys', 'post type general name', THEMEDOMAIN),
    	'singular_name' => _x('gallery', 'post type singular name', THEMEDOMAIN),
    	'add_new' => _x('Add New gallery', 'book', THEMEDOMAIN),
    	'add_new_item' => __('Add New gallery', THEMEDOMAIN),
    	'edit_item' => __('Edit gallery', THEMEDOMAIN),
    	'new_item' => __('New gallery', THEMEDOMAIN),
    	'view_item' => __('View gallery', THEMEDOMAIN),
    	'search_items' => __('Search gallerys', THEMEDOMAIN),
    	'not_found' =>  __('No gallery found', THEMEDOMAIN),
    	'not_found_in_trash' => __('No gallery found in Trash', THEMEDOMAIN), 
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
    	'supports' => array('title', 'thumbnail'),
		//'taxonomies' => array('post_tag'),
	); 		

	register_post_type( 'htsgallerys', $args );	  
} 
								  
add_action('init', 'post_type_htsgallerys');

?>