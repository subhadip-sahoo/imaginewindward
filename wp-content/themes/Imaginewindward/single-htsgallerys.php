<?php
/**
 * The Template for displaying all single posts
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
	<?php 
            if( class_exists('Dynamic_Featured_Image') ) {
               global $dynamic_featured_image;
               $featured_images = $dynamic_featured_image->get_featured_images( );
               //echo "<pre>"; print_r($featured_images);

                    foreach($featured_images as $featured_image) {
               //You can now loop through the image to display them as required
               $title = $dynamic_featured_image -> get_image_title_by_id($featured_image[attachment_id]); 
               ?>
                    <li>
                      <figure><a class="fancybox" href="<?php echo $featured_image[full]; ?>" data-fancybox-group="gallery" title="">
                      <img src="<?php echo $featured_image[thumb]; ?>" alt="" width="230" height="210" border="0"></a>
                      </figure>
                    </li>
             <?php
                       }
                    }
            ?>
	</ul>
    </section>
  </div>
</div>
<!-- /CONTENT SECTION --> 





<?php get_footer(); ?>