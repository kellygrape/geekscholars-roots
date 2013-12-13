<div class="col-md-4">
    <figure class="post-image"><?php the_post_thumbnail() ?></figure>
    <h3><?php echo the_title(); ?></h3>
    <?php if(get_field('segment')): ?>
      <?php get_template_part('templates-podcast/segmentlist'); ?>
    <?php endif; ?>
</div>