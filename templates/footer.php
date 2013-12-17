<footer class="content-info" role="contentinfo">
  <section class="container">
  <div class="row">
    <div class="col-lg-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </div>
  </div>
  </section>
</footer>

<?php wp_footer(); ?>
