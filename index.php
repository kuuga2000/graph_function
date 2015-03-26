
<?php
/**
 * Created by PhpStorm.
 * User: syarif
 * Date: 3/19/15
 * Time: 11:30 AM
 */

require_once "Graphs.php";

$Graphs = New Graphs;
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="/js/jquery-1.11.2.min.js"></script>
    <script src="/js/highcharts.js"></script>
    <script src="/js/exporting.js"></script>
</head>
<body>
<?php
$startDate = $_GET['start'];
$endDate = $_GET['end'];
?>
<div id="graph" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script>
    $(function () {
        $('#graph').highcharts({
            credits: {
                enabled:false
            },
            title: {
                text: 'Makai Nohana Train',
                x: -20 //center
            },
            subtitle: {
                text: 'www.shariveweb.com',
                x: -20
            },
            xAxis: {
                categories: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan',
                    '7 Jan', '8 Jan', '9 Jan', '10 Jan', '11 Jan', '12 Jan']
            },
            yAxis: {
                title: {
                    text: false
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },

            tooltip: {
                valueSuffix: ' Products'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                showInLegend: false,
                name: 'Sales Report',
                data: [<?php echo implode(',',$Graphs->setGraph($startDate,$endDate));?>]
            }]
        });
    });
</script>
</body>
</html>