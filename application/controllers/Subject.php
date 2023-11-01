<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {
    function create(){
        if (isset($_POST['submit'])) {
            $this->load->model('Subject_model');
            $this->Subject_model->create();
        }
        $this->load->view("subject/create");
    }

    function display(){
        $this->load->model('Subject_model');
        $abc=$this->Subject_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("subject/display",$data);
    }

    function update(){
        $this->load->model('Subject_model');
        $this->Subject_model->update();
        $details=$this->Subject_model->getRecord();
        $data=$details;
        $this->load->view("subject/update",$data);
    }

    function delete(){
        $this->load->model('Subject_model');
        $this->Subject_model->del();
    }
}