<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>小管家--登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/bootstrap-responsive.min.css" /> 
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/index.css" />
	<script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/bootstrap.min.js"></script> -->
	<script type="text/javascript">
		function validate_form1(){
				if((!$('input[name=login_password]').val())||(!($('input[name=login_username]').val().length>4))){
					if(!$('input[name=login_password]').val()){
						$('input[name=login_password]').css({'background':'#F5D3D9'}).focus().val("");
					}
					if(!($('input[name=login_username]').val().length>4)){
						$('input[name=login_username]').css({'background':'#F5D3D9'}).focus().val("");
					}	
					return false;
				}
				else return true;
		}
	</script>
</head>
<body>
	<div class="head">
		<h1 id="logo" onclick="location.reload()"> 小管家--云记账</h1>
	</div>	
	<div class="main">
	
    <div class="container">

      <form class="form-signin" method="post" action="<?php echo site_url();?>home/verify" onsubmit="return validate_form1()">
        <h2 class="form-signin-heading">请登录</h2>
        <input type="text" name="login_username" class="input-block-level" placeholder="用户名">
        <input type="password" name="login_password" class="input-block-level" placeholder="密码">
        <button class="btn btn-large btn-primary" type="submit" >登 &nbsp &nbsp 录</button>
		<button  id="signup" class="btn btn-large btn-warning" type="button" onclick="location.href='<?php echo site_url('home/register');?>'">立即注册</button>
      </form>

    </div>	
	
	
	</div>
	<div class="progress progress-info">
	  <div class="bar" style="width: 20%"></div>
	</div>
	<div class="progress progress-success">
	  <div class="bar" style="width: 40%"></div>
	</div>
	<div class="progress progress-warning">
	  <div class="bar" style="width: 60%"></div>
	</div>
	<div class="progress progress-danger">
	  <div class="bar" style="width: 80%"></div>
	</div>
	<div class="footer navbar-fixed-bottom">
		<p>Powered by Sina App Engine</p>
	</div>
</body>
</html>
