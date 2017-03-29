<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<style type="text/css" media="screen">
		a,ul,li{display: inline-block;text-align: center;text-decoration: none;}
	</style>
</head>
<body>
	<ul>
		<li><a href="<?php echo U('workdata');?>" target="view_frame">工作数据展示</a></li>
		<li><a href="<?php echo U('telcounsel');?>" target="view_frame">电话咨询</a></li>
		<li><a href="<?php echo U('businessstatus');?>" target="view_frame">业务办理状态</a></li>
		<li><a href="<?php echo U('workerdata');?>" target="view_frame">员工工作数据</a></li>
	</ul>
</body>
</html>