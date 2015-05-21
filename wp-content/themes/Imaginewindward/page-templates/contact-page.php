<?php
/**
 * Template Name: Contact Page Template
 *
 * Description: Bb Production loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Bb_Production
 * @since Bb Production 1.0
 */

get_header(); ?>

<!-- CONTENT SECTION -->
<div id="content_section">
 
  <div class="section04">
    <section class="clearfix">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<h2><?php the_title(); ?></h2>
				
				<div class="form_box">
					<?php echo do_shortcode('[contact-form-7 id="37" title="Contact form 1"]'); ?>
				</div>
				
				
				<div class="info_box">
                <?php echo the_content(); ?>
				</div>
				<div class="clr"></div>
				
			<?php endwhile; // end of the loop. ?>

    </section>
  </div>
  
</div>
<!-- /CONTENT SECTION --> 

<?php get_footer(); ?>