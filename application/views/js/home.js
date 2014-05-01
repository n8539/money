$(document).ready(function(){
	$('#area .block_style').click(function(){
		location = js_root_path+'/exam/select/'+$(this).attr('id');
	})
			
	$('#login').click(function(){
		var data=$('#user').val();
		var patt1=/^\d{1,6}$/;
		if(!patt1.test(data)){
			$('#user').css({'background':'#F5D3D9'}).focus().val("");
			$('#loginform p').html('输入无效！！！');
			return;	
		}
 		$.post(js_root_path+'/home/verify/',{username:data,webInfo:navigator.appName+" "+navigator.platform},function(msg){
			location.reload(); 
		},'json');				
	})

	$('#user').keyup(function(e){
			if(e.keyCode==13) $('#login').click();
		})	
	$('#footer').click(function(){
		$('#info').toggle();
	})	
	$('#logout').click(function(){
		$.post(js_root_path+"/home/logout",function(){
			location.reload();	
		});
	})

})