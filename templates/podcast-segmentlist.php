<?php while(has_sub_field('segment')): ?>
<?php $term = get_term_by('id',get_sub_field('segment_type'),'segmenttax'); ?>
  <i class="segment-icon-fa <?php echo($term->slug); ?>"></i>
  <img class="segment-icon <?php echo($term->slug); ?>" data-toggle="tooltip" title="<?php the_sub_field('segment_description'); ?>" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/icons/<?php echo($term->slug); ?>.png">

<?php endwhile; ?>