<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>累计数据展示</title>
    <link rel="stylesheet" type="text/css" href="/screen-master/Public/Admin/css/bootstrap.css">
</head>
<body>
        <div id="main" style="height: 700px;width: 100%;"></div>
</body>
<script src="/screen-master/Public/Home/js/echarts.min.js"></script>
<script src="/screen-master/Public/Home/js/cq/chongqing.js"></script>
<script>
/*科目一信息*/
var data1 = [
         {name: '鄂尔多斯', value: 120},
         {name: '招远', value: 120},
         {name: '舟山', value: 120},
         {name: '齐齐哈尔', value: 140},
         {name: '乳山', value: 180},
         {name: '金昌', value: 190}
  ];
var geoCoordMap1 = {
    '鄂尔多斯':[106.2328,29.5722],
    '招远':[106.2695,29.2816],
    '舟山':[105.4362,29.3657],
    '齐齐哈尔':[105.7894,29.4934],
    '乳山':[105.8738,29.2905],
    '金昌':[106.3974,29.8004]
};
/*科目二信息*/
var data2 = [
         {name: '鄂尔多斯', value: 120},
         {name: '招远', value: 120},
         {name: '舟山', value: 120},
         {name: '齐齐哈尔', value: 140},
         {name: '乳山', value: 180},
         {name: '金昌', value: 190}
  ];
var geoCoordMap2 = {
    '鄂尔多斯':[105.88857,29.3516],
    '招远':[108.8012,29.4853],
    '舟山':[108.9785,28.4411],
    '齐齐哈尔':[107.0820,29.8759],
    '乳山':[106.6508,29.0886],
    '金昌':[108.3996,30.7682]
};
/*科目三信息*/
var data3 = [
         {name: '鄂尔多斯', value: 120},
         {name: '招远', value: 120},
         {name: '舟山', value: 120},
         {name: '齐齐哈尔', value: 140},
         {name: '乳山', value: 180},
         {name: '金昌', value: 190}
  ];
var geoCoordMap3 = {
    '鄂尔多斯':[105.8854,29.3516],
    '招远':[108.7676,29.5271],
    '舟山':[108.9835,28.4592],
    '齐齐哈尔':[107.3322,30.3255],
    '乳山':[108.3989,30.7696],
    '金昌':[106.3718,29.6314]
};
/**********转换数据格式的函数************/
//返回值的格式：[{name:'',vlaue:['经度','纬度','数值']},{name:'',vlaue:['经度','纬度','数值']},...]
 function convertData(data,geoCoordMap) {
    var res = [];
    for (var i = 0; i < data.length; i++) {
        var geoCoord = geoCoordMap[data[i].name];
        if (geoCoord) {
            res.push({
                name: data[i].name,
                value: geoCoord.concat(data[i].value)
            });
        }
    }
    return res;
};
/***************显示驾考信息*******************/
var chart = echarts.init(document.getElementById('main'));
chart.setOption({
    backgroundColor: '#CDFAF8',
	title: {
        text: '重庆市地图',
        left: 'center',
        textStyle: {
            color: '#000'
        }
    },
    legend: {
        orient: 'vertical',
        y: 'top',
        x:'right',
        data:['科目一','科目二','科目三'],
        textStyle: {
            color: '#000'
        }
    },
    geo: {
        map: 'wangzhou',
        label: {
            emphasis: {
                show: false
            }
        },
        roam: false,
        itemStyle: {
            normal: {
                areaColor: '#DDF8FA',
                borderColor: '#111'
            },
            emphasis: {
                areaColor: '#DDF8FA'
            }
        }
    },
    series: [{
            name: '科目一',
            type: 'scatter',
            coordinateSystem: 'geo',
            data: convertData(data1,geoCoordMap1),
            symbolSize: function (val) {
                return val[2] / 10;
            },
            label: {
                normal: {
                    formatter: '{b}',
                    position: 'right',
                    show: false
                },
                emphasis: {
                    show: true
                }
            },
            itemStyle: {
                normal: {
                    color: '#ff0000'
                }
            }
        },
        {
            name: '科目二',
            type: 'scatter',
            coordinateSystem: 'geo',
            data: convertData(data2,geoCoordMap2),
            symbolSize: function (val) {
                return val[2] / 10;
            },
            label: {
                normal: {
                    formatter: '{b}',
                    position: 'right',
                    show: false
                },
                emphasis: {
                    show: true
                }
            },
            itemStyle: {
                normal: {
                    color: '#ddb126'
                }
            }
        },
        {
            name: '科目三',
            type: 'scatter',
            coordinateSystem: 'geo',
            data: convertData(data3,geoCoordMap3),
            symbolSize: function (val) {
                return val[2] / 10;
            },
            label: {
                normal: {
                    formatter: '{b}',
                    position: 'right',
                    show: false
                },
                emphasis: {
                    show: true
                }
            },
            itemStyle: {
                normal: {
                    color: '#5B9BD5'
                }
            }
        }
    ],
    animation: false
});

</script>
</html>