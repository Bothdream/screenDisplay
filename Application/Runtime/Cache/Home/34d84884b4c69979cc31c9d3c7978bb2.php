<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:300px;"></div>
    <div id="main1" style="height:300px;"></div>
    <!-- ECharts单文件引入 -->
    <script src="/screen-master/Public/Home/js/echarts.min.js"></script>
    <script src="/screen-master/Public/Home/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
    /*******************转数据格式***************************/
     /**
      * { function_description }
      *
      * @param      {<type>}           msg     The message 穿入的数组
      * @param      {<type>}           para    The para  需要提取的字段
      * @param      {boolean}          flag    The flag  是否将提取的字段值转换为整型
      * @return     {(Array|boolean)}  { description_of_the_return_value }
      */
     function converdata(msg,para,flag){
        var flag = flag? true:false;
        var arr =[];
        if(typeof msg == 'object'){
           for (var i = 0; i < msg.length; i++) {
                 if(!flag){
                    arr.push(msg[i][para]);
                 }else{
                    arr.push(parseInt(msg[i][para]));
                 }
           }
           return arr;
        }else{
           return false;
        }
     }
        $.ajax({
           type:'post',
           url:"<?php echo U('workerdatahandle');?>",
           data:'',
           dataType:'json',
           success:function(msg){
              console.log(converdata(msg[0],'wname'));
              console.log(converdata(msg[0],'num',true));
              console.log(converdata(msg[1],'ttime',true));


             // 基于准备好的dom，初始化echarts图表
            var myChart = echarts.init(document.getElementById('main')); 
            var option = {
                title : {
                    text: '接听电话数量',
                    x:'center'
                },
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['2011年', '2012年'],
                    x:'right'
                },
                toolbox: {
                    show : false,
                    feature : {
                        mark : {show: true},
                        dataView : {show: true, readOnly: false},
                        magicType: {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                calculable : true,
                xAxis : [
                    {
                        type : 'value',
                        boundaryGap : [0, 0.01]
                    }
                ],
                yAxis : [
                    {
                        type : 'category',
                        data : converdata(msg[0],'wname'),
                        axisLabel:{
                            interval:0,  
                        },
                    }
                ],
                series : [
                    {
                        name:'2011年',
                        type:'bar',
                        data:converdata(msg[0],'num',true)
                    },
                    {
                        name:'2012年',
                        type:'bar',
                        data:converdata(msg[0],'num',true)
                    }
                ]
            };
                               
            // 为echarts对象加载数据 
            myChart.setOption(option); 

              // 基于准备好的dom，初始化echarts图表
            var myChart1 = echarts.init(document.getElementById('main1')); 
            var option1 = {
                title : {
                    text: '电话接听时长',
                    x:'center'
                },
                tooltip : {
                    trigger: 'axis'
                },
                legend: {
                    data:['2011年', '2012年'],
                    x:'right'
                },
                toolbox: {
                    show : false,
                    feature : {
                        mark : {show: true},
                        dataView : {show: true, readOnly: false},
                        magicType: {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
               calculable : true,
                xAxis : [
                    {
                        type : 'value',
                        boundaryGap : [0, 0.01]
                    }
                ],
                yAxis : [
                    {
                        type : 'category',
                        data : converdata(msg[0],'wname'),
                        axisLabel:{
                            interval:0,  
                        },
                    }
                ],
                series : [
                    {
                        name:'2011年',
                        type:'bar',
                        data:converdata(msg[1],'ttime',true)
                    },
                    {
                        name:'2012年',
                        type:'bar',
                        data:converdata(msg[1],'ttime',true)
                    }
                ]
            };
                               
            // 为echarts对象加载数据 
            myChart1.setOption(option1);


           },
           error: function (jqXHR, textStatus, errorThrown) {
            /*弹出jqXHR对象的信息*/
            alert(jqXHR.responseText);
            alert(jqXHR.status);
            alert(jqXHR.readyState);
            alert(jqXHR.statusText);
            /*弹出其他两个参数的信息*/
            alert(textStatus);
            alert(errorThrown);
           }

        });
      
    </script>
</body>