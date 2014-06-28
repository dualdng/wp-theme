<div id="slider" style="display: block;">

<div class="wrapper">
<?/**php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); **/?>


<ul>

<div id="access">

<span class="default">

<li><a class="index active" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><p>首页</p><div></div></span></a></li>
		<?php
		$tags = get_tags();
		$num=count($tags);
		for($i=0;$i<5;$i++)
		{
					$tag_link = get_tag_link( $tags[$i]->term_id );
								
									$html = "<li><a href='{$tag_link}' title='{$tags[$i]->name} Tag' class='{$tags[$i]->slug}'><span><p>";
										$html .= "{$tags[$i]->name}</p><div></div></span></a></li>";
		echo $html;
		}
					?>

<span>
<li>
<a href="javascript:void(0);" class="side_more"><span><p>更多</p><div><?php echo $num-5;?></div></span></a>
<a href="11#" class="all">分类</a>
<ul class="animated fadeIn">
<span class="zip">
</span>
<div class="more_c">
<?php
		$tags = get_tags();
		$num=count($tags);
		for($a=5;$a<$num;$a++)
		{
					$tag_link = get_tag_link( $tags[$a]->term_id );
								
									$html = "<li><a href='{$tag_link}' title='{$tags[$a]->name} Tag' class='{$tags[$a]->slug}'><span><p>";
										$html .= "{$tags[$a]->name}</p><div>{$tags[$i]->count}</div></span></a></li>";
		echo $html;
		}
					?>


</div>
</ul>
</li>
</span></span></ul>

  <form method="get" action="<?php echo esc_url( home_url( '' ) )?>" target="_blank">            
  <input id="searchTextbox" class="search" size="4" name="s" placeholder='搜索'>             
   <button type="submit" name=""></button>    

 </form>
</div>
</div>
