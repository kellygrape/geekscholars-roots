<?php while(has_sub_field('segment')): ?>
<?php $term = get_term_by('id',get_sub_field('segment_type'),'segmenttax'); ?>
  <?php $gsmnicon = ""; ?>
  <?php switch ($term->slug) {
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
  ?>
  <button data-toggle="tooltip" title="<?php the_sub_field('segment_description'); ?>"><i class="segment-icon-fa <?php echo($gsmnicon); ?>"></i></button>
<?php endwhile; ?>