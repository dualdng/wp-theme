<?php
register_nav_menus( array(
		'primary' => __( 'Primary Navigation'),
    ));



function rss_feed(){
	$feed = get_bloginfo('rss2_url');
	echo $feed;
}
function kudos_css() {
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/kudos.css" type="text/css" media="screen" />'."\n";
}
function livesino_excerpt_length($length) {
	return 250;
}
add_filter('excerpt_length', 'livesino_excerpt_length');
function no_self_ping( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link )
		if ( 0 === strpos( $link, $home ) )
			unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

function get_recent_comments() {
	global $wpdb;
	$request = "SELECT ID, comment_ID, comment_content, comment_author FROM $wpdb->posts, $wpdb->comments WHERE $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND (post_status = 'publish' OR post_status = 'static') AND comment_type = ''";
	$request .= "AND post_password ='' AND comment_approved = '1' ORDER BY $wpdb->comments.comment_date DESC LIMIT 8";
	$comments = $wpdb->get_results($request);
	$output = '';
	foreach ($comments as $comment) {
		$comment_author = stripslashes($comment->comment_author);
		$comment_content = strip_tags($comment->comment_content);
		$comment_content = stripslashes($comment_content);
		$comment_excerpt = substr($comment_content,0,80);
		$comment_excerpt = utf8_trim($comment_excerpt);
		$permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
		$output .= '<li><a href="'. $permalink .'" title="查看 '. $comment_author .' 的整条评论">'. $comment_author .'</a>: '. $comment_excerpt .'...</li>';
	}
	echo $output;
}
function utf8_trim($str) {
	$len = strlen($str);
	for ($i=strlen($str)-1; $i>=0; $i-=1){
		$hex .= ' '.ord($str[$i]);
		$ch = ord($str[$i]);
		if (($ch & 128)==0) return(substr($str,0,$i));
		if (($ch & 192)==192) return(substr($str,0,$i));
	}
	return($str.$hex);
}

/* Pagenavi */  
function xxxxpagenavi( $before = '', $after = '', $p = 2 ) {   
if ( is_singular() ) return;   
global $wp_query, $paged;   
$max_page = $wp_query->max_num_pages;   
if ( $max_page == 1 ) return;   
if ( empty( $paged ) ) $paged = 1;   
echo $before.'<div id="pagenavi">'."\n";   
echo '<span class="pages"><a title="Total record"><b>分页</b></a>: ' . ' ' . ' </span>';   
if ( $paged > 1 ) p_link( $paged - 1, 'Previous Page', '«' );   
if ( $paged > $p + 1 ) p_link( 1, 'First Page' );   
if ( $paged > $p + 2 ) echo '... ';   
for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {   
if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span>" : p_link( $i );   
}   
if ( $paged < $max_page - $p - 1 ) echo '... ';   
if ( $paged < $max_page - $p ) p_link( $max_page, '上一页' );   
if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '»' );   
echo '</div>'.$after."\n";   
}   
function xxxp_link( $i, $title = '', $linktype = '' ) {   
if ( $title == '' ) $title = "Page {$i}";   
if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }   
echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a>";   
}

if ( !function_exists('pagenavi') ) {
	function pagenavi( $p = 5 ) { // 取当前页前后各 2 页
		if ( is_singular() ) return; // 文章与插页不用
		global $wp_query, $paged;
		$max_page = $wp_query->max_num_pages;
		if ( $max_page == 1 ) return; // 只有一页不用
		if ( empty( $paged ) ) $paged = 1;
		echo '<span class="pages">第 ' . $paged . ' 页，共 ' . $max_page . ' 页 </span> '; // 显示页数
		if ( $paged > 1 ) p_link( $paged - 1, '上一页', '«' );/* 如果当前页大于1就显示上一页链接 */
		if ( $paged > $p + 1 ) p_link( 1, '最前页' );
		if ( $paged > $p + 2 ) echo '... ';
		for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // 中间页
			if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : p_link( $i );
		}
		if ( $paged < $max_page - $p - 1 ) echo '... ';
		if ( $paged < $max_page - $p ) p_link( $max_page, '最后页' );
		if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '»' );/* 如果当前页不是最后一页显示下一页链接 */
	}
	function p_link( $i, $title = '', $linktype = '' ) {
		if ( $title == '' ) $title = "第 {$i} 页";
		if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
		echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$linktext}</a> ";
	}
}

