<?php 
class Session_model extends CI_Model {

    function create(){
        $session = $_POST['session'];
        $postingdate = $_POST['postingdate'];
        $status = $_POST['status'];
    
        $sql = "INSERT INTO session (session, postingdate, status) VALUES ('$session', '$postingdate', '$status' )";
        $this->load->database();
        if ($this->db->query($sql) === TRUE) {
            header("Location: display");
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error();
        }
    }

    function records(){
        $this->load->database();
        $sql = "SELECT * FROM session";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function getRecord(){
        $this->load->database();
        $id = $_GET['updateid'];
        $sql = "SELECT * FROM session WHERE id=$id";
        $result = $this->db->query($sql)->row_array(); 
        return $result;   
    }

    function update(){
        $this->load->database();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $id = $_POST['id'];
            $session = $_POST['session'];
            $postingdate = $_POST['postingdate'];
            $status = $_POST['status'];

            $sql = "UPDATE session SET session='$session', postingdate='$postingdate', status='$status' WHERE id=$id";
        
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
        $sql = "DELETE FROM session WHERE id=$id";

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
        $sql = "DELETE FROM session WHERE id=$id";
        if ($this->db->query($sql) === TRUE) {
                    return true;
            } else {
                return false;
            }
        }

}