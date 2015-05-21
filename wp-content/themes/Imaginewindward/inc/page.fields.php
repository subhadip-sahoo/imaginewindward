<?php

/**
 * The PHP code for setup Theme page custom fields.
 *
 * @package WordPress
 * @subpackage Pai
 */


/*
	Begin creating custom fields
*/


$page_postmetas = 
	array (
		/*
			Begin Page custom fields
		*/
		array("section" => "Youtube Video Link", "id" => "yvl", "title" => "Youtube Video Link", "description" => "Youtube Video Link for the Home Page (If you select \"Front\" page template)"),
		
		//array("section" => "Contact Form ID/Shortcode", "id" => "contact_form", "title" => "Contact Form", "description" => "Enter your Contact Form ID for the Contact Form (If you select \"Contact\" page template)")
		
		/*
			End Page custom fields
		*/
	);

?>
<?php

function page_create_meta_box() {

	global $page_postmetas;
	if ( function_exists('add_meta_box') && isset($page_postmetas) && count($page_postmetas) > 0 ) {  
		add_meta_box( 'page_metabox', 'Page Options', 'page_new_meta_box', 'page', 'normal', 'high' );  
	}

}  

function page_new_meta_box() {
	global $post, $page_postmetas;

	echo '<input type="hidden" name="myplugin_noncename" id="myplugin_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<br/>';
	
	$meta_section = '';

	foreach ( $page_postmetas as $postmeta ) {

		$meta_id = $postmeta['id'];
		$meta_title = $postmeta['title'];
		$meta_description = $postmeta['description'];
		$meta_section = $postmeta['section'];
		
		$meta_type = '';
		if(isset($postmeta['type']))
		{
			$meta_type = $postmeta['type'];
		}
		
		echo "<strong>".$meta_title."</strong><hr class='pp_widget_hr'/>";

		echo "<div class='pp_widget_description'>$meta_description</div>";

		if ($meta_type == 'checkbox') {
			$checked = get_post_meta($post->ID, $meta_id, true) == '1' ? "checked" : "";
			echo "<input type='checkbox' name='$meta_id' id='$meta_id' value='1' $checked /></p>";
		}
		else if ($meta_type == 'select') {
			echo "<p><select name='$meta_id' id='$meta_id'>";
			
			if(!empty($postmeta['items']))
			{
				foreach ($postmeta['items'] as $key => $item)
				{
					$page_style = get_post_meta($post->ID, $meta_id);
				
					if(isset($page_style[0]) && $key == $page_style[0])
					{
						$css_string = 'selected';
					}
					else
					{
						$css_string = '';
					}
				
					echo '<option value="'.$key.'" '.$css_string.'>'.$item.'</option>';
				}
			}
			
			echo "</select></p>";
		}
		else if ($meta_type == 'file') { 
		    echo "<p><input type='text' name='$meta_id' id='$meta_id' class='code' value='".get_post_meta($post->ID, $meta_id, true)."' style='width:89%' /><input id='".$meta_id."_button' name='".$meta_id."_button' type='button' value='Upload' class='metabox_upload_btn button' readonly='readonly' rel='".$meta_id."' style='margin:7px 0 0 5px' /></p>";
		}
		else {
			echo "<p><input type='text' name='$meta_id' id='$meta_id' class='code' value='".get_post_meta($post->ID, $meta_id, true)."' style='width:99%' /></p>";
		}
		
		echo '<br/>';
	}
	
	echo '<br/>';

}

function page_save_postdata( $post_id ) {

	global $page_postmetas;

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	if ( isset($_POST['myplugin_noncename']) && !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) )) {
		return $post_id;
	}

	// verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything

	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

	// Check permissions

	if ( isset($_POST['post_type']) && 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
			return $post_id;
		} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
	}

	// OK, we're authenticated

	if ( $parent_id = wp_is_post_revision($post_id) )
	{
		$post_id = $parent_id;
	}

	foreach ( $page_postmetas as $postmeta ) {
	
		if (isset($_POST[$postmeta['id']]) && $_POST[$postmeta['id']]) {
			page_update_custom_meta($post_id, $_POST[$postmeta['id']], $postmeta['id']);
		}

		if (isset($_POST[$postmeta['id']]) && $_POST[$postmeta['id']] == "") {
			delete_post_meta($post_id, $postmeta['id']);
		}
	}

}

function page_update_custom_meta($postID, $newvalue, $field_name) {

	if (!get_post_meta($postID, $field_name)) {
		add_post_meta($postID, $field_name, $newvalue);
	} else {
		update_post_meta($postID, $field_name, $newvalue);
	}

}

//init

add_action('admin_menu', 'page_create_meta_box'); 
add_action('save_post', 'page_save_postdata');  

/*
	End creating custom fields
*/

?>
