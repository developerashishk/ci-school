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

        if($name == 'Ashish' && $pass == '12345'){
            $_SESSION['login']=true;
            $url=base_url("city/");
            header("Location: $url");

        }else{
            echo "<h1>Try Again</h1>";
        }
         echo "<h1>$name</h1>";
    }

    function logout (){
        session_destroy();
        $url=base_url("Auth");
        header("Location: $url");
    }
}