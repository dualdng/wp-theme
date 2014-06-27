<?php include('header.php');
include('functions.php');
 ?>
<div id="wrapper">
<div id="bg"></div>
<div id="pagewrap">
<p id="back-top" style="display: block;"><a href="#top"><span></span></a></p>
<p id="cts" style="display: block;position: fixed; right: 0px; top: 50%; z-index: 9999; background: #e1e1e1;border:1px solid #c8c8c8;border-right-width:0;width: 30px;margin-top: -35px;border-top-left-radius: 4px;border-bottom-left-radius: 4px;"><a href="javascript:void(0);" style="color:#737373;display: block;width: 15px;text-align: center;margin: auto;height: 100%;padding: 15px 0;">反馈</a></p>

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

    <a href="<?php bloginfo('url'); ?>" class="active"><span>最新美图</span></a>
    <a href="javascript:void(0);" onclick='javascript:most_pop();'><span>热门排行</span></a>

  </div>
</div>

<ul class="pics">
<?php while( have_posts() ): the_post(); ?>
<li>

<div class="wrapper">
<?php echo hot_index();
	 ?>
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

