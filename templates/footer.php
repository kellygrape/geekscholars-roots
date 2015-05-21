<footer class="content-info" role="contentinfo">
  <section class="container">
  <div class="row">
    <div class="col-sm-4">
      <nav class="social-area">
        <a href="https://www.facebook.com/geekscholars" title="Visit us on Facebook" class="btn">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/facebook.png" alt="Facebook">
        </a>
        <a href="https://twitter.com/GeekScholars" title="Follow us on Twitter" class="btn">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/twitter.png" alt="twitter">
        </a>
        <a href="https://itunes.apple.com/us/podcast/geekscholars-movie-news/id459567560" title="Visit GeekScholars on iTunes" class="btn">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/itunes.png" alt="Visit GeekScholars on iTunes">
        </a>
        <a href="mailto:mail@geekscholars.com" title="Email GeekScholars" class="btn">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/email.png" alt="Email GeekScholars">
        </a>
        <a href="http://www.geekscholars.com/feed/podcast/" title="Subscribe to Podcast on Android" class="btn">
          <img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/android.png" alt="Subscribe to Podcast on Android">
        </a>
      </nav>
    </div>
    <div class="col-sm-7">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
  </div>
  </section>
</footer>

<?php wp_footer(); ?>
