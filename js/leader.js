$(function () {
	$(".create-link").tap(function () {
		var jobId = $(this).parent().attr("data-job-id");
		$.ajax({
			url: "./leader/get_apply_link/" + jobId,
			type: "GET",
			success: function (data) {
				showMsg(data);
			},
			error: function () {
				alert("请求失败");
			}
		});

	});

	$(".close").tap(function () {
		hideMsg();
	});
});


//消息显示框显示
function showMsg(msg) {
	$(".prompt").html(msg);
	$(".prompt-box").show();
	$(".cover").show();
}

//消息显示框隐藏
function hideMsg() {
	$(".prompt").html("");
	$(".prompt-box").hide();
	$(".cover").hide();
}