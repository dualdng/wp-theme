
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
  var scroll_offset = $("#header").offset();  //得到pos这个div层的offset，包含两个值，top和left
  $("body,html").animate({
   scrollTop:scroll_offset.top  //让body的scrollTop等于pos的top，就实现了滚动
   },1000);
 }
 jQuery(document).ready(function($){$("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").phzoom({});}); 

