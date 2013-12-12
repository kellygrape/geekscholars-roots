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


	</div> <!-- #main -->
</div> <!-- #main-container -->
<?php get_footer(); ?>


