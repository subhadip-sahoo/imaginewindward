<?php
/**
 * Template Name: Inventory
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
<div id="content_section">
  <div class="section04">
    <section class="clearfix">
        <div class="left_panel">
          <div class="left_box">
              <div class="imageshadow">
                  <figure><img width="230" height="210" alt="" src="<?php echo get_template_directory_uri(); ?>/images/img-01.png"></figure>
              </div>
              <h4><a href="<?php echo get_page_link(113); ?>">Available Inventory</a></h4>
          </div>
          <div class="left_box">
              <div class="imageshadow">
                  <figure><img width="230" height="210" alt="" src="<?php echo get_template_directory_uri(); ?>/images/img-02.png"></figure>
              </div>
              <h4><a href="<?php echo get_page_link(35); ?>">Gallery</a></h4>
          </div>
        </div>
        <div class="rigth_panel">
            <h1><?php the_title();?></h1>
            <?php
                $args = array('post_type' => 'inventory', 'order' => 'ASC');
                query_posts($args);
                if(have_posts()):
                    while(have_posts()):
                    the_post();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
            ?>
            <div class="floor_box">
                <div class="image"><img src="<?php echo $image[0];?>" alt=""></div>
                <a href="<?php echo get_field('url');?>"><div class="floor_name"><?php the_title();?></div></a>
            </div>
            <?php
                    endwhile;
                    wp_reset_query();
                endif;
            ?>
        </div>
        <div class="clearfix"></div>
    </section>
  </div>
</div>
<?php get_footer(); ?>