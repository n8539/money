<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>小管家--云记账</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/bootstrap-responsive.min.css" /> 
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/index.css" />
	 <script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/epay.js"></script>
	<script type="text/javascript">
		var today="<?php echo date("Y-m-d");?>";
		var vendor=1;
		var js_root_path = "<?php echo site_url();?>";
	</script>
</head>
<body>
	<div class="container">
		<div class="navbar">
		  <div class="navbar-inner">
			<a class="brand" href="<?php echo site_url();?>"><b><?php echo $this->session->userdata('username');?></b> 的云账本</a>
			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </a>
			<div class="nav-collapse collapse">  
				<ul class="nav">
				  <li class="divider-vertical"></li>
				  <li id="input"  class="active"><a href="<?php echo site_url();?>epay/">支出/支出</a></li>
				  <li class="divider-vertical"></li> 
				  <li id="zctj"><a href="<?php echo site_url();?>epay/sum">支出收入统计</a></li>
				  <li class="divider-vertical"></li>
				  <li id="zctj"><a href="<?php echo site_url();?>home/dizhu">记牌器</a></li>
				  <li class="divider-vertical"></li>         
				  <li><a href="<?php echo site_url();?>home/logout">退出</a></li>
				  <li class="divider-vertical"></li>
				</ul>
			</div>
		  </div>
		</div>
        <div><a href="<?php echo site_url();?>home/dizhu">记牌器</a></div>
		<div class="main">
			<form class="form-signin">
			  <fieldset>
				<legend><h2>记一笔 &nbsp &nbsp <b>支出</b></h2></legend>
				<label>金额</label>
				<div class="input-append">
				  <input class="span2"  type="number" id="money" name="money" placeholder="输入金额，整数" autocomplete="off">
				  <span class="add-on"> 元</span>
				</div>
				<label>类别-- <b><span id="class_value"></span></b></label>
					<input  type="hidden" id="class" name="class">
					
					<div id="expend">
						<div id="option">
							<label class="radio inline">
							  <input type="radio" name="expend_method" id="optionsRadios1" value="1">
								现金消费
							</label>
							<label class="radio inline">
							  <input type="radio" name="expend_method" id="optionsRadios2" value="2">
								信用卡消费
							</label>
						</div>
						<div class="btn-group">
						  <div class="btn">饮食</div>
						  <div class="btn">购物</div>
						  <div class="btn">娱乐</div>
						  <div class="btn">支付宝</div>
						</div>
						<div class="btn-group">
						  <div class="btn">交通</div>
						  <div class="btn">其他</div>
						</div>					
					</div>
					<div id="income" style="display:none">
						<div class="btn-group">
							<div class="btn">工资</div>
							<div class="btn">奖金</div>
							<div class="btn">补贴</div>
							<div class="btn">其他</div>
						</div>
					</div>
					
				<label>备注</label>
				<input  type="text" id="info" name="info">			
				<label>日期</label>
				<div class="input-prepend">
				  <div class="btn  btn-info" id="date_up">上一天</div>
					<input class="date" id="date" name="date" type="text" style="width:100px">
				  <div class="btn  btn-info" id="date_down">下一天</div>
				</div>
			  </fieldset>
				<span class="help-block" id="callmsg"></span>
				<div id="submit" class="btn btn-large btn-primary">提 交</div>			
				<button type="reset" class="btn btn-large btn-warning">取 消</button>			
			</form>	
		</div>		
	</div>	
	<div class="footer navbar-fixed-bottom">
		<p>Powered by Sina App Engine</p>
	</div>	
</body>
</html>
