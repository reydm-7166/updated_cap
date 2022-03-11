<?php

class Cart extends CI_model {
    public function get_count(){
        return $this->db->query("SELECT COUNT(*) AS count FROM carts")->result_array();
    }
    public function insert_item($data){
       $query = "INSERT INTO carts (product_id, quantity, total) VALUES (?,?,?)"; 

       $data = array($data['item_id'], $data['quantity'], $data['total']);
       return $this->db->query($query, $data);
    }
}