<?php

class Cart extends CI_model {
    public function get_count(){
        return $this->db->query("SELECT COUNT(*) AS count FROM carts")->result_array();
    }
    public function get_items(){
        return $this->db->query("SELECT products.item_name AS item_name, products.item_price AS item_price, carts.quantity AS item_quantity, carts.total AS item_total FROM carts
                                INNER JOIN products ON carts.product_id = products.id
                                ORDER BY products.item_name ASC")->result_array();
    }
    public function insert_item($data){
       $query = "INSERT INTO carts (product_id, quantity, total) VALUES (?,?,?)"; 

       $data = array($data['item_id'], $data['quantity'], $data['total']);
       return $this->db->query($query, $data);
    }

    public function billing_insert($data){
        $query = "INSERT INTO billing_informations(first_name, last_name, address, address2, city, state, zipcode, created_at, updated_at)  VALUES (?,?,?,?,?,?,?, NOW(), NOW())";

        $data = array($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);

        return $this->db->query($query, $data);
    }   
    public function shipping_insert($data){
        $query = "INSERT INTO shipping_informations(first_name, last_name, address, address2, city, state, zipcode, created_at, updated_at)  VALUES (?,?,?,?,?,?,?, NOW(), NOW())";

        $data = array($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);

        return $this->db->query($query, $data);
         
    }

    public function insert_to_ordernumbers($data){
        $query = "INSERT INTO order_numbers (billing_id, shipping_id) VALUES (?,?)";
        $data = array($data[0], $data[0]);

        return $this->db->query($query, $data);
    }
    public function get_order_id(){
        return $this->db->query("SELECT MAX(id) AS id FROM billing_informations")->result_array();
    }
    public function get_ordernumber_id(){
        return $this->db->query("SELECT MAX(id) AS id FROM order_numbers")->result_array();
    }
    public function get_cart(){
        return $this->db->query("SELECT * FROM carts")->result_array();
    }
    public function insert_to_orders($data){
        // echo "<pre>";
        //     print_r($data);
        // echo "<pre>"; 
        $this->db->query("DELETE FROM carts");
        return $this->db->insert_batch('orders', $data); 
    }
}