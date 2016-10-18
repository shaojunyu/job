$(function () {
	//性别选择
	$(".boy").tap(function () {
		if( $(".girl").hasClass("click-girl") ) {
			$(".girl").removeClass("click-girl");
		}
		$(this).addClass("click-boy");
	});
	$(".girl").tap(function () {
		if( $(".boy").hasClass("click-boy") ) {
			$(".boy").removeClass("click-boy");
		}
		$(this).addClass("click-girl");
	});
});