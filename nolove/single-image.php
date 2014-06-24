<?php
get_header(); ?>
	<article id='header' >
	<a href='<?php bloginfo('url'); ?>'>首页</a>&nbsp>>&nbsp<?php the_category(’, ‘) ?>&nbsp>>&nbsp<a href='<?php the_permalink() ?>' ><?php the_title(); ?></a>
		<div class='content'>
			<?php if(have_posts()) : ?> <!--确认是否有日志-->
			<?php while(have_posts()) : the_post(); ?> 
			<div class='contentleft'>
			<div class='article'>
			<h2>美图时刻</h2>
			<?php the_content(); ?>		
			
			</div>
			
			<?php endwhile; // end of the loop. ?>
			<?php else: ?>
			<p class='no_article'>没有文章</p>
			<?php endif; ?>
			</div>
			<div class='related'>猜你喜欢</div>
			<div class='single_author'>
			<!-- 该分类下的相关文章 -->
<ul id="cat_related">
<?php
$cats = wp_get_post_categories($post->ID);
if ($cats) {
$cat = get_category( $cats[0] );
$first_cat = $cat->cat_ID;
$args = array(
        'category__in' => array($first_cat),
        'post__not_in' => array($post->ID),
        'showposts' => 4,
        'caller_get_posts' => 1);
query_posts($args);
if (have_posts()) : 
		while (have_posts()) : the_post(); update_post_caches($posts); ?>
		<div class="image-wrap">
		 <div class="hover-wrap">
                    <span class="overlay-img"></span>
					<span class="overlay-text-thumb"><a href=<?php the_permalink();?>><?php the_title();?></a></span>
					</div>
				<?php echo catch_that_image()?>
            </div>
<?php endwhile; else : ?>
<li>* 暂无相关文章</li>
<?php endif; wp_reset_query(); } ?>
</ul>
<!--该分类下的相关文章end-->
			</div>
			
			<p class='comments_number'>
  This post currently has
  <?php comments_number( 'no responses', 'one response', '% responses' ); ?>.
</p>
			<?php comments_template( '', true ); ?>
		</div><!-- #content -->
	</article><!-- #primary -->

<?php get_footer(); ?>
