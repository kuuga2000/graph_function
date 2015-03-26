<pre>
<?php
/**
 * Created by PhpStorm.
 * User: syarif
 * Date: 3/19/15
 * Time: 11:30 AM
 */

require_once "Graphs.php";

$Graphs = New Graphs;

//print_r($Graphs->sampleData());

echo "<hr>";

$startDate = $_GET['start'];
$endDate = $_GET['end'];

print_r($Graphs->setGraph($startDate,$endDate));