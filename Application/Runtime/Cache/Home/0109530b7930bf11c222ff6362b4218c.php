<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>数据展示</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="height:500px"></div>
    <select name="date" id='sdata' style="width:140px;margin: 0 auto;display:block;">
        <option value="2017">--请选择查询年份--</option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option> 
        <option value="2017">2017</option>
        <option value="2016">2016</option>
        <option value="2015">2015</option>
        <option value="2014">2014</option>
        <option value="2013">2013</option> 
        <option value="2012">2012</option>
    </select>
    <!-- ECharts单文件引入 -->
    <script src="/screen-master/Public/Home/js/echarts.min.js"></script>
    <script src="/screen-master/Public/Home/js/jquery-1.10.1.min.js"></script>
    <script type="text/javascript">
        /**
         * { 将月份转换为数值型，并且根据月份升序排列 }
         *
         * @param      {number}  arr     The arr
         * @return     {number}  { description_of_the_return_value }
         */
        function monthSort(arr){
            //将月份转化为数值型
            for (var i = 0; i < arr.length; i++) {
                arr[i]['month'] = parseInt(arr[i]['month']);
                arr[i]['data'] = parseInt(arr[i]['data']);
            }
            //根据月份排序
            for (var k = 0; k < arr.length; k++) {
                for (var j = k + 1; j< arr.length; j++) {
                    if(arr[k]['month'] - arr[j]['month'] > 0){
                        var temp = arr[k];
                        arr[k] = arr[j];
                        arr[j] = temp;
                    }
                }
            }
            return arr;
        }
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
            url:'<?php echo U('datahandle');?>',
            data:'',
            dataType:'json',
            success:function(msg){
                console.log(converdata(monthSort(msg[0]),'data')); 
                // 基于准备好的dom，初始化echarts图表
                var myChart = echarts.init(document.getElementById('main')); 
                var option = {
                        title : {
                            text: '预约数据展示（按月累计）',
                            y:'top',
                            x:'center'
                        },
                        tooltip : {
                            trigger: 'axis'
                        },
                        legend: {
                            data:['计划数','预约数','成功数'],
                            x:'right'
                        },
                        calculable : true,
                        xAxis : [
                            {
                                type : 'category',
                                data :  converdata(monthSort(msg[0]),'month')
                            }
                        ],
                        yAxis : [
                            {
                                type : 'value'
                            }
                        ],
                        series : [
                            {
                                name:'计划数',
                                type:'bar',
                                data:converdata(monthSort(msg[0]),'data')
                            },
                            {
                                name:'预约数',
                                type:'bar',
                                data:converdata(monthSort(msg[1]),'data')
                            },
                             {
                                name:'成功数',
                                type:'bar',
                                data:converdata(monthSort(msg[2]),'data')
                            }
                        ]
                    };
                            
                // 为echarts对象加载数据 
                myChart.setOption(option);
            }
    });
         
    
    $('#sdata').bind({
        'change':function(){
             var data = 'year='+$(this).val();
             $.ajax({
                type:'post',
                url:'<?php echo U('datahandle');?>',
                data:data,
                dataType:'json',
                success:function(msg){
                    console.log(converdata(monthSort(msg[0]),'data')); 
                    // 基于准备好的dom，初始化echarts图表
                    var myChart = echarts.init(document.getElementById('main')); 
                    var option = {
                            title : {
                                text: '预约数据展示（按月累计）',
                                y:'top',
                                x:'center'
                            },
                            tooltip : {
                                trigger: 'axis'
                            },
                            legend: {
                                data:['计划数','预约数','成功数'],
                                x:'right'
                            },
                            calculable : true,
                            xAxis : [
                                {
                                    type : 'category',
                                    data :  converdata(monthSort(msg[0]),'month')
                                }
                            ],
                            yAxis : [
                                {
                                    type : 'value'
                                }
                            ],
                            series : [
                                {
                                    name:'计划数',
                                    type:'bar',
                                    data:converdata(monthSort(msg[0]),'data')
                                },
                                {
                                    name:'预约数',
                                    type:'bar',
                                    data:converdata(monthSort(msg[1]),'data')
                                },
                                 {
                                    name:'成功数',
                                    type:'bar',
                                    data:converdata(monthSort(msg[2]),'data')
                                }
                            ]
                        };
                                
                    // 为echarts对象加载数据 
                    myChart.setOption(option);
                }
            });
        }
    });
    </script>
</body>