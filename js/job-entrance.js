$(function () {
	$(".official").tap(function () {
		showMsg();
	});
	$(".questionnaire").tap(function () {
		showMsg();
	});
});

//消息显示框显示
function showMsg() {
	$(".prompt-box").show();
	setTimeout(function () {
		hideMsg();
	}, 2500);
}

//消息显示框隐藏
function hideMsg() {
	$(".prompt-box").hide();
}