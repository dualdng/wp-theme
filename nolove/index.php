<?php get_header(); ?>
<article id='header'>
<h3><?php echo random_str ();?></h3>
<div class='content'>
<?php if(have_posts()) : ?> <!--确认是否有日志-->
<?php while(have_posts()) : the_post(); ?> <!--如果有，则显示全部日志-->
<div class='contentleft'>
<div class='article'>
<?php if(has_post_format('status')):?>
<div class='secret'>
<?php echo get_avatar(get_the_author_meta('ID'),60)?>
<div class='secret-content'>
<span><?php  the_author();?></span>
<a href=<?php the_permalink() ?>><?php the_content();?></a>
</div>
</div>
<?php elseif(has_post_format('image')):?>
<div class='post-image'>
<a href=<?php the_permalink() ?>><?php excerpt_image();?></a>
<?php the_excerpt();?>
</div> 
<?php elseif(has_post_format('video')):?>
<div class='post-video'>
<?php echo get_avatar(get_the_author_meta('ID'),60)?>
<div class='post-video-content'>
<span><?php  the_title();?></span>
<?php the_content();?>
</div>
</div>
<?php else:?>
<h2><a href='<?php the_permalink() ?>' ><?php the_title(); ?></a></h2>
<p class='tags'><?php the_date('Y-m-d'); ?>&nbsp<?php the_time('G:i'); ?>&nbsp|&nbsp<?php the_category(’, ‘) ?>&nbsp|&nbsp<?php comments_number( 'no responses', 'one response', '% responses' ); ?></p>

<?php if(has_excerpt()) : ?><!--判断是否有摘要-->
<?php excerpt_image();?>
<?php the_excerpt(); ?><!--显示摘要-->
<div class='readmore'>
<a href='<?php the_permalink() ?>' title='阅读全文'>ReadMore>></a>
</div>
<?php else: ?>
<?php the_content(); ?><!--没有则显示内容-->
<?php endif; ?>
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
