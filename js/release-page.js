$(function () {
	$(".item").tap(function () {
		if( $(this).hasClass("click") ) {
			$(this).removeClass("click");
			return;
		}
		$(this).addClass("click");
	});

	//begin
	$('.begin-date').focus(function(){
	    $(this).removeAttr('placeholder');
	});
	$('.begin-date').blur(function(){
	    if($(this).val() === '') {
	    	$(this).attr('placeholder', '开始日期');
	    }
	});

	//end
	$('.end-date').focus(function(){
	    $(this).removeAttr('placeholder');
	});
	$('.end-date').blur(function(){
	    if($(this).val() === '') {
	    	$(this).attr('placeholder', '结束日期');
	    }
	});

	//next1
	$(".next1").tap(function () {
		if($(".ordinary .click").length === 0 && $(".skill .click").length === 0) {
			showMsg("请选择至少一项");
			return;
		}
		$(".content1").hide();
		$(".content").show();
	});
});

//消息显示框显示
function showMsg(msg) {
	$(".prompt-box").html(msg);
	$(".prompt-box").show();
	setTimeout(function () {
		hideMsg();
	}, 3000);
}

//消息显示框隐藏
function hideMsg() {
	$(".prompt-box").html("");
	$(".prompt-box").hide();
}