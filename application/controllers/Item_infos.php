<?php

class Item_infos extends CI_controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Item');
    }
    public function item_info($id){
        $information['item_info'] = $this->Item->item_info($id);
        $this->load->view('user-page/user_iteminfo', $information);
    }

}