<?php 
class Subject_model extends CI_Model {

    function create(){
        $cfull = $_POST['cfull'];
        $sub1 = $_POST['sub1'];
        $sub2 = $_POST['sub2'];
        $sub3 = $_POST['sub3'];
        $sub4 = $_POST['sub4'];
        $dt_created = $_POST['dt_created'];
        
    
        $sql = "INSERT INTO subject (cfull, sub1, sub2, sub3, sub4, dt_created) VALUES ('$cfull', '$sub1', '$sub2', '$sub3', '$sub4', '$dt_created' )";
        $this->load->database();
        if ($this->db->query($sql) === TRUE) {
            header("Location: display");
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error();
        }
    }

    function records(){
        $this->load->database();
        $sql = "SELECT * FROM subject ORDER BY subid ";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function getRecord(){
        $this->load->database();
        $subid = $_GET['updateid'];
        $sql = "SELECT * FROM subject WHERE subid=$subid";
        $result = $this->db->query($sql)->row_array(); 
        return $result;   
    }

    function update(){
        $this->load->database();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $subid = $_POST['subid'];
            $cfull = $_POST['cfull'];
            $sub1 = $_POST['sub1'];
            $sub2 = $_POST['sub2'];
            $sub3 = $_POST['sub3'];
            $sub4 = $_POST['sub4'];
            $dt_created = $_POST['dt_created'];
            $update_date = $_POST['update_date'];

            $sql = "UPDATE subject SET cfull='$cfull', sub1='$sub1', sub2='$sub2', sub3='$sub3', sub4='$sub4', dt_created='$dt_created', update_date='$update_date' WHERE subid=$subid";
        
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
            $subid = $_GET['deleteid'];
            
        // sql to delete a record
        $sql = "DELETE FROM subject WHERE subid=$subid";

        if ($this->db->query($sql) === TRUE) {
            header("Location: display");
        } else {
         echo "Error deleting record: " . $this->db->error();
        }
        }
    }

    function ajax_del($subid){
        $this->load->database();
        // sql to delete a record
        $sql = "DELETE FROM subject WHERE subid=$subid";
        if ($this->db->query($sql) === TRUE) {
                    return true;
            } else {
                return false;
            }
        }

        function ajax_update(){
            $this->load->database();
            if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
                $subid = $_POST['subid'];
                $cfull = $_POST['cfull'];
                $sub1 = $_POST['sub1'];
                $sub2 = $_POST['sub2'];
                $sub3 = $_POST['sub3'];
                $sub4 = $_POST['sub4'];
                $dt_created = $_POST['dt_created'];
                $update_date = $_POST['update_date'];
    
                $sql = "UPDATE subject SET cfull='$cfull', sub1='$sub1', sub2='$sub2', sub3='$sub3', sub4='$sub4', dt_created='$dt_created', update_date='$update_date' WHERE subid=$subid";
            
                if ($this->db->query($sql) === TRUE) {
                    return true;
                } else {
                    return false;
                }
            }
        }

}