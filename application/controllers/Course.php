<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Course extends CI_Controller {
    function index(){
        if(!isset($_SESSION['login']) && $_SESSION['login']!==true ){
            $url=base_url("Auth");
            header("Location: $url");
            }
        $this->load->view("course/index");
    }
    function create(){
        if ($this->input->post('submit')) {
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
        $data=array(
            'status'=>200,
            'records'=>$records
        );
        echo json_encode($data);
        return;
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["cid"] . "</td>";
            echo "<td>" . $row["cshort"] . "</td>";
            echo "<td>" . $row["cfull"] . "</td>";
            echo "<td>" . $row["cdate"] . "</td>";
            echo "<td>" . $row["update_date"] . "</td>";
            echo "<td><a onclick=\"update(" . htmlspecialchars(json_encode($row)) . ");\" class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["cid"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($cid){
        $this->load->model('Course_model');
        $this->Course_model->ajax_del($cid);
    }

    function ajax_create(){
        $data=[];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cshort', 'cshort', 'required');
        $this->form_validation->set_rules('cfull', 'cfull', 'required');
        $this->form_validation->set_rules('cdate', 'cdate', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data=array(
                'status'=>false,
                'msg'=>json_encode($this->form_validation->error_array())
            );
        }else{
            $data=array(
                'status'=>true,
                'msg'=>"Record Created Sucessfully!!"
            );
            $this->load->model('Course_model');
            $this->Course_model->create();
        }
        echo json_encode($data); 
    }
    function ajax_update(){
        $this->load->model('Course_model');
        $this->Course_model->ajax_update();
    }
}