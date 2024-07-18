<?php
class order_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_order() {
        $query = $this->db->get('order');
        return $query->result();
    }

    public function create_order($data) {
        $this->db->insert('order', $data);
        return $this->db->insert_id();
    }

    public function update_order($order_id, $data) {
        $this->db->where('id_order', $order_id);
        $this->db->update('order', $data);
    }

    public function delete($id_order) {
        $this->db->where('id_order', $id_order);
        $this->db->delete('order');
    }

    public function get_order_by_id($order_id) {
        $this->db->where('id_order', $order_id);
        $query = $this->db->get('order');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
?>
