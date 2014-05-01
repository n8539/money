<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>记牌器</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/bootstrap.min.css?1" />
	<link rel="stylesheet" href="<?php echo base_url();?><?php echo VIEW_PATH;?>css/dizhu.css?1" />
	<script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?><?php echo VIEW_PATH;?>js/dizhu.js?1"></script>
	<script type="text/javascript"></script>

</head>
<body>
	<div class="head">
		<h4 id="logo" onclick="location.reload()"> 记牌器</h4>
	</div>	
    <div class="area">
	<div>对手牌</div>
        <ul id="1"></ul>
    </div>	

    <div class="area">
		<div>选择区</div>
				<ul  id="2">
					<li>
						王
					</li>
					<li>
						2
					</li>
					<li>
						A
					</li>
					<li>
						K
					</li>
					<li>
						Q
					</li>
					<li>
						J
					</li>
					<li>
						10
					</li>
					<li>
						9
					</li>
					<li>
						8
					</li>
					<li>
						7
					</li>
					<li>
						6
					</li>
					<li>
						5
					</li>
					<li>
						4
					</li>
					<li>
						3
					</li>
					
				</ul>
        <div id="clear">清除</div>

    </div>	
	
</body>
</html>
