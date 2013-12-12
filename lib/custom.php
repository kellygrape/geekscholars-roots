<?php
/**
 * Custom functions
 */
 add_filter('roots_display_sidebar', 'gsroots_sidebar_on_front');

function gsroots_sidebar_on_front($sidebar) {  
  if (is_category('podcasts')) {
    return true;
  }
  return $sidebar;
}

add_action( 'init', 'create_gsmn_segment_taxonomy2', 0 );
function create_gsmn_segment_taxonomy2(){
  if (!taxonomy_exists('segmenttax')) {
      register_taxonomy( 'segmenttax', 'post', array( 'hierarchical' => true, 'label' => __('Segments'), 'query_var' => 'segment', 'rewrite' => array( 'slug' => 'segment' ) ) );
      
      
      wp_insert_term( 'Headlines', 'segmenttax', array('slug' => 'headlines','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Monthly Preview', 'segmenttax', array('slug' => 'monthlypreview','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Casting Competition', 'segmenttax', array('slug' => 'casting','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Never Tell Me the Odds', 'segmenttax', array('slug' => 'theodds','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Preview Reviews', 'segmenttax', array('slug' => 'previewreview','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Movie Reviews', 'segmenttax', array('slug' => 'moviereview','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Either - Or', 'segmenttax', array('slug' => 'eitheror','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Where Are They Now', 'segmenttax', array('slug' => 'wherearethey','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Unsung Hero', 'segmenttax', array('slug' => 'unsunghero','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'GeekScholars Movie News Awards', 'segmenttax', array('slug' => 'gsmnawards','description'=> 'Change this description by visiting the Segments taxonomy.'));
      wp_insert_term( 'Thumbs Up or Thumbs Down', 'segmenttax', array('slug' => 'thumbsupthumbsdown','description'=> 'Change this description by visiting the Segments taxonomy.'));
  }
}