<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Login extends CI_Controller {

    function index(){
        if(!isset($_SESSION['login']) && $_SESSION['login']!==true ){
            $url=base_url("Auth");
            header("Location: $url");
            }
        $this->load->view("login/index");
    }

    function create(){
        if (isset($_POST['submit'])) {
            $this->load->model('Login_model');
            $this->Login_model->create();
        }
        $this->load->view("login/create");
    }

    function display(){
        $this->load->model('Login_model');
        $abc=$this->Login_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("login/display",$data);
    }

    function update(){
        $this->load->model('Login_model');
        $this->Login_model->update();
        $details=$this->Login_model->getRecord();
        $data=$details;
        $this->load->view("login/update",$data);
    }

    function delete(){
        $this->load->model('Login_model');
        $this->Login_model->del();
    }

    function ajax_records(){
        $this->load->model('Login_model');
        $records=$this->Login_model->records();
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["FullName"] . "</td>";
            echo "<td>" . $row["AdminEmail"] . "</td>";
            echo "<td>" . $row["loginid"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td><a onclick=\"update(" . htmlspecialchars(json_encode($row)) . ");\" class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["id"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($id){
        $this->load->model('Login_model');
        $this->Login_model->ajax_del($id);
    }

    function ajax_create(){
        $this->load->model('Login_model');
        $this->Login_model->create();
    }
    function ajax_update(){
        $this->load->model('Login_model');
        $this->Login_model->ajax_update();
    }
}


























