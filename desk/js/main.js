$(document).on('click','.post-list-img a',function(){
		var url=$(this).attr('href');
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						var result=$(data).find('#detial');
						$('.zoomScroll').remove();
						$('body').append(data);
						$('#header').addClass({'position':'fixed','top':'0px','z-index':'500','opacity':'.7'});
						$('#wrapper').css({'position':'fixed','top':'0px','z-index':'500','opacity':'.7'});
						$('#footer').css({'position':'fixed','bottom':'0px','z-index':'500','opacity':'.7'});
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
		$('#footer').css({'position':'relative','bottom':'0px','z-index':'500','opacity':'1'});
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
		$.ajax({
				url:url,
				type:'POST',
				success:function(data){
						$('.zoomScroll').remove();
						$('body').append(data);
						$('#header').css({'position':'fixed','top':'0px','z-index':'500','opacity':'.7'});
						$('#wrapper').css({'position':'fixed','top':'0px','z-index':'500','opacity':'.7'});
						$('#footer').css({'position':'fixed','bottom':'0px','z-index':'500','opacity':'.7'});
						$('.zoomScroll').css({'position':'relative','top':'0px','z-index':'999'});
						}
				})
		return false;
		})


