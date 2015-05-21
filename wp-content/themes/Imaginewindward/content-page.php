<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Imagine_windward
 * @since Imagine windward 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	
		<?php 
			if ( ! is_page_template( 'page-templates/front-page.php' ) ) :
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large');
			$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'medium');
		?>
		<?php endif; ?>
		<a href="<?php echo $large_image_url[0]; ?>" class="MagicZoom" id="bike" rel="selectors-class: Active"><?php the_post_thumbnail('medium'); ?></a>
		<a href="<?php echo $large_image_url[0]; ?>" rel="zoom-id:bike" rev="<?php echo $small_image_url[0]; ?>" class="Selector"><?php the_post_thumbnail('thumbnail'); ?></a>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'iww' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->
