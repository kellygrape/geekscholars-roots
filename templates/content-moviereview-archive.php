<article <?php post_class('row'); ?>>
  <figure class="movie-review-poster col-md-3">
    <?php the_post_thumbnail(); ?>
  </figure>
  <section class="movie-review-snippet col-md-9">
    <header>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-summary">
      <?php the_content('Read more...'); ?>
    </div>
  </section>
</article>
