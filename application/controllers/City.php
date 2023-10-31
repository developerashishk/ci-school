<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
    function create(){
        if (isset($_POST['submit'])) {
            $this->load->model('City_model');
            $this->City_model->create();
        }
        $this->load->view("city/create");
    }

    function display(){
        $this->load->model('City_model');
        $abc=$this->City_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("city/display",$data);
    }

    function update(){
        $this->load->model('City_model');
        $this->City_model->update();
        $details=$this->City_model->getRecord();
        $data=$details;
        $this->load->view("city/update",$data);
    }

    function delete(){
        $this->load->model('City_model');
        $this->City_model->del();
    }
}
