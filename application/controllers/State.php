<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends CI_Controller {

    function index(){
        $this->load->view("state/index");
    }
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
    
    function ajax_records(){
        $this->load->model('State_model');
        $records=$this->State_model->records();
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["country_id"] . "</td>";
            echo "<td><a href='update?updateid=" . $row["id"] . "' class='btn btn-primary'>update</a></td>";
            echo "<td><a href='delete?deleteid=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function ajax_create(){
        $this->load->model('State_model');
        $this->State_model->create();
    }
}
