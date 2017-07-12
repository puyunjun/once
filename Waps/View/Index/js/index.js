$(function(){
	$(".moreInformation").click(function(){
		$(this).css({"background-color":"#f6733f","color":"#fff","border":"1px solid #f6733f"});
	});
	$(".serviceUl li a").click(function(){
		$(".serviceUl li a").css("color","#000000");
		$(this).css("color","#f6733f");
	});
});