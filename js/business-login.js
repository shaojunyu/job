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

	//验证码输入处理
	$(".codes").focus(function() { //获得焦点
		if($(this).css("color") == "red") {
			hideError($(this));
		}
	});

	//获取短信验证码
	$(".get").click(function () {
		//手机号判断
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
		var data = {};

		/*$.ajax({
	        //url: secret("../api/sendSmscode"),
	        contentType: "application/json",
	        dataType: "json",
	        type: "POST",
	        data: JSON.stringify(data),
	        success: function(data) {
	        	if(data.success === true) {
	        		getDisable();
	        	}
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown){  
	        	 alert("请求失败!");
	    	}
	    });*/
	});

	//下一步
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

		//发送请求


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

//隐藏错误提示
function hideError(inputElem) {
	inputElem.css("color", "#000");
	inputElem.val("");
}

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