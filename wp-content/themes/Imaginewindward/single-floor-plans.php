<?php
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
                <figure><iframe width="230" height="210" src="<?php echo get_field('you_tube_link');?>" frameborder="0" allowfullscreen></iframe></figure>
            </div>
            <h4>Take the Virtual Tour</h4>
        </div>
        <div class="left_box">
            <h2>Specifications</h2>
            <h4>Bedrooms: <?php echo get_field('bedrooms');?></h4>
            <h4>Bathrooms: <?php echo get_field('bathrooms');?></h4>
            <h4>Garage: <?php echo get_field('garage');?></h4>
            <h4>Living Area: <?php echo get_field('living_area');?></h4>
        </div>
        <div class="left_box">
            <h4><a href="<?php echo get_field('floor_plan_doc');?>" target="_blank"><?php the_title();?> Floor Plan</a></h4>
            <h4><a href="<?php echo get_field('front_elevation_doc');?>" target="_blank"><?php the_title();?> Front Elevation</a></h4>
        </div>
      </div>
      <div class="rigth_panel">
      	<h1><?php the_title();?></h1>
            <div id="slider1" class="flexslider">
                
                <ul class="slides">
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
                                    <img src="<?php echo $featured_image[full]; ?>" />
                                </li>
                         <?php
                                   }
                                }
                        ?>
                  <!-- items mirrored twice, total of 12 -->
                </ul>
            </div>
            <div id="carousel" class="flexslider">
                <ul class="slides">
                    <?php 
                        if( class_exists('Dynamic_Featured_Image') ) {
                           global $dynamic_featured_image;
                           $featured_images = $dynamic_featured_image->get_featured_images( );
                            foreach($featured_images as $featured_image) {
                            $title = $dynamic_featured_image -> get_image_title_by_id($featured_image[attachment_id]); 
                           ?>
                                <li>
                                    <img src="<?php echo $featured_image[thumb]; ?>" />
                                </li>
                         <?php
                                   }
                                }
                        ?>
                  <!-- items mirrored twice, total of 12 -->
                </ul>
            </div>
            <?php
            if(have_posts()):
                while(have_posts()):
                  the_post();
                  the_content();
                endwhile;
                wp_reset_query();
              endif;
        ?>
        </div>
      <div class="clearfix"></div>
    </section>
  </div>
</div>
<?php get_footer();?>