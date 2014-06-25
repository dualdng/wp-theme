<?php get_header(); ?>
<div class='pic-content'>
<?php if(have_posts()) : ?> <!--确认是否有日志-->
<?php $posts = query_posts($query_string.'&orderby=date&showposts=20');  /* 每页显示20条 */ ?>
<?php while(have_posts()) : the_post(); ?> <!--如果有，则显示全部日志-->
<div class='pic-contentleft'>
<a href='<?php the_permalink() ?>'><?php echo first_image();?></a>
<div id='other'>
<div id='imgtag'>
<div class='imgtags'>
<span>&nbsp<?php the_author();?>&nbsp收录在&nbsp<?php the_category(' ');?></span><br />
<span>&nbsp<?php the_tags();?></span>
</div>
</div>
<div id='title'><?php the_title(); ?></div>
</div>
</div>
<?php endwhile; ?> <!--结束PHP函数”while”-->
<?php endif; ?><!-- 结束PHP函数”if”-->
<div id='prenavi'><?php previous_posts_link(''); ?></div>
<div id='nextnavi'><?php next_posts_link(''); ?></div>
</div>
<?php get_footer(); ?>
