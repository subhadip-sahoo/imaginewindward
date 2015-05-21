<?php

function post_type_testimonials() {
	$labels = array(
    	'name' => _x('Testimonials', 'post type general name', THEMEDOMAIN),
    	'singular_name' => _x('Testimonial', 'post type singular name', THEMEDOMAIN),
    	'add_new' => _x('Add New Testimonial', 'book', THEMEDOMAIN),
    	'add_new_item' => __('Add New Testimonial', THEMEDOMAIN),
    	'edit_item' => __('Edit Testimonial', THEMEDOMAIN),
    	'new_item' => __('New Testimonial', THEMEDOMAIN),
    	'view_item' => __('View Testimonial', THEMEDOMAIN),
    	'search_items' => __('Search testimonials', THEMEDOMAIN),
    	'not_found' =>  __('No Testimonial found', THEMEDOMAIN),
    	'not_found_in_trash' => __('No Testimonial found in Trash', THEMEDOMAIN), 
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
    	'supports' => array('title', 'editor'),
		//'taxonomies' => array('post_tag'),
	); 		

	register_post_type( 'testimonials', $args );	  
} 
								  
add_action('init', 'post_type_testimonials');

?>