<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class State extends CI_Controller {

    function index(){
        if(!isset($_SESSION['login']) && $_SESSION['login']!==true ){
            $url=base_url("Auth");
            header("Location: $url");
            }
        $this->load->view("state/index");
    }
    function create(){
        if ($this->input->post('submit')) {
            $this->load->model('State_model');
            $this->State_model->create();
        }
        $this->load->view("state/create");
    }

    function display(){
        $this->load->model('State_model');
        $abc=$this->State_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("state/display",$data);
    }

    function update(){
        $this->load->model('State_model');
        $this->State_model->update();
        $details=$this->State_model->getRecord();
        $data=$details;
        $this->load->view("state/update",$data);
    }

    function delete(){
        $this->load->model('State_model');
        $this->State_model->del();
    }
    function ajax_records(){
        $this->load->model('State_model');
        $records=$this->State_model->records();
        $data=array(
            'status'=>200,
            'records'=>$records
        );
        echo json_encode($data);
        return;
        foreach ($records as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["country_id"] . "</td>";
            echo "<td><a onclick=\"update(" . htmlspecialchars(json_encode($row)) . ");\" class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["id"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    
    function ajax_del($id){
        $this->load->model('State_model');
        $this->State_model->ajax_del($id);
    }

    function ajax_create(){
        $data=[];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'required');
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
            $this->load->model('State_model');
            $this->State_model->create();
        }
        echo json_encode($data); 
    }
    function ajax_update(){
        $this->load->model('State_model');
        $this->State_model->ajax_update();
    }
}
