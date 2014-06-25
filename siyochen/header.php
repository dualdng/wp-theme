<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta  charset='utf-8'/>
<title><?php if (is_home()) : ?><?php bloginfo('name'); ?>|<?php bloginfo('description')?><?php else: ?><?php wp_title(''); ?><?php endif;?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/pic/pic.css" rel="stylesheet" type="text/css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/unslider.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/pic/jquery.masonry.min.js"></script>
<script>$(function() {
    $('.sideshow').unslider({speed: 500,               //  The speed to animate each slide (in milliseconds)
	delay: 300000000000000,              //  The delay between slide animations (in milliseconds)
	complete: function() {},  //  A function that gets called after every slide animation
	keys: true,               //  Enable keyboard (left, right) arrow shortcuts
	dots: true,               //  Display dot navigation
	fluid: false              //  Support responsive design. May break non-responsive designs
});
});
</script>
<script>
$(function(){
	var $container = $('.pic-content');
	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : '.pic-contentleft',
			gutterWidth : 20,
			isAnimated: true,
		});
	});
});
</script>
<!--[if  lte IE 9]>
<link href='<?php echo get_template_directory_uri(); ?>/ie.css' rel='stylesheet'/>
<![endif]-->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body>
  <div id="banner"><a href="<?php bloginfo('url'); ?>"><img src='<?php echo get_template_directory_uri(); ?>/images/author.jpg' /></a></div>
<div id="header">
    <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
    <h3><?php echo 'bloginfo'; ?></h3>
  </div>
<div id="wrap">
  <div id="nav">
  				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  </div>
  <div class='sideshow'>
<ul>
<?php
/*$array=top_img();
$num=count($array);
for($i=0;$i<$num;$i++)
{
		echo '<li>';
		echo '<span class=\'top_img\'>'.$array[$i][0].'</span>';
		echo '<div class=\'top_else\'>';
		echo '<h1>'.$array[$i][2].'</h1>';
		echo '<a class=\'btn\' href=\''.BLOG_URL.'/?post='.$array[$i][3].'\'>Learn More -></a>';
		echo '</div>';
		echo '</li>';
}
*/
?>
</ul>
<div id='sawtooth'>
<img src='<?php echo get_template_directory_uri(); ?>/images/sawtooth.png' />
</div>
</div>

