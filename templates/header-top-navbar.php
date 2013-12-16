<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="visible-xs navbar-brand">Menu</span>
      <div class="hidden-xs navbar-logo"><a class="text-hide" href="http://moviehawk.net/geekscholars/">Geek Scholars<img src="http://moviehawk.net/geekscholars/wp-content/themes/geekscholars-roots/assets/img/geekscholarslogo.png" alt="Geek Scholars Logo">
        </a></div>
      <?php if(!is_front_page()): ?><div class="hidden-xs navbar-logo"><a class="text-hide" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?><img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/geekscholarslogo.png" alt="Geek Scholars Logo" /></a></div><?php endif; ?>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>