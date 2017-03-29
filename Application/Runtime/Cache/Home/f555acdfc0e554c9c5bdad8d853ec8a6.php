<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>累计数据展示</title>
    <link rel="stylesheet" type="text/css" href="/screen-master/Public/Admin/css/bootstrap.css">
    <style>
      *{margin: 0;padding: 0;}
      #main2,#main{float: left;}
      table,tbody,tr{width: 100%;text-align: center;}
      #stitle{text-align: center;}
    </style>
</head>
<body>
    <h3 id="stitle">预约数据展示（累计）</h3>
    <div style="padding: 40px;">
        <div id="main2" style="height: 300px;width:440px;">
             <table  class="table table-bordered">
                 <tbody>
                     <tr><td colspan="2">2017年1月1日至本月累计数据</td></tr>
                     <tr>
                         <td>名称</td><td>数据</td>
                     </tr>
                     <?php foreach($data as $k => $v):?>
                         <tr>
                             <td><?php echo $v['type'];?></td><td><?php echo $v['data'];?></td>
                         </tr>
                     <?php endforeach;?>
                 </tbody>
             </table>
        </div>
        <div id="main" style="height: 500px;width: 800px;"></div>
  </div>
</body>
<script src="/screen-master/Public/Home/js/echarts.min.js"></script>
<script src="/screen-master/Public/Home/js/chongqing.js"></script>
<script>
var chart = echarts.init(document.getElementById('main'));
chart.setOption({
    backgroundColor: '#fff',
	title: {
        text: '重庆市地图',
        left: 'center',
        textStyle: {
            color: '#000'
        }
    },
    series: [{
            tooltip: {
                trigger: 'item',
                formatter: '{b}'
            },
            name: '选择器',
            type: 'map',
            mapType: '重庆',
            roam: false,
            selectedMode : 'single',
            zoom:1.2,
            itemStyle:{
                //normal:{label:{show:true}},
                emphasis:{label:{show:true}}
            }
        }
    ],
     animation: false
});

</script>
</html>