<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>TestChart</title>
        <script src="../js/jquery.js"></script>
        <script src="../highcharts/code/highcharts.js"></script>
    </head>
    <body>
        <div id="container" style="height: 500px; min-width: 310px"></div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                <? $_POST[0] = 'day'; require_once('../getFinalData.php');?>
                var phpData = JSON.parse('<?php echo $dataArray; ?>');
                var beeline = [],
                    megaphone = [],
                    mts = [],
                    dates = [];

                for (var key in phpData.beeline) {
                   beeline.push(Number(phpData.beeline[key]));
                   megaphone.push(Number(phpData.mf[key]));
                   mts.push(Number(phpData.mts[key]));
                   dates.push((phpData.time[key]));
                }

                var myChart = Highcharts.chart('container', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Competitors'
                    },
                    xAxis: {
                        title: {
                            text: 'Day'
                        },
                        categories: dates
                    },
                    yAxis: {
                        title: {
                            text: 'Points'
                        }
                    },
                    series: [{
                        name: 'Beeline',
                        data: beeline,
                        color: 'yellow'
                    }, {
                        name: 'Megafone',
                        data: megaphone,
                        color: 'green'
                    }, {
                        name: 'MTS',
                        data: mts,
                        color: 'red'
                    }]
                });
            });
        </script> 
         <form name="myForm" action="../router.php" method="POST">
            <div style="margin-left: auto; margin-right: auto; width: 6em;">
                <select name = "mySelect" onchange="document.forms['myForm'].submit()">
                    <option value="day">По дням</option>
                    <option value="min">По минутам</option>
                    <option value="hour">По часам</option>
                    <option value="all">Все данные</option>
                </select>
            </div>
        </form>
    </body>
</html>