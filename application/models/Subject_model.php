<?php 
class Subject_model extends CI_Model {

    function create(){
        $cfull = $this->input->post('cfull');
        $sub1 = $this->input->post('sub1');
        $sub2 = $this->input->post('sub2');
        $sub3 = $this->input->post('sub3');
        $sub4 = $this->input->post('sub4');
        $dt_created = $this->input->post('dt_created');
        $sql = "INSERT INTO subject (cfull, sub1, sub2, sub3, sub4, dt_created) VALUES ('$cfull', '$sub1', '$sub2', '$sub3', '$sub4', '$dt_created' )";
        $this->load->database();
        if ($this->db->query($sql) === TRUE) {
         //   header("Location: display");
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error();
        }
    }

    function records(){
        $this->load->database();
        $sql = "SELECT * FROM subject ORDER BY subid ";
        $result = $this->db->query($sql)->result_array();
        // Loop through each item in the $result array
        foreach ($result as &$item) {
            $item['update'] = "<a onclick=update(" . json_encode($item) . "); class='btn btn-primary'>update</a>";
            $item['del'] = "<a onclick=ajax_del(" . $item["subid"] . "); class='btn btn-danger'>Delete</a>"; 
        }
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
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $this->input->post('submit')) {
            $subid = $this->input->post('subid');
            $cfull = $this->input->post('cfull');
            $sub1 = $this->input->post('sub1');
            $sub2 = $this->input->post('sub2');
            $sub3 = $this->input->post('sub3');
            $sub4 = $this->input->post('sub4');
            $dt_created = $this->input->post('dt_created');
            $update_date = $this->input->post('update_date');

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
                $subid = $this->input->post('subid');
                $cfull = $this->input->post('cfull');
                $sub1 = $this->input->post('sub1');
                $sub2 = $this->input->post('sub2');
                $sub3 = $this->input->post('sub3');
                $sub4 = $this->input->post('sub4');
                $dt_created = $this->input->post('dt_created');
                $update_date = $this->input->post('update_date');
    
                $sql = "UPDATE subject SET cfull='$cfull', sub1='$sub1', sub2='$sub2', sub3='$sub3', sub4='$sub4', dt_created='$dt_created', update_date='$update_date' WHERE subid=$subid";
            
                if ($this->db->query($sql) === TRUE) {
                    return true;
                } else {
                    return false;
                }
            }
        }

}