var chart;
var charts = [];
chart_line = function () {
    chart = new Chartist.Line('#chart-line', {
        labels: ['0', '1', '2', '3', '4', '5', '6'],
        series: [
            {
                name: 'Fibonacci sequence',
                data: [1, 2, 3, 5, 8, 13]
            },
            {
                name: 'Golden section',
                data: [0, 1, 1.618, 2.618, 4.236, 6.854, 11.09]
            }
        ]
    });
    charts.push(chart);

    var $chart = $('#chart-line');

    var $toolTip = $chart
            .append('<div class="tooltip"></div>')
            .find('.tooltip')
            .hide();

    $chart.on('mouseenter', '.ct-point', function () {
        var $point = $(this),
                value = $point.attr('ct:value'),
                seriesName = $point.parent().attr('ct:series-name');
        $toolTip.html(seriesName + '<br>' + value).show();
    });

    $chart.on('mouseleave', '.ct-point', function () {
        $toolTip.hide();
    });

    $chart.on('mousemove', function (event) {
        $toolTip.css({
            left: (event.offsetX || event.originalEvent.layerX) - $toolTip.width() / 2 - 10,
            top: (event.offsetY || event.originalEvent.layerY) - $toolTip.height() - 40
        });
    });

    var seq = 0, delays = 20, durations = 1000;

    // Once the chart is fully created we reset the sequence
    chart.on('created', function () {
        seq = 0;
    });

    chart.on('draw', function (data) {
        seq++;
        if (data.type === 'point') {
            data.element.animate({
                x1: {
                    begin: seq * delays / 2,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                x2: {
                    begin: seq * delays / 2,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                opacity: {
                    begin: seq * delays / 2,
                    dur: durations,
                    from: 0,
                    to: 1,
                    easing: 'easeOutQuart'
                }
            });
        } else if (data.type === 'line') {
            // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
            data.element.animate({
                opacity: {
                    // The delay when we like to start the animation
                    begin: seq * delays,
                    // Duration of the animation
                    dur: durations,
                    // The value where the animation should start
                    from: 0,
                    // The value where it should end
                    to: 1
                }
            });
        }
    });
};

chart_line2 = function () {
    chart = new Chartist.Line('#chart-line2', {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        series: [
            [12, 9, 7, 8, 5],
            [2, 1, 3.5, 7, 3],
            [1, 3, 4, 5, 6]
        ]
    }, {
        fullWidth: true,
        chartPadding: {
            right: 40
        }
    });
    charts.push(chart);

    var $chart = $('#chart-line2');

    var $toolTip = $chart
            .append('<div class="tooltip"></div>')
            .find('.tooltip')
            .hide();

    $chart.on('mouseenter', '.ct-point', function () {
        var $point = $(this),
                value = $point.attr('ct:value'),
                seriesName = $point.parent().attr('ct:series-name');
        $toolTip.html(seriesName + '<br>' + value).show();
    });

    $chart.on('mouseleave', '.ct-point', function () {
        $toolTip.hide();
    });

    $chart.on('mousemove', function (event) {
        $toolTip.css({
            left: (event.offsetX || event.originalEvent.layerX) - $toolTip.width() / 2 - 10,
            top: (event.offsetY || event.originalEvent.layerY) - $toolTip.height() - 40
        });
    });

    var seq = 0, delays = 20, durations = 1000;

    // Once the chart is fully created we reset the sequence
    chart.on('created', function () {
        seq = 0;
    });

    chart.on('draw', function (data) {
        seq++;
        if (data.type === 'point') {
            data.element.animate({
                x1: {
                    begin: seq * delays / 2,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                x2: {
                    begin: seq * delays / 2,
                    dur: durations,
                    from: data.x - 10,
                    to: data.x,
                    easing: 'easeOutQuart'
                },
                opacity: {
                    begin: seq * delays / 2,
                    dur: durations,
                    from: 0,
                    to: 1,
                    easing: 'easeOutQuart'
                }
            });
        } else if (data.type === 'line') {
            // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
            data.element.animate({
                opacity: {
                    // The delay when we like to start the animation
                    begin: seq * delays,
                    // Duration of the animation
                    dur: durations,
                    // The value where the animation should start
                    from: 0,
                    // The value where it should end
                    to: 1
                }
            });
        }
    });
};


chart_pie = function () {
    var data = {
        series: [5, 3, 4]
    };

    var sum = function (a, b) {
        return a + b
    };

    chart = new Chartist.Pie('#chart-pie', data, {
        labelInterpolationFnc: function (value) {
            return Math.round(value / data.series.reduce(sum) * 100) + '%';
        }
    });
    charts.push(chart);

    var seq = 0, delays = 300;

    // Once the chart is fully created we reset the sequence
    chart.on('created', function () {
        seq = 0;
    });

    chart.on('draw', function (data) {
        if (data.type === 'slice') {
            seq++;
            data.element.animate({
                opacity: {
                    begin: seq * delays,
                    dur: 400,
                    from: 0,
                    to: 1
                }
            });
        }
    });
};

chart_pie_explode = function () {
    var data = {
        labels: ['Bananas', 'Apples', 'Grapes'],
        series: [20, 15, 40]
    };

    var options = {
        labelInterpolationFnc: function (value) {
            return value[0]
        }
    };

    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
                chartPadding: 30,
                labelOffset: 100,
                labelDirection: 'explode',
                labelInterpolationFnc: function (value) {
                    return value;
                }
            }],
        ['screen and (min-width: 1024px)', {
                labelOffset: 80,
                chartPadding: 20
            }]
    ];

    chart = new Chartist.Pie('#chart-pie-explode', data, options, responsiveOptions);
    charts.push(chart);

    var seq = 0, delays = 300;

    // Once the chart is fully created we reset the sequence
    chart.on('created', function () {
        seq = 0;
    });

    chart.on('draw', function (data) {
        if (data.type === 'slice') {
            seq++;
            data.element.animate({
                opacity: {
                    begin: seq * delays,
                    dur: 400,
                    from: 0,
                    to: 1
                }
            });
        }
    });
};



