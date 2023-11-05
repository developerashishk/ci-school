<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

    function index(){
        $this->load->view("city/index");
    }

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

    function ajax_records(){
        $this->load->model('City_model');
        $records=$this->City_model->records();
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["sortname"] . "</td>";
            echo "<td><a href='update?updateid=" . $row["id"] . "' class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["id"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($id){
        $this->load->model('City_model');
        $this->City_model->ajax_del($id);
    }

    function ajax_create(){
        $this->load->model('City_model');
        $this->City_model->create();
    }
}
