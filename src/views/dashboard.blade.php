
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
</head>
<body>
<canvas id="chart" width="400" height="100"></canvas>


<script>
    var ctx = document.getElementById("chart");
    var myChart = new Chart(ctx,{
        type: "line",
        data: {
            datasets: [
                {
                    label: '# of Requests',
                    data: [],
                    backgroundColor:
                    [
                        "rgba(30, 165, 255, 0.8)"
                    ]
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            elements: {
                line: {
                    tension: 0, // disables bezier curves
                }
            }
        }
    });

    var timeToUpdate = 5000;
    var minutes = 0;

    var timer = setInterval(updateChart,timeToUpdate);
    var minuteTimer = setInterval(minuteUpdate,60000);

    function updateChart()
    {
        var date = new Date();
        var timeZoneOffset = date.getTimezoneOffset() / 60;
        date.setHours(date.getHours() + 2 + timeZoneOffset);
        request("/analytics/getChartData?timestamp="+date.toISOString()+"&seconds="+timeToUpdate/1000,"",function(data)
        {
            date.setHours(date.getHours() - 2 - timeZoneOffset);
            myChart.data.labels.push(date.toLocaleTimeString());
            myChart.data.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
            myChart.update();
        }.bind(this),null);
    }

    function minuteUpdate()
    {
        myChart.data.datasets.forEach((dataset) => {
            var sum = 0;
            for(var i = minutes; i<dataset.data.length; i++)
            {
                sum += dataset.data[i];
            }
            dataset.data.splice(minutes, dataset.data.length - minutes);
            myChart.data.labels.splice(minutes+1,myChart.data.labels.length-minutes-1);
            dataset.data.push(sum);
        });
        minutes++;
    }

    function request(path, params, callback, smt) {
        jQuery.get(path, "", function (data) {
            if (data == null || data.length == 0)
                callback(params, smt);
            else
                callback(data, smt);
        }, "JSON");
    }
</script>
</body>
</html>