<?php
    /* Template Name: Floor Plans */
    get_header();
?>
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
                $args = array('post_type' => 'floor-plans', 'order' => 'ASC');
                query_posts($args);
                if(have_posts()):
                    while(have_posts()):
                    the_post();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
            ?>
            <div class="floor_box">
                <a href="<?php the_permalink();?>">
                    <div class="image"><img src="<?php echo $image[0];?>" alt=""></div>
                    <div class="floor_name"><?php the_title();?></div>
                </a>
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

