<?php add_filter( 'pre_option_link_manager_enabled', '__return_true' ); /***后台增加链接选项 ***//**评论样式**/
 function mytheme_comment($comment, $args, $depth)
{		
		$GLOBALS['comment'] = $comment;		
extract($args, EXTR_SKIP);		
if ( 'div' == $args['style'] ) 
{		$tag = 'div';			
		$add_below = 'comment';		
} 
else 
{			
		$tag = 'li';			
		$add_below = 'div-comment';		
}?>		
<<?php echo $tag ?><?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?>id="comment-<?php comment_ID() ?>">		
<?php if ( 'div' != $args['style'] ) : ?>		
<div id="div-comment-<?php comment_ID() ?>" class="comment-body">		
<?php endif; ?>		
<div class="comment-author vcard">		
<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>		
</div>
<?php if ($comment->comment_approved == '0') : ?>		
<em class="comment-awaiting-moderation">
<?php _e('Your comment is awaiting moderation.') ?>
</em>		
<br />
<?php endif; ?>		
<div class="comment-meta commentmetadata">
<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php
/* translators: 1: date, 2: time */
  printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
</a>
<?php edit_comment_link(__('(Edit)'),'  ','' );			?>			
<?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>		
</div>		
<?php comment_text() ?>		
<div class="reply">		
<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>		
</div>		
<?php if ( 'div' != $args['style'] ) : ?>		
</div>		
<?php endif; ?>

<?php        
}
 /** 获取文章第一张图片 **/ function first_image() 
{  
		global $post, $posts;  
		$first_img = '';  
		ob_start();  
		ob_end_clean();  
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);  
				$first_img = $matches [1] [0]; 
if(empty($first_img))
{   
		$first_img = '<img src="'.get_bloginfo('template_url').'/images/top1.jpg"/>';   
} 
else
{ 
		$first_img = '<img src="'.$first_img.'"/>'; }  
		return $first_img;    
}
 /**excerpt images  **/ function excerpt_image() 
{  
		global $post, $posts;  
		$first_img = '';  
		ob_start();  
		ob_end_clean();  
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);  
				$first_img = $matches [1] [0]; 
