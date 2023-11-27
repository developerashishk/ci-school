<?php 
class State_model extends CI_Model {

    function create(){
        $name = $this->input->post('name');
        $country_id = $this->input->post('country_id');
    
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
        // Loop through each item in the $result array
        foreach ($result as &$item) {
            $item['update'] = "<a onclick=update(" . json_encode($item) . "); class='btn btn-primary'>update</a>";
            $item['del'] = "<a onclick=ajax_del(" . $item["id"] . "); class='btn btn-danger'>Delete</a>"; 
        }
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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->input->post('submit')) {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $country_id = $this->input->post('country_id');

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
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $country_id = $this->input->post('country_id');
    
                $sql = "UPDATE states SET name='$name', country_id='$country_id' WHERE id=$id";
            
                if ($this->db->query($sql) === TRUE) {
                    return true;
                } else {
                    return false;
                }
            }
        }

}