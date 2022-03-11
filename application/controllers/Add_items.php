<?php

class Add_items extends CI_controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Cart');
        
    }
    public function add_cart(){
        $data = $this->input->post();
        $data['total'] = $data['quantity'] * $data['item_price'];

        $url = "products/show/". $data['item_id'];

        $verify = $this->Cart->insert_item($data);
        if($verify){
            $data = $this->Cart->get_count();
            $this->session->set_userdata('count', $data);
        }
        $_SESSION['added_cart'] = "Successfully Added to cart!";
        redirect($url);
    }





}