<?php
/**
 * Template Name: Gallery Page Template
 *
 * Description: Harmony Tree loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Harmony_Tree
 * @since Harmony Tree 1.0
 */

get_header(); ?>

<!-- CONTENT SECTION -->
<div id="content_section">
  <div class="section04">
    <section class="clearfix">
      <h1><?php the_title(); ?></h1>
      <p>&nbsp;</p>
      <ul id="gallery">
		<div class="gallery">
	<?php $arg = array('post_type' => 'htsgallerys', 'post_status' => 'publish', 'order_by' => 'menu_order', 'order' => 'ASC'); $gallerys = get_posts($arg); //echo "<pre>"; print_r($gallerys); ?>
				<?php foreach ($gallerys as $gallery) { $small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($gallery->ID), 'thumbnail'); ?>
				<li>
				  <figure><a href="<?php echo get_the_permalink($gallery->ID); ?>">
				  <img src="<?php echo $small_image_url[0]; ?>" alt="" width="230" height="210" border="0"></a>
				  </figure>
				  <article><a href="<?php echo get_the_permalink($gallery->ID); ?>"><?php echo $gallery->post_name; ?></a></article>
				</li>
			 <?php } ?>
	</ul>
    </section>
  </div>
</div>
<!-- /CONTENT SECTION --> 

<?php get_footer(); ?>