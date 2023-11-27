<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
            $url = base_url("Auth");
            header("Location: $url");
            exit(); // Terminate script after redirect
        }
        $this->load->view("country/index");
    }

    public function create() {
        if ($this->input->post('submit')) {
            $this->load->model('Country_model');
            $this->Country_model->create();
        }
        $this->load->view("country/create");
    }

    public function display() {
        $this->load->model('Country_model');
        $abc = $this->Country_model->records();
        $data['records'] = $abc;
        $this->load->view("country/display", $data);
    }

    public function update() {
        $this->load->model('Country_model');
        $this->Country_model->update();
        $details = $this->Country_model->getRecord();
        $data['details'] = $details; // Use an array to pass data to the view
        $this->load->view("country/update", $data);
    }

    public function delete() {
        $this->load->model('Country_model');
        $this->Country_model->del();
    }

    public function ajax_records() {
        $this->load->model('Country_model');
        $records = $this->Country_model->records();
        $data = [
            'status' => 200,
            'records' => $records
        ];
        echo json_encode($data);
        return;
    }

    public function ajax_del($id) {
        $this->load->model('Country_model');
        $this->Country_model->ajax_del($id);
    }

    function ajax_create(){
        $data=[];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('sortname', 'sortname', 'required');
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
            $this->load->model('Country_model');
            $this->Country_model->create();
        }
        echo json_encode($data); 
    }

    public function ajax_update() {
        $this->load->model('Country_model');
        $this->Country_model->ajax_update();
    }
}
