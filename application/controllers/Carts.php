<?php

class Carts extends CI_controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Cart');
    }

    public function index(){
        $this->load->view('user-page/user_cart');
    }
}