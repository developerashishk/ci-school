<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Dashboard extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        if(!isset($_SESSION['login']) && $_SESSION['login']!==true ){
            $url=base_url("Auth");
            header("Location: $url");
        }
    }

    function index(){
        $this->load->view('adminlte/index');
    }
    function table(){
        $this->load->view('adminlte/table');
    }
    function city(){
        $this->load->view('adminlte/city');
    }
    function country(){
        $this->load->view('adminlte/country');
    }
    function course(){
        $this->load->view('adminlte/course');
    }
    function session(){
        $this->load->view('adminlte/session');
    }
    function state(){
        $this->load->view('adminlte/state');
    }
    function subject(){
        $this->load->view('adminlte/subject');
    }   
}