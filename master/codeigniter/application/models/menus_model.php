<?php
class Menus_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_menus() {
        $query = $this->db->get('menus');
        return $query->result();
    }

    public function create_menus($data) {
        $this->db->insert('menus', $data);
        return $this->db->insert_id();
    }

    public function update_menus($menus_id, $data) {
        $this->db->where('id_menu', $menus_id);
        $this->db->update('menus', $data);
    }

    public function delete_menus($id) {
        $this->db->where('id_menu', $id);
        $this->db->delete('menus');
    }
    
    public function get_menu_by_id($id) {
        $this->db->where('id_menu', $id);
        $query = $this->db->get('menus');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
?>
