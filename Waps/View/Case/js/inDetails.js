$(function(){
	var topContentW=$(".topContent").innerWidth();
	var topContentH=$(".topContent").innerHeight();
	console.log(topContentW);
	console.log(topContentH);
	$(".topBcg").css({"width":topContentW+"px","height":topContentH+"px"});
});