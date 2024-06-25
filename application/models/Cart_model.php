<?php
class Cart_model extends CI_Model {
    public function create_cart($user_id) {
        $data = array('user_id' => $user_id);
        $this->db->insert('carts', $data);
        return $this->db->insert_id();
    }
    public function get_cart($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('carts');
        return $query->row_array();
    }
    public function get_cart_id($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('carts');
        $result = $query->row_array();
        return $result ? $result['id'] : null;
    }
}
?>