/* 增强默认编辑器 */
function Bing_editor_buttons($buttons){
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'backcolor';
	$buttons[] = 'underline';
	$buttons[] = 'hr';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'paste';
	$buttons[] = 'cleanup';
	$buttons[] = 'wp_page';
	$buttons[] = 'newdocument';
	return $buttons;
}
add_filter("mce_buttons_3", "Bing_editor_buttons");
  
 
/*-----------------------------------------*\
    获取第一张图片地址
\*-----------------------------------------*/
function get_the_img() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  return $first_img;
}
/*-----------------------------------------*\
    输出第一张图片
\*-----------------------------------------*/
function the_img(){
  $imgurl = get_the_img();
  if(empty($imgurl)){
    echo '<img src="'.get_bloginfo('template_url').'/images/default.png" alt="" />';
  }else{
    echo '<img src="'.$imgurl.'" alt="" />';  
  }
}

//缩略图功能
function post_thumbnail( $width = 100,$height = 80 ){
    global $post;
    if( has_post_thumbnail() ){    //如果有缩略图，则显示缩略图
        $timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
        $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />';
        echo $post_timthumb;
    } else {
        $post_timthumb = '';
        ob_start();
        ob_end_clean();
        $output = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $index_matches);    //获取日志中第一张图片
        $first_img_src = $index_matches [1];    //获取该图片 src
        if( !empty($first_img_src) ){    //如果日志中有图片
            $path_parts = pathinfo($first_img_src);    //获取图片 src 信息
            $first_img_name = $path_parts["basename"];    //获取图片名
            $first_img_pic = get_bloginfo('wpurl'). '/cache/'.$first_img_name;    //文件所在地址
            $first_img_file = ABSPATH. 'cache/'.$first_img_name;    //保存地址
            $expired = 604800;    //过期时间
            if ( !is_file($first_img_file) || (time() - filemtime($first_img_file)) > $expired ){
                copy($first_img_src, $first_img_file);    //远程获取图片保存于本地
                $post_timthumb = '<img src="'.$first_img_src.'" alt="'.$post->post_title.'" class="thumb" />';    //保存时用原图显示
            }
            $post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$first_img_pic.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc=1" alt="'.$post->post_title.'" class="thumb" />';
        } else {    //如果日志中没有图片，则显示默认
            $post_timthumb = '<img src="'.get_bloginfo("template_url").'/images/default.png" alt="'.$post->post_title.'" class="thumb" />';
        }
        echo $post_timthumb;
    }
}



//只需一步实现文章首行缩进2字符   
function xmlas_indent_txt($text){   
    $return = str_replace('<p', '<p style="text-indent:2em;"',$text);   
    return $return;   
}   
add_filter('the_content','xmlas_indent_txt');



//取得文章的阅读次数   
function getPostViews($postID){   
$count_key = 'post_views_count';   
$count = get_post_meta($postID, $count_key, true);   
if($count==''){   
delete_post_meta($postID, $count_key);   
add_post_meta($postID, $count_key, '0');            
return "0";   
}   
return $count.'';   
}   
function setPostViews($postID) {   
$count_key = 'post_views_count';   
$count = get_post_meta($postID, $count_key, true);   
if($count==''){   
$count = 0;   
delete_post_meta($postID, $count_key);   
add_post_meta($postID, $count_key, '0');   
}else{   
$count++;   
update_post_meta($postID, $count_key, $count);   
}   
}

//主题设置
function mytheme_page (){
 
	if ( count($_POST) > 0 && isset($_POST['mytheme_settings']) ){
 
		$options = array ('keywords','description','analytics','announcement','logourl');
 
		foreach ( $options as $opt ){
 
			delete_option ( 'mytheme_'.$opt, $_POST[$opt] );
 
			add_option ( 'mytheme_'.$opt, $_POST[$opt] );	
 
		}
 
	}
 
	add_theme_page(__('主题选项'), __('主题选项'), 'edit_themes', basename(__FILE__), 'mytheme_settings');
 
}
 
