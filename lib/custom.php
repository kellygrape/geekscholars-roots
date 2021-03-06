<?php
/**
 * Custom functions
 */
 
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

// AUDIO SHORTCODE
function html5_audio($atts, $content = null) {
    extract(shortcode_atts(array(
        "src" => '',
        "autoplay" => '',
        "preload"=> 'true',
        "loop" => '',
        "controls"=> ''
    ), $atts));
    return '<audio src="'.$src.'" onloadeddata="var audioPlayer = this; setTimeout(function() { audioPlayer.play(); }, 4000)" preload="'.$preload.'" loop="'.$loop.'" controls="'.$controls.'" autobuffer></audio>';
}
add_shortcode('audio5', 'html5_audio');


 add_filter('roots_display_sidebar', 'gsroots_sidebar_on_front');

function gsroots_sidebar_on_front($sidebar) {  
  if (is_category('podcasts')) {
    return true;
  }
  if (is_tax('segmenttax')){
    return true;
  }
  return $sidebar;
}

add_action( 'init', 'create_gsmn_movie_ratings_tax', 0 );
function create_gsmn_movie_ratings_tax(){
  if (!taxonomy_exists('ratingstax')) {
      register_taxonomy( 'ratingstax', 'post', array( 'hierarchical' => true, 'label' => __('Ratings'), 'query_var' => 'movierating', 'rewrite' => array( 'slug' => 'movierating' ) ) );
      wp_insert_term( 'A+', 'ratingstax', array('slug' => 'aplus'));
      wp_insert_term( 'A', 'ratingstax', array('slug' => 'areg'));
      wp_insert_term( 'A-', 'ratingstax', array('slug' => 'aminus'));
      wp_insert_term( 'B+', 'ratingstax', array('slug' => 'bplus'));
      wp_insert_term( 'B', 'ratingstax', array('slug' => 'breg'));
      wp_insert_term( 'B-', 'ratingstax', array('slug' => 'bminus'));
      wp_insert_term( 'C+', 'ratingstax', array('slug' => 'cplus'));
      wp_insert_term( 'C', 'ratingstax', array('slug' => 'creg'));
      wp_insert_term( 'C-', 'ratingstax', array('slug' => 'cminus'));
      wp_insert_term( 'D+', 'ratingstax', array('slug' => 'dplus'));
      wp_insert_term( 'D', 'ratingstax', array('slug' => 'dreg'));
      wp_insert_term( 'D-', 'ratingstax', array('slug' => 'dminus'));
      wp_insert_term( 'F+', 'ratingstax', array('slug' => 'fplus'));
      wp_insert_term( 'F', 'ratingstax', array('slug' => 'freg'));
      wp_insert_term( 'F-', 'ratingstax', array('slug' => 'fminus'));
  }
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


function gsmn_segmenticon($segmentslug){
  switch ($segmentslug) {
      case 'casting':
          $gsmnicon = 'gsicon-casting';
          break;
      case 'eitheror':
          $gsmnicon = 'gsicon-eitheror';
          break;
      case 'gsmnawards':
          $gsmnicon = 'gsicon-oscar';
          break;
      case 'headlines':
          $gsmnicon = 'gsicon-newspaper';
          break;
      case 'monthlypreview':
          $gsmnicon = 'gsicon-monthly-preview';
          break;
      case 'moviereview':
          $gsmnicon = 'gsicon-film-reel';
          break;
      case 'theodds':
          $gsmnicon = 'gsicon-odds';
          break;
      case 'previewreview':
          $gsmnicon = 'gsicon-film-clip';
          break;
      case 'thumbsupthumbsdown':
          $gsmnicon = 'gsicon-thumbsup';
          break;
      case 'unsunghero':
          $gsmnicon = 'gsicon-unsunghero';
          break;
      case 'wherearethey':
          $gsmnicon = 'gsicon-wherenow';
          break;
      default:
          $gsmnicon = 'gsicon-film-clip';
    }
  return $gsmnicon;
}



function getTheRating($rating){
  $returnv = "";
  switch ($rating) {
    case 'aplus': $returnv = 'A+';break;
    case 'areg': $returnv = 'A';break;  
    case 'aminus': $returnv = 'A-';break;
    case 'bplus': $returnv = 'B+';break;
    case 'breg': $returnv = 'B';break;  
    case 'bminus': $returnv = 'B-';break;
    case 'cplus': $returnv = 'C+';break;
    case 'creg': $returnv = 'C';break;  
    case 'cminus': $returnv = 'C-';break;
    case 'dplus': $returnv = 'D+';break;
    case 'dreg': $returnv = 'D';break;  
    case 'dminus': $returnv = 'D-';break;
    case 'freg': $returnv = 'F';break;  
    case 'fminus': $returnv = 'F-';break;
    default: $returnv = 'NR';break;
  }
  return $returnv;
}