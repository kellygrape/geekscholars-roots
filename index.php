<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<section class="over-slider row">
  <div class="col-sm-4 col-md-3">
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
    </nav>
  </div>
  <div class="col-sm-4 col-md-6 logo over-slider">
		<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/geekscholarslogo.png" alt="Geek Scholars Logo">
	</div>
	<section class="homepage-search col-sm-4 col-md-3">
		<?php get_search_form(); ?>
	</section>
</section>




<section class="frontpage-slider row">
<?php
// Show the most recent post in the podcast category, with its slider images as a carousel
$args = array( 'category_name' => 'podcasts', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC' );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <?php get_template_part('templates/homepage-slider'); ?>
    <div class="col-md-4 col-sm-5 clearfix slider-meta">
      <div class="episode-number-area"><h3 class="episode-number"><?php the_field('episode_number'); ?></h3></div>
      <div class="episode-date"><i class="glyphicon glyphicon-time"></i> <?php echo get_the_date(); ?></div>
    </div>
    <div class="col-md-8 col-sm-7 segment-list">
      <?php if(get_field('segment')): ?>
      <h3>Segments</h3>
      <?php get_template_part('templates/podcast-segmentlist'); ?>
      <?php endif; ?>
    </div>
        
      	  

<?php endforeach; ?>
<?php wp_reset_postdata();?>
</section>


<section class="row front-recent-podcasts">
    <h2 class="prevepisodes">Previous Episodes</h2>
    <?php
    $myposts = get_posts(array( 'category_name' => 'podcasts', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC', 'offset' => 1 ));
    foreach ( $myposts as $post ) : setup_postdata( $post );
    
    get_template_part('templates/homepage-podcast');
    
    endforeach; wp_reset_postdata();?>
</section>




	</div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>


