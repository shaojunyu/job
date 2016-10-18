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
/*
	//密码登录
	$(".next-by-passwd").tap(function () {
		//验证手机号是否正确
		var isPhoneOk = formMathod.phoneCheck($(".phone")[0]);
		if(typeof isPhoneOk === "string") {
			showError($(".phone"), isPhoneOk);
			return;
		}

		//验证密码
		var isPasswordOk = formMathod.passwdCheck($(".password")[0]);
		if(typeof isPasswordOk === "string") {
			$(".password").attr("type", "text");
			showError($(".password"), isPasswordOk);
			return;
		}

		//密码登录
		var data = {
			cellphone: $.trim($(".phone").val()).split("-").join(""),
			password: $(".password").val()
		};
		$.ajax({
	        url: '../api/login',
	        contentType: "application/json",
	        dataType: "json",
	        type: "POST",
	        data: JSON.stringify(data),
	        success: function(data) {
	        	if(data.success) {
	        		window.location.href = "../user/myself";
	        	}
				else {
	        		showMsg("用户名或密码错误");
	        	}
	        },
		    error: function(XMLHttpRequest, textStatus, errorThrown){  
		        showMsg("请求失败，请刷新重试"); 
		    }
	    });
	});

*/
	//验证码输入处理
	$(".codes").focus(function() { //获得焦点
		if($(this).css("color") == "red") {
			hideError($(this));
		}
	});

	//获取短信验证码
	$(".get").tap(function () {
		var isPhoneOk = formMathod.phoneCheck($(".phone")[0]);
		if(typeof isPhoneOk === "string") {
			showError($(".phone"), isPhoneOk);
			return;
		}
		else if($(this).html() !== "获取验证码") {
			return;
		}
		//发送验证码
		var phoneNum = $(".phone").val().split("-").join("");
		var data = {
			cellphone: phoneNum
		};
		
		
	});

	//注册第一步
	/*$(".next").tap(function () {
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

		//发送验证码登录请求
	});
*/
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