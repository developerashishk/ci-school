<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class City extends CI_Controller {

    function index(){
        if(!isset($_SESSION['city']) && $_SESSION['city']!==true ){
        $url=base_url("Auth");
        header("Location: $url");
        }
        $this->load->view("city/index");
    }

    function create(){
        if ($this->input->post('submit')) {
            $this->load->model('City_model');
            $this->City_model->create();
        }
        $this->load->view("city/create");
    }

    function display(){
        $this->load->model('City_model');
        $abc=$this->City_model->records();
        $data=[];
        $data['records']=$abc;
        $this->load->view("city/display",$data);
    }

    function update(){
        $this->load->model('City_model');
        $this->City_model->update();
        $details=$this->City_model->getRecord();
        $data=$details;
        $this->load->view("city/update",$data);
    }

    function delete(){
        $this->load->model('City_model');
        $this->City_model->del();
    }

    function ajax_records(){
        $this->load->model('City_model');
        $records=$this->City_model->records();
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
            echo "<td>" . $row["state_id"] . "</td>";
            echo "<td><a onclick=update(" . json_encode($row) . "); class='btn btn-primary'>update</a></td>";
            echo "<td><a onclick=ajax_del(" . $row["id"] . "); class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
    }
    function ajax_del($id){
        $this->load->model('City_model');
        $this->City_model->ajax_del($id);
    }

    function ajax_create(){
        $data=[];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
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
            $this->load->model('City_model');
            $this->City_model->create();
        }
        echo json_encode($data); 
    }
    function ajax_update(){
        $this->load->model('City_model');
        $this->City_model->ajax_update();
    }
}