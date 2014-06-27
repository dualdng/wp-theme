<div id="slider" style="display: block;">

<div class="wrapper">
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>


<ul>

<div id="access">

<span class="default">

<li><a class="index active" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>首页</p><div></div></span></a></li>
<?php for($i=0;$i<5;$i++)
{?>
<li><a href="http://www.lolis.pw/archives/category/tp/dm"><span><p>动漫</p><div></div></span></a></li>
<li><a href="http://www.lolis.pw/archives/category/tp/dm"><span><p>动漫</p><div></div></span></a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>风景</p><div></div></span></a></li>
<?php };?>

<span>
<li>
<a href="javascript:void(0);" class="side_more"><span><p>更多</p><div>10</div></span></a>
<a href="11#" class="all">分类</a>
<ul class="animated fadeIn">
<span class="zip">
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>美女</p><div></div></span></a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>情感</p><div></div></span></a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>风景</p><div></div></span></a></li>

</span>
<div class="more_c">
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>创意</p><div></div></span></a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>物语</p><div></div></span></a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>其他</p><div></div></span></a></li>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>机械</p><div></div></span></a></li>

</div>
</ul>
</li>
</span></span></ul>

  <form method="get" action="<?php echo esc_url( home_url( '' ) )?>" target="_blank">            
  <input id="searchTextbox" class="search" size="4" name="s" placeholder='搜索'>             
   <button type="submit" name=""></button>    
   <?php get_search_form();?>

 </form>
</div>
</div>
