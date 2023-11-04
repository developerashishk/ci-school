<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    function index(){
        $this->load->view("country/index");
    }

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

    function ajax_records(){
        $this->load->model('Country_model');
        $records=$this->Country_model->records();
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["sortname"] . "</td>";
            echo "<td><a href='update?updateid=" . $row["id"] . "' class='btn btn-primary'>update</a></td>";
            echo "<td><a href='delete?deleteid=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function ajax_create(){
        $this->load->model('Country_model');
        $this->Country_model->create();
    }
}


























