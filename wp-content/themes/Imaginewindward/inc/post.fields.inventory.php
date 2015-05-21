<?php

function post_type_inventory() {
	$labels = array(
    	'name' => _x('Available Inventory', 'post type general name', THEMEDOMAIN),
    	'singular_name' => _x('Available Inventory', 'post type singular name', THEMEDOMAIN),
    	'add_new' => _x('Add New Inventory', 'product', THEMEDOMAIN),
    	'add_new_item' => __('Add New Inventory', THEMEDOMAIN),
    	'edit_item' => __('Edit Inventory', THEMEDOMAIN),
    	'new_item' => __('New Inventory', THEMEDOMAIN),
    	'view_item' => __('View Inventory', THEMEDOMAIN),
    	'search_items' => __('Search Inventories', THEMEDOMAIN),
    	'not_found' =>  __('No Inventories found', THEMEDOMAIN),
    	'not_found_in_trash' => __('No Inventorys found in Trash', THEMEDOMAIN), 
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
	); 		

	register_post_type( 'inventory', $args );
		  
} 
								  
add_action('init', 'post_type_inventory');

?>