
<?php get_header(); ?>
<div id="detail" class="zoomScroll">
<div class="image"><div>
<div class="wrapper">
<div class="wrap">
<?php if(have_posts()) : ?> <!--确认是否有日志-->
<?php while(have_posts()) : the_post(); ?> 
<img src='<?php echo first_image();?>' />
	<?php endwhile; // end of the loop. ?>
	<?php else: ?>
	<p class='no_article'>没有文章</p>
	<?php endif; ?>
<div class="loading_indicator"><div></div></div>
</div>
<div class="action">
<div class="wrap">
<div style="float:left;">


<a href="<?php echo first_image();?>" class="down">下载</a>

<span></span>

</div>
<div style="float: right"></div> <div class="share">
<a href="#" style="color:#888;">分享至</a>
<a class="share_sina" href="#">
<span></span>
</a>
<a class="share_tencent" href="#">
<span></span>
</a>
</div>
<div class="put_comment item">
</div>
<div class="comment_action">
<span>评论</span>
<span class="indicator">
</span>
</div>
</div>
<?php
$current_category=get_the_category();//获取当前文章所属分类ID?
$prev_post=get_previous_post($current_category,'');//与当前文章同分类的上一篇
$next_post=get_next_post($current_category,'');//与当前文章同分类的下一篇文章???>
<span class="image prev">

<a href="<?php echo get_permalink($prev_post->ID);?>" class="post_navi leftflow"></a>

</span>
<span class="image next">

<a href="<?php echo get_permalink($next_post->ID);?>" class="post_navi rightflow"></a>

</span>
<a href='javascript:void(0);' onclick='single_close();'class="close"></a>
</div>

</div></div></div>
<div class="comments">

<div class="wrapper">
<?php comments_template( '', true ); ?>
<div class="loadmore" style="width:560px;margin-top:24px;margin-left:20px;"><span class="t"></span></div>
</div>

</div></div>
</div>
