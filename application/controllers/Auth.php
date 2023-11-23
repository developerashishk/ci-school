<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Auth extends CI_Controller {     

    function index(){
        $this->load->view("city/form");
    }

    function login(){
        $name = $this->input->post("loginid");
        $pass = $this->input->post("password");
    
        // Load the database library
        $this->load->database();
    
        // Query the database to check the credentials
        $query = $this->db->get_where('tbl_login', array('loginid' => $name, 'password' => $pass));
        $user = $query->row();
    
        if ($user) {
            $_SESSION['login'] = true;
            $url = base_url("dashboard/");
            header("Location: $url");
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Invalid Details")';  
            echo '</script>';
        }
    }
    

    function logout (){
        session_destroy();
        $url=base_url("Auth");
        header("Location: $url");
    }
}