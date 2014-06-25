<link href="<?php echo get_template_directory_uri(); ?>/pic/pic.css" rel="stylesheet" type="text/css" />
<script src="<?php echo get_template_directory_uri(); ?>/pic/jquery-2.1.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/pic/jquery.masonry.min.js"></script>
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
//放到header.php中 尽量靠前
