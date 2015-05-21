<?php
    /* Template Name: Video Testimonials */
    get_header();
?>
        <?php
                $args = array('post_type' => 'testimonials', 'order' => 'ASC');
                query_posts($args);
                if(have_posts()):
                    while(have_posts()):
                    the_post();
                    $post = get_post(get_the_ID());
        ?>
        <div id="content_section">
        <div class="section04">
          <section class="clearfix">
            <h1>Testimonial</h1>
            <div class="testi_box">
              <iframe width="560" height="315" src="<?php echo get_field('you_tube_video_link', get_the_ID(), FALSE);?>" frameborder="0" allowfullscreen></iframe>
              <div class="text_part">
              <h4><?php the_title();?></h4>
                <p>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/open-quote.png" style="margin-right:10px;" alt="">
                    <?php echo $post->post_content;?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/close-quote.png" style="margin-left:10px;" alt="">
                </p>
                <p><strong><?php echo get_field('client_name', get_the_ID(), FALSE);?></strong></p>
              </div>
            </div>
          </section>
        </div>

      </div>
    <?php
            endwhile;
            wp_reset_query();
        endif;
    ?>
    
<?php get_footer(); ?>

