<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>



<section class="over-slider row">
  <div class="col-md-3">
    <nav class="social-area">
    	<ul class="clearfix">
    	  <li class="facebook"><a href="https://www.facebook.com/geekscholars" class="tip" title="Visit us on Facebook"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/facebook.png" alt="Facebook"></a></li>
    	  <li class="twitter"><a href="https://twitter.com/GeekScholars" class="tip" title="Follow us on Twitter"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/twitter.png" alt="twitter"></a></li>
    	  <li class="itunes"><a href="https://itunes.apple.com/us/podcast/geekscholars-movie-news/id459567560" class="tip" title="Visit GeekScholars on iTunes"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/itunes.png" alt="Visit GeekScholars on iTunes"></a></li>
    	  <li class="email"><a href="mailto:mail@geekscholars.com" class="tip" title="Email GeekScholars"><img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/email.png" alt="Email GeekScholars"></a></li>
    	</ul>
    </nav>
  </div>
  <div class="col-md-6 logo over-slider">
		<img src="<?php echo get_bloginfo('template_url'); ?>/assets/img/geekscholarslogo.png" alt="Geek Scholars Logo">
	</div>
	<section class="homepage-search col-md-3">
		<?php get_search_form(); ?>
	</section>
</section>

<?php
// Show the most recent post in the podcast category, with its slider images as a carousel
$args = array( 'category_name' => 'podcasts', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC' );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <?php get_template_part('templates/homepage-slider'); ?>

    <div class="col-sm-3 podcast-meta">
        <i class="glyphicon glyphicon-time"></i> <?php echo get_the_date(); ?>
    </div>
    <div class="col-sm-9 segment-list">
        <?php if(get_field('segment')): ?>
        <h3>Segments</h3>
        <?php get_template_part('templates/podcast-segmentlist'); ?>
        <?php endif; ?>
    </div>

<?php endforeach; ?>
<?php wp_reset_postdata();?>

<div class="row front-recent-podcasts">
    <h2>Recent Podcasts</h2>
    <?php
    $myposts = get_posts(array( 'category_name' => 'podcasts', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'DESC', 'offset' => 1 ));
    foreach ( $myposts as $post ) : setup_postdata( $post );
    
    get_template_part('templates/homepage-podcast');
    
    endforeach; wp_reset_postdata();?>
</div>




	</div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>


