$(function(){
	$('.downMenu').find("li").click(function(){
		$(".downMenu").find("a").css("background-color","none");
		$(".downMenu").find("a").css("color","#000000");
		$(this).children("a").css("color","#f77b4c");
	});
	  // 获取窗口宽度
	  if (window.innerWidth)
	  winWidth = window.innerWidth;
	  else if ((document.body) && (document.body.clientWidth))
	  winWidth = document.body.clientWidth;
	  // 获取窗口高度
	  if (window.innerHeight)
	  winHeight = window.innerHeight;
	  else if ((document.body) && (document.body.clientHeight))
	  winHeight = document.body.clientHeight;
	  // 通过深入 Document 内部对 body 进行检测，获取窗口大小
	  if (document.documentElement && document.documentElement.clientHeight && document.documentElement.clientWidth)
	  {
	  winHeight = document.documentElement.clientHeight;
	  winWidth = document.documentElement.clientWidth;
	  }
	  // 动态赋值背景高度
	  $(".allContent").css("min-height",winHeight);
	  $(".allContent").css("width",winWidth);
});