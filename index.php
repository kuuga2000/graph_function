
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
$Graph = $Graphs->setGraph($startDate,$endDate);
$date = array_keys($Graph);
$ct = array();
foreach($date as $date_cn){
    $ct[]=date('d M',strtotime($date_cn));
}
$caterogies = '"'.(implode('","',$ct)).'"';
$graph = implode(',',$Graph);
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
                categories: [<?php echo $caterogies;?>]
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
                data: [<?php echo $graph;?>]
            }]
        });
    });
</script>
</body>
</html>