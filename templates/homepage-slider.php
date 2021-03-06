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
      <div class="slider-image">
      <a href="<?php echo get_permalink();?>"><?php
      $theimg = get_sub_field('slider_image');
      $attachment_id = $theimg['id'];
      $size = "full"; // (thumbnail, medium, large, full or custom size)
      echo wp_get_attachment_image( $attachment_id, $size );
      ?>
      </a>
      </div>
      <div class="box-caption">
      <?php the_sub_field('slider_caption'); ?>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
  <ol class="carousel-indicators">
    <?php $r = 0; ?>
    <?php while(has_sub_field('homepage_slider')):?>
    <li data-target="#podcast-slider" data-slide-to="<?php echo $r; $r++; ?>" <?php if($r==1){ ?>class="active"<?php } ?>></li>
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
<?php else:
  $v = 0;

 // if there is no slider images, show the featured image ?>
<div id="podcast-slider" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="slider-image">
        <a href="<?php echo get_permalink();?>"><?php the_post_thumbnail('headerimage'); ?></a>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#podcast-slider" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#podcast-slider" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<?php endif; //if get_field homepageslider ?>
