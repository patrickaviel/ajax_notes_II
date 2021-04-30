<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Model {
    
    public function load_all(){
        $query = "Select * from notes";
        return $this->db->query($query)->result_array();
    }
    public function create($post){
        $query = "INSERT INTO notes (title,description,created_at) VALUES (?,?,?)";
        $values = array(
            $post['title'],
            $post['description'],
            date("Y-m-d h:i:s")
        );
        return $this->db->query($query,$values);
    }
    public function update($post,$id){
        $query = "UPDATE notes SET title = ? , description = ? , updated_at = ? WHERE id = ?";
        $values = array(
            $post['title'],
            $post['description'],
            date("Y-m-d h:i:s"),
            $id
        );
        return $this->db->query($query,$values);
    }
    public function delete($id){
        $query = "DELETE from notes WHERE id = ?";
        $values = array(
            $this->security->xss_clean($id)
        );
        
        return $this->db->query($query,$values);
    }

}