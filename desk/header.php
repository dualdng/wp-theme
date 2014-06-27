<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet", href="<?php echo get_template_directory_uri(); ?>/css/index.css">
<script src='<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.0.min.js'></script>
<script src='<?php echo get_template_directory_uri(); ?>/js/main.js'></script>
<title>光点壁纸</title>
<meta name="keywords" content="<?php echo get_option('mytheme_keywords'); ?>" /> 
<meta name="description" content="<?php echo get_option('mytheme_description'); ?>" />
<style type="text/css">
#list li:hover .action{
display: none !important;
}
#list .action {
display: none !important;
}
</style>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="scree" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	
<?php wp_head();?>
</head>

<body id="top">
<div id="header"><div class="wrapper"><ul>
  <li class="brand"><a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a></li>
  <li class="index"><a class="active" href="<?php echo esc_url( home_url( '/' ) ); ?>">首页</a></li>
  <li class="app"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/app" class="">客户端</a></li> <li style="position:absolute;top:25px;right:20px;"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">投稿聚乐部</a></li>
</ul></div>
</div>
