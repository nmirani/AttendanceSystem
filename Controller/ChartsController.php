<?php
App::import('Vendor', 'HighchartsPHP/Highchart');

class ChartsController extends AppController {

    public function index() {        
        $chart = new Highchart();
        $chart->chart = array(
            'renderTo' => 'container', // div ID where to render chart
            'type' => 'line'
        );

        $chart->series[0]->name = 'Tokyo';
        $chart->series[0]->data = array(7.0, 6.9, 9.5);
        $this->set( compact( 'chart' ) );
    }
}