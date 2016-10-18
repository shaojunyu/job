$(function () {
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
	});
	$(".girl").tap(function () {
		if( $(".boy").hasClass("click-boy") ) {
			$(".boy").removeClass("click-boy");
		}
		$(this).addClass("click-girl");
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
		$(".choose-job").css("display", "none");
		$(".complete-info").css("display", "block");
	});
	$(".next2").tap(function () {
		$(".complete-info").css("display", "none");
		$(".school-roll").css("display", "block");
	});

	//填完了
	$(".finish").tap(function () {
		
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