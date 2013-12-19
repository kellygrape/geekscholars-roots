<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  // Widgets
  register_widget('Roots_Vcard_Widget');
  register_widget('GSMN_MovieReviews_FiveRecent');
}
add_action('widgets_init', 'roots_widgets_init');


class GSMN_MovieReviews_FiveRecent extends WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)'
  );
  function __construct() {
    $widget_ops = array('classname' => 'widget_gsmn_reviews_fiverecent', 'description' => __('This widget lists the five most recently reviewed movies and their ratings', 'gsmn'));

    $this->WP_Widget('widget_gsmn_recent5reviews', __('GSMN: 5 Recent Reviews', 'gsmn'), $widget_ops);
    $this->alt_option_name = 'widget_gsmn_recent5reviews';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }
  function widget($args, $instance) {
    $cache = wp_cache_get('widget_gsmn_recent5reviews', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recently Reviewed', 'roots') : $instance['title'], $instance, $this->id_base);

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
    // THIS IS THE ACTUAL PLACE WHERE THE WIDGET IS CREATED
    global $post;
    $args = array( 'category_name' => 'movie-reviews', 'posts_per_page' => 5, 'orderby' => 'date', 'order' => 'DESC' );
    $myposts = get_posts( $args ); ?>
    <ul class="recent5reviews">
    <?php foreach( $myposts as $post ) :  setup_postdata($post); ?>
    <?php $thegrade = get_field('movie_grade');  ?>
    <li><a href="<?php the_permalink(); ?>" class="<?php echo $thegrade[0]->slug; ?>"><span class="grade"><?php echo $thegrade[0]->name; ?></span><?php the_title(); ?></a></li>
	  <?php 
	  endforeach; ?>
    </ul> 
    <?php
	  // AND THIS IS WHAT IS AFTER THE WIDGET
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_gsmn_recent5reviews', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_gsmn_recent5reviews'])) {
      delete_option('widget_gsmn_recent5reviews');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_gsmn_recent5reviews', 'widget');
  }
  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}
/**
 * Example vCard widget
 */
 
class Roots_Vcard_Widget extends WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)',
    'street_address' => 'Street Address',
    'locality'       => 'City/Locality',
    'region'         => 'State/Region',
    'postal_code'    => 'Zipcode/Postal Code',
    'tel'            => 'Telephone',
    'email'          => 'Email'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_roots_vcard', 'description' => __('Use this widget to add a vCard', 'roots'));

    $this->WP_Widget('widget_roots_vcard', __('Roots: vCard', 'roots'), $widget_ops);
    $this->alt_option_name = 'widget_roots_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_roots_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
    <p class="vcard">
      <a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
      <span class="adr">
        <span class="street-address"><?php echo $instance['street_address']; ?></span><br>
        <span class="locality"><?php echo $instance['locality']; ?></span>,
        <span class="region"><?php echo $instance['region']; ?></span>
        <span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
      </span>
      <span class="tel"><span class="value"><?php echo $instance['tel']; ?></span></span><br>
      <a class="email" href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
    </p>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_roots_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_roots_vcard'])) {
      delete_option('widget_roots_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_roots_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}



// WIDGET
add_action( 'widgets_init', 'segment_list_widget' );
function segment_list_widget() {
	register_widget( 'SegmentsListWidget' );
}

class SegmentsListWidget extends WP_Widget {

	function SegmentsListWidget() {
		$widget_ops = array( 'classname' => 'segment-list-widget', 'description' => __('A widget that displays the authors name ', 'segment-list-widget') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'segment-list-widget' );
		
		$this->WP_Widget( 'segment-list-widget', __('Segment List Widget', 'segment-list-widget'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
			
		echo('<ul class="segment-widget-list">');	
		
		//Display the segments
    $segments = get_terms('segmenttax');
    foreach($segments as $segment) {
      $segmentedposts = new WP_Query(array(
        'post_type' => 'post',
        'post_per_page'=>-1,
        'taxonomy'=>'segmenttax',
        'term' => $segment->slug,
      ));
    $link = get_term_link(intval($segment->term_id),'segmenttax');
    ?>
        <li>
        <a href="<?php echo($link); ?>">
        <i class="segment-icon-fa <?php echo(gsmn_segmenticon($segment->slug)); ?>"></i> 
        <?php echo($segment->name); ?>
        </a>
        </li>
    <?php
    }
    echo('</ul>');
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('', 'segment-list') );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'segment-list'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>This widget will show a list of all the segments that you have created, and their icons.  No further customization is needed.</p>

		
<?php
	}
}


