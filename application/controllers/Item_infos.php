<?php

class Item_infos extends CI_controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Item');
        $this->load->model('Cart');
        
        $data = $this->Cart->get_count();
        $this->session->set_userdata('count', $data);
    }
    /* 
    * THIS method shows the products specifically. when user clicks the item it shows the details 
    * and it takes parameter of the item id. all items in display have hidden input of product_id
    * and that is what this method takes as parameter.
    * Owned by: Reymond
    */

    public function item_info($id){
        $information['item_info'] = $this->Item->item_info($id);
        $this->load->view('user-page/user_iteminfo', $information);
    }

}