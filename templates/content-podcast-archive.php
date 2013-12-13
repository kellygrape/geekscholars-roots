<article <?php post_class('podcast-archive'); ?>>
	<div class="media podcast-header">
	  <h2 class="pull-left episode-number">
		<?php the_field('episode_number'); ?>
	  </h2>
	  <div class="media-body">
		<h2 class="entry-title"><span class="episode-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h2>
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
	</div>	 
</article> 
