<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {
    function create(){
        if (isset($_POST['submit'])) {
            $this->load->model('Session_model');
            $this->Session_model->create();
        }
        $this->load->view("session/create");
    }

    function display(){
        $this->load->model('Session_model');
        $abc=$this->Session_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("session/display",$data);
    }

    function update(){
        $this->load->model('Session_model');
        $this->Session_model->update();
        $details=$this->Session_model->getRecord();
        $data=$details;
        $this->load->view("session/update",$data);
    }

    function delete(){
        $this->load->model('Session_model');
        $this->Session_model->del();
    }
}
