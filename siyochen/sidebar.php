﻿<div id='sidebar'><div class='widget'><div class='author'><p>about</p><img src='<?php echo get_template_directory_uri(); ?>/images/author.jpg'><p>Tinty(胡桃小泽梅),伪漫迷、伪长跑爱好者、影迷、空想者、白日梦者及为公务猿服务者。</p>未完待续</div><!--<div class='cate'><p class='side_title'>Categories</p><?php wp_list_categories('hide_empty=0&show_count=1&style=none'); ?></div>--><div class='tag'><p>Tags</p><div class='tag_in'><?php wp_tag_cloud('number=30'); ?></div></div><!--<div class='achieve'><p class='side_title'>Achieves</p> <?php wp_get_archives('format=html'); ?></div>--><div class='rand_article'><p>RandPosts</p><div class='randarticle_in'><?php $rand_posts = get_posts('numberposts=6&orderby=rand');foreach( $rand_posts as $post ) : ?><li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li><?php endforeach; ?></div></div><div class='friends'><p>Friends</p><div class='friends_in'><?php wp_list_bookmarks('title_li=&categorize=0');?></div></div></div></div>
