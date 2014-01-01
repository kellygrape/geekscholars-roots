<div class="col-md-4">
  <article <?php post_class('homepage-podcast'); ?>>
    <figure class="post-image"><?php the_post_thumbnail('medium') ?></figure>
  	<div class="media podcast-header">
  	  <h2 class="pull-left episode-number">
  		<?php the_field('episode_number'); ?>
  	  </h2>
  	  <div class="media-body">
  		<h3><span class="episode-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h3>
  		<div class="entry-meta">
  			<div class="podcast-meta">
  				<i class="glyphicon glyphicon-time"></i> <?php echo get_the_date(); ?>
  			</div>
  			<div class="segment-list">
          <?php if(get_field('segment')): ?>
          <h3>Segments</h3>
          <?php get_template_part('templates/podcast-segmentlist'); ?>
          <?php endif; ?>
      </div>
  		</div>
  	  </div>
  	</div>	 
  </article> 
</div>