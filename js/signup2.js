$(function () {
	

	//选择学校
	var $school = $(".school");
	var $allSchool = $school.find("a");
	$(".choose").tap(function () {
		if($school.css("display") === "block") {
			$school.hide();
			return;
		}
		$school.show();
	});
	$(".icon").tap(function () {
		if($school.css("display") === "block") {
			$school.hide();
			return;
		}
		$school.show();
	});
	$allSchool.tap(function () {
		var school = $(this).html();
		$(".choose").html(school);
		$school.hide();
	});

	//注册
	$(".next").tap(function () {

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

//密码验证
formMathod.passwdRegZH = /^[^\u4E00-\u9FA5]{5,20}$/;
formMathod.passwdRegQJ = /^[^\uFF00-\uFFFF]{5,20}$/;
formMathod.passwdRegSp = /\s/;
var passwdErr = ["密码不能为空!","密码长度不得小于6!","密码不能含有中文!","密码不能含有空格!","密码不能含有全角字符!"];
formMathod.passwdCheck = function(input) { //验证非中文和全角
	var val = input.value;
	var msg = "";
	if(val.length === 0 || val === passwdErr[0] || val === passwdErr[1] || val === passwdErr[2] || val === passwdErr[3] || val === passwdErr[4]) {
		msg = "密码不能为空!";
	}
	else if(val.length < 6) {
		msg = "密码长度不得小于6!";
	}
	else if(!formMathod.passwdRegZH.test(val)) {
		msg = "密码不能含有中文!";
	}
	else if(formMathod.passwdRegSp.test(val)) {
		msg = "密码不能含有空格!";
	}
	else if(!formMathod.passwdRegQJ.test(val)) {
		msg = "密码不能含有全角字符!";
	}

	if(msg === "") {
		return true;
	}
	else {
		input.value = "";
		return msg;
	}
};
