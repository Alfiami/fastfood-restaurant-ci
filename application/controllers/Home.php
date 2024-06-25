<?php
class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('session', 'form_validation', 'upload'));
        $this->load->model(array('Message_model', 'Order_model', 'Cart_model', 'Cart_item_model', 'User_model', 'Product_model'));
    }
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('home'); 
        $this->load->view('templates/footer');
    }
    public function register() {
        $data['user'] = $this->session->userdata('logged_in') ? $this->User_model->getUserById($this->session->userdata('user_id')) : null;
        $this->load->view('templates/header');
        $this->load->view('register', $data); 
        $this->load->view('templates/footer');
    }
    public function authentication() {
        $action = $this->input->post('action');
        if ($action == 'register') {
            $this->_register();
        } elseif ($action == 'update') {
            $this->update_profile();
        } else {
            $this->_login();
        }
    }
    private function _register() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $phone = $this->input->post('phone');
        $gender = $this->input->post('gender');
        $address = $this->input->post('address');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password,
            'phone' => $phone,
            'gender' => $gender,
            'address' => $address
        ];
        if ($this->User_model->register($data)) {
            $this->session->set_flashdata('success', 'Registration successful!');
        } else {
            $this->session->set_flashdata('error', 'Registration failed!');
        }
        redirect(base_url('home/register'));
    }
    public function _login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->User_model->login($email, $password);
        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('logged_in', true);
            redirect(base_url('home/register')); 
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect(base_url('home/register')); 
        }
    }
    public function edit_profile() {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->getUserById($user_id);
        $this->load->view('templates/header');
        $this->load->view('edit_profile', $data);  
        $this->load->view('templates/footer');
    }
    public function update_profile() {
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address')
        );
        $result = $this->User_model->update_user($user_id, $data);
        if ($result) {
            $this->session->set_flashdata('success', 'Profile updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update profile.');
        }
        redirect('home/register');
    }
    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('success', 'You have logged out successfully');
        redirect(base_url('home/register')); 
    }
    public function about() {
        $this->load->view('templates/header');
        $this->load->view('about');
        $this->load->view('templates/footer');
    }
    public function contact() {
        $this->load->view('templates/header');
        $this->load->view('contact');
        $this->load->view('templates/footer');
    }
    public function save_message() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->contact();
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'message' => $this->input->post('message')
            );
            if ($this->Message_model->insert_message($data)) {
                $this->session->set_flashdata('success', 'Your message has been sent successfully.');
            } else {
                $this->session->set_flashdata('error', 'There was a problem sending your message. Please try again.');
            }
            redirect('home/contact');
        }
    }
    public function menu() {
        $this->load->view('templates/header');
        $this->load->view('menu');
        $this->load->view('templates/footer');
    }
    public function add_to_cart($product_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('home/register'));
        }
        $this->load->model('Product_model');
        $product = $this->Product_model->get_product_by_id($product_id);
        if (!$product) {
            redirect(base_url('home/menu')); 
        }
        $item = array(
            'id' => $product['id'], 
            'name' => $product['name'],
            'description' => $product['description'],
            'price' => $product['price'],
            'image' => $product['image'],
            'qty' => 1 
        );
        if (!$this->session->has_userdata('cart')) {
            $this->session->set_userdata('cart', array());
        }
        $cart = $this->session->userdata('cart');
        $cart[] = $item;
        $this->session->set_userdata('cart', $cart);
        redirect(base_url('home/menu'));
    }
    public function cart() {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register');
        }
        $cart = $this->session->userdata('cart');
        $data['cart_items'] = $cart ? $cart : array();
        $total_amount = 0;
        foreach ($data['cart_items'] as $item) {
            if (isset($item['price']) && isset($item['qty'])) {
                $total_amount += $item['price'] * $item['qty'];
            }
        }
        $data['total_amount'] = $total_amount;
        $this->load->view('templates/header');
        $this->load->view('cart', $data);
        $this->load->view('templates/footer');
    }
    public function delete_from_cart($item_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('home/register'));
        }
        $cart = $this->session->userdata('cart');
        foreach ($cart as $key => $item) {
            if ($item['id'] == $item_id) {
                unset($cart[$key]);
                break; 
            }
        }
        $this->session->set_userdata('cart', $cart);
        redirect(base_url('home/cart'));
    }
    public function buy_now($id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register'); 
        }
        if (!$this->load->model('Product_model')) {
            redirect('home/menu');
        }
        $product = $this->Product_model->get_product_by_id($id); 
        if (!$product) {
            redirect('home/menu'); 
        }
        $item = array(
            'id'      => uniqid(), 
            'qty'     => 1, 
            'price'   => $product['price'],
            'name'    => $product['name'],
            'description' => $product['description'],
            'image'   => $product['image']
        );
        if (!$this->session->has_userdata('cart')) {
            $this->session->set_userdata('cart', array());
        }
        $cart = $this->session->userdata('cart');
        $cart[] = $item;
        $this->session->set_userdata('cart', $cart);
        redirect('home/checkout');
    }
    public function checkout() {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register'); 
        }
        $cart = $this->session->userdata('cart');
        $data['cart_items'] = $cart ? $cart : array();
        $this->load->view('templates/header');
        $this->load->view('checkout', $data);
        $this->load->view('templates/footer');
    }
    public function place_order() {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register');
        }
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in customer name and address.');
            redirect('home/cart');
        } else {
            $customer_name = $this->input->post('customer_name');
            $customer_address = $this->input->post('customer_address');
            $cart = $this->session->userdata('cart');
            $total_amount = array_sum(array_map(function($item) {
                return $item['price'] * (isset($item['qty']) ? $item['qty'] : 1);
            }, $cart));
            $order_data = array(
                'user_id' => $this->session->userdata('user_id'),
                'customer_name' => $customer_name,
                'customer_address' => $customer_address,
                'order_date' => date('Y-m-d H:i:s'),
                'total_amount' => $total_amount,
                'status' => 'pending'
            );
            $order_id = $this->Order_model->create_order($order_data);
            if ($order_id) {
                foreach ($cart as $item) {
                    $order_detail = array(
                        'order_id' => $order_id,
                        'product_name' => $item['name'],
                        'product_description' => $item['description'],
                        'product_price' => $item['price'],
                        'quantity' => isset($item['qty']) ? $item['qty'] : 1,
                        'subtotal' => $item['price'] * (isset($item['qty']) ? $item['qty'] : 1)
                    );
                    $this->Order_model->create_order_detail($order_detail);
                }
                $this->session->unset_userdata('cart');
                $this->session->set_flashdata('success', 'Your order has been placed and is pending.');
                redirect('home/orders');
            } else {
                $this->session->set_flashdata('error', 'Failed to place order. Please try again.');
                redirect('home/cart');
            }
        }
    }
    public function orders() {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register'); 
        }
        $user_id = $this->session->userdata('user_id');
        $data['orders'] = $this->Order_model->get_orders_by_user($user_id);
        $this->load->view('templates/header');
        $this->load->view('orders', $data);
        $this->load->view('templates/footer');
    }
    public function order_details($order_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register'); 
        }
        $data['order'] = $this->Order_model->get_order_by_id($order_id);
        $data['order_details'] = $this->Order_model->get_order_details_by_order_id($order_id);
        $this->load->view('templates/header');
        $this->load->view('order_details', $data);
        $this->load->view('templates/footer');
    }
    public function cancel_order($order_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register'); 
        }
        $order = $this->Order_model->get_order_by_id($order_id);    
        if ($order && $order['status'] == 'pending') {
            $this->Order_model->update_order_status($order_id, 'cancelled');
            $this->session->set_flashdata('success', 'Order has been cancelled.');
        } else {
            $this->session->set_flashdata('error', 'Failed to cancel order or order is not pending.');
        }    
        redirect('home/orders');
    }  
    public function pay_order($order_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register'); 
        }
        $order = $this->Order_model->get_order_by_id($order_id);
        if ($order && $order['status'] == 'pending') {
            $data['order'] = $order;
            $this->load->view('payment', $data);
        } else {
            $this->session->set_flashdata('error', 'Order not found or is not pending.');
            redirect('home/orders');
        }
    }
    public function process_payment($order_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register'); 
        }
        $order = $this->Order_model->get_order_by_id($order_id);
        if ($order && $order['status'] == 'pending') {
            $card_number = $this->input->post('card_number');
            $expiry_date = $this->input->post('expiry_date');
            $cvv = $this->input->post('cvv');
            $payment_successful = true;
            if ($payment_successful) {
                $status_updated = $this->Order_model->complete_order($order_id);
                if ($status_updated) {
                    $this->session->set_flashdata('success', 'Payment successful. Order has been completed.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to update order status.');
                }
            } else {
                $this->session->set_flashdata('error', 'Payment failed. Please try again.');
            }
        } else {
            $this->session->set_flashdata('error', 'Order not found or is not pending.');
        }
        redirect('home/orders');
    }
    public function delete_order($order_id) {
        if (!$this->session->userdata('logged_in')) {
            redirect('home/register');
        }
        $order = $this->Order_model->get_order_by_id($order_id);
        if (!$order || $order['user_id'] != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'You do not have permission to delete this order.');
            redirect('home/orders');
        }
        $result = $this->Order_model->delete_order($order_id);
        if ($result) {
            $this->session->set_flashdata('success', 'Order has been successfully deleted.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete order.');
        }
        redirect('home/orders');
    }
}
