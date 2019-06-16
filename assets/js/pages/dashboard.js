$(document).ready(function() {
    
    "use strict";
    
    var flot1 = function () {
        var data = [[0, 11], [1, 15], [2, 25], [3, 24], [4, 13], [5, 18]];
        var dataset = [{
            data: data,
            color: "#BD91E1"
        }];
        var ticks = [[0, "1"], [1, "2"], [2, "3"], [3, "4"], [4, "5"], [5, "6"]];

        var options = {
            series: {
                bars: {
                    show: true,
                    fill: 1
                }
            },
            bars: {
                align: "center",
                barWidth: 0.3
            },
            xaxis: {
                ticks: ticks,
                tickLength: 0,
            },
            legend: {
                show: false
            },
            grid: {
                color: "#EEEEEE",
                hoverable: true,
                borderWidth: 0,
                backgroundColor: '#FFF'
            },
            tooltip: true,
            tooltipOpts: {
                content: "X: %x, Y: %y",
                defaultTheme: false
            }
        };
        $.plot($("#flot1"), dataset, options);
    };

    flot1();
    
    
     var chart2 = function () {

        // We use an inline data source in the example, usually data would
        // be fetched from a server

        var data = [],
            totalPoints = 50;
        
        function getRandomData() {

            if (data.length > 0)
                data = data.slice(1);

            // Do a random walk

            while (data.length < totalPoints) {

                var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;

                if (y < 0) {
                    y = 0;
                } else if (y > 75) {
                    y = 75;
                }

                data.push(y);
            }

            // Zip the generated y values with the x values

            var res = [];
            for (var i = 0; i < data.length; ++i) {
                res.push([i, data[i]])
            }

            return res;
        }

        var plot2 = $.plot("#chart1", [ getRandomData() ], {
            series: {
                shadowSize: 0   // Drawing is faster without shadows
            },
            yaxis: {
                min: 0,
                max: 75
            },
            xaxis: {
                min: 0,
                max: 50
            },
            colors: ["#528EE2"],
            legend: {
                show: false
            },
            grid: {
                color: "#EEEEEE",
                hoverable: true,
                borderWidth: 0,
                backgroundColor: '#FFF'
            },
            tooltip: true,
            tooltipOpts: {
                content: "Y: %y",
                defaultTheme: false
            }
        });

        function update() {
            plot2.setData([getRandomData()]);

            plot2.draw();
            setTimeout(update, 2000);
        }

        update();
    };

    chart2();
    
    
    new Chart(document.getElementById("chart2"),{"type":"radar","data":{"labels":["Sun","Mon","Tue","Wed","Thu","Fri","Fri"],"datasets":[{"label":"My First Dataset","data":[5,9,3,7,6,5,4],"fill":true,"backgroundColor":"rgba(253, 64, 96, 0.2)","borderColor":"rgb(253, 64, 96)","pointBackgroundColor":"rgb(253, 64, 96)","pointBorderColor":"#fff","pointHoverBackgroundColor":"#fff","pointHoverBorderColor":"rgb(253, 64, 96)"},{"label":"My Second Dataset","data":[2,4,5,1,7,3,9],"fill":true,"backgroundColor":"rgba(82, 142, 226, 0.2)","borderColor":"rgb(82, 142, 226)","pointBackgroundColor":"rgb(82, 142, 226)","pointBorderColor":"#fff","pointHoverBackgroundColor":"#fff","pointHoverBorderColor":"rgb(82, 142, 226)"}]},"options":{legend: {
            display: false
         },"elements":{"line":{"tension":0,"borderWidth":3}}}});
});