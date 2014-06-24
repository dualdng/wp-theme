$(document).on('click','#pagenavi a',function()
{
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						var result=$(data).find('#contentleft');
						$('#content').empty();
						$('#content').append(result);
				}
		}
		)
		return false;
})
function test()
{
		var comname=$(':input[name=\'comname\']').val(); 
		var commail=$(':input[name=\'commail\']').val(); 
		var comurl=$(':input[name=\'comurl\']').val(); 
		var gid=$(':input[name=\'gid\']').val(); 
		var pid=$(':input[name=\'pid\']').val(); 
		var comment=$('#comment').val(); 
		var poststr='comname='+comname+'&commail='+commail+'&comurl='+comurl+'&comment='+comment+'&gid='+gid+'&pid='+pid;
		$.ajax({
				url:'index.php?action=addcom',
				type:'POST',
				data:poststr,
				success:function(data){
						$('#ajax_comments').html(comment+'&nbsp--&nbsp查看评论请刷新').css({'display':'block'});
						$('#comment-post').fadeOut();
						$('#comment').val('刷新之后可查看评论');
						$("html,body").animate({scrollTop:$(".nextlog").offset().top+10},1000);
				}
				})
		return false;
}
