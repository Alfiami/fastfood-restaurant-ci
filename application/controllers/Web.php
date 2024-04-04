<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Web extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function index(){
        $this->load->view('v_header');
        $this->load->view('v_index');
        $this->load->view('v_footer');
    }
    public function about(){
        $this->load->view('v_header');
        $this->load->view('v_about');
        $this->load->view('v_footer');
    }
    public function produk(){
        $this->load->view('v_header');
        $this->load->view('v_produk');
        $this->load->view('v_footer');
    }
    public function cart(){
        $this->load->view('v_header');
        $this->load->view('v_cart');
        $this->load->view('v_footer');
    }
    }
