<?php
class Cart_item_model extends CI_Model {
        // Method untuk menambah item ke dalam keranjang
        public function add_item($cart_id, $item) {
            $item_data = array(
                'cart_id' => $cart_id,
                'product_name' => $item['name'],
                'product_description' => $item['description'],
                'product_price' => $item['price'],
                'quantity' => $item['qty'],
                'subtotal' => $item['price'] * $item['qty']
            );
            $this->db->insert('cart_items', $item_data);
        }
        // Method untuk mengambil item berdasarkan ID keranjang
        public function get_items($cart_id) {
            $this->db->select('*');
            $this->db->from('cart_items');
            $this->db->where('cart_id', $cart_id);
            $query = $this->db->get();
            return $query->result_array();
        }
        // Method untuk menghapus item dari keranjang
        public function delete_item($item_id) {
            $this->db->where('id', $item_id);
            $this->db->delete('cart_items');
        }
        // Method untuk mengambil item berdasarkan ID item
        public function get_item_by_id($item_id) {
            $this->db->select('*');
            $this->db->from('cart_items');
            $this->db->where('id', $item_id);
            $query = $this->db->get();
            return $query->row_array();
        }
    }
?>
