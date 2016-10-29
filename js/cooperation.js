$(function () {
	//手机输入处理
	$(".phone").focus(function() { //获得焦点
		if($(this).css("color") == "red") {
			$(this).css("color", "#000");
			$(this).val("");
			return;
		}
		$(this).val($(this).val().split("-").join(""));
	});
	$(".phone").blur(function() { //失去焦点
		var val = $.trim($(this).val());
		var str = "";

		//判断是否是错误信息
		if($(this).css("color") == "red") {
			return;
		}

		//手机号切分
		if(val.length > 3 && val.length <= 7) {
			str = str.concat(val.substr(0, 3), "-", val.substr(3));
		}
		else if(val.length > 7) {
			str = str.concat(val.substr(0, 3), "-", val.substr(3, 4), "-", val.substr(7));
		}
		$(this).val(str || val);
	});

	//输入处理
	$(".business-name").focus(function () {
		if($(this).css("color") == "red") {
			$(this).css("color", "#000");
			$(this).val("");
			return;
		}
	});
	$(".address").focus(function () {
		if($(this).css("color") == "red") {
			$(this).css("color", "#000");
			$(this).val("");
			return;
		}
	});
	$(".name").focus(function () {
		if($(this).css("color") == "red") {
			$(this).css("color", "#000");
			$(this).val("");
			return;
		}
	});
	$(".describe").focus(function () {
		if($(this).css("color") == "red") {
			$(this).css("color", "#000");
			$(this).val("");
			return;
		}
	});


	//下一步
	$(".next").tap(function () {
		//验证手机号是否正确
		var isPhoneOk = formMathod.phoneCheck($(".phone")[0]);
		if(typeof isPhoneOk === "string") {
			showError($(".phone"), isPhoneOk);
			return;
		}

		if($(".business-name").val() === "" || $(".business-name").css("color") == "red") {
			showError($(".business-name"), "请输入商家名称");
			return;
		}
		else if($(".address").val() === "" || $(".address").css("color") == "red") {
			showError($(".address"), "请输入商家地址");
			return;
		}
		else if($(".name").val() === "" || $(".name").css("color") == "red") {
			showError($(".name"), "请输入联系人姓名");
			return;
		}
		else if($(".describe").val() === "" || $(".describe").css("color") == "red") {
			showError($(".describe"), "请输入需要的兼职");
			return;
		}

		//发送请求
		$.ajax({
        	type: "POST",
        	url: "./",
        	data: $("form").serialize(), // serializes the form's elements.
        	success: function (data) {
            	showMsg("申请成功，等待审核");
        	},
        	error: function () {
        		showMsg("请求失败，请重试");
        	}
        });
	});
});

/* 表单验证对象 */
var formMathod = {};

//手机号验证
formMathod.phoneReg = /^1[3|4|5|7|8]\d{9}$/;
formMathod.phoneCheck = function(input) { //参数为表单元素
	var val = input.value.split("-").join("");
	if(val.length === 0 || val === "请输入手机号!" || val === "手机号输入有误!") {
		return "请输入手机号!";
	}
	else if(val.length !== 11 || !formMathod.phoneReg.test(val)) {
		return "手机号输入有误!";
	}

	return true;
};

//显示错误提示
function showError(input, err) {
	input.css("color", "red");
	input.val(err);
}

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