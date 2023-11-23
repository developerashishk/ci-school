<?php 
class State_model extends CI_Model {

    function create(){
        $name = $_POST['name'];
        $country_id = $_POST['country_id'];
    
        $sql = "INSERT INTO states (name, country_id) VALUES ('$name', '$country_id' )";
        $this->load->database();
        if ($this->db->query($sql) === TRUE) {
          //  header("Location: display");
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error();
        }
    }
    function records(){
        $this->load->database();
        $sql = "SELECT * FROM states ORDER BY ID DESC LIMIT 10";
        $result = $this->db->query($sql)->result_array();
        return $result;
    }
  
    function getRecord(){
        $this->load->database();
        $id = $_GET['updateid'];
        $sql = "SELECT * FROM states WHERE id=$id";
        $result = $this->db->query($sql)->row_array(); 
        return $result;   
    }

    function update(){
        $this->load->database();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $country_id = $_POST['country_id'];

            $sql = "UPDATE states SET name='$name', country_id='$country_id' WHERE id=$id";
        
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
        $sql = "DELETE FROM states WHERE id=$id";

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
        $sql = "DELETE FROM states WHERE id=$id";
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
                $name = $_POST['name'];
                $country_id = $_POST['country_id'];
    
                $sql = "UPDATE states SET name='$name', country_id='$country_id' WHERE id=$id";
            
                if ($this->db->query($sql) === TRUE) {
                    return true;
                } else {
                    return false;
                }
            }
        }

}