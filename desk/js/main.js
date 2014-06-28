$(document).on('click','.post-list-img a',function(){
		var url=$(this).attr('href');
		$('#loading').css({'display':'block'});
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						$('#loading').css({'display':'none'});
						$('.zoomScroll').remove();
						$('body').append(data);
						$('#header').addClass({'position':'fixed','top':'0px','z-index':'500','opacity':'.5'});
						$('#wrapper').css({'position':'fixed','top':'0px','z-index':'500','opacity':'.5'});
						$('#footer').css({'display':'none'});
						$('.zoomScroll').css({'position':'relative','top':'0px','z-index':'999'});
						}
				})
		return false;
		})
function single_close()
{
		$('.zoomScroll').remove();
		$('#header').css({'position':'fixed','top':'0px','z-index':'900','opacity':'1'});
		$('#wrapper').css({'position':'relative','top':'0px','z-index':'500','opacity':'1'});
		$('#footer').css({'display':'block'});
}
function most_pop()
{
		$('.pics').css({'display':'none'});
		$('.pics-2').css({'display':'block'});
		$('a.more').addClass('active');
		$('a.new').removeClass('active');
}
function new_pop()
{
		$('.pics-2').css({'display':'none'});
		$('.pics').css({'display':'block'});
		$('a.new').addClass('active');
		$('a.more').removeClass('active');
}
$(document).on('click','a.post_navi',function(){
		var url=$(this).attr('href');
		$('#loading').css({'display':'block'});
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						$('.zoomScroll').remove();
						$('body').append(data);
						$('#loading').css({'display':'none'});
						$('#header').css({'position':'fixed','top':'0px','z-index':'500','opacity':'.7'});
						$('#wrapper').css({'position':'fixed','top':'0px','z-index':'500','opacity':'.7'});
						$('#footer').css({'position':'fixed','bottom':'0px','z-index':'500','opacity':'.7'});
						$('.zoomScroll').css({'position':'relative','top':'0px','z-index':'999'});
						}
				})
		return false;
		})

$(document).on('click','#access a',function(){
		var url=$(this).attr('href');
		$('#loading').css({'display':'block'});
		$('#access a').removeClass();
		$(this).addClass('active');
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						var result=$(data).find('#list');
						$('#loading').css({'display':'none'});
						$('#list').empty();
						$('#list').append(result);
						}
				})
		return false;
		})
$(document).on('click','.pagenavi a',function(){
		var url=$(this).attr('href');
		$('#loading').css({'display':'block'});
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						var result=$(data).find('#list');
						$('#loading').css({'display':'none'});
						$('#list').empty();
						$('#list').append(result);
						}
				})
		return false;
		})

