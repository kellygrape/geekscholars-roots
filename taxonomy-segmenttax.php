<div class="page-header">
  <h1>
    Segment Archive : <?php echo roots_title(); ?>
  </h1>
</div>
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', 'podcast-archive'); ?>
  <!--
  <?php
    // update the slider data 
    $field_key = "field_52a8a25ef34d0";
    update_field( $field_key, '', $post->ID );
    $the_slider = get_post_meta($post->ID,'geekscholars_slider');
    foreach($the_slider[0] as $k => $v){
      $currimg = $v['geekscholars_image'];
      $currcaption = $v['slidercaption'];
      $value = get_field($field_key, $post->ID);
      $value[] = array("slider_image" => $currimg, "slider_caption" => $currcaption);
      update_field( $field_key, $value, $post->ID );
    }
    ?>			
  -->		
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
