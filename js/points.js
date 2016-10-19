$(function () {
	$(".exchange a").tap(function () {
		showMsg("正在研发中，多多积分吧，绝对震撼功能~");
	});
});

//消息显示框显示
function showMsg(msg) {
	$(".prompt-box-points").html(msg);
	$(".prompt-box-points").show();
	setTimeout(function () {
		hideMsg();
	}, 3000);
}

//消息显示框隐藏
function hideMsg() {
	$(".prompt-box-points").html("");
	$(".prompt-box-points").hide();
}