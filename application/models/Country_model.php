<?php 
class Country_model extends CI_Model {

    function create(){
        $name = $this->input->post('name');
        $sortname = $this->input->post('sortname');
    
        $sql = "INSERT INTO countries (name, sortname) VALUES ('$name', '$sortname' )";
        $this->load->database();
        if ($this->db->query($sql) === TRUE) {
          //  header("Location: display");
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error();
        }
    }

    function records(){
        $this->load->database();
        $sql = "SELECT * FROM countries";
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
        $sql = "SELECT * FROM countries WHERE id=$id";
        $result = $this->db->query($sql)->row_array(); 
        return $result;   
    }

    function update(){
        $this->load->database();
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->input->post('submit')) {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $sortname = $this->input->post('sortname');

            $sql = "UPDATE countries SET name='$name', sortname='$sortname' WHERE id=$id";
        
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
        $sql = "DELETE FROM countries WHERE id=$id";

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
        $sql = "DELETE FROM countries WHERE id=$id";
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
            $sortname = $this->input->post('sortname');

            $sql = "UPDATE countries SET name='$name', sortname='$sortname' WHERE id=$id";
        
            if ($this->db->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }

}