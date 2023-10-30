<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {
    function create(){
        if (isset($_POST['submit'])) {
            $this->load->model('Country_model');
            $this->Country_model->create();
        }
        $this->load->view("country/create");
    }

    function display(){
        $this->load->model('Country_model');
        $abc=$this->Country_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("country/display",$data);
    }

    function update(){
        $this->load->model('Country_model');
        $this->Country_model->update();
        $details=$this->Country_model->getRecord();
        $data=$details;
        $this->load->view("country/update",$data);
    }

    function delete(){
        $this->load->model('Country_model');
        $this->Country_model->del();
    }
}
