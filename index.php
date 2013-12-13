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


  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php $v = 0; ?>
    <?php while(has_sub_field('homepage_slider')):?>
    <div class="item <?php if($v==0){ ?>active<?php $v++;} ?>">
      <div class="slider-image"><?php
      $theimg = get_sub_field('slider_image');
      $attachment_id = $theimg['id'];
      $size = "full"; // (thumbnail, medium, large, full or custom size)
      echo wp_get_attachment_image( $attachment_id, $size );
      ?></div>
      <div class="box-caption">
      <?php the_sub_field('slider_caption'); ?>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <ol class="carousel-indicators">
    <?php while(has_sub_field('homepage_slider')):?>
    <li data-target="#podcast-slider" data-slide-to="<?php echo $v; $v++; ?>" <?php if($v==1){ ?>class="active"<?php } ?>></li>
    <?php endwhile; ?>
  </ol>
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
    <div class="col-sm-3 podcast-meta">
        <i class="glyphicon glyphicon-time"></i> <?php echo get_the_date(); ?>
    </div>
    <div class="col-sm-9 segment-list">
        <?php if(get_field('segment')): ?>
        <h3>Segments</h3>
        <?php while(has_sub_field('segment')): ?>
        <?php $term = get_term_by('id',get_sub_field('segment_type'),'segmenttax'); ?>
        <img class="segment-icon" data-toggle="tooltip" title="<?php the_sub_field('segment_description'); ?>" src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/icons/<?php echo($term->slug); ?>.png">
    
        <?php endwhile;endif; ?>
    </div>
wp_reset_postdata();?>


	</div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>


