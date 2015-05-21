<?php
/**
* @RM 2014
* The PHP code for setup Theme widget Contact info.
* Begin creating widget Contact info
* Contact Us
*/
class rm_contactinfo_widget extends WP_Widget {
	function rm_contactinfo_widget() {
		$widget_ops = array('classname' => 'widget_rm_contactinfo', 'description' => 'Sidebar contact info widget' );
		$this->WP_Widget('', 'BBP Contact Info', $widget_ops);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;		
		
		if ($instance['title'] == ''){
			$instance['title'] = 'Contact Info';
		}
		
		if ($instance['contactinfo_email'] != ''){
				echo '<li>'.$instance['contactinfo_email'].'</li>';
		}
		echo '<li><span>-</span></li>';
		
		if ($instance['contactinfo_phone'] != ''){
			echo '<li>'. $instance['contactinfo_phone'].'</li>';
		}
		echo '<li><span>-</span></li>';

		echo $after_widget;
	}
	

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['contactinfo_phone'] = strip_tags($new_instance['contactinfo_phone']);
		$instance['contactinfo_email'] = strip_tags($new_instance['contactinfo_email']);
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'contactinfo_phone' => '', 'contactinfo_email' => '') );
		$title = strip_tags($instance['title']);
		$contactinfo_phone = strip_tags($instance['contactinfo_phone']);		
		$contactinfo_email = strip_tags($instance['contactinfo_email']);	
		$contactinfo_email_link = strip_tags($instance['contactinfo_email_link']);	

		//echo '<p><label for="'. $this->get_field_id('title').'">Title: <input class="widefat" id="'. $this->get_field_id('title').'" name="'. $this->get_field_name('title').'" type="text" value="'. attribute_escape($title).'" /></label></p>';
		echo '<p><label for="'. $this->get_field_id('contactinfo_phone').'">Phone: <input class="widefat" id="'.$this->get_field_id('contactinfo_phone').'" name="'. $this->get_field_name('contactinfo_phone').'" type="text" value="'. attribute_escape($contactinfo_phone).'" /></label></p>';			
		echo '<p><label for="'. $this->get_field_id('contactinfo_email').'">Address: <input class="widefat" id="'.$this->get_field_id('contactinfo_email').'" name="'. $this->get_field_name('contactinfo_email').'" type="text" value="'. attribute_escape($contactinfo_email).'" /></label></p>';			
		
	}
}	

register_widget('rm_contactinfo_widget');
?>