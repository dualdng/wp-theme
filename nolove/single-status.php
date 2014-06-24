<?php
get_header(); ?>
	<article id='header' >
	<a href='<?php bloginfo('url'); ?>'>首页</a>&nbsp>>&nbsp<?php the_category(’, ‘) ?>&nbsp>>&nbsp<a href='<?php the_permalink() ?>' ><?php the_title(); ?></a>
		<div class='content'>
			<?php if(have_posts()) : ?> <!--确认是否有日志-->
			<?php while(have_posts()) : the_post(); ?> 
			<div class='contentleft'>
			<div class='article'>
			<div class='secret'>
<?php echo get_avatar(get_the_author_meta('ID'),60)?>
<div class='secret-content'>
<span><?php  the_author();?></span>
<a href=<?php the_permalink() ?>><?php the_content();?></a>
</div>
</div>
</div>

			<?php endwhile; // end of the loop. ?>
			<?php else: ?>
			<p class='no_article'>没有文章</p>
			<?php endif; ?>
			</div>
					<p class='comments_number'>
  This post currently has
  <?php comments_number( 'no responses', 'one response', '% responses' ); ?>.
</p>
			<?php comments_template( '', true ); ?>
		</div><!-- #content -->
	</article><!-- #primary -->

<?php get_footer(); ?>
