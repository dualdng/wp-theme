<?php get_header(); ?>
<div id="wrapper">
<div id="bg"></div>
<div id="pagewrap">
<p id="back-top" style="display: block;"><a href="#top"><span></span></a></p>
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
<?php 
		echo '<div class="post-list-img"><a href="'.get_permalink().'" title="'.get_the_title().'">';
		the_img();
		echo '</a></div>';
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
      <span class="t"><?php post_views(' ', ' ');?></span>
    </span>
  </div>
</div>
</li>
<?php endwhile; ?>
</ul>

<ul class="pics-2" >
<?php 
function mostmonth($where = '') {
		    //获取最近30天文章
			    $where .= " AND post_date > '" . date('Y-m-d', strtotime('-5000 days')) . "'";
				    return $where;
}
add_filter('posts_where', 'mostmonth'); ?>
<?php query_posts("v_sortby=views&caller_get_posts=1&orderby=date&v_orderby=desc&showposts=5") ?>
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li>
<div class="wrapper">
      <div class='post-list-img'><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src='<?php echo first_image() ?>'/></a></div>
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
      <span class="t"><?php post_views(' ', ' ');?></span>
    </span>
  </div>
</div>
</li>
<?php endwhile; ?>
<?php endif; ?>
</ul>

<div class="pagenavi">

<span class="t"><?php pagenavi(); ?></span>
</div>


</div></div>



</div>
</div>
</div>

<?php get_footer(); ?>
