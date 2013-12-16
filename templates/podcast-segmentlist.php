<?php while(has_sub_field('segment')): ?>
<?php $term = get_term_by('id',get_sub_field('segment_type'),'segmenttax'); ?>
  <?php $gsmnicon = gsmn_segmenticon($term->slug); ?>
  <button data-toggle="tooltip" title="<?php the_sub_field('segment_description'); ?>" class="btn btn-link btn-segmenticon"><i class="segment-icon-fa <?php echo($gsmnicon); ?>"></i></button>
<?php endwhile; ?>