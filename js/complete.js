$(function () {
	var ordinary = "";
	var skill = "";
	var name = "";
	var sex = "";
	var qqNum = "";
	var college = "";
	var grade = "";
	var dormitory = "";
	//兼职选择
	$(".items").tap(function () {
		if( $(this).hasClass("click") ) {
			$(this).removeClass("click");
			return;
		}
		$(this).addClass("click");
	});

	//性别选择
	$(".boy").tap(function () {
		if( $(".girl").hasClass("click-girl") ) {
			$(".girl").removeClass("click-girl");
		}
		$(this).addClass("click-boy");
		sex = "男";
	});
	$(".girl").tap(function () {
		if( $(".boy").hasClass("click-boy") ) {
			$(".boy").removeClass("click-boy");
		}
		$(this).addClass("click-girl");
		sex = "女";
	});

	//选择学院
	var $college = $(".college");
	var $allCollege = $college.find("a");
	$(".choose-college").tap(function () {
		showItem($college);
	});
	$(".college-icon").tap(function () {
		showItem($college);
	});
	$allCollege.tap(function () {
		var college = $(this).html();
		$(".choose-college").html(college);
		$college.hide();
	});

	//选择专业
	var $profession = $(".profession");
	var $allProfession = $profession.find("a");
	$(".choose-profession").tap(function () {
		showItem($profession);
	});
	$(".profession-icon").tap(function () {
		showItem($profession);
	});
	$allProfession.tap(function () {
		var profession = $(this).html();
		$(".choose-profession").html(profession);
		$profession.hide();
	});

	//选择年级
	var $grade = $(".grade");
	var $allGrade = $grade.find("a");
	$(".choose-grade").tap(function () {
		showItem($grade);
	});
	$(".grade-icon").tap(function () {
		showItem($grade);
	});
	$allGrade.tap(function () {
		var grade = $(this).html();
		$(".choose-grade").html(grade);
		$grade.hide();
	});

	//选择宿舍
	var $dormitory = $(".dormitory");
	var $allDormitory = $dormitory.find("a");
	$(".choose-dormitory").tap(function () {
		showItem($dormitory);
	});
	$(".dormitory-icon").tap(function () {
		showItem($dormitory);
	});
	$allDormitory.tap(function () {
		var dormitory = $(this).html();
		$(".choose-dormitory").html(dormitory);
		$dormitory.hide();
	});

	//下一步切换
	$(".next1").tap(function () {
		if($(".click").length === 0) {
			showMsg("请至少选择一项");
			return;
		}
		$(".choose-job").css("display", "none");
		$(".complete-info").css("display", "block");
		$(".ordinary .click").each(function (index) {
			ordinary = ordinary + this.innerHTML + ",";
		});
		$(".skill .click").each(function (index) {
			skill = skill + this.innerHTML + ",";
		});
		ordinary = ordinary === "" ? "" : ordinary.substr(0, ordinary.length-1);
		skill = skill === "" ? "" : skill.substr(0, skill.length-1);
	});

	//第二步
	$(".next2").tap(function () {
		var reg = /^\d+$/g;
		if( $(".name").val() === "" ) {
			showMsg("请填写姓名");
			return;
		}
		else if( sex === "" ) {
			showMsg("请选择姓别");
			return;
		}
		else if( !reg.test($(".qq").val()) ) {
			showMsg("请填写正确的QQ号");
			return;
		}
		name = $(".name").val();
		qqNum = $(".qq").val();
		$(".complete-info").css("display", "none");
		$(".school-roll").css("display", "block");
	});

	//填完了
	$(".finish").tap(function () {
		college = $(".choose-college").html();
		grade = $(".choose-grade").html();
		dormitory = $(".dormitory").val();
		if(college === "请选择你所在的学院") {
			showMsg("请选择你所在的学院");
			return;
		}
		else if(grade === "选择年级") {
			showMsg("请选择年级");
			return;
		}
		else if(dormitory === "") {
			showMsg("请选择宿舍");
			return;
		}

		var data = {
			name: name,
			sex: sex,
			QQ: qqNum,
			college: college,
			grade: grade,
			dormitory: dormitory,
			tag1: ordinary,
			tag2: skill
		};
		$.ajax({
	        url: '../api/submit_info',
	        contentType: "application/json",
	        dataType: "json",
	        type: "POST",
	        data: JSON.stringify(data),
	        success: function(data) {
	        	if(data.success) {
	        		window.location.href = "../user/myself";
	        	}
				else {
	        		showMsg(data.msg);
	        	}
	        },
		    error: function(XMLHttpRequest, textStatus, errorThrown){  
		        showMsg("请求失败，请刷新重试"); 
		    }
	    });
	});
});

//显示隐藏每个item
function showItem(item) {
	if(item.css("display") === "block") {
		item.hide();
		return;
	}
	$('.item').hide();
	item.show();
}

//消息显示框显示
function showMsg(msg) {
	$(".prompt-box").html(msg);
	$(".prompt-box").show();
	setTimeout(function () {
		hideMsg();
	}, 2000);
}

//消息显示框隐藏
function hideMsg() {
	$(".prompt-box").html("");
	$(".prompt-box").hide();
}