<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {
    function create(){
        if (isset($_POST['submit'])) {
            $this->load->model('State_model');
            $this->State_model->create();
        }
        $this->load->view("state/create");
    }

    function display(){
        $this->load->model('State_model');
        $abc=$this->State_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("state/display",$data);
    }

    function update(){
        $this->load->model('State_model');
        $this->State_model->update();
        $details=$this->State_model->getRecord();
        $data=$details;
        $this->load->view("state/update",$data);
    }

    function delete(){
        $this->load->model('State_model');
        $this->State_model->del();
    }
}
