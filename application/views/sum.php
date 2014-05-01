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
	<script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/bootstrap.js"></script>
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
				  <li id="input"><a href="<?php echo site_url();?>epay/">支出/支出</a></li>
				  <li class="divider-vertical"></li> 
				  <li id="zctj" class="active"><a href="<?php echo site_url();?>epay/sum">支出收入统计</a></li>
				  <li class="divider-vertical"></li>
				  <li><a href="<?php echo site_url();?>home/logout">退出</a></li>
				  <li class="divider-vertical"></li>
				</ul>
			</div>
		  </div>
		</div>
		<div class="main">
			<div class="form-table">
				<div class="btn-toolbar">
					<div class="btn-group">
						<button class="btn btn-warning dropdown-toggle" data-toggle="dropdown">本月 <span class="caret"></span></button>
						<ul class="dropdown-menu">
						  <li><a href="#">本月</a></li>
						  <li class="divider"></li>
						  <li><a href="#">本周</a></li>
						  <li class="divider"></li>
						  <li><a href="#">所有</a></li>
					</div>
					<div class="btn-group" id="sum">
						<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">收入支出统计 <span class="caret"></span></button>
						<ul class="dropdown-menu">
						  <li id="slzc">收入支出统计</li>
						  <li class="divider"></li>
						  <li id="zc">支出统计</li>
						  <li class="divider"></li>
						  <li id="cashzc">现金支出统计</li>
						  <li class="divider"></li>
						  <li id="cardzc">信用卡支出统计</li>
						  <li class="divider"></li>
						  <li id="sl">收入统计</li>
					  </div>
				</div>
				<table class="table table-striped table-hover">
				  <thead>
					<tr >
					  <th>支出/收入</th>
					  <th>日期</th>
					  <th>金额</th>
					  <th>类别</th>
					   <th>备注</th>
					  <th>删除</th>
					</tr>
				  </thead>
				  <tbody class="zc_sum">		
					<?php 
						$cash_zc_money="";
						$card_zc_money="";
						foreach($zc_sum as $row){
						if($row->vendor-1) $card_zc_money+=$row->money;
						else $cash_zc_money+=$row->money;
					?>
					<tr id="<?=$row->id?>" class="<?=$row->vendor?>">
						<td><?=($row->vendor-1)?"<span style='color:red'>信用卡支出</span>":"<b>现金支出</b>"?></td>
						<td><?=$row->date?></td>
						<td><?=$row->money?></td>
						<td><?=$row->class?></td>
						<td><?=$row->info?></td>
						<td><div rel="<?=$row->id?>" class="icon-minus-sign"></div></td>
					</tr>
					<?php }?>			
				  </tbody>
				  <tbody class="sl_sum">		
					<?php 
						$sl_money="";
						foreach($sl_sum as $row){
						$sl_money+=$row->money;
					?>
					<tr id="<?=$row->id?>">
						<td><?=$row->vendor?"<b>支出</b>":"收入"?></td>
						<td><?=$row->date?></td>
						<td><?=$row->money?></td>
						<td><?=$row->class?></td>
						<td><?=$row->info?></td>
						<td><div rel="<?=$row->id?>" class="icon-minus-sign"></div></td>
					</tr>
					<?php }?>			
				  </tbody>
				</table>
				<p><span class="zc_sum">支出总额：<b><?=$cash_zc_money+$card_zc_money?></b></span> <span class="zc_sum">(现金支出：<b><?=$cash_zc_money?></b></span> <span class="zc_sum">信用卡支出总额：<b><?=$card_zc_money?></b></span>  <span class="sl_sum">)收入总额: <b><?=$sl_money?></b></span>余额:<b><?=$sl_money-$cash_zc_money-$card_zc_money?></b></p>
			</div>	
		</div>			
	</div>	
	<div class="footer navbar-fixed-bottom">
		<p>Powered by Sina App Engine</p>
	</div>
</body>
</html>
