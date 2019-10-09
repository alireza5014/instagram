/* ========================================================================

Chart Js Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
jQuery(document).ready(function () {

    if ($('#c3chart_area').length) {
        var chart = c3.generate({
            bindto: "#c3chart_area",
            data: {
                columns: [
                    ['داده1', 300, 350, 300, 100, 50, 250],
                    ['داده2', 130, 100, 140, 200, 150, 50]
                ],
                types: {
                    data1: 'area-spline',
                    data2: 'area-spline'
                },
                colors: {
                    data1: '#F26666',
                    data2: '#731943',
                }

            },
            axis: {

                y: {
                    show: true




                },
                x: {
                    show: true
                }
            }

        });
    }


    if ($('#c3chart_spline').length) {
        var chart = c3.generate({
            bindto: "#c3chart_spline",
            data: {
                columns: [
                    ['داده1', 30, 200, 100, 400, 150, 250],
                    ['داده2', 130, 100, 140, 200, 150, 50]
                ],
                type: 'spline',
                colors: {
                    data1: '#fa6c39',
                    data2: '#8C2641',
                }
            },
            axis: {
                y: {
                    show: true,


                },
                x: {
                    show: true,
                }
            }
        });
    }

    if ($('#c3chart_zoom').length) {
        var chart = c3.generate({
            bindto: "#c3chart_zoom",
            data: {
                columns: [
                    ['نمونه', 30, 200, 100, 400, 150, 250, 150, 200, 170, 240, 350, 150, 100, 400, 150, 250, 150, 200, 170, 240, 100, 150, 250, 150, 200, 170, 240, 30, 200, 100, 400, 150, 250, 150, 200, 170, 240, 350, 150, 100, 400, 350, 220, 250, 300, 270, 140, 150, 90, 150, 50, 120, 70, 40]
                ],
                colors: {
                    sample: '#F2836B'

                }
            },
            zoom: {
                enabled: true
            },
            axis: {
                y: {
                    show: true,


                },
                x: {
                    show: true,
                }
            }

        });
    }


    if ($('#c3chart_scatter').length) {
        var chart = c3.generate({
            bindto: "#c3chart_scatter",
            data: {
                xs: {
                    setosa: 'setosa_x',
                    versicolor: 'versicolor_x',
                },
                // iris data from R
                columns: [
                    ["setosa_x", 3.5, 3.0, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1, 3.7, 3.4, 3.0, 3.0, 4.0, 4.4, 3.9, 3.5, 3.8, 3.8, 3.4, 3.7, 3.6, 3.3, 3.4, 3.0, 3.4, 3.5, 3.4, 3.2, 3.1, 3.4, 4.1, 4.2, 3.1, 3.2, 3.5, 3.6, 3.0, 3.4, 3.5, 2.3, 3.2, 3.5, 3.8, 3.0, 3.8, 3.2, 3.7, 3.3],
                    ["versicolor_x", 3.2, 3.2, 3.1, 2.3, 2.8, 2.8, 3.3, 2.4, 2.9, 2.7, 2.0, 3.0, 2.2, 2.9, 2.9, 3.1, 3.0, 2.7, 2.2, 2.5, 3.2, 2.8, 2.5, 2.8, 2.9, 3.0, 2.8, 3.0, 2.9, 2.6, 2.4, 2.4, 2.7, 2.7, 3.0, 3.4, 3.1, 2.3, 3.0, 2.5, 2.6, 3.0, 2.6, 2.3, 2.7, 3.0, 2.9, 2.9, 2.5, 2.8],
                    ["setosa", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
                    ["versicolor", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
                ],
                type: 'scatter',
                colors: {
                    setosa: '#F26666',
                    versicolor: '#731943',

                }
            },
            axis: {
                y: {
                    show: true,


                },
                x: {
                    show: true,
                }
            }
        });
        setTimeout(function() {
            chart.load({
                xs: {
                    virginica: 'virginica_x'
                },
                columns: [
                    ["virginica_x", 3.3, 2.7, 3.0, 2.9, 3.0, 3.0, 2.5, 2.9, 2.5, 3.6, 3.2, 2.7, 3.0, 2.5, 2.8, 3.2, 3.0, 3.8, 2.6, 2.2, 3.2, 2.8, 2.8, 2.7, 3.3, 3.2, 2.8, 3.0, 2.8, 3.0, 2.8, 3.8, 2.8, 2.8, 2.6, 3.0, 3.4, 3.1, 3.0, 3.1, 3.1, 3.1, 2.7, 3.2, 3.3, 3.0, 2.5, 3.0, 3.4, 3.0],
                    ["virginica", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8],
                ]
            });
        }, 1000);
        setTimeout(function() {
            chart.unload({
                ids: 'setosa'
            });
        }, 2000);
        setTimeout(function() {
            chart.load({
                columns: [
                    ["virginica", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
                ]
            });
        }, 3000);
    }


    if ($('#c3chart_stacked').length) {
        var chart = c3.generate({
            bindto: "#c3chart_stacked",

            data: {
                columns: [
                    ['داده1', 130, 200, 320, 400, 530, 750],
                    ['داده2', -130, 10, 130, 200, 150, 250],
                    ['داده3', -130, -50, -10, -200, -250, -150]
                ],
                type: 'bar',
                groups: [
                    ['داده1', 'داده2', 'داده3']
                ],
                order: 'desc', // stack order by sum of values descendantly. this is default.
                //      order: 'asc'  // stack order by sum of values ascendantly.
                //      order: null   // stack order by data definition.

                colors: {
                    data1: '#8C2641',
                    data2: '#F2836B',
                    data3: '#731943'
                }
            },
            axis: {
                y: {
                    show: true,


                },
                x: {
                    show: true,
                }
            },
            grid: {
                y: {
                    lines: [{ value: 0 }]
                }
            }
        });
        setTimeout(function() {
            chart.load({
                columns: [
                    ['داده4', 1200, 1300, 1450, 1600, 1520, 1820],
                ]
            });
        }, 1000);
        setTimeout(function() {
            chart.load({
                columns: [
                    ['داده5', 200, 300, 450, 600, 520, 820],
                ]
            });
        }, 2000);
        setTimeout(function() {
            chart.groups([
                ['داده1', 'داده2', 'داده3', 'داده4', 'داده5']
            ])
        }, 3000);
    }


    if ($('#c3chart_combine').length) {
        var chart = c3.generate({
            bindto: "#c3chart_combine",
            data: {
                columns: [
                    ['داده1', 30, 20, 50, 40, 60, 50],
                    ['داده2', 200, 130, 90, 240, 130, 220],
                    ['داده3', 300, 200, 160, 400, 250, 250],
                    ['داده4', 200, 130, 90, 240, 130, 220],
                    ['داده5', 130, 120, 150, 140, 160, 150],
                    ['داده6', 90, 70, 20, 50, 60, 120],
                ],
                type: 'bar',
                types: {
                    data3: 'spline',
                    data4: 'line',
                    data6: 'area',
                },
                groups: [
                    ['داده1', 'داده2']
                ],

                colors: {
                    data1: '#F26666',
                    data2: '#731943',
                    data3: '#fa6c39',
                    data4: '#8C2641',
                    data5: '#F2836B',
                    data6: '#fa6c39',

                }

            },
            axis: {
                y: {
                    show: true,


                },
                x: {
                    show: true,
                }
            }
        });
    }

    if ($('#c3chart_pie').length) {
        var chart = c3.generate({
            bindto: "#c3chart_pie",
            data: {
                columns: [
                    ['داده1', 30],
                    ['داده2', 50]
                ],
                type: 'pie',

                colors: {
                    data1: '#F26666',
                    data2: '#731943'

                }
            },
            pie: {
                label: {
                    format: function(value, ratio, id) {
                        return d3.format('$')(value);
                    }
                }
            }
        });
    }

    if ($('#c3chart_donut').length) {
        var chart = c3.generate({
            bindto: "#c3chart_donut",
            data: {
                columns: [
                    ['داده1', 30],
                    ['داده2', 120],
                    ['داده3', 20],
                    ['داده4', 40],
                    ['داده5', 50],
                    ['داده6', 100],
                ],
                type: 'donut',
                onclick: function(d, i) { console.log("onclick", d, i); },
                onmouseover: function(d, i) { console.log("onmouseover", d, i); },
                onmouseout: function(d, i) { console.log("onmouseout", d, i); },

                colors: {
                    data1: '#F26666',
                    data2: '#731943',
                    data3: '#fa6c39',
                    data4: '#8C2641',
                    data5: '#F2836B',
                    data6: '#731943',
                }
            },
            donut: {
                title: "عرض یخ زده گلبرگ"
            }


        });
    }

});
/*======== End Doucument Ready Function =========*/