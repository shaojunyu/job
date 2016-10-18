$(function () {
	$(".item").tap(function () {
		if( $(this).hasClass("click") ) {
			$(this).removeClass("click");
			return;
		}
		$(this).addClass("click");
	});
});