<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Country extends CI_Controller {

    function index(){
        if(!isset($_SESSION['login']) && $_SESSION['login']!==true ){
            $url=base_url("Auth");
            header("Location: $url");
            }
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
            echo "<td><a onclick=\"update(" . htmlspecialchars(json_encode($row)) . ");\" class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["id"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($id){
        $this->load->model('Country_model');
        $this->Country_model->ajax_del($id);
    }
    function ajax_create(){
        $this->load->model('Country_model');
        $this->Country_model->create();
    }
    
    function ajax_update(){
        $this->load->model('Country_model');
        $this->Country_model->ajax_update();
    }
}


























