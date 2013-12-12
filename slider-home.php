<?php if(get_field('homepage_slider')):while(has_sub_field('homepage_slider')): ?>
<?php the_sub_field('slider_image'); ?>
<?php the_sub_field('slider_caption'); ?>
<?php endwhile; endif; ?>
