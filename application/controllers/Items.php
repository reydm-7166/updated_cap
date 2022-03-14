<?php

class Items extends CI_controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('Item');
        $this->load->model('Cart');
        
        $data = $this->Cart->get_count();
        $this->session->set_userdata('count', $data);
    }
    /* 
    * THIS method shows the products in each category from the database.
    * Owned by: Reymond
    */
    public function index(){
        $show_all['information'] = $this->Item->get_category();
        $this->load->view('user-page/user_home', $show_all);
    }
    /* 
    * THIS method sorts them accordinng to their category
    * Owned by: Reymond
    */
    public function by_category(){
        $data = $this->input->post();
        $show_all['images_data'] = $this->Item->by_category($data['id']);

        $this->load->view('partials/images_partials', $show_all);
    }

    /* 
    * THIS is the default where it shows all items regardless of their category.
    * Owned by: Reymond
    */

    public function show_all(){

        $show_all['images_data'] = $this->Item->get_all();

        $this->load->view('partials/images_partials', $show_all);
    }


}