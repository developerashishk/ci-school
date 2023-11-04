<?php 
class Course_model extends CI_Model {

    function create(){
        $cshort = $_POST['cshort'];
        $cfull = $_POST['cfull'];
        $cdate = $_POST['cdate'];
        $update_date = $_POST['update_date'];
        
        
    
        $sql = "INSERT INTO tbl_course (cshort, cfull, cdate, update_date) VALUES ('$cshort', '$cfull', '$cdate', '$update_date' )";
        $this->load->database();
        if ($this->db->query($sql) === TRUE) {
            header("Location: display");
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error();
        }
    }

    function records(){
        $this->load->database();
        $sql = "SELECT * FROM tbl_course ORDER BY cid ";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }

    function getRecord(){
        $this->load->database();
        $cid = $_GET['updateid'];
        $sql = "SELECT * FROM tbl_course WHERE cid=$cid";
        $result = $this->db->query($sql)->row_array(); 
        return $result;   
    }

    function update(){
        $this->load->database();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $cid = $_POST['cid'];
            $cshort = $_POST['cshort'];
            $cfull = $_POST['cfull'];
            $cdate = $_POST['cdate'];
            $update_date = $_POST['update_date'];
        

            $sql = "UPDATE tbl_course SET cshort='$cshort', cfull='$cfull', cdate='$cdate', update_date='$update_date' WHERE cid=$cid";
        
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
            $cid = $_GET['deleteid'];
            
        // sql to delete a record
        $sql = "DELETE FROM tbl_course WHERE cid=$cid";

        if ($this->db->query($sql) === TRUE) {
            header("Location: display");
        } else {
         echo "Error deleting record: " . $this->db->error();
        }
        }
    }

}