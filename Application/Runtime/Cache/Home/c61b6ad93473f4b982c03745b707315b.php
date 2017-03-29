<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:600px;width: 1360px;"></div>
    <!-- ECharts单文件引入 -->
    <script src="/screen-master/Public/Home/js/echarts.min.js"></script>
    <script src="/screen-master/Public/Home/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
    //转换json格式的数据
    
        function convertData(data){
           var arr = [];
           for (var i = 0; i < data.length; i++) {
                var tempdata = {value:parseInt(data[i]['rdata']),name:data[i]['user']}; 
                arr.push(tempdata);
           }
           return arr;
        }
    
       $.ajax({
           type: "POST",
           url: "<?php echo U('registerhandle');?>",
           data: "",
           dataType:'json',
           success: function(msg){
             console.log(msg);
             console.log(convertData(msg[0]));
             console.log(convertData(msg[1]));
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
                        name:'单位用户注册量',
                        type:'pie',
                        radius : '40%',
                        center: ['30%', '40%'],
                        data: convertData(msg[1])
                    },
                    {
                        name:'个人用户注册量',
                        type:'pie',
                        radius : '40%',
                        center: ['70%', '40%'],
                        data:convertData(msg[0])
                    }
                ]
            };                    
            // 为echarts对象加载数据 
            myChart.setOption(option); 

           }
       });
  
    </script>
</body>