<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

    function index(){
        $this->load->view("session/index");
    }
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
    function ajax_records(){
        $this->load->model('Session_model');
        $records=$this->Session_model->records();
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["session"] . "</td>";
            echo "<td>" . $row["postingdate"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td><a onclick=update(" . json_encode($row) . "); class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["id"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($id){
        $this->load->model('Session_model');
        $this->Session_model->ajax_del($id);
    }

    function ajax_create(){
        $this->load->model('Session_model');
        $this->Session_model->create();
    }
    function ajax_update(){
        $this->load->model('Session_model');
        $this->Session_model->ajax_update();
    }
}
