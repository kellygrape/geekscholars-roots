<?php get_template_part('templates/page', 'header'); ?>
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>


<?php
// Show the most recent post in the podcast category, with its slider images as a carousel

$args = array( 'category_name' => 'podcasts', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC' );

$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

<?php 
if(get_field('homepage_slider')): 
  $v = 0;
?>
<div id="podcast-slider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php while(has_sub_field('homepage_slider')):?>
    <li data-target="#podcast-slider" data-slide-to="<?php echo $v; $v++; ?>" <?php if($v==1){ ?>class="active"<?php } ?>></li>
    <?php endwhile; ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php $v = 0; ?>
    <?php while(has_sub_field('homepage_slider')):?>
    <div class="item <?php if($v==0){ ?>active<?php $v++;} ?>">
    <?php
    $theimg = get_sub_field('slider_image');
    $attachment_id = $theimg['id'];
    $size = "full"; // (thumbnail, medium, large, full or custom size)
    echo wp_get_attachment_image( $attachment_id, $size );
    ?>
    </div>
    <?php endwhile; ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#podcast-slider" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#podcast-slider" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<?php endif; ?>
<?php endforeach; 
wp_reset_postdata();?>

</ul>

<?php 
      query_posts( array( 'category_name' => 'podcasts', 'posts_per_page' => 1, 'orderby' => 'date', 'order' => 'DESC' ) );
      while (have_posts()) : the_post();
    ?>
		<section class="slider">
		  <div class="flexslider">
  		  <?php make_the_slides($post->ID); ?>
		  </div>
		</section>
		
		
		<section class="slider_info clearfix">
		  <div class="inner">
		    <div class="episodenumber">
          <?php echo(get_post_meta($post->ID, 'geekscholars_episode_number', true)); ?>
        </div>
		    <?php echo segments_list($post->ID); ?>
		    </div>
		 
		  
		</section>
		<?php endwhile; ?>



<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>




    
		
		
		<section class="recent-podcasts clearfix">
		<?php
			$category_id = get_cat_ID( 'podcasts');
			$category_link = get_category_link( $category_id );
		?>
		<header class="recent-podcasts-head clearfix">
		  <a href="<? print $category_link; ?>"><img src="<?php echo get_bloginfo('template_url'); ?>/images/previousepisodes2.png" alt="Previous Episodes" class="prevepisodesimg"></a>
		</header>
		  
      <?php
        global $post;
        $args = array( 'numberposts' => 3, 'offset'=> 1, 'category_name' => 'podcasts' );
        $myposts = get_posts( $args );
        $countpost=0;
        foreach( $myposts as $post ) :	setup_postdata($post); 
          $countpost++;
      ?>
      <div class="blog-wrapper one-third <?php if($countpost==1) echo('first');if($countpost==3) echo ('last'); ?>">
        <article>
          <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('frontthumb'); ?></a>
          <header class="clearfix">
            <div class="episodenumber">
                <?php echo(get_post_meta($post->ID, 'geekscholars_episode_number', true)); ?>
            </div>
            <div class="thetitle">
              <h2><span class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></span></h2>
            </div>
          </header>
          <footer>
            <?php echo segments_list($theid); ?>
          </footer>
        </article>
      </div>
      <?php endforeach; ?>
  		<?php wp_reset_query(); ?>
  		<div class="clear"></div>
		</section>

	</div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>


