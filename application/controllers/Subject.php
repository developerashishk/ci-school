<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Subject extends CI_Controller {
    function index(){
        if(!isset($_SESSION['login']) && $_SESSION['login']!==true ){
            $url=base_url("Auth");
            header("Location: $url");
            }
        $this->load->view("subject/index");
    }
    function create(){
        if ($this->input->post('submit')) {
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
        $data=array(
            'status'=>200,
            'records'=>$records
        );
        echo json_encode($data);
        return;
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
            echo "<td><a onclick=\"update(" . htmlspecialchars(json_encode($row)) . ");\" class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["subid"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }

    function ajax_del($subid){
        $this->load->model('Subject_model');
        $this->Subject_model->ajax_del($subid);
    }

    function ajax_create(){
        $data=[];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cfull', 'cfull', 'required');
        $this->form_validation->set_rules('sub1', 'sub1', 'required');
        $this->form_validation->set_rules('sub2', 'sub2', 'required');
        $this->form_validation->set_rules('sub3', 'sub3', 'required');
        $this->form_validation->set_rules('sub4', 'sub4', 'required');
        $this->form_validation->set_rules('dt_created', 'dt_created', 'required');
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
            $this->load->model('Subject_model');
            $this->Subject_model->create();
        }
        echo json_encode($data); 
    }
    
    function ajax_update(){
        $this->load->model('Subject_model');
        $this->Subject_model->ajax_update();
    }
}