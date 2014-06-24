<?php 
get_header(); ?>
<div id="content">
<div id="contentleft">
<?php if(have_posts()) : ?> <!--确认是否有日志-->
<?php while(have_posts()) : the_post(); ?> <!--如果有，则显示全部日志-->
<div id='singlecontent'>
首页图片
<div id='contentpak'>
	<h2><a href='<?php the_permalink() ?>' ><?php the_title(); ?></a></h2>
	<?php if(has_excerpt()) : ?><!--判断是否有摘要-->
	<?php echo mb_substr(strip_tags(get_the_excerpt()),0,28,'utf-8').'...'; ?>
	<?php else:?>
	<?php echo mb_substr(strip_tags(get_the_content()),0,28,'utf-8').'...'; ?>
	<?php endif;?>
	<div class="date"><?php the_time('n-j'); ?><br /><?php the_time('l'); ?>
</div>
</div>
	<div style="clear:both;"></div>
</div>
<?php endwhile; ?> <!--结束PHP函数”while”-->
<?php endif; ?><!-- 结束PHP函数”if”-->
<div id='border'>&nbsp</div>
<div id="pagenavi">
<?php posts_nav_link('|','',''); ?>
</div>

</div><!-- end #contentleft-->
<?php get_footer(); ?>
