﻿ <!DOCTYPE html >
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
<title><?php if (is_home()) : ?> <?php bloginfo('name'); ?>|<?php bloginfo('description')?> <?php else: ?><?php wp_title(''); ?><?php endif;?></title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/zhanglu.js'></script>	
	<script type="text/javascript" src='<?php echo get_template_directory_uri(); ?>/phzoom/phzoom.js'></script>
    <link href='<?php echo get_template_directory_uri(); ?>/phzoom/phzoom.css' rel="stylesheet" type="text/css" />
	

<!--[if lt IE 8]>
<script>    
{    
alert("Please Upgrade [?!!IE6!!?] versions!"); 
location.href="<?php echo get_template_directory_uri(); ?>/ie/ie.html"; 
}    
</script>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>

<body>

<nav class="animenu">	
    <input type="checkbox" id="button">
    <label for="button" onclick>Menu</label>
	<a href="#" title="Login" id='login' onclick='login();return false'><span class="icon-bookmark"></span></a>
	<!--前台登录-->
<div id="log">
<?php if (!(current_user_can('level_0'))){ ?>
<form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
<input type="text" name="log" class="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="18" />
<input type="password" name="pwd" class="pwd" size="18" />
<input type="submit" name="submit" value="登录" class="button" />
<!--<label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />记住我</label>-->
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
<?php if ( get_option('users_can_register') ){?> 
<a href="<?php bloginfo('url'); ?>/wp-register.php">注 册</a> 
<?php } ?>
<!--<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">忘密码</a>-->
</form>
<?php } else { ?>
<strong>
<?php global $current_user;?>
<a href="<?php bloginfo('url'); ?>/wp-admin/profile.php"><?php echo $current_user->display_name;?></a>
<a href="<?php bloginfo('url'); ?>/wp-admin/">后台</a>
<a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php">发布</a>
<a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title="logout">退出</a>
</strong>
<?php }?>
</div>
<!--前台登录结束  -->
	<a href='#' onclick='scroll();return false' id='brague'>BRAGUE</a>

	
	<ul>
		<li>
			<a href="http://www.uuuuj.com/about">一块板</a>
		</li>
		<li>
			<a href="#">豆瓣</a>
			<ul>
				<li><a href="http://www.uuuuj.com/archives/10">电台</a></li>
				<li><a href="http://www.uuuuj.com/archives/136">电影</a></li>
			</ul>
		</li>
		<li>
			<a href="http://www.uuuuj.com/archives/category/words">碎语</a>
			<ul>
				<li><a href="http://www.uuuuj.com/archives/category/lovez">只一个人</a></li>
				<li><a href="http://www.uuuuj.com/archives/category/music">音乐</a></li>
				<li><a href="http://www.uuuuj.com/archives/category/movies">电影</a></li>
				<li><a href="http://www.uuuuj.com/archives/category/re-post">转载</a></li>
				<li><a href="http://www.uuuuj.com/archives/category/themes">主题</a></li>
				<li><a href="http://www.uuuuj.com/archives/category/nostudy">笔记</a></li>
			</ul>
		</li>
		<li>
			<a href="<?php bloginfo('url'); ?>">首页</a>
		</li>						
	</ul>
</nav>

<?php if(is_home()): ?>
<div class='top'>
<H1><?php bloginfo(’name’); ?></H1>
</div>
<?php else: ?>
<div class='top2'>
<H1><?php bloginfo(’name’); ?></H1>
</div>
<?php endif; ?>
<div class='scroll-arrow'><a class='scroll' href='#' onclick='scroll();return false'><img src='<?php echo get_template_directory_uri(); ?>/images/plain_plus.svg' /></a></div>

