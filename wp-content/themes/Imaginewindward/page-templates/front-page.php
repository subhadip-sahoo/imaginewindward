<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Imagine windward consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Imagine_windward
 * @since Imagine windward 1.0
 */

get_header(); ?>

<!-- CONTENT SECTION -->
<div id="content_section">
  <div class="section01">
    <section class="clearfix">
      <div class="content_box">
        <hgroup>
          <h2>Available Inventory</h2>
        </hgroup>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img-05.png" width="326" height="194" alt=""></figure>
        <article class="clearfix">
          <div class="left">
            <p>Complete - St. Thomas Model Cape Royal Golf &amp; Racquet Club</p>
          </div>
          <div class="right"><a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/images/more.png" width="40" height="40" alt=""></a></div>
        </article>
      </div>
      <div class="content_box">
        <hgroup>
          <h2>Floor Plans Expert</h2>
        </hgroup>
        <figure><img src="<?php echo get_template_directory_uri(); ?>/images/img-06.png" width="326" height="194" alt=""></figure>
        <article class="clearfix">
          <div class="left">
            <p>Wonderful combination of enjoying both indoor and outdoor</p>
          </div>
          <div class="right"><a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/images/more.png" width="40" height="40" alt=""></a></div>
        </article>
      </div>
      <div class="content_box">
        <hgroup style="text-align:center;">
          <h2>Video</h2>
        </hgroup>
        <div>
            <iframe width="320" height="208" src="http://www.youtube.com/embed/mIMFL9wRaJE"></iframe>
        </div>
      </div>
    </section>
  </div>
  <div class="section02">
    <section class="clearfix">
	<?php while ( have_posts() ) : the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	<?php endwhile; // end of the loop. ?>
    </section>
  </div>
  <div class="section03">
    <section class="clearfix">
      <h1>Gallery</h1>
      <ul>
            <?php 
                $arg = array('post_type' => 'htsgallerys', 'post_status' => 'publish', 'order_by' => 'menu_order', 'order' => 'ASC'); 
                $gallerys = get_posts($arg); //echo "<pre>"; print_r($gallerys); 
            ?>
            <?php 
                foreach ($gallerys as $gallery){ 
                    $small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($gallery->ID), 'thumbnail'); 
            ?>
                <li>
                  <figure>
                    <a href="<?php echo get_the_permalink($gallery->ID); ?>">
                        <img src="<?php echo $small_image_url[0]; ?>" width="230" height="210" alt="">
                    </a>
                  </figure>
                </li>
            <?php } ?>
      </ul>
      <div class="clr"></div>
	  <?php dynamic_sidebar('sidebar-2'); ?>
    </section>
  </div>
</div>
<!-- /CONTENT SECTION --> 
<?php get_footer(); ?>