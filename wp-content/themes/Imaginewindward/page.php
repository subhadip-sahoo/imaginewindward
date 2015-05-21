<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

    <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'content', 'page' ); ?>
            <?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>

</section>
  </div>
  
</div>
<!-- /CONTENT SECTION --> 

<?php get_footer(); ?>