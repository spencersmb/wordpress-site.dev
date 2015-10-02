<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootstrap_to_Wordpress
 */

?>

	</div><!-- #content -->

<!-- FOOTER
================================================== -->
<footer>
  <div class="container">
    <div class="col-sm-3">
      <?php if(get_theme_mod('w2b_footer_logo') != ""): ?>
      <p><a href="/"><img src="<?php echo get_theme_mod('w2b_footer_logo'); ?>" alt="<?php bloginfo('title'); ?>"></a></p>
      <?php endif; ?>
    </div><!-- end col -->
    <div class="col-sm-6">
      <nav>
        <?php if(get_theme_mod('w2b_footer_text') != ""): ?>
          <h4><?php echo get_theme_mod('w2b_footer_text'); ?></h4>
        <?php endif; ?>
        <ul class="list-unstyled list-inline">
          <li><a href="">Home</a></li>
          <li><a href="">Blog</a></li>
          <li><a href="">Resources</a></li>
          <li><a href="">Contact</a></li>
          <?php if(get_theme_mod('w2b_footer_facebook') != ""): ?>
          <li><a href="http://facebook.com/<?php echo get_theme_mod('w2b_footer_facebook'); ?>" target="_blank">Facebook</a></li>
          <?php endif; ?>
          <li class="signup-link"><a href="">Sign up now</a></li>
        </ul>
      </nav>
    </div><!-- end col -->
    <div class="col-sm-3">
      <p class="pull-right">&copy; 2014 Brad Hussey</p>
    </div><!-- end col -->
  </div><!-- container -->
</footer>

<?php wp_footer(); ?>

</body>
</html>
