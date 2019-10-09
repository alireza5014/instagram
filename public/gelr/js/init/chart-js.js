/* ========================================================================

Chart Js Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
jQuery(document).ready(function () {

    if ($('#bar_chart').length) {
        var ctx = document.getElementById("bar_chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: 'سود ماهانه',
                    data: [12, 19, 3, 17, 28, 24, 7],
                    backgroundColor: "#8C2641",
                    borderColor: "#8C2641",
                    borderWidth: 2
                }, {
                    label: 'از دست دادن ماه',
                    data: [30, 29, 5, 5, 20, 3, 10],
                    backgroundColor: "#F2836B",
                    borderColor: "#F2836B",
                    borderWidth: 2
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },

                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                        }
                    }]
                }
            }


        });
    }

    if ($('#line_chart').length) {
        var ctx = document.getElementById('line_chart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',

            data: {
                labels: ['دو', 'سه', 'چهار', 'پنج', 'جمعه', 'شن', 'یک'],
                datasets: [{
                    label: 'داده اصلی',
                    data: [12, 19, 3, 17, 6, 3, 7],
                    backgroundColor: "rgba(140, 38, 65, 0.5)",
                    borderColor: "rgba(140, 38, 65, 0.7)",
                    borderWidth: 2
                }, {
                    label: 'داده پایه',
                    data: [2, 29, 5, 5, 2, 3, 10],
                    backgroundColor: "rgba(242, 131, 107, 0.5)",
                    borderColor: "rgba(242, 131, 107, 0.7)",
                    borderWidth: 2
                }]

            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },

                scales: {
                    xAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            fontSize: 14,
                            fontColor: '#71748d',
                        }
                    }]
                }
            }



        });
    }

    if ($('#doughnut_chart').length) {
        var ctx = document.getElementById("doughnut_chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["داده 1", "داده 2", "داده 3", "داده 4"],
                datasets: [{
                    backgroundColor: [
                        "#F26666",
                        "#F2836B",
                        "#fa6c39",
                        "#8C2641",
                        "#731943"
                    ],
                    data: [12, 19, 3, 17]
                }]
            },
            options: {
                maintainAspectRatio: false,

                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },


            }

        });
    }

    if ($('#pie_chart').length) {
        var ctx = document.getElementById("pie_chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["داده 1", "داده 2", "داده 3", "داده 4"],
                datasets: [{
                    backgroundColor: [
                        "#F26666",
                        "#731943",
                        "#fa6c39",
                        "#8C2641",
                        "#F2836B",
                    ],
                    data: [12, 19, 3, 17]
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },


            }
        });
    }

    if ($('#polar_chart').length) {
        var ctx = document.getElementById("polar_chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ["داده 1", "داده 2", "داده 3", "داده 4"],
                datasets: [{
                    backgroundColor: [
                        "#F26666",
                        "#731943",
                        "#fa6c39",
                        "#8C2641",
                        "#F2836B",
                    ],
                    data: [12, 19, 3, 17]
                }]
            },
            options: {
                maintainAspectRatio: false,

                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },


            }
        });
    }

    if ($('#radar_chart').length) {
        var ctx = document.getElementById("radar_chart");
        var myChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ["داده 1", "داده 2", "داده 3", "داده 4"],
                datasets: [{
                    label: 'داده اصلی',
                    backgroundColor: "rgba(140, 38, 65, 0.5)",
                    borderColor: "rgba(140, 38, 65, 0.7)",
                    data: [12, 19, 3, 17],
                    borderWidth: 2
                }, {
                    label: 'داده پایه',
                    backgroundColor: "rgba(242, 131, 107, 0.5)",
                    borderColor: "rgba(242, 131, 107, 0.7)",
                    data: [30, 29, 5, 5, 20, 3, 10],
                    borderWidth: 2
                }],
            },
            options: {
                maintainAspectRatio: false,

                legend: {
                    display: true,
                    position: 'bottom',

                    labels: {
                        fontColor: '#71748d',
                        fontSize: 14,
                    }
                },


            }

        });
    }

});
/*======== End Doucument Ready Function =========*/