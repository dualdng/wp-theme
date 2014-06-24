function comment()
{
		var comname=$(':input[name=\'comname\']').val(); 
		var commail=$(':input[name=\'commail\']').val(); 
		var comurl=$(':input[name=\'comurl\']').val(); 
		var comurl=$(':[name=\'comurl\']').val(); 
		var comment=$('#comment').val(); 
		var poststr='comname='+comname+'&commail='+commail+'&comurl='+comurl+'&comment='+comment;
		$.ajax({
				url:'127.0.0.1/emlog/index.php?action=addcom',
				type:'post',
				success:function(data){
						alert(data);
				}
				})
}
