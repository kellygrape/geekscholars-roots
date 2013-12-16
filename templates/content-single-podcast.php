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
  <footer>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
  </footer>
  <?php comments_template('/templates/comments.php'); ?>
</article> 
