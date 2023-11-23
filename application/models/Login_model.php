<?php 
class Login_model extends CI_Model {

    function create(){
        $FullName = $_POST['FullName'];
        $AdminEmail = $_POST['AdminEmail'];
        $loginid = $_POST['loginid'];
        $password = $_POST['password'];
    
        $sql = "INSERT INTO tbl_login (FullName, AdminEmail, loginid, password) VALUES ('$FullName', '$AdminEmail','$loginid', '$password' )";
        $this->load->database();
        if ($this->db->query($sql) === TRUE) {
          //  header("Location: display");
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error();
        }
    }

    function records(){
        $this->load->database();
        $sql = "SELECT * FROM tbl_login";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function getRecord(){
        $this->load->database();
        $id = $_GET['updateid'];
        $sql = "SELECT * FROM tbl_login WHERE id=$id";
        $result = $this->db->query($sql)->row_array(); 
        return $result;   
    }

    function update(){
        $this->load->database();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $id = $_POST['id'];
            $FullName = $_POST['FullName'];
            $AdminEmail = $_POST['AdminEmail'];
            $loginid = $_POST['loginid'];
            $password = $_POST['password'];

            $sql = "UPDATE tbl_login SET FullName='$FullName', AdminEmail='$AdminEmail', loginid='$loginid', password='$password' WHERE id=$id";
        
            if ($this->db->query($sql) === TRUE) {
                header("Location: display");
            } else {
              echo "Error updating record: " . $this->db->error();
            }
        }
        
    }

    function del(){
        $this->load->database();
        if (isset($_GET['deleteid'])) {
            $id = $_GET['deleteid'];
            
        // sql to delete a record
        $sql = "DELETE FROM tbl_login WHERE id=$id";

        if ($this->db->query($sql) === TRUE) {
            header("Location: display");
        } else {
         echo "Error deleting record: " . $this->db->error();
        }
        }
    }

    function ajax_del($id){
        $this->load->database();
        // sql to delete a record
        $sql = "DELETE FROM tbl_login WHERE id=$id";
        if ($this->db->query($sql) === TRUE) {
                    return true;
            } else {
                return false;
            }
        }
        function ajax_update(){
            $this->load->database();
            if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                $id = $_POST['id'];
                $FullName = $_POST['FullName'];
                $AdminEmail = $_POST['AdminEmail'];
                $loginid = $_POST['loginid'];
                $password = $_POST['password'];
    
                $sql = "UPDATE tbl_login SET FullName='$FullName', AdminEmail='$AdminEmail', loginid='$loginid', password='$password' WHERE id=$id";
            
                if ($this->db->query($sql) === TRUE) {
                    return true;
                } else {
                    return false;
                }
            }
        }

}