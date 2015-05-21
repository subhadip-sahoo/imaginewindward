<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Imagine_windward
 * @since Imagine windward 1.0
 */
?>
	<!-- FOOTER SECTION -->
<div id="footer_section">
  <footer class="clearfix">
    <div class="section01 clearfix">
      <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu', 'container' => '' ) ); ?>
    </div>
    <div class="section02 clearfix"><img src="<?php echo get_template_directory_uri(); ?>/images/shadow.png" alt=""></div>
    <div class="section03 clearfix">
      <ul>
        <?php dynamic_sidebar('sidebar-3'); ?>
        <li><a href="https://www.facebook.com/" target="new"><i class="fa fa-facebook"></i></a></li>
        <li><a href="https://www.twitter.com/" target="new"><i class="fa fa-twitter"></i></a></li>
        <li><a href="https://plus.google.com/" target="new"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="https://www.linkedin.com/" target="new"><i class="fa fa-linkedin"></i></a></li>
      </ul>
    </div>
    <div class="section04 clearfix">ImagineWindward</div>
    <div class="section05 clearfix">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved. Powered by <a href="http://www.businessprodesigns.com/" rel="nofollow" target="new">BusinessPro Designs</a>.</div>
    <div class="section06 clearfix"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" alt=""></div>
  </footer>
</div>
<!-- /FOOTER SECTION -->

<?php wp_footer(); ?>
</body>
</html>