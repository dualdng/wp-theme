<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<article id='header'>
<h3><?php echo random_str ();?></h3>
<div class='content'>
<?php if(have_posts()) : ?> <!--确认是否有日志-->
<?php while(have_posts()) : the_post(); ?> <!--如果有，则显示全部日志-->
<div class='contentleft'>
<div class='article'>
<h2><a href='<?php the_permalink() ?>' ><?php the_title(); ?></a></h2>
<p class='tags'><?php the_date('Y-m-d'); ?>&nbsp<?php the_time('G:i'); ?>&nbsp|&nbsp<?php the_category(’, ‘) ?>&nbsp|&nbsp<?php comments_number( 'no responses', 'one response', '% responses' ); ?></p>

<?php if(has_excerpt()) : ?><!--判断是否有摘要-->
<?php the_excerpt(); ?><!--显示摘要-->
<div class='readmore'>
<a href='<?php the_permalink() ?>' title='阅读全文'>ReadMore>></a>
</div>
<?php else: ?>
<?php the_content(); ?><!--没有则显示内容-->
<?php endif; ?>
</div>
</div>
<?php endwhile; ?> <!--结束PHP函数”while”-->
<?php endif; ?><!-- 结束PHP函数”if”-->
<div id='pagenavi'><?php posts_nav_link('|','',''); ?></div>
</div>
</article>

				
<?php get_sidebar(); ?>
<?php get_footer(); ?>
