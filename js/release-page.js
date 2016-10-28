$(function () {
	$(".item").tap(function () {
		if( $(this).hasClass("click") ) {
			$(this).removeClass("click");
			return;
		}
		$(this).addClass("click");
	});

	//begin
	$('.begin-date').focus(function(){
	    $(this).removeAttr('placeholder');
	});
	$('.begin-date').blur(function(){
	    if($(this).val() === '') {
	    	$(this).attr('placeholder', '开始日期');
	    }
	});

	//end
	$('.end-date').focus(function(){
	    $(this).removeAttr('placeholder');
	});
	$('.end-date').blur(function(){
	    if($(this).val() === '') {
	    	$(this).attr('placeholder', '结束日期');
	    }
	});

	//next1
	var tag1 = "";
	var tag2 = "";
	$(".next1").tap(function () {
		if($(".ordinary .click").length === 0 && $(".skill .click").length === 0) {
			showMsg("请选择至少一项");
			return;
		}
		$(".ordinary .click").each(function () {
			tag1 = tag1 + $(this).html() + ",";
		});
		$(".skill .click").each(function () {
			tag2 = tag2 + $(this).html() + ",";
		});
		tag1 = tag1 === "" ? "" : tag1.substr(0, tag1.length-1);
		tag2 = tag2 === "" ? "" : tag2.substr(0, tag2.length-1);
		$(".tag1").val(tag1);
		$(".tag2").val(tag2);
		$(".content1").hide();
		$(".content").show();
	});

	//next2
	$(".next2").tap(function () {
		if($(".job-title").val() === "") {
			showMsg("请输入兼职标题");
			return;
		}
		else if($(".begin-date").val() === "" || $(".end-date").val() === "") {
			showMsg("请选择工作日期");
			return;
		}
		else if($(".period").val() === "" && !$('.check1').prop('checked')) {
			showMsg("请选择兼职时段");
			return;
		}
		else if($(".site").val() === "" && !$('.check2').prop('checked')) {
			showMsg("请输入兼职地点");
			return;
		}
		else if($(".number").val() === "") {
			showMsg("请输入兼职人数");
			return;
		}
		else if($(".salary").val() === "") {
			showMsg("请输入工资待遇");
			return;
		}
		else if($(".requirement").val() === "") {
			showMsg("请输入工作要求");
			return;
		}

		//checkbox
		if($(".period").val() !== "" && $('.check1').prop('checked')) {
			showMsg("兼职时段不能同时填写和点选");
			return;
		}
		if($(".site").val() !== "" && $('.check2').prop('checked')) {
			showMsg("兼职地点不能同时填写和点选");
			return;
		}

		if($('.check1').prop('checked')) {
			$(".period").val("anytime");
		}
		if($('.check2').prop('checked')) {
			$(".site").val("anywhere");
		}
		
		$("form").submit();
	});
});

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