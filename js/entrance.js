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

	//发送请求
	$("form").submit(function(e){
		//验证手机号是否正确
		var isPhoneOk = formMathod.phoneCheck($(".phone")[0]);
		if(typeof isPhoneOk === "string") {
			showError($(".phone"), isPhoneOk);
			e.preventDefault();
			return;
		}
		$(".phone").val($(".phone").val().split("-").join(""));
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