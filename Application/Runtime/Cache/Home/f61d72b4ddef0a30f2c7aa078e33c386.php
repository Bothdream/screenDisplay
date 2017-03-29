<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
    <style>
      *{margin: 0;padding: 0;}
      div{display: inline-block;}
    </style>
</head>
<body>
    <div id="main1" style="height: 300px;width: 100%;"></div>
    <div id="main2" style="height: 300px;width:32%;"></div>
    <div id="main" style="height: 300px;width: 32%;"></div>
    <div id="main3" style="height: 300px;width: 32%;"></div>
</body>
<script src="/screen/Public/Home/js/echarts.min.js"></script>
<script src="/screen/Public/Home/js/chongqing.js"></script>
<script>

var chart = echarts.init(document.getElementById('main'));
chart.setOption({
    backgroundColor: '#fff',
	title: {
        text: '',
        left: 'center',
        textStyle: {
            color: '#000'
        }
    },
	legend: {
                orient : 'vertical',
                x : 'left',
                data:['在线','离线']
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
	window.open('region.php?s='+params.name,'_blank','height=700,width=1340,top=00,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no,fullscreen=yes');
});

var chart1 = echarts.init(document.getElementById('main1'));
option1= {
    title : {
        text: '重庆市用户注册量',
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
        data: ['个人用户','企业用户']
    },
    series : [
        {
            name: '访问来源',
            type: 'pie',
            radius : '60%',
            center: ['50%', '60%'],
            data:[
                {value:335, name:'个人用户'},
                {value:310, name:'企业用户'}

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
chart1.setOption(option1);

var chart2 = echarts.init(document.getElementById('main2'));
option2 = {
    title : {
        text: '个人用户',
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
            data : ['车驾用户', '学员用户', '新车车主用户', '窗口用户'],
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
            data:[10, 52, 200, 334]
        }
    ]
};
chart2.setOption(option2);

var chart3 = echarts.init(document.getElementById('main3'));
option3 = {
    title : {
        text: '单位用户',
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
            data : ['道路运输企业', '教育行政部门', '道路运输管理部门家', '驾驶培训企业', '汽车销售商家', '安监部门', '学校','医院','检测站','其他'],
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
            data:[10, 52, 200, 334, 390, 330, 220,234,11,352]
        }
    ]
};
chart3.setOption(option3);
</script>
</html>