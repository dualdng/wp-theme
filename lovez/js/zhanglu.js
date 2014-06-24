
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

$(document).ready(function() {    //导航栏及标题动画
$("nav").css({'margin-top':'-45px',})
$(".top").css({'margin':'23% 0',})
$(".top2").css({'margin':'8% 0 5% 0',})
})
 function scroll() {
  var scroll_offset = $("#header").offset();  //得到pos这个div层的offset，包含两个值，top和left
  $("body,html").animate({
   scrollTop:scroll_offset.top  //让body的scrollTop等于pos的top，就实现了滚动，scrollTop 相当于把滚动条往TOP滚动一个值。
   },1000);
 }
 jQuery(document).ready(function($){$("a[href$=jpg],a[href$=gif],a[href$=png],a[href$=jpeg],a[href$=bmp]").phzoom({});}); 

