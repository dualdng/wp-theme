
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
		var navH = $("#brague").offset().top+315;
		$(window).scroll(function() {
			var scroH = $(this).scrollTop();
			if (scroH >= navH) {
				$("#brague").css({
					"display": "inline",
					"margin-top":"5px",
				})
			} else if (scroH < navH) {
				$("#brague").css({
					"display": "none",				
				})
			}
		})
	})
	
})
 function scroll() {
  var scroll_offset = $("#header").offset();  //�õ�pos���div���offset����������ֵ��top��left
  $("body,html").animate({
   scrollTop:scroll_offset.top  //��body��scrollTop����pos��top����ʵ���˹���
   },1000);
 }
 jQuery(document).ready(function($){$("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").phzoom({});}); 

