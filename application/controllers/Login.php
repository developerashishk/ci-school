<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function index(){
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
            echo "<td><a href='update?updateid=" . $row["id"] . "' class='btn btn-primary'>update</a></td>";
            echo "<td><a href='delete?deleteid=" . $row["id"] . "' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function ajax_create(){
        $this->load->model('Login_model');
        $this->Login_model->create();
    }
}


