chart_bar = function () {
    chart = new Chartist.Bar('#chart-bar', {
        labels: ['W1', 'W2', 'W3', 'W4', 'W5', 'W6', 'W7', 'W8', 'W9', 'W10'],
        series: [
            [1, 2, 4, 8, 6, -2, -1, -4, -6, -2]
        ]
    }, {
        high: 10,
        low: -10
    });
    charts.push(chart);
    chart.on('draw', function (data) {
        if (data.type === 'bar') {
            data.element.animate({
                y2: {
                    dur: 800,
                    from: data.y1,
                    to: data.y2,
                    easing: 'easeOutQuart'
                }
            });
        }
    });
};

chart_stacked = function () {
    chart = new Chartist.Bar('#chart-stacked', {
        labels: ['Q1', 'Q2', 'Q3', 'Q4'],
        series: [
            [800000, 1200000, 1400000, 1300000],
            [200000, 400000, 500000, 300000],
            [100000, 200000, 400000, 600000]
        ]
    }, {
        stackBars: true,
        axisY: {
            labelInterpolationFnc: function (value) {
                return (value / 1000) + 'k';
            }
        }
    });
    charts.push(chart);

    var seq = 0, delays = 100;
    // Once the chart is fully created we reset the sequence
    chart.on('created', function () {
        seq = 0;
    });
    chart.on('draw', function (data) {
        if (data.type === 'bar') {
            seq++;
            data.element.attr({
                style: 'stroke-width: 50px'
            });
            data.element.animate({
                y2: {
                    begin: seq * delays,
                    dur: 200,
                    from: data.y1,
                    to: data.y2,
                    easing: 'easeOutQuart'
                }
            });
        }
    });
};

clear_space = function (el) {
    var chart = $('.chart');
    chart.empty().append('<div class="ct-chart" id="' + el + '" />');
};

update_charts = function () {
    var i;
    for (i = 0; i < charts.length; i++) {
        charts[i].update();
    }
};

if ($('.charts').length) {
    chart_line();
}

if ($('.charts-gallery').length) {
    chart_line();
    chart_line2();
    chart_bar();
    chart_stacked();
    chart_pie();
    chart_pie_explode();
}