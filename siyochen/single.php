<?php get_header();?>
<div id="log_content">
<div id="log_contentleft">
<?php if(have_posts()) : ?> <!--确认是否有日志-->
<?php while(have_posts()) : the_post(); ?> 
<div id='log_title'><h2><?php the_title(); ?></h2></div>
	<p class="date">Published on:<?php the_time('F j Y'); ?>&nbspby&nbsp<?php the_author();?><span>分类:<?php the_category(',') ?></span></p>
	<div class='log_content'>
	<?php the_content(); ?>		
	</div>
	<div class="nextlog"></div>
	<div id='ajax_comments'></div>
	<?php comments_template( '', true ); ?>
	<div style="clear:both;"></div>
	<?php endwhile; // end of the loop. ?>
	<?php else: ?>
	<p class='no_article'>没有文章</p>
	<?php endif; ?>
</div><!--end #contentleft-->
<?php get_sidebar();?>
<?php get_footer(); ?>
