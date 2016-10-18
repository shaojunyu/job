$(function () {
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
});