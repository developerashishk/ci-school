<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
    function index(){
        $this->load->view("course/index");
    }
    function create(){
        if (isset($_POST['submit'])) {
            $this->load->model('Course_model');
            $this->Course_model->create();
        }
        $this->load->view("course/create");
    }

    function display(){
        $this->load->model('Course_model');
        $abc=$this->Course_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("course/display",$data);
    }

    function update(){
        $this->load->model('Course_model');
        $this->Course_model->update();
        $details=$this->Course_model->getRecord();
        $data=$details;
        $this->load->view("course/update",$data);
    }

    function delete(){
        $this->load->model('Course_model');
        $this->Course_model->del();
    }
    
    function ajax_records(){
        $this->load->model('Course_model');
        $records=$this->Course_model->records();
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["cid"] . "</td>";
            echo "<td>" . $row["cshort"] . "</td>";
            echo "<td>" . $row["cfull"] . "</td>";
            echo "<td>" . $row["cdate"] . "</td>";
            echo "<td>" . $row["update_date"] . "</td>";
            echo "<td><a href='update?updateid=" . $row["cid"] . "' class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["cid"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($cid){
        $this->load->model('Course_model');
        $this->Course_model->ajax_del($cid);
    }

    function ajax_create(){
        $this->load->model('Course_model');
        $this->Course_model->create();
    }
}