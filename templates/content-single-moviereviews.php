<div class="page-header">
  <h1>Movie Reviews</h1>
</div>
  <article <?php post_class('row'); ?>>
    <figure class="movie-review-poster col-md-3">
      <?php the_post_thumbnail('movie-poster'); ?>
    </figure>
    <section class="movie-review-snippet col-md-9">
      <header class="clearfix">
        <?php $thegrade = get_field('movie_grade');  ?>
      
        <div class="movie-review-rating col-sm-1 <?php echo $thegrade->slug; ?>">
          <span class="rating-letter"><?php echo $thegrade->name; ?></span>
        </div>
        <div class="header-text col-sm-11">
          <h1 class="entry-title"><?php the_title(); ?></h1>
          <?php get_template_part('templates/entry-meta'); ?>
        </div>
      </header>
      <div class="entry-summary">
        <?php the_content(); ?>
      </div>
    </section>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
