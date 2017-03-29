<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:250px"></div>
    <div id="main1" style="height:250px"></div>
    <!-- ECharts单文件引入 -->
    <script src="/screen-master/Public/Home/js/echarts.min.js"></script>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts图表
        var myChart = echarts.init(document.getElementById('main')); 
        var option = {
                title : {
                    text: '累计的数据',
                    y:'top',
                    x:'center'
                },
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['反馈数量','已回复','未回复'],
                    x:'right'
                },
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data :  ['预选号牌','考试预约','违法处理','机车业务','驾驶证业务','系统反馈','其他意见']
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name:'反馈数量',
                        type:'bar',
                        data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6]
                    },
                    {
                        name:'已回复',
                        type:'bar',
                        data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6]
                    },
                     {
                        name:'未回复',
                        type:'bar',
                        data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6]
                    }
                ]
            };
                    
        // 为echarts对象加载数据 
        myChart.setOption(option); 


        // 基于准备好的dom，初始化echarts图表
        var myChart1 = echarts.init(document.getElementById('main1')); 
        var option1 = {
                title : {
                    text: '当月的数据',
                    y:'top',
                    x:'center'
                },
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['反馈数量','已回复','未回复'],
                    x:'right'
                },
                calculable : true,
                xAxis : [
                    {
                        type : 'category',
                        data : ['预选号牌','考试预约','违法处理','机车业务','驾驶证业务','系统反馈','其他意见']
                    }
                ],
                yAxis : [
                    {
                        type : 'value'
                    }
                ],
                series : [
                    {
                        name:'反馈数量',
                        type:'bar',
                        data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6]
                    },
                    {
                        name:'已回复',
                        type:'bar',
                        data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6]
                    },
                     {
                        name:'未回复',
                        type:'bar',
                        data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6]
                    }
                ]
            };
                    
        // 为echarts对象加载数据 
        myChart1.setOption(option1); 
    </script>
</body>