<?php get_header(); ?>
<div id="wrapper">
<div id="bg"></div>
<div id="pagewrap">
<p id="back-top" style="display: block;"><a href="#top"><span></span></a></p>
<p id="cts" style="display: block;position: fixed; right: 0px; top: 50%; z-index: 9999; background: #e1e1e1;border:1px solid #c8c8c8;border-right-width:0;width: 30px;margin-top: -35px;border-top-left-radius: 4px;border-bottom-left-radius: 4px;"><a href="javascript:void(0);" style="color:#737373;display: block;width: 15px;text-align: center;margin: auto;height: 100%;padding: 15px 0;">反馈</a></p>
<?php get_sidebar(); ?>

<div id="content">
<div id="banner"><div>
</div></div>
<div id="personal">
<div class="info"></div>
<div class="device"></div>
</div>
<div id="list"><div>

<div class="nav">
  <div class="nav_wrapper">

    <a href="javascript:void(0);" onclick='javascript:new_pop();' class="new active"><span>最新美图</span></a>
    <a href="javascript:void(0);" onclick='javascript:most_pop();'class='more'><span>热门排行</span></a>

  </div>
</div>

<ul class="pics">
<?php while( have_posts() ): the_post(); ?>
<li>

<div class="wrapper">
<?php if(get_the_img()){
		echo '<div class="post-list-img"><a href="'.get_permalink().'" title="'.get_the_title().'">';
		the_img();
		echo '</a></div>';
	} ?>
</div>

<div class="info">
  <div style="float:left;">
    <span class="date">
      <span class="img"></span>
      <span class="t"><?php the_time( 'Y年m月d日' ); ?></span>
    </span>
  </div>
  <div style="float:right;">
    <span class="hot">
      <span class="img"></span>
      <span class="t"><?php echo getPostViews(get_the_ID()); ?></span>
    </span>
  </div>
</div>
</li>
<?php endwhile; ?>
</ul>

<ul class="pics-2" >
<?php query_posts("v_sortby=views&caller_get_posts=1&orderby=date&v_orderby=desc&showposts=10") ?>
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li>
<div class="wrapper">
      <div class='post-list-img'><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo first_image() ?></a></div>
</div>

<div class="info">
  <div style="float:left;">
    <span class="date">
      <span class="img"></span>
      <span class="t"><?php the_time( 'Y年m月d日' ); ?></span>
    </span>
  </div>
  <div style="float:right;">
    <span class="hot">
      <span class="img"></span>
      <span class="t"><?php echo getPostViews(get_the_ID()); ?></span>
    </span>
  </div>
</div>
</li>
<?php endwhile; ?>
<?php endif; ?>
</ul>

<div class="">

<span class="t"><?php pagenavi(); ?></span>
</div>


</div></div>


<div id="content">
<div id="banner"></div>
<div id="personal">
<div class="info"></div>
<div class="device"></div>
</div>
<div id="list"></div>
<div id="detail">
<div class="image"></div>
<div class="comments"></div>
</div>
<div id="account"></div>
<div id="link"></div>
<div id="app"></div>
<div id="howto"></div>
<div id="notFound"></div>
</div>

</div>
</div>
</div>

<?php get_footer(); ?>
