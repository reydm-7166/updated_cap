<?php

class Carts extends CI_controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Cart');
        
        $this->load->library("form_validation");
    }

    public function index(){
        $data = $this->Cart->get_count();
        $this->session->set_userdata("count", $data);

        $data['cart_items'] = $this->Cart->get_items();

        $this->load->view('user-page/user_cart', $data);
    }
    /* 
    * THIS code seperates the shipping info and billing information and save it to seperate variable and insert to their respective tables
    * Owned by: Reymond
    */
    public function payment(){
        $data = $this->input->post(NULL, TRUE);
        
        $this->form_validation->set_rules("ship_fname", "First Name", "trim|required|alpha");
        $this->form_validation->set_rules("ship_lname", "Last Name", "trim|required|alpha");
        $this->form_validation->set_rules("ship_address", "Shipping Address", "trim|required|alpha");
        $this->form_validation->set_rules("ship_address2", "Shipping Address 2", "trim|required|alpha");
        $this->form_validation->set_rules("ship_city", "City", "trim|required|alpha");
        $this->form_validation->set_rules("ship_state", "State", "trim|required|alpha");
        $this->form_validation->set_rules("ship_zipcode", "Zip Code", "trim|required|numeric");

        $this->form_validation->set_rules("bill_fname", "First Name", "trim|required|alpha");
        $this->form_validation->set_rules("bill_lname", "Last Name", "trim|required|alpha");
        $this->form_validation->set_rules("bill_address", "Billing Address", "trim|required|alpha");
        $this->form_validation->set_rules("bill_address2", "Billing Address 2", "trim|required|alpha");
        $this->form_validation->set_rules("bill_city", "City", "trim|required|alpha");
        $this->form_validation->set_rules("bill_state", "State", "trim|required|alpha");
        $this->form_validation->set_rules("bill_zipcode", "Zip Code", "trim|required|numeric");
        if($this->form_validation->run() === FALSE){
                $this->view_data["errors"] = validation_errors();
                 return $this->index();
            } else {
                
                $shipping_information = array($data['ship_fname'],$data['ship_lname'],$data['ship_address'],$data['ship_address2'],
                $data['ship_city'],$data['ship_state'],$data['ship_zipcode']);

                $billing_information = array($data['bill_fname'],$data['bill_lname'],$data['bill_address'],$data['bill_address2'],
                            $data['bill_city'],$data['bill_state'],$data['bill_zipcode']);

                $total = $data['total'];            
                $payment = array($data['card'], $data['sec_code']);
            }
        /* 
        * if no errors in the validation this code seperates the shipping info and billing information and save it to seperate variable 
        * and insert to their respective tables
        * Owned by: Reymond
        */

        $ship = $this->Cart->shipping_insert($shipping_information);
        $bill = $this->Cart->billing_insert($billing_information);

        /* 
        * this gets the billing_id to store on order_number table
        * Owned by: Reymond
        */

        $order_billing_id = $this->Cart->get_order_id();

        /* 
        * THIS code below gets the item from the cart and save it to a variable and then the data to orders table
        * Owned by: Reymond
        */
  
        if($ship && $bill){
            /* 
            * this inserts the the billing and shipping in the order numbers table
            * Owned by: Reymond
            */
            $insert = $this->Cart->insert_to_ordernumbers($order_billing_id);
            /* 
            * this gets the order_numbers id to store on orders table
            * Owned by: Reymond
            */
            $order_number_id = $this->Cart->get_ordernumber_id();
            /* 
            * this gets the order_numbers id to store on orders table
            * Owned by: Reymond
            */
            //$verify = $this->Cart->insert_order($order_number_id);
            /* 
            * this gets the order_numbers id to store on orders table
            * Owned by: Reymond
            */
            $cart = $this->Cart->get_cart();
            $order['order_number_id'] = $order_number_id[0];
               
            for($i=0; $i < count($cart); $i++ ){
               unset($cart[$i]['id']);
               $cart[$i]['order_number_id'] = $order['order_number_id']['id'];
               $cart[$i]['status'] = "Pending";
               $cart[$i]['created_at'] = 'NOW()';
               $cart[$i]['updated_at'] = 'NOW()';
            }
            // echo "<pre>";
            //     print_r($cart);
            // echo "<pre>"; 

            $verify = $this->Cart->insert_to_orders($cart);
            if($verify){
                $_SESSION['notice'] = "Order Placed Successfully!";
                redirect('shopping-cart');
            }
            
            
        }    
    }
}