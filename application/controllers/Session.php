<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Session extends CI_Controller {

    function index(){
        if(!isset($_SESSION['login']) && $_SESSION['login']!==true ){
            $url=base_url("Auth");
            header("Location: $url");
            }
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
        $data=array(
            'status'=>200,
            'records'=>$records
        );
        echo json_encode($data);
        return;
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["session"] . "</td>";
            echo "<td>" . $row["postingdate"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td><a onclick=\"update(" . htmlspecialchars(json_encode($row)) . ");\" class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["id"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($id){
        $this->load->model('Session_model');
        $this->Session_model->ajax_del($id);
    }

  
    function ajax_create(){
        $data=[];
        if(empty($_POST['session']) || empty($_POST['postingdate']) || empty($_POST['status'])){
            $data=array(
                'status'=>false,
                'msg'=>"Mandatory fields or numbers are not allowed!!"
            );
        }else{
            $data=array(
                'status'=>true,
                'msg'=>"Record Created Sucessfully!!"
            );
            $this->load->model('Session_model');
            $this->Session_model->create();
        }
        echo json_encode($data); 
    }
    function ajax_update(){
        $this->load->model('Session_model');
        $this->Session_model->ajax_update();
    }
}
