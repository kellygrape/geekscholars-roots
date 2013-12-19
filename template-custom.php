<?php
/*
Template Name: Movie Reviews Listing Template
*/
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>


<?php 
  $ratings = get_terms('ratingstax');
    foreach($ratings as $rating) {
      $ratedposts = get_posts(array( 'taxonomy' => 'ratingstax', 'term' => $rating->slug, 'orderby' => 'date', 'order' => 'DESC'));
      ?>
      <h2 class="ratings-header"><?php echo $rating->name; ?></h2>
      <ul class="ratings-post-list">
      <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

      <?php endforeach; wp_reset_postdata();?>
      </ul>
    <?php
    }
    ?>
