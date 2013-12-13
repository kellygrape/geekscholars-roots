<?php get_template_part('templates/page', 'header'); ?>
<article class="post">
  <?php 
  $segments = get_terms('segmenttax',array(
   	'orderby'    => 'count',
    'order'	     => 'DESC',
   	'hide_empty' => 0
   ) );
  foreach($segments as $segment) {
    $link = get_term_link(intval($segment->term_id),'segmenttax');
    $iconclass= gsmn_segmenticon($segment->slug);
    ?>
  <section class="segment-listpage-item row">
    <div class="col-xs-1"><i class="segment-icon-fa <?php echo($iconclass); ?>"></i></div>
    <div class="segment-info col-xs-11">
      <h2><a href="<?php echo($link); ?>"><?php echo($segment->name); ?></a></h2>
      <p><?php echo($segment->description); ?></p>
    </div>
  </section>
  <?php  
  }
 ?>
</article>   
