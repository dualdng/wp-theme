
function login(){
 if(document.getElementById("log").style.display=="none"||!!!document.getElementById("log").style.display){
document.getElementById("log").style.display="block";
}
else{
document.getElementById("log").style.display="none";
}
}
$(document).ready(function($) {
	$(function() {
		var bragueH = $("#brague").offset().top+315;
		var navH = $("nav").offset().top+80;
		$(window).scroll(function() {
			var scroH = $(this).scrollTop();
			if (scroH >= bragueH) {
				$("#brague").css({
					"display": "inline",
					"margin-top":"5px",
				})
			} else if (scroH < bragueH) {
				$("#brague").css({
					"display": "none",				
				})
			};
			if (scroH >= navH){
			$("nav").css({"margin-top":"0px",})
			}
			else if (scroH < navH){
			$("nav").css({"margin-top":"-45px",})}
		})
	})
	
})

$(document).ready(function() {    //�����������⶯��
$("nav").css({'margin-top':'-45px',})
$(".top").css({'margin':'23% 0',})
$(".top2").css({'margin':'8% 0 5% 0',})
})
 function scroll() {
  var scroll_offset = $("#header").offset();  //�õ�pos���div���offset����������ֵ��top��left
  $("body,html").animate({
   scrollTop:scroll_offset.top  //��body��scrollTop����pos��top����ʵ���˹�����scrollTop �൱�ڰѹ�������TOP����һ��ֵ��
   },1000);
 }
 jQuery(document).ready(function($){$("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").phzoom({});}); 

