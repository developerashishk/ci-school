<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Auth extends CI_Controller {     

    function index(){
        $this->load->view("city/form");
    }

    function login(){
        $name=$_POST["username"];
        $pass=$_POST["password"];

        if($name == 'Admin' && $pass == '12345'){
            $_SESSION['login']=true;
            $url=base_url("dashboard/");
            header("Location: $url");

        }else{
            echo '<script type="text/javascript">';
            echo ' alert("JavaScript Alert Box by PHP")';  //not showing an alert box.
            echo '</script>';
        }
    }

    function logout (){
        session_destroy();
        $url=base_url("Auth");
        header("Location: $url");
    }
}