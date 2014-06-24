<?php
/**
* 这个文件是从根目录下拷贝过来的comment-posts.php文件，主要功能就是提交评论，同时增加了显示出结果的功能。
*/
if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
header('Allow: POST');
header('HTTP/1.1 405 Method Not Allowed');
header('Content-Type: text/plain');
exit;
}
/** Sets up the WordPress Environment. */
require( dirname(__FILE__) . '/../../../../wp-load.php' ); //修改load.php地址
nocache_headers();
$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;
$post = get_post($comment_post_ID);
if ( empty($post->comment_status) ) {
do_action('comment_id_not_found', $comment_post_ID);
exit;
}
// get_post_status() will get the parent status for attachments.
$status = get_post_status($post);
$status_obj = get_post_status_object($status);
if ( !comments_open($comment_post_ID) ) {
do_action('comment_closed', $comment_post_ID);
wp_die( __('Sorry, comments are closed for this item.') );
} elseif ( 'trash' == $status ) {
do_action('comment_on_trash', $comment_post_ID);
exit;
} elseif ( !$status_obj->public && !$status_obj->private ) {
do_action('comment_on_draft', $comment_post_ID);
exit;
} elseif ( post_password_required($comment_post_ID) ) {
do_action('comment_on_password_protected', $comment_post_ID);
exit;
} else {
do_action('pre_comment_on_post', $comment_post_ID);
}
$comment_author = ( isset($_POST['author']) ) ? trim(strip_tags($_POST['author'])) : null;
$comment_author_email = ( isset($_POST['email']) ) ? trim($_POST['email']) : null;
$comment_author_url = ( isset($_POST['url']) ) ? trim($_POST['url']) : null;
$comment_content = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;
// If the user is logged in
$user = wp_get_current_user();
if ( $user->ID ) {
if ( empty( $user->display_name ) )
$user->display_name=$user->user_login;
$comment_author = $wpdb->escape($user->display_name);
$comment_author_email = $wpdb->escape($user->user_email);
$comment_author_url = $wpdb->escape($user->user_url);
if ( current_user_can('unfiltered_html') ) {
if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
kses_remove_filters(); // start with a clean slate
kses_init_filters(); // set up the filters
}
}
} else {
if ( get_option('comment_registration') || 'private' == $status )
wp_die( __('Sorry, you must be logged in to post a comment.') );
}
$comment_type = '';
if ( get_option('require_name_email') && !$user->ID ) {
if ( 6 > strlen($comment_author_email) || '' == $comment_author )
wp_die( __('<strong>ERROR</strong>: please fill the required fields (name, email).') );
elseif ( !is_email($comment_author_email))
wp_die( __('<strong>ERROR</strong>: please enter a valid email address.') );
}
if ( '' == $comment_content )
wp_die( __('<strong>ERROR</strong>: please type a comment.') );
$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
$comment_id = wp_new_comment( $commentdata );
$comment = get_comment($comment_id);
if ( !$user->ID ) {
$comment_cookie_lifetime = apply_filters('comment_cookie_lifetime', 30000000);
setcookie('comment_author_' . COOKIEHASH, $comment->comment_author, time() + $comment_cookie_lifetime, COOKIEPATH, COOKIE_DOMAIN);
setcookie('comment_author_email_' . COOKIEHASH, $comment->comment_author_email, time() + $comment_cookie_lifetime, COOKIEPATH, COOKIE_DOMAIN);
setcookie('comment_author_url_' . COOKIEHASH, esc_url($comment->comment_author_url), time() + $comment_cookie_lifetime, COOKIEPATH, COOKIE_DOMAIN);
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<li class="comment-ajax-add">
<div id="comment-<?php comment_ID() ?>" class="comment-box">
<?php echo get_avatar($comment,$size='50'); ?>
<div class="comment-content">
<div class="comment-info">
<span><?php echo get_comment_author_link(); ?></span>
<span><?php echo get_comment_date('Y/m/d '); ?></span>
<span><?php echo get_comment_time('H:i:s'); ?></span>
<span class="float-right"><?php edit_comment_link('编辑','','') ?></span>
</div>
<div class="comment-text">
<?php comment_text(); ?>
</div>
<?php if ($comment->comment_approved == '0')printf('<div class="approve">%s</div>','您的见解正在审核中，很快就会出现在评论列表~~'); ?>
</div>
</div>
</li>