function mytheme_settings(){?>
 
<style>
 
	.wrap,textarea,em{font-family:'Century Gothic','Microsoft YaHei',Verdana;}
	.wrap{margin: 10px 15px 0 50px;width: 600px;}
 
	fieldset{width:100%;border:1px solid #aaa;padding-bottom:20px;margin-top:20px;-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 5px;box-shadow:rgba(0,0,0,.2) 0px 0px 5px;}
 
	legend{margin-left:5px;padding:0 5px;color:#2481C6;background:#F9F9F9;cursor:pointer;}
 
	textarea{width:100%;font-size:11px;border:1px solid #aaa;background:none;-webkit-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-moz-box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;box-shadow:rgba(0,0,0,.2) 1px 1px 2px inset;-webkit-transition:all .4s ease-out;-moz-transition:all .4s ease-out;}
 
	textarea:focus{-webkit-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;-moz-box-shadow:rgba(0,0,0,.2) 0px 0px 8px;box-shadow:rgba(0,0,0,.2) 0px 0px 8px;outline:none;}
 
</style>
 
<div class="wrap">
 
<h2>主题选项</h2>
 
<form method="post" action="">
 
	<fieldset>
 
	<legend><strong>SEO 代码添加</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="keywords" id="keywords" rows="1" cols="70"><?php echo get_option('mytheme_keywords'); ?></textarea><br />
 
				<em>网站关键词（Meta Keywords），中间用半角逗号隔开。</em>
 
			</td></tr>
 
			<tr><td>
 
				<textarea name="description" id="description" rows="3" cols="70"><?php echo get_option('mytheme_description'); ?></textarea>
 
				<em>网站描述（Meta Description），针对搜索引擎设置的网页描述。</em>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 
 
	<fieldset>
 
	<legend><strong>统计代码添加</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="analytics" id="analytics" rows="5" cols="70"><?php echo stripslashes(get_option('mytheme_analytics')); ?></textarea>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 	<fieldset>
 
	<legend><strong>公告板设置</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="announcement" id="announcement" rows="5" cols="70"><?php echo get_option('mytheme_announcement'); ?></textarea>
 
			</td></tr>
 
		</table>
 
	</fieldset>
	<fieldset>
	<legend><strong>LOGO图片地址设置：宽度126px</strong></legend>
 
		<table class="form-table">
 
			<tr><td>
 
				<textarea name="logourl" id="logourl" rows="5" cols="70"><?php echo stripslashes(get_option('mytheme_logourl')); ?></textarea>
 
			</td></tr>
 
		</table>
 
	</fieldset>
 
 
 
	<p class="submit">
 
		<input type="submit" name="Submit" class="button-primary" value="保存设置" />
 
		<input type="hidden" name="mytheme_settings" value="save" style="display:none;" />
 
	</p>
 
 
 
</form>
 
</div>
 
<?php }

add_action('admin_menu', 'mytheme_page');


/*  
面包屑导航  
*/  
function get_breadcrumbs()   
/*  
子寒互动视觉整理 
*/  
{   
global $wp_query;   
if ( !is_home() ){   
echo '<ul>';   
echo '<a href="'. get_settings('home') .'">'. 首页 .'</a>';   
if ( is_category() )   
{   
$catTitle = single_cat_title( "", false );   
$cat = get_cat_ID( $catTitle );   
echo " &raquo; ". get_category_parents( $cat, TRUE, " &raquo; " ) ;   
}   
elseif ( is_archive() && !is_category() )   
{   
echo "&raquo; Archives";   
}   
elseif ( is_search() ) {   
echo "&raquo; Search Results";   
}   
elseif ( is_404() )   
{   
echo "&raquo; 404 Not Found";   
}   
elseif ( is_single() )   
{   
$category = get_the_category();   
$category_id = get_cat_ID( $category[0]->cat_name );   
echo '&raquo; '. get_category_parents( $category_id, TRUE, " &raquo; " );   
echo the_title('','', FALSE);   
}   
elseif ( is_page() )   
{   
$post = $wp_query->get_queried_object();   
if ( $post->post_parent == 0 ){   
echo "<li> &raquo; ".the_title('','', FALSE)."</li>";   
} else {   
$title = the_title('','', FALSE);   
$ancestors = array_reverse( get_post_ancestors( $post->ID ) );   
array_push($ancestors, $post->ID);   
foreach ( $ancestors as $ancestor ){   
if( $ancestor != end($ancestors) ){   
echo '<li> &raquo; <a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';   
} else {   
echo '<li> &raquo; '. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';   
}   
}   
}   
}   
echo "</ul>";   
}   
}

/** ??ȡ???µ?һ??ͼƬ **/ function first_image() 
{  
		global $post, $posts;  
		$first_img = '';  
		ob_start();  
		ob_end_clean();  
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);  
				$first_img = $matches [1] [0]; 
if(empty($first_img))
{   
		$first_img = get_bloginfo('template_url').'/images/top1.jpg"/>';   
} 
		return $first_img;    
}
/* 访问计数 */
function record_visitors()
{
			if (is_singular()) 
						{
									  global $post;
									  	  $post_ID = $post->ID;
										  	  if($post_ID) 
													  	  {
																  		  $post_views = (int)get_post_meta($post_ID, 'views', true);
																		  		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
																						  		  {
																										  			add_post_meta($post_ID, 'views', 1, true);
																															  }
																															  	  }
																																  	}
}
add_action('wp_head', 'record_visitors');  
 
 /// 函数名称：post_views 
 /// 函数作用：取得文章的阅读次数
 function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
 {
		   global $post;
		     $post_ID = $post->ID;
			   $views = (int)get_post_meta($post_ID, 'views', true);
			     if ($echo) echo $before, number_format($views), $after;
				   else return $views;
 }
 ?>

