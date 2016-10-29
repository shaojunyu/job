$(function () {
	//初始时手机号切分
	var val = $.trim($(".phone").val());
	var str = "";
	if(val.length > 3 && val.length <= 7) {
		str = str.concat(val.substr(0, 3), "-", val.substr(3));
	}
	else if(val.length > 7) {
		str = str.concat(val.substr(0, 3), "-", val.substr(3, 4), "-", val.substr(7));
	}
	$(".phone").val(str || val);

	//手机输入处理
	$(".phone").focus(function() { //获得焦点
		if($(this).css("color") == "red") {
			hideError($(this));
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

	//验证码输入处理
	$(".codes").focus(function() { //获得焦点
		if($(this).css("color") == "red") {
			hideError($(this));
		}
	});

	//获取短信验证码
	$(".get").tap(function () {
		var isPhoneOk = formMathod.phoneCheck($(".phone")[0]);
		if($(this).html() !== "获取验证码") {
			return;
		}

		//发送验证码
		var phoneNum = $(".phone").val().split("-").join("");
		$.ajax({
			url: "../../api/send_sms_code/" + phoneNum,
			type: "GET",
			success: function(data) {
	        	
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown){  
		        showMsg("请求失败，请重试"); 
		    }
		});
	});

	//注册第一步
	$(".next").tap(function () {
		//验证手机号是否正确
		var isPhoneOk = formMathod.phoneCheck($(".phone")[0]);
		if(typeof isPhoneOk === "string") {
			showError($(".phone"), isPhoneOk);
			return;
		}

		//验证手机验证码
		var smscode = $.trim($(".codes").val());
		if(!smscode) {
			showError($(".codes"), "请输入验证码");
			return;
		}

		//验证码验证
		var phoneNum = $(".phone").val().split("-").join("");
		var smsCode = $(".codes").val();
		$.ajax({
			url: "../../api/verify_sms_code/" + phoneNum + "/" + smsCode,
			type: "GET",
			success: function(data) {
				data = JSON.parse(data);
	        	if(data.success) {
	        		$("form").submit();
	        	}
	        	else {
	        		showMsg(data.msg);
	        	}
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown){  
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

//1分钟后重试
function getDisable() {
	var time = 59;
	$(".get").html(time + "秒后重试");
	var timer = setInterval(function () {
		time--;
		if(time === 0) {
			$(".get").html("获取验证码");
			clearInterval(timer);
			return;
		}
		$(".get").html(time + "秒后重试");
	}, 1000);
}

//显示错误提示
function showError(inputElem, err) {
	inputElem.css("color", "red");
	inputElem.val(err);
}

//隐藏错误提示
function hideError(inputElem) {
	inputElem.css("color", "#000");
	inputElem.val("");
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