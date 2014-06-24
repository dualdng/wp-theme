<?php if(has_post_format('status')):?>
<?php include('single-status.php');?>
<?php elseif(has_post_format('image')):?>
<?php include('single-image.php');?>
<?php else:?>
<?php include('single-standard.php');?>
<?php endif;?>
