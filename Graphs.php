<?php
/**
 * Created by PhpStorm.
 * User: syarif
 * Date: 3/19/15
 * Time: 11:31 AM
 */
Class Graphs{


    public function setGraph($startDate,$endDate){
        $dateRange = $this->dateRange($startDate,$endDate);
        $data = ($this->sampleData());
        $dataKey = array_keys($data);
        $graph = array();
        $dateRangeKey = array_keys($dateRange);
        foreach($dateRangeKey as $date){
            $graph[$date] = 0;
            if(in_array($date,$dataKey)){
                $graph[$date]+=$data[$date];
            }
        }
        return $graph;
    }

    public function dateRange($startDate,$endDate){
        $start_date = strtotime($startDate); // '2010-02-27';
        $end_date = strtotime($endDate); // '2010-03-24';
        $Data = $this->sampleData();
        //echo $Data['2015-01-10'].'<br>';

        /*while($start_date != $end_date){
            $start_date += 86400;
            echo date("Y-m-d", $start_date) . '<br>';
        }*/
        $dateList=array();
        //for ( $i = $start_date; $i <= $end_date; $i = $i + 86400 ) {
        for ( $i = $start_date; $i <= $end_date; $i += 86400 ) {
            //$graphData .= date( 'Y-m-d', $i ).'<br>'; // 2010-05-01, 2010-05-02, etc
            $date = date( 'Y-m-d', $i );
            $dateList[$date] = 0;
        }
        return !empty($dateList) ? $dateList : array();
    }

    public function sampleData(){
        return array(
            '2015-03-10'=>20,
            '2015-03-11'=>14,
            '2015-03-20'=>30,
            '2015-03-25'=>40,
            //'2015-03-25'=>20,
        );
    }
}