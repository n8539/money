$(document).ready(function(){
	$('.date').val(today);
/* 	$('ul.nav li').click(function(){
		$('ul.nav li').removeClass("active");
		$(this).addClass("active");
	}) */
	$('#money').focus(function(){
		$('#callmsg').html("");	
	})
	$('.main form legend').click(function(){
		$('#class').val("");
		$('form #class_value').html("");
		if(vendor){
			$('.main form legend b').html("收入");
			$('#income').fadeIn('slow');
			$('#expend').toggle();
			vendor=0;
			$('#method').toggle();
		}
		else{
			$('.main form legend b').html("支出");
			$('#expend').toggle();	
			$('#income').fadeOut('slow');
			vendor=1;
			$('#method').toggle();
		}

	})		
	//下拉按钮选择收入、支出统计
	$('div#sum li').click(function(){
		$('div#sum button').html($(this).html()+" <span class='caret'></span>");
		
	})
	$('div#sum li#slzc').click(function(){
		$('.sl_sum').fadeIn();
		$('.zc_sum').fadeIn();
		$('.zc_sum tr').show();
	})	
	
	$('div#sum li#zc').click(function(){
		$('.sl_sum').fadeOut();
		$('.zc_sum').fadeIn();
		$('.zc_sum tr').show();
	})
	$('div#sum li#sl').click(function(){
		$('.zc_sum').fadeOut();
		$('.sl_sum').fadeIn();	
	})
	$('div#sum li#cashzc').click(function(){
		$('.sl_sum').fadeOut();
		$('.zc_sum').fadeIn();
		$('.zc_sum tr.2').hide();
		$('.zc_sum tr.1').show();
	})
	$('div#sum li#cardzc').click(function(){
		$('.sl_sum').fadeOut();
		$('.zc_sum').fadeIn();
		$('.zc_sum tr.1').hide();
		$('.zc_sum tr.2').show();
	})
	$('form .btn-group .btn').click(function(){
		$('#class').val($(this).html());
		$('form #class_value').html($(this).html());
		//console.log($('#class').val());
	})
	$('#date_up').click(function(){ 
		if(!$('.date').val()) $('.date').val(today);
		var arr = $('.date').val().split("-");  
		var newdt = new Date(Number(arr[0]),Number(arr[1])-1,Number(arr[2])-1);  
		repnewdt = newdt.getFullYear() + "-" +   (newdt.getMonth()+1) + "-" + newdt.getDate();  
		$('.date').val(repnewdt);  
	})
	$('#date_down').click(function(){ 
		if(!$('.date').val()) $('.date').val(today);
		var arr = $('.date').val().split("-");  
		var newdt = new Date(Number(arr[0]),Number(arr[1])-1,Number(arr[2])+1);  
		repnewdt = newdt.getFullYear() + "-" +   (newdt.getMonth()+1) + "-" + newdt.getDate();  
		$('.date').val(repnewdt);  
	})
	$('#submit').click(function(){
		if(!$('#money').val()){
			$('#money').css({'background':'#F5D3D9'}).focus();
			return false;
		}
		if(!$('#class').val()){
			$('#class_value').css({'background':'#F5D3D9'}).html("请输入类别");
			return false;
		}
		if(vendor&&!$('input[name=expend_method]:checked').val()){
			$('#option').css({'background':'#F5D3D9'});
			$('#class_value').css({'background':'#F5D3D9'}).html("请选择消费方式");
			return false;
		}
		if(vendor){
			vendor=$('input[name=expend_method]:checked').val();
		}
		var data = {
			'money':$('#money').val(),
			'class':$('#class').val(),
			'info':$('#info').val(),
			'date':$('.date').val(),
			'vendor':vendor
			};
		//前端的数据结构设定和数据库字段名称一致，js里面的对象就可以被php作为数组，并可以插入到数据库
		//console.log('client:',data);//查看下数据结构
		postData = {pdata:data};
		$.post(js_root_path+"epay/get_data",postData,function(msg){	
				$('#callmsg').html("<b>录入成功</b>");
				$('#money').val("");
				$('#class').val("");
				$('form #class_value').html("");
				$('#info').val("");
				//$('#callmsg').fadeOut(4000);
				//console.log(msg);
			});
	})
	
	$('.icon-minus-sign').click(function(){
		var id=$(this).attr('rel');
		var r=confirm("确认删除？");
		if (r==true){
			$.post(js_root_path+"/epay/del",{fid:id},function(msg){
				//console.log(msg);
				$('#'+id).remove();
			});		
		}
	})
	
})