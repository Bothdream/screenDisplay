<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body >
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:500px;"></div>
    <!-- ECharts单文件引入 -->
    <script src="/screen-master/Public/Home/js/echarts.min.js"></script>
    <script src="/screen-master/Public/Home/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">

    /*转换json格式的数据:从服务器传过来的数据经过js以后应该转成如下的格式*/
    /*[
        {value:335, name:'受理'},
        {value:310, name:'回访'},
        {value:234, name:'转办'},
        {value:135, name:'退办'},
        {value:1548, name:'办结'}
    ] */

    function convertData(data){
       var arr = [];
       for(var key in data){
          var tempdata = {value: parseInt(data[key]),name:key};
          arr.push(tempdata);
       } 
       return arr;
    }
     
    function convertArr(data){
       var arr = [];
       for(var key in data){
          arr.push(key);
       } 
       return arr;
    }
    /****************************ajax请求服务器的数据************************/
     $.ajax({
         type: "POST",
         url: "<?php echo U('businessstatushandel');?>",
         data: "",
         dataType:'json',
         success: function(msg){
            //将数据转换成对应的格式 
            arr = convertData(msg);

            // 基于准备好的dom，初始化echarts图表
            var myChart = echarts.init(document.getElementById('main')); 
            var option = {
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient : 'vertical',
                    x : 'right',
                    data:convertArr(msg)
                },
                calculable : true,
                series : [
                    {
                        name:'访问来源',
                        type:'pie',
                        radius : '80%',
                        center: ['50%', '55%'],
                        data:arr
                    }
                ]
            };                    
            // 为echarts对象加载数据 
            myChart.setOption(option); 


         }
     });

    </script>
</body>