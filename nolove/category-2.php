<?php get_header(); ?>
<article id='header'>
<h3>勿忘心安</h3>
<div class='content'>
<?php if(have_posts()) : ?> <!--确认是否有日志-->
<?php while(have_posts()) : the_post(); ?> <!--如果有，则显示全部日志-->
<div class='contentleft'>
<div class='article'>
<?php if(in_category('secret')):?>
<div class='secret'>
<?php echo get_avatar(get_the_author_meta('ID'),60)?>
<div class='secret-content'>
<?php  the_author();?>
<?php the_content();?>
</div>
</div>
<?php endif;?>
</div>
</div>
<?php endwhile; ?> <!--结束PHP函数”while”-->
<?php endif; ?><!-- 结束PHP函数”if”-->
<div id='prenavi'><?php previous_posts_link(''); ?></div>
<div id='nextnavi'><?php next_posts_link(''); ?></div>
</div>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
