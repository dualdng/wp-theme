<div class='sidebar'>
<div class='widget'>
<div class='author'>
<p>about</p>
<?php echo get_avatar('1',100);?>
<span><?php the_author_meta('nickname','1');?></span>
<p><?php the_author_meta('description','1');?></p>
</div><!--<div class='cate'><p class='side_title'>Categories</p>
<?php wp_list_categories('hide_empty=0&show_count=1&style=none'); ?>
</div>-->
<div class='tag'>
<p>Tags</p>
<div class='tag_in'>
<?php wp_tag_cloud('number=30'); ?>
</div>
</div><!--<div class='achieve'><p class='side_title'>Achieves</p> 
<?php wp_get_archives('format=html'); ?></div>-->
<div class='rand_article'>
<p>RandPosts</p>
<div class='randarticle_in'>
<?php $rand_posts = get_posts('numberposts=6&orderby=rand');foreach( $rand_posts as $post ) : ?>
<li>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>
<?php endforeach; ?>
</div>
</div>
<div class='friends'>
<p>Friends</p>
<div class='friends_in'>
<?php wp_list_bookmarks('title_li=&categorize=0');?>
</div>
</div>
</div>
</div>
