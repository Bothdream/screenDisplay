<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:600px;width: 1360px;"></div>
    <!-- ECharts单文件引入 -->
    <script src="http://echarts.baidu.com/build/dist/echarts-all.js"></script>
    <script type="text/javascript">
    window.onload=function(){
        // 基于准备好的dom，初始化echarts图表
        var myChart = echarts.init(document.getElementById('main')); 
        var option = {
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            calculable : true,
            series : [
                {
                    name:'注册来源',
                    type:'pie',
                    radius : '40%',
                    center: ['30%', '40%'],
                    data:[
                        {value:335, name:'道路运输企业'},
                        {value:310, name:'教育行政部门'},
                        {value:234, name:'道路运输管理部门'},
                        {value:135, name:'驾驶培训企业'},
                        {value:335, name:'汽车销售商'},
                        {value:310, name:'安监部门'},
                        {value:234, name:'学校'},
                        {value:135, name:'医院'},
                        {value:335, name:'检测站'},
                        {value:310, name:'全日制驾驶职业教育学校'},
                        {value:234, name:'保险公司'},
                        {value:135, name:'其他'}
                    ]
                },
                {
                    name:'访问来源',
                    type:'pie',
                    radius : '40%',
                    center: ['70%', '40%'],
                    data:[
                        {value:335, name:'个人面签'},
                        {value:310, name:'新车车主'},
                        {value:234, name:'机动车驾驶人'},
                        {value:135, name:'学员'}
                    ]
                }
            ]
        };                    
        // 为echarts对象加载数据 
        myChart.setOption(option); 
    }
    </script>
</body>