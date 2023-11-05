<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {
    function index(){
        $this->load->view("subject/index");
    }
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
    
    function ajax_records(){
        $this->load->model('Subject_model');
        $records=$this->Subject_model->records();
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["subid"] . "</td>";
            echo "<td>" . $row["cshort"] . "</td>";
            echo "<td>" . $row["cfull"] . "</td>";
            echo "<td>" . $row["sub1"] . "</td>";
            echo "<td>" . $row["sub2"] . "</td>";
            echo "<td>" . $row["sub3"] . "</td>";
            echo "<td>" . $row["sub4"] . "</td>";
            echo "<td>" . $row["dt_created"] . "</td>";
            echo "<td>" . $row["update_date"] . "</td>";
            echo "<td><a href='update?updateid=" . $row["subid"] . "' class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["subid"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function ajax_del($subid){
        $this->load->model('Subject_model');
        $this->Subject_model->ajax_del($subid);
    }

    function ajax_create(){
        $this->load->model('Subject_model');
        $this->Subject_model->create();
    }
}