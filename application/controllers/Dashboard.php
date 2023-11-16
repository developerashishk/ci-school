<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Dashboard extends CI_Controller {

    function index(){
        $this->load->view('adminlte/index');
    }
    function table(){
        $this->load->view('adminlte/table');
    }
}