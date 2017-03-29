<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body >
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div class="wrap">
        <div class="box" style="width:100%;"> 
            <div id="main" style="height:250px;width: 50%;float: left;" ></div>
            <div id="main1" style="height:250px;width: 50%;float: left;"></div>
        </div>
        <div class="box" style="width:100%;">
            <div id="main2" style="height:250px;width: 50%;float: left;"></div>
            <div id="main3" style="height:250px;width: 50%;float: left;"></div>
        </div>
    </div>
   
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
    //data : ['员工一','员工一','员工一','员工一','员工一','员工一','员工一','员工一','员工一','员工一','员工一','员工一']
    // data:[2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
    //  data:[2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
    $.ajax({
        type:'POST',
        url:"<?php echo U('telcounselhandle');?>",
        data:'',
        dataType:'json',
        success:function(msg){
    // 基于准备好的dom，初始化echarts图表
        var myChart = echarts.init(document.getElementById('main')); 
        
        var option = {
            title:{text:'业务咨询类',x:'center'},
            tooltip : {
                trigger: 'axis'
            },
            calculable : true,
            xAxis : [
                {
                    type : 'category',
                    data :converdata(msg[0],'wname')
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    name : '数量',
                    axisLabel : {
                        formatter: '{value} 个'
                    }
                },
                {
                    type : 'value',
                    name : '时长',
                    axisLabel : {
                        formatter: '{value} h'
                    }
                }
            ],
            series : [
                {
                    name:'接听电话数量',
                    type:'bar',
                    data:converdata(msg[0],'num')
                },
                {
                    name:'接听电话时长',
                    type:'bar',
                    data:converdata(msg[0],'ttime')
                }
            ]
        };
                    
        // 为echarts对象加载数据 
        myChart.setOption(option); 


         // 基于准备好的dom，初始化echarts图表
        var myChart1 = echarts.init(document.getElementById('main1')); 
        
        var option1 = {
            title:{text:'故障申报类',x:'center'},
            tooltip : {
                trigger: 'axis'
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
            legend: {
                data:['接听电话数量','接听电话时长'],
                x:'right',
                selectedMode:false
            },
            xAxis : [
                {
                    type : 'category',
                   data :converdata(msg[1],'wname')
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    name : '数量',
                    axisLabel : {
                        formatter: '{value} 个'
                    }
                },
                {
                    type : 'value',
                    name : '时长',
                    axisLabel : {
                        formatter: '{value} h'
                    }
                }
            ],
            series : [

                {
                    name:'接听电话数量',
                    type:'bar',
                    data:converdata(msg[1],'num',true)
                },
                {
                    name:'接听电话时长',
                    type:'bar',
                    data:converdata(msg[1],'ttime',true)
                }
            ]
        };
                    
        // 为echarts对象加载数据 
        myChart1.setOption(option1); 

         // 基于准备好的dom，初始化echarts图表
        var myChart2 = echarts.init(document.getElementById('main2')); 
        
        var option2 = {
            title:{text:'投诉建立类',x:'center'},
            tooltip : {
                trigger: 'axis'
            },          
            calculable : true,
           
            xAxis : [
                {
                    type : 'category',
                    data : converdata(msg[2],'wname')
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    name : '数量',
                    axisLabel : {
                        formatter: '{value} 个'
                    }
                },
                {
                    type : 'value',
                    name : '时长',
                    axisLabel : {
                        formatter: '{value} h'
                    }
                }
            ],
            series : [

                {
                    name:'接听电话数量',
                    type:'bar',
                    data:converdata(msg[2],'num',true)
                },
                {
                    name:'接听电话时长',
                    type:'bar',
                    data:converdata(msg[2],'ttime',true)
                }
            ]
        };                  
        // 为echarts对象加载数据 
        myChart2.setOption(option2); 

         // 基于准备好的dom，初始化echarts图表
        var myChart3 = echarts.init(document.getElementById('main3')); 
    
        var option3 = {
              title:{text:'业务办理类',x:'center'},
            tooltip : {
                trigger: 'axis'
            },
            calculable : true,
            xAxis : [
                {
                    type : 'category',
                    data :converdata(msg[3],'wname')
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    name : '数量',
                    axisLabel : {
                        formatter: '{value} 个'
                    }
                },
                {
                    type : 'value',
                    name : '时长',
                    axisLabel : {
                        formatter: '{value} h'
                    }
                }
            ],
            series : [

                {
                    name:'接听电话数量',
                    type:'bar',
                    data:converdata(msg[3],'num',true)
                },
                {
                    name:'接听电话时长',
                    type:'bar',
                    data:converdata(msg[3],'ttime',true)
                }
            ]
        };         
        // 为echarts对象加载数据 
        myChart3.setOption(option3); 

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