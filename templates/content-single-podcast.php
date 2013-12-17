  <article <?php post_class('single-podcast'); ?>>
  <figure class="podcast-header-image"><?php the_post_thumbnail('headerimage'); ?></figure>
  <header class="media podcast-header">
    <h2 class="pull-left episode-number"><?php the_field('episode_number'); ?></h2>
    <div class="media-body">
      <h2 class="entry-title"><span class="episode-title"><?php the_title(); ?></span></h2>
      <div class="entry-meta row">
        <div class="col-sm-3 podcast-meta">
          <i class="glyphicon glyphicon-time"></i> <?php echo get_the_date(); ?>
        </div>
        <div class="col-sm-9 segment-list">
          <?php if(get_field('segment')): ?>
          <h3>Segments</h3>
          <?php get_template_part('templates/podcast-segmentlist'); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </header>
  <div class="entry-content">
  <?php
// usage with max_num_pages
next_posts_link( 'Older Entries', $the_query->max_num_pages );
previous_posts_link( 'Newer Entries' );
?>
    <?php the_content(); ?>
  </div>
  <footer class="podcast-footer">
    <nav class="social-area pull-right">
    	<ul class="nav nav-pills">
    	  <li class="facebook"><a href="https://www.facebook.com/geekscholars" class="tip" oldtitle="Visit us on Facebook" title="" data-hasqtip="true" aria-describedby="qtip-5"><img src="http://www.geekscholars.com/wp-content/themes/geekscholarstheme/images/facebook.png" alt="Facebook"></a></li>
    	  <li class="twitter"><a href="https://twitter.com/GeekScholars" class="tip" oldtitle="Follow us on Twitter" title="" data-hasqtip="true" aria-describedby="qtip-6"><img src="http://www.geekscholars.com/wp-content/themes/geekscholarstheme/images/twitter.png" alt="twitter"></a></li>
    	  <li class="itunes"><a href="https://itunes.apple.com/us/podcast/geekscholars-movie-news/id459567560" class="tip" oldtitle="Visit GeekScholars on iTunes" title="" data-hasqtip="true" aria-describedby="qtip-7"><img src="http://www.geekscholars.com/wp-content/themes/geekscholarstheme/images/itunes.png" alt="Visit GeekScholars on iTunes"></a></li>
    	  <li class="email"><a href="mailto:mail@geekscholars.com" class="tip" oldtitle="Email GeekScholars" title="" data-hasqtip="true" aria-describedby="qtip-8"><img src="http://www.geekscholars.com/wp-content/themes/geekscholarstheme/images/email.png" alt="Email GeekScholars"></a></li>
    	</ul>
      </nav>
  </footer>
  <?php comments_template('/templates/comments.php'); ?>
</article> 
