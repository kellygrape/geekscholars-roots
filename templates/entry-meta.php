<div class="entry-meta clearfix">
<time class="published pull-left" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<p class="byline author vcard pull-right"><?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
</div>