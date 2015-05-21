<?php
/**
 * Template Name: Process Page Template
 *
 * Description: Imagine windward loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Imagine_windward
 * @since Imagine windward 1.0
 */

get_header(); ?>

	<!-- CONTENT SECTION -->
<div id="content_section">
  <div class="section04">
    <section class="clearfix">
      <h1><?php the_title(); ?></h1>
      <h3>Choose the option below that best suits your needs.</h3>
      <div id="process_banner" class="clearfix">
        <div class="left">
          <ul>
		  <?php 
		  $args = array(
				'sort_order' => 'ASC',
				'sort_column' => 'post_title',
				'hierarchical' => 1,
				'exclude' => $instance['title'],
				'include' => '',
				'meta_key' => '',
				'meta_value' => '',
				'authors' => '',
				'child_of' => get_the_ID(),
				'parent' => get_the_ID(),
				'exclude_tree' => '',
				'number' => '',
				'offset' => 0,
				'post_type' => 'page',
				'post_status' => 'publish'
				); 
				$pages = get_pages($args); 
				$i = 1;
					//echo "<pre>";
					//print_r($pages);
					//echo "</pre>";
					foreach($pages as $page) {
			?>
            <li><a href="#<?php echo $page->ID; ?>" rel="" id="anchor<?php echo $i; ?>" class="anchorLink"><?php echo $page->post_title; ?></a></li>
			<?php
			$i++;
				}
			?>
          </ul>
        </div>
		<?php $image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>
        <div class="right"><img src="<?php echo $image; ?>" alt=""></div>
      </div>
	  
	  <?php 
		  $args = array(
				'sort_order' => 'ASC',
				'sort_column' => 'post_title',
				'hierarchical' => 1,
				'exclude' => $instance['title'],
				'include' => '',
				'meta_key' => '',
				'meta_value' => '',
				'authors' => '',
				'child_of' => get_the_ID(),
				'parent' => get_the_ID(),
				'exclude_tree' => '',
				'number' => '',
				'offset' => 0,
				'post_type' => 'page',
				'post_status' => 'publish'
				); 
				$pages = get_pages($args); 
				$i = 1;
					foreach($pages as $page) {
			?>
      <div class="plan_box clearfix"> 
	  <a name="<?php echo $page->ID; ?>" id="<?php echo $page->ID; ?>"></a>
        <h2 class="heading"><?php echo $page->post_title; ?></h2>
        <div class="left_section">
          <?php echo apply_filters("the_content", $page->post_content); ?>
        </div>
		<?php $image = wp_get_attachment_url( get_post_thumbnail_id($page->ID)); ?>
        <div class="right_section"><img src="<?php echo $image; ?>" alt=""></div>
      </div>
		<?php
			$i++;
				}
			?>
    </section>
  </div>
</div>
<!-- /CONTENT SECTION --> 

<?php get_footer(); ?>