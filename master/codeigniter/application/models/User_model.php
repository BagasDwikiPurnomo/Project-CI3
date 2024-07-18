<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_users() {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function create_user($data){
        $this->db->insert('users', $data); // users adalah nama table di database jadi sesuaikan 
        return $this->db->insert_id();
    }
    
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_user_by_username($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('users')->row();
    }
    
}
?>
