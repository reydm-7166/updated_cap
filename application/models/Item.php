<?php

class Item extends CI_model {
    public function get_category(){
        return $this->db->query("SELECT categories.id, categories.category_name, COUNT(products.category_id) AS count FROM categories
                                INNER JOIN products ON categories.id = products.category_id
                                GROUP BY categories.category_name
                                ORDER BY categories.id ASC")->result_array();
    }

    public function by_category($id){
        return $this->db->query("SELECT * FROM products
                                    WHERE category_id = ?
                                    ORDER BY item_price ASC", $id)->result_array();
    }

    public function get_all(){
        return $this->db->query("SELECT * FROM products
                                ORDER BY item_price ASC")->result_array();
    }

    public function item_info($id){
        return $this->db->query("SELECT * FROM products
                                WHERE id = ?", $id)->result_array();
    }
}