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
//放到functions.php 中

