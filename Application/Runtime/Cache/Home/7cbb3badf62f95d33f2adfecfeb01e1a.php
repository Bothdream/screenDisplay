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
		<li><a href="<?php echo U('register');?>" target="view_frame">用户注册量</a></li>
		<li><a href="<?php echo U('business');?>" target="view_frame">业务办理量</a></li>
		<li><a href="<?php echo U('feedback');?>" target="view_frame">用户意见反馈量</a></li>
	</ul>
</body>
</html>