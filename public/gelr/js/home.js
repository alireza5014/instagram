/* ========================================================================

Home Js

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
jQuery(document).ready(function ($) {
    //CACHE JQUERY OBJECTS
    var $window = $(window);

    if ($('#sale_chart_vz').length) {
        setTimeout(function() {
            $(function() {
                var chart = am4core.create("sale_chart_vz", am4charts.XYChart);

                // Add data
                chart.data = [{
                    period: '2013',
                    فروش: 10,
                    سفارشات: 20
                }, {
                    period: '2014',
                    فروش: 40,
                    سفارشات: 50
                }, {
                    period: '2015',
                    فروش: 20,
                    سفارشات: 30
                }, {
                    period: '2016',
                    فروش: 30,
                    سفارشات: 40
                }, {
                    period: '2017',
                    فروش: 20,
                    سفارشات: 30
                }, {
                    period: '2018',
                    فروش: 40,
                    سفارشات: 50
                }, {
                    period: '2019',
                    فروش: 20,
                    سفارشات: 30
                }];

                var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "period";

                chart.yAxes.push(new am4charts.ValueAxis());

                var series = chart.series.push(new am4charts.LineSeries());
                series.dataFields.valueY = "فروش";
                series.dataFields.categoryX = "period";
                series.name = "فروش";
                series.tooltipText = "{name}: [bold]{valueY}[/]";
                series.strokeWidth = 3;
                series.strokeDasharray = 10;
                series.tensionY = 1;
                series.tensionX = 0.8;
                series.fill = am4core.color("#fa6c39");
                series.stroke = am4core.color("#fa6c39");
                var dropShadow2 = new am4core.DropShadowFilter();
                dropShadow2.dy = 15;
                dropShadow2.dx = 1;
                dropShadow2.blur = 8;
                dropShadow2.opacity = 0.5;
                dropShadow2.color = '#fa6c39';
                series.filters.push(dropShadow2);

                var series2 = chart.series.push(new am4charts.LineSeries());
                series2.dataFields.valueY = "سفارشات";
                series2.dataFields.categoryX = "period";
                series2.name = "سفارشات";
                series2.tooltipText = "{name}: [bold]{valueY}[/]";
                series2.strokeWidth = 3;
                series2.tensionY = 1;
                series2.tensionX = 0.8;
                series2.fill = am4core.color("#832F9C");
                series2.stroke = am4core.color("#832F9C");
                var dropShadow = new am4core.DropShadowFilter();
                dropShadow.dy = 15;
                dropShadow.dx = 1;
                dropShadow.blur = 8;
                dropShadow.opacity = 0.5;
                dropShadow.color = '#832F9C';
                series2.filters.push(dropShadow);

                chart.cursor = new am4charts.XYCursor();
                categoryAxis.renderer.grid.template.strokeOpacity = 0;
            });
        }, 100);
    }

    if ($('#vz_pie_chart_home').length) {
        // Create chart instance
        var chart = am4core.create("vz_pie_chart_home", am4charts.PieChart);

        // Add data
        chart.data = [{
            "country": "لیتوانی",
            "litres": 501.9
        }, {
            "country": "چک",
            "litres": 301.9
        }, {
            "country": "اتریش",
            "litres": 128.3
        }, {
            "country": "آلمان",
            "litres": 165.8
        }, {
            "country": "انگلیس",
            "litres": 99
        }, {
            "country": "بلژیک",
            "litres": 60
        }];

        // Add and configure Series
        var pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "litres";
        pieSeries.dataFields.category = "country";

        // Let's cut a hole in our Pie chart the size of 40% the radius
        chart.innerRadius = am4core.percent(75);

        // Disable ticks and labels
        pieSeries.labels.template.disabled = true;
        pieSeries.ticks.template.disabled = true;

        // Add a legend
        chart.legend = new am4charts.Legend();
        var markerTemplate = chart.legend.markers.template;
        markerTemplate.width = 20;
        markerTemplate.height = 6;

        chart.legend.labels.template.text = "[bold {color}]{name}[/]";

        // Set up fills
        pieSeries.slices.template.fillOpacity = 1;

        var hs = pieSeries.slices.template.states.getKey("hover");
        hs.properties.scale = 1;
        hs.properties.fillOpacity = 0.5;

        pieSeries.colors.list = [
            am4core.color("#922c88"),
            am4core.color("#7ed321"),
            am4core.color("#7abec5"),
            am4core.color("#ff3270"),
            am4core.color("#845EC2"),
            am4core.color("#FF9671")
        ];
    }

    if( $('#sales_stats').length > 0 ){
        var sales_stats = echarts.init(document.getElementById('sales_stats'));
        var option8 = {
            color: ['#922c88', '#fa6c39'],
            tooltip: {
                show: true,
                trigger: 'axis',
                backgroundColor: '#fff',
                borderRadius:6,
                padding:6,
                axisPointer:{
                    lineStyle:{
                        width:0,
                    }
                },
                textStyle: {
                    color: '#324148',
                    fontFamily: '"iran"',
                    fontSize: 12
                }
            },
            grid: {
                top: '3%',
                left: '3%',
                right: '3%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [{
                type: 'value',
                axisLine: {
                    show:false
                },
                axisTick: {
                    show:false
                },
                axisLabel: {
                    textStyle: {
                        color: '#5e7d8a'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: '#eaecec',
                    }
                }
            }],
            yAxis: {
                type: 'category',
                data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun','Mon', 'Tue', 'Wed', 'Thu'],
                axisLine: {
                    show:false
                },
                axisTick: {
                    show:false
                },
                axisLabel: {
                    textStyle: {
                        color: '#5e7d8a'
                    }
                }
            },
            series: [{
                name:'1',
                type:'bar',
                stack: 'st1',
                barMaxWidth: 7.5,
                data:[320, 332, 301, 334, 390, 330, 320,334, 390, 330, 320],
            },
                {
                    name:'2',
                    type:'bar',
                    stack: 'st1',
                    barMaxWidth: 7.5,
                    data:[-120, -132, -101, -134, -90, -230, -210,-134, -90, -230, -210],
                }]
        };
        sales_stats.setOption(option8);
        sales_stats.resize();
    }


    /*======== Home Version 2 =========*/

    if( $('#traffic_status').length > 0 ){
        var traffic_status = echarts.init(document.getElementById('traffic_status'));
        var option5 = {
            color: ['#832F9C'],
            tooltip: {
                show: true,
                trigger: 'axis',
                backgroundColor: '#fff',
                borderRadius:6,
                padding:6,
                axisPointer:{
                    lineStyle:{
                        width:0,
                    }
                },
                textStyle: {
                    color: '#324148',
                    fontFamily: '"iran"',
                    fontSize: 12
                }
            },

            grid: {
                top: '3%',
                left: '3%',
                right: '3%',
                bottom: '3%',
                containLabel: true
            },
            xAxis : [
                {
                    type : 'category',
                    data: ['دو', 'سه', 'چهار', 'پنج', 'جمعه', 'شنبه', 'یک'],
                    axisLine: {
                        show:false
                    },
                    axisTick: {
                        show:false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#5e7d8a'
                        }
                    }
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLine: {
                        show:false
                    },
                    axisTick: {
                        show:false
                    },
                    axisLabel: {
                        textStyle: {
                            color: '#5e7d8a'
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: '#eaecec',
                        }
                    }
                }
            ],

            series: [
                {
                    data:[420, 332, 401, 334, 400, 330, 410],
                    type: 'bar',
                    barMaxWidth: 30,
                },
                {
                    data: [220, 282, 391, 300, 390, 230, 210],
                    type: 'line',
                    symbolSize: 6,
                    itemStyle: {
                        color: '#FF9671',
                    },
                    lineStyle: {
                        color: '#FF9671',
                        width:2,
                    }
                },
                {
                    data: [120, 152, 251, 124, 250, 120, 110],
                    type: 'line',
                    symbolSize: 6,
                    itemStyle: {
                        color: '#845EC2',
                    },
                    lineStyle: {
                        color: '#845EC2',
                        width:2,
                    }
                }
            ]
        };
        traffic_status.setOption(option5);
        traffic_status.resize();
    }


    if($('#mobile_visits_chart').length > 0) {
        Morris.Area({
            element: 'mobile_visits_chart',
            data: [{
                period: '2010',
                iphone: 50,
            }, {
                period: '2011',
                iphone: 130,
            }, {
                period: '2012',
                iphone: 80,
            }, {
                period: '2013',
                iphone: 70,
            }, {
                period: '2014',
                iphone: 180,
            }, {
                period: '2015',
                iphone: 105,
            },
                {
                    period: '2016',
                    iphone: 250,
                }],
            xkey: 'period',
            ykeys: ['iphone'],
            labels: ['آیفون'],
            pointSize: 5,
            fillOpacity: .03,
            lineWidth:2,
            pointStrokeColors:['#fff'],
            behaveLikeLine: true,
            hideHover: 'auto',
            gridLineColor: '#eaecec',
            lineColors: ['#922c88'],
            resize: true,
            smooth:true,
            gridTextColor:'#5e7d8a',
            gridTextFamily:"Inherit"

        });
    }

    var piedata = [
        { label: 'France', data: [[1, 40]], color: '#922c88' },
        { label: 'United Kingdom', data: [[1, 20]], color: '#7ed321' },
        { label: 'United States', data: [[1, 15]], color: '#ff3270' },
        { label: 'Canada', data: [[1, 10]], color: '#845EC2' },
    ];

    $.plot('#sales_country', piedata, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.6,
                label: {
                    show: true,
                    radius: 3.2 / 4,
                    formatter: textFormatter,
                }
            }
        },
        grid: {
            hoverable: false,
            clickable: false
        },
        legend: {
            show: false
        }
    });

    function textFormatter(label, series) {
        return '<div style="font-size:10px; font-weight:700; text-align:center; color:#ffff;">' + Math.round(series.percent) + '%</div>';
    }

    /*======== Home Version 3 =========*/

    var sales_statistics_chart = [
        [0, 41.545877871210541],
        [1, 42.47564741005432],
        [2, 43.26554654541321],
        [3, 54.54541231212547],
        [4, 55.54312121548646],
        [5, 56.20000047877499],
        [6, 57.21231874641165],
        [7, 58.45654778991100],
        [8, 59.99677491680908],
        [9, 52.21200254878512],
        [10, 57.53415454454554],
        [11, 61.01324578878788],
        [12, 52.7457726121753],
        [13, 63.1545448787999],
        [14, 64.45284705814520],
        [15, 55.11202276349138],
        [16, 56.72497594269612],
        [17, 67.070341498681124],
        [18, 58.09867716530438],
        [19, 49.48185519192089],
        [20, 41.57861168097493],
        [21, 42.99789250679436],
        [22, 53.582491800119456],
        [23, 54.28407438696142],
        [24, 45.24606628705599],
        [25, 36.614330310543856],
        [26, 47.75313497797672],
        [27, 58.34463925296746],
        [28, 49.217320673443936],
        [29, 50.657281647073304],
        [30, 51.445057217757245],
        [31, 52.063914668561345],
        [32, 53.07494250387825],
        [33, 54.970403392565515],
        [34, 45.723854145068756],
        [35, 56.69064629353968],
        [36, 57.590890118378205],
        [37, 58.52332126105745],
        [38, 59.1037709679581],
        [39, 50.05347017020425],
        [40, 61.350810521199946],
        [41, 52.746188675088575],
        [42, 63.276910973029786],
        [43, 64.00841651851749],
        [44, 55.786733623457636],
        [45, 56.805721677811356],
        [46, 57.90301959619822],
        [47, 68.45091969566289],
        [48, 59.75007922945926],
        [49, 50.405842466185355],
        [50, 51.746633122658444],
        [51, 50.465452111212744],
        [52, 50.3020769891715],
        [53, 51.56370473325533],
        [54, 57.407205992344544],
        [55, 48.49825590435839],
        [56, 52.4975614755482],
        [57, 49.79614749316488],
        [58, 47.46776704767111],
        [59, 42.317880548036456],
        [60, 38.96296121124144],
        [61, 34.73218432559628],
        [62, 31.033700732272116],
        [63, 30.637987000382296],
        [64, 37.89513637594264],
        [65, 32.89701755609185],
        [66, 38.742284578187544],
        [67, 42.20516407297906],
        [68, 43.82094321791933],
        [69, 44.64770271525896],
        [70, 40.15348765453412],
        [71, 39.737654438195236],
        [72, 39.755190738237744],
        [73, 37.96228929938593],
        [74, 30.38197394166947],
        [75, 27.95038772723346],
        [76, 20.08944448751686],
        [77, 23.54611335622507],
        [78, 24.309610481106425],
        [79, 38.276849322378055],
        [80, 23.25409223418214],
        [81, 27.920374921780102],
        [82, 26.143447932376702],
        [83, 21.09444253479626],
        [84, 23.79459089729409],
        [85, 23.46775072519832],
        [86, 25.9908486073969],
        [87, 28.218855925354447],
        [88, 22.9163141686872],
        [89, 17.217667423877607],
        [90, 19.135179958932145],
        [91, 20.08666008920407],
        [92, 22.006269617032526],
        [93, 10.201671310476282],
        [94, 9.475865090236113],
        [95, 28.645754524211824],
        [96, 17.76161040821357],
        [97, 13.995208323029495],
        [98, 8.59338056489445],
        [99, 9.536707176236195],
        [100, 11.01308268888571]
    ];

    if($('#sales_statistics_chart').length > 0) {
        var plot = $.plot($('#sales_statistics_chart'), [
                {
                    data: sales_statistics_chart,
                    label: 'فروش',
                    color: '#5e2572'
                }],
            {
                series: {
                    lines: {
                        show: true,
                        lineWidth: 2,
                        fill: true,
                        fillColor: { colors: [{ opacity: 0 }, { opacity: .4 }] }
                    },
                    shadowSize: 1
                },
                points: {
                    show: false,
                },
                legend: {
                    noColumns: 1,
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    borderWidth: 0,
                    labelMargin: 5
                },
                yaxis: {
                    ticks: [[0, ''], [15, '$1000'], [30, '$2000'], [50, '$3000'], [75, '$4000'], [100, '$5000']],
                    min: 0,
                    max: 70,
                    color: 'rgba(0,0,0,.070)',
                    font: {
                        size: 10,
                        color: '#777777'
                    }
                },
                xaxis: {
                    ticks: [[0, 'دو'], [20, 'سه'], [40, 'چهار'], [60, 'پنج'], [80, 'جمعه'], [100, 'شنبه']],
                    color: 'rgba(0,0,0,.070)',
                    font: {
                        size: 10,
                        color: '#777777'
                    }
                }
            });
    }


    if( $('#referral_chart').length > 0 ){
        var eChart_10 = echarts.init(document.getElementById('referral_chart'));

        var option9 = {
            tooltip: {
                show: true,
                backgroundColor: '#fff',
                borderRadius:6,
                padding:6,
                axisPointer:{
                    lineStyle:{
                        width:0,
                    }
                },
                textStyle: {
                    color: '#324148',
                    fontFamily: '"iran"',
                    fontSize: 12
                }
            },
            series: [
                {
                    name:'',
                    type:'pie',
                    radius: ['40%', '50%'],
                    color: ['#731943', '#8C2641', '#F2836B', '#F26666'],
                    data:[
                        {value:435, name:''},
                        {value:679, name:''},
                        {value:848, name:''},
                        {value:348, name:''},
                    ],
                    label: {
                        normal: {
                            formatter: '{b}\n{d}%'
                        },

                    }
                }
            ]
        };
        eChart_10.setOption(option9);
        eChart_10.resize();
    }


});
/*======== End Doucument Ready Function =========*/