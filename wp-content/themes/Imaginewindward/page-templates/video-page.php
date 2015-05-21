<?php
/**
 * Template Name: Video Page Template
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

<style>
.navigation{ text-align:right; }

.navigation li a,
.navigation li a:hover,
.navigation li.active a,
.navigation li.disabled {
	color: #fff;
	text-decoration:none;
}

.navigation li {
	display: inline;
}

.navigation li a,
.navigation li a:hover,
.navigation li.active a,
.navigation li.disabled {
	line-height:20px;
	border:1px solid rgba(216,216,216,1);
	padding:0 4px;
	font-size:12px;
	display:inline-block;
	margin:0 3px;
	color:rgba(51,51,51,1);
	text-decoration:none;
}

.navigation li a:hover,
.navigation li.active a {
	color:rgba(51,51,51,1);
	font-weight:bold;
}
</style>


<section id="body_box2_inner">	
	<h2><?php the_title(); ?></h2>
		<div class="video_thumb_content">
          <ul class="video-block-container">
		  <?php 
		  	// the query to set the posts per page to 4
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		  $args = array('posts_per_page' => 8, 'post_status' => 'publish', 'post_type' => 'htsvideos', 'paged' => $paged );
			query_posts($args);
		  ?>
			<?php
			if ( have_posts() ) : while (have_posts()) : the_post();
			$link = get_the_excerpt();
				$video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
				if (empty($video_id[1]))
					$video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

				$video_id = explode("&", $video_id[1]); // Deleting any other params
				$video_id = $video_id[0];
			?>
		<li class="video-block">
              <div class="video-thumbimg">
              	<a class="more" href="<?php echo get_the_excerpt(); ?>" data-fancybox-group="gallery" title="<?php the_title(); ?>"> 
					<img title="<?php the_title(); ?>" class="imgHome" alt="<?php the_title(); ?>" src="https://img.youtube.com/vi/<?php echo $video_id; ?>/1.jpg"></a></div>
              <div class="vid_info"><a class="videoHname" href="#"><span><?php the_title(); ?></span></a>
              </div>
        </li>
      <?php endwhile; ?>
	  </ul>
			<!-- pagination -->
			<div class="clr"></div>
			<div class="pagination">
			<?php wpbeginner_numeric_posts_nav(); ?>
			</div>
        </div>
		<?php else : ?>
			<!-- No posts found -->
		<?php endif; ?>
</section>

<?php get_footer(); ?>