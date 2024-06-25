<?php
class User_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    public function register($data) {
        return $this->db->insert('users', $data);
    }
    public function login($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }
    public function getUserById($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
}
?>
