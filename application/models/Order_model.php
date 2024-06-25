<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function create_order($order_data) {
        $this->db->insert('orders', $order_data);
        return $this->db->insert_id(); 
    }
    public function create_order_detail($order_detail) {
        $this->db->insert('order_details', $order_detail);
    }
    public function get_orders_by_user($user_id) {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_all_orders() {
        $this->db->select('*');
        $this->db->from('orders');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_order_by_id($order_id) {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('id', $order_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_order_details_by_order_id($order_id) {
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->where('order_id', $order_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_order_status($order_id, $status) {
        $this->db->set('status', $status);
        $this->db->where('id', $order_id);
        return $this->db->update('orders');
    }
    public function complete_order($order_id) {
        $this->db->set('status', 'completed');
        $this->db->where('id', $order_id);
        return $this->db->update('orders');
    }
    public function delete_order($order_id) {
        $this->db->where('id', $order_id);
        $this->db->delete('orders');
        $this->db->where('order_id', $order_id);
        $this->db->delete('order_details');
        return true;
    }
}
?>
