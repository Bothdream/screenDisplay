<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
    <style>
      *{margin: 0;padding: 0;}
      div{float: left;}
    </style>
</head>
<body>
	 <div style="width: 33.33%;">
        <div id="main4" style="height: 300px;width:100%;"></div>
        <div id="main5" style="height: 300px;width: 100%;"></div>
     </div>    
        <div id="main" style="height: 600px;width: 33%;"></div>
     <div style="width: 33.33%;">
        <div id="main6" style="height: 300px;width: 100%;"></div>
        <div id="main7" style="height: 300px;width: 100%;"></div>
     </div>   
</body>
<script src="/screen/Public/Home/js/echarts.min.js"></script>
<script src="/screen/Public/Home/js/chongqing.js"></script>
<script>

var chart = echarts.init(document.getElementById('main'));
chart.setOption({
    backgroundColor: '#fff',
	title: {
        text: '重庆市业务量',
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
            roam: true,
            selectedMode : 'single',
            itemStyle:{
                //normal:{label:{show:true}},
                emphasis:{label:{show:true}}
            },
            data:[
                {name: '渝中区', selected:false},
                {name: '江北区', selected:false},
                {name: '南岸区', selected:false},
                {name: '九龙坡区', selected:false},
                {name: '沙坪坝区', selected:false},
                {name: '渝北区', selected:false},
                {name: '大渡口区', selected:false},
                {name: '巴南区', selected:false},
                {name: '北碚区', selected:false},
                {name: '万州区', selected:false},
                {name: '涪陵区(fulin)', selected:false},
                {name: '长寿区', selected:false},
                {name: '黔江区', selected:false},
                {name: '江津区', selected:false},
                {name: '合川区', selected:false},
                {name: '永川区', selected:false},
                {name: '南川区', selected:false},
                {name: '万盛区', selected:false},
                {name: '双桥区', selected:false},
                {name: '綦江县', selected:false},
                {name: '潼南县', selected:false},
                {name: '铜梁县', selected:false},
                {name: '大足县', selected:false},
                {name: '荣昌县', selected:false},
                {name: '璧山县', selected:false},
                {name: '垫江县', selected:false},
                {name: '武隆县', selected:false},
                {name: '丰都县', selected:false},
                {name: '城口县', selected:false},
                {name: '梁平县', selected:false},
                {name: '开县', selected:false},
                {name: '巫溪县', selected:false},
                {name: '巫山县', selected:false},
                {name: '奉节县', selected:false},
                {name: '云阳县', selected:false},
                {name: '秀山土家族苗族自治县', selected:false},
                {name: '忠县', selected:false},
                {name: '石柱土家族自治县', selected:false},
                {name: '彭水苗族土家族自治县', selected:false},
                {name: '酉阳土家族苗族自治县', selected:false}
            ]
        }
    ],
     animation: false
});
chart.on('click', function (params){
	window.open('fulin.php?s='+params.name,'_blank','height=700,width=1340,top=00,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no,fullscreen=yes');
});

var chart4 = echarts.init(document.getElementById('main4'));
option4= {
    title : {
        text: '业务办理总量',
        subtext: '纯属虚构',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        right: 'right',
        data: ['机动车业务','驾驶证业务','违法处理业务']
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'机动车业务'},
                {value:310, name:'驾驶证业务'},
                {value:234, name:'违法处理业务'}
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
chart4.setOption(option4);

var chart5= echarts.init(document.getElementById('main5'));
option5 = {
    title : {
        text: '机动车业务',
        subtext: '纯属虚构',
        x:'center'
    },
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : ['预选机动车号牌', '机动车检验预约', '补领机动车号牌', '换领机动车号牌', '补领机动车行驶证', '换领机动车行驶证', '补换领机动车检验合格标志','变更车主联系方式'],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'直接访问',
            type:'bar',
            barWidth: '60%',
            data:[10, 52, 200, 334, 390, 330, 220,100]
        }
    ]
};
chart5.setOption(option5);

var chart6= echarts.init(document.getElementById('main6'));
option6 = {
    title : {
        text: '驾驶证业务',
        subtext: '纯属虚构',
        x:'center'
    },
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : ['期满换证', '超龄换证', '损毁换证', '遗失补证', '延期换证', '延期审验', '延期提交身体条件证明','考试预约','取消考试预约','打印学习驾驶证明','变更联系方式'],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'直接访问',
            type:'bar',
            barWidth: '60%',
            data:[10, 52, 200, 334, 390, 330, 220, 231, 114, 312, 213]
        }
    ]
};
chart6.setOption(option6);

var chart7 = echarts.init(document.getElementById('main7'));
option7 = {
    title : {
        text: '违法处理业务',
        subtext: '纯属虚构',
        x:'center'
    },
    color: ['#3398DB'],
    tooltip : {
        trigger: 'axis',
        axisPointer : {            // 坐标轴指示器，坐标轴触发有效
            type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis : [
        {
            type : 'category',
            data : ['电子监控处理', '缴纳罚款'],
            axisTick: {
                alignWithLabel: true
            }
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'直接访问',
            type:'bar',
            barWidth: '60%',
            data:[330, 220]
        }
    ]
};
chart7.setOption(option7);
</script>
</html>