if(empty($first_img))
{   
		return false;
} 
else
{ 
		$first_img = '<img src="'.$first_img.'"/>'; }  
		echo $first_img;    
} ?>
<?php add_filter( 'show_admin_bar', '__return_false' );/**隐藏admin 导航条**/ ?>
<?php function BYMT_rand_bg () 
{
		$randbg = mt_rand(1, 5); /*背景图片随机数*/
		$randbgurl = get_bloginfo('template_directory').'/images/top'.$randbg.'.jpg'; /*背景图片地址*/
		echo'<style>body{background: url('.$randbgurl.');background-size:100%;background-attachment:fixed;}</style>'."\n";
}
add_action('wp_head', 'BYMT_rand_bg', 100);?>
<?php /** 随即电影台词 **/function random_str () 
{ 
		$poems="生活就像巧克力,你永远不会知道你会得到什么\r
人生不能象做菜,把所有的料都准备好了才下锅\r
星星在哪里都是很亮的,就看你有没有抬头去看他们\r
世界上总有一半人不理解另一半人的快乐\r
你以为我穷.不漂亮,就没有感情吗?如果上帝赐给我美貌和财富,我也会让你难于离开我的!就象我现在难于离开你一样\r
什么是权利?当一个人犯了罪,法官依法判他死刑.这不叫权利,这叫正义.而当一个人同样犯了罪,皇帝可以判他死刑,也可以不判他死刑,于是赦免了他,这就叫权利!\r
上帝会把我们身边最美好的东西拿走,以提醒我们得到的太多\r
牵着你的手,就象左手牵右手没感觉,但砍下去也会痛!(爱情的终结)\r
我们要学会珍惜我们生活的每一天,因为,这每一天的开始,都将是我们余下生命之中的第一天,除非我们即将死去\r
快回火星吧,地球上是很危险滴!\r
我听别人说这世界上有一种鸟是没有脚的,它只能一直飞呀飞呀,飞累了就在风里面睡觉,这种鸟一辈子只能下地一次,那一次就是它死亡的时候\r
出来混，迟早是要还的\r
如果感情可以分胜负的话,我不知道她是否会赢,但是我很清楚,从一开始,我就输了!\r
生命中充满了巧合,两条平行线也会有相交的一天\r
这个世界上没有坏人,只有买卖人\r
我要你知道.这个世界上有一个人会永远等着你.无论什么时候,无论你在什么地方,反正你知道总会有这样一个人\r
每天你都有很多机会和很多人擦肩而过.有些人可能变成你的朋友或知己.所以我从来没有放弃和任何人擦肩而过的机会.有的时候搞的自己头破血流.管他呢!开销就行了\r
一个时代结束了,属于那个时代的一切都不复存在\r
做人如果没有梦想,那和咸鱼有什么区别?\r
不要相信漂亮女人,尤其是不穿衣服的女人\r
有些鸟儿是不能关在笼子里的，它们的羽毛太漂亮了。当它们飞走的时候，你会觉得把它们关起来欣赏是种罪恶。但是它们不在了，定会让你感到寂寞\r
恐惧让你沦为囚犯,希望让你重获自由,坚强的人只能救赎自己,伟大的人才能拯救别人.记着,希望是件好东西,而且从没有一样好东西会消逝.忙活,或者等死\r
世界上最远的距离不是生和死,而是我站在你的面前却不能说:我爱你\r
小时候,同学们都走了, 我仍独坐在操场,想已逝去的母亲.我忽然明白,我们最终都会消失:父亲,姐姐,所有的好朋友\r
人生本就是苦还是只有童年苦?生命就是如此\r
成功的含义不在于得到什么,而是在于你从那个奋斗的起点走了多远\r
一个人杀了一个人,他是杀人犯.是坏人,当一个人杀了成千上万人后,他是英雄,是大好人\r
你知道吗？我一直都在骗你。骗就骗吧，就象飞蛾一样明知道会受伤，还是会飞向火去，飞蛾就这么傻\r
生活这条狗啊，追的我连从容撒泡尿的时间都没有\r
不要恨你的对手,那样会影响你的判断力,永远不要让别人知道你在想什么\r
你是英雄吗?不是,可是我正和英雄们一起服役\r
每天你都有机会与别人擦肩而过.你对他也许一无所知.不过也许有一天,他会变成你的朋友或知己\r
我开始怀疑，在这个世界上，还有什么东西是不会过期的？\r
一个职业军人的适当归宿是在最后一场战被最后一颗子弹击中而干净利落的死去\r
人生没有彩排,每天都是现场直播\r
一边是平常的现实.一边是美丽的谎言.你选哪一样呢?\r
我不相信有天堂,因为我被困在这个地狱的时间太长了!\r
真相是一种美丽又可怕的东西,需要格外谨慎地对待\r
敬仰天上的神名,热爱自己的女人,保护自己的国家\r
不记得也好,忘却也是幸福\r
有一种爱,它一直存在,无论你忽视也好,淡忘也好,它总是在那里静静的守护\r
如果你不能为你心爱的女人穿上嫁衣，就请你停下解她衣扣的手\r
我拼命读书为了将来,谁知道没有将来!\r
失去了的东西永远不会再回来!\r
爱，就是永远也用不着说对不起!\r
这世上只有两种人，骗人的和被骗的\r
生活不是电影，电影比生活苦\r
纷乱人世间,除了你一切繁华都是背景.这出戏用生命演下去,付出的青春不可惜\r
天地与我并生,万物与我唯一\r
高层社会是建立在贫穷和无知上的\r
我们太快的相识,太快的接吻,太快的发生关系,然后又太快的厌倦对方!\r
我们藏族人吃肉刀口是对着自己的\r
我们中国有句话, 叫做早死早脱生,这辈子过不好还有下辈子,轮回转世,坏事变好事\r
你是唯一个说我还不够好的人，但我永远都不会承认\r
Once in a while，someone comes along and changes everything you believe about yourself.";
		$poems=explode("\r",$poems); 
		return $poems[rand(0,count($poems)-1)]; 
} ?>
<?php
add_action('wp_ajax_nopriv_ajax_comment', 'ajax_comment');
add_action('wp_ajax_ajax_comment', 'ajax_comment');
function ajax_comment(){
    global $wpdb;
    $comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;
    $post = get_post($comment_post_ID);
    if ( empty($post->comment_status) ) {
        do_action('comment_id_not_found', $comment_post_ID);
        ajax_comment_err(__('Invalid comment status.'));
    }
    $status = get_post_status($post);
    $status_obj = get_post_status_object($status);
    if ( !comments_open($comment_post_ID) ) {
        do_action('comment_closed', $comment_post_ID);
        ajax_comment_err(__('Sorry, comments are closed for this item.'));
    } elseif ( 'trash' == $status ) {
        do_action('comment_on_trash', $comment_post_ID);
        ajax_comment_err(__('Invalid comment status.'));
    } elseif ( !$status_obj->public && !$status_obj->private ) {
        do_action('comment_on_draft', $comment_post_ID);
        ajax_comment_err(__('Invalid comment status.'));
    } elseif ( post_password_required($comment_post_ID) ) {
        do_action('comment_on_password_protected', $comment_post_ID);
        ajax_comment_err(__('Password Protected'));
    } else {
        do_action('pre_comment_on_post', $comment_post_ID);
    }
    $comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
    $comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
    $comment_author_url   = ( isset($_POST['url']) )     ? trim($_POST['url']) : null;
    $comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;
    $user = wp_get_current_user();
    if ( $user->exists() ) {
        if ( empty( $user->display_name ) )
            $user->display_name=$user->user_login;
        $comment_author       = $wpdb->escape($user->display_name);
        $comment_author_email = $wpdb->escape($user->user_email);
        $comment_author_url   = $wpdb->escape($user->user_url);
        $user_ID			  = $wpdb->escape($user->ID);
        if ( current_user_can('unfiltered_html') ) {
            if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
                kses_remove_filters();
                kses_init_filters();
            }
        }
    } else {
        if ( get_option('comment_registration') || 'private' == $status )
            ajax_comment_err(__('Sorry, you must be logged in to post a comment.'));
    }
    $comment_type = '';
    if ( get_option('require_name_email') && !$user->exists() ) {
        if ( 6 > strlen($comment_author_email) || '' == $comment_author )
            ajax_comment_err( __('Error: please fill the required fields (name, email).') );
        elseif ( !is_email($comment_author_email))
            ajax_comment_err( __('Error: please enter a valid email address.') );
    }
    if ( '' == $comment_content )
        ajax_comment_err( __('Error: please type a comment.') );
    $dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
    if ( $comment_author_email ) $dupe .= "OR comment_author_email = '$comment_author_email' ";
    $dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
    if ( $wpdb->get_var($dupe) ) {
        ajax_comment_err(__('Duplicate comment detected; it looks as though you&#8217;ve already said that!'));
    }
    if ( $lasttime = $wpdb->get_var( $wpdb->prepare("SELECT comment_date_gmt FROM $wpdb->comments WHERE comment_author = %s ORDER BY comment_date DESC LIMIT 1", $comment_author) ) ) {
        $time_lastcomment = mysql2date('U', $lasttime, false);
        $time_newcomment  = mysql2date('U', current_time('mysql', 1), false);
        $flood_die = apply_filters('comment_flood_filter', false, $time_lastcomment, $time_newcomment);
        if ( $flood_die ) {
            ajax_comment_err(__('You are posting comments too quickly.  Slow down.'));
        }
    }
    $comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
    $commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');

    $comment_id = wp_new_comment( $commentdata );

    $comment = get_comment($comment_id);
    do_action('set_comment_cookies', $comment, $user);
    $comment_depth = 1;
    $tmp_c = $comment;
    while($tmp_c->comment_parent != 0){
        $comment_depth++;
        $tmp_c = get_comment($tmp_c->comment_parent);
    }
    $GLOBALS['comment'] = $comment;	//your comments here	edit start 
    ?>
<li class="comments" <?php if( $depth > 2){ echo ' style="margin-left:-50px;"';} ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="comment-wrap"><div class="comment-avatar"><?php echo get_avatar( $comment, $size = '80'); ?></div> <div class="author-comment"><cite class="cmname" id="author-<?php comment_ID() ?>"><?php printf(__('%s'), get_comment_author_link()) ?></cite><div class="comment-meta commentmetadata">
                <span class="ct">刚刚</span></div></div>
        <div class="clear"></div>

        <div class="comment-content">
            <?php comment_text() ?>
        </div>
    </div>
    <?php die();

}
function ajax_comment_err($a) {
    header('HTTP/1.0 500 Internal Server Error');
    header('Content-Type: text/plain;charset=UTF-8');
    echo $a;
    exit;
}
?>
<?php /** add the post-formats**/add_theme_support('post-formats',array('image','status','video'))
?>
