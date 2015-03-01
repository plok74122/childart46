	$(function(){ 
		var card = $(".card");
		$(".card").click(function(){
			$(this).find("img").attr("tww");
			$(this).fadeTo(1500,0);
			$(".item").fadeOut(500,skew);
			$(".BarContent").show();
			$(".BarContent").fadeIn(1450);
			$(".hideit").hide();
			function skew(){
			$(".BarContent").removeClass("skew");
			$(".BarContent").fadeIn(1300);
		}
		var list = $(this).siblings(".card");
		var i = 0;
		(function cover() {
			list.eq(i++).addClass("cover").fadeTo(90,0,cover);
			})();
		var title = $(this).find("img").attr("tww");
		$("#"+title).fadeIn(1300);
		})
		$(".header .control").click(function(){
		$(".BarContent").addClass("skew");
		$(".BarContent").fadeOut(900);
		$(".item").fadeIn(1500);
		$(".BarContent").hide();
		var j = 0;
			(function cover2() {
			card.eq(j++).removeClass("cover").fadeTo(90,1,cover2);
			})();
			})
		})