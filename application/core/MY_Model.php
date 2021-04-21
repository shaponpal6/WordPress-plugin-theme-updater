<?php

class MY_Model extends CI_Model
{

    public $transaction = 'paypal_transaction';
    public $plugin = 'plugins';
    public $theme = 'themes';
    public $userId;


    public function __construct()
    {
        $this->load->library('session');
        $this->load->database();
        $this->userId = $this->session->userdata('userId');
    }

    public function total_plugins(){
        $plugin = $this->db->select('plugin_id')->order_by('plugin_id',"desc")->limit(1)->get($this->plugin)->row();
        if(!empty($plugin)){
            return $plugin->plugin_id;
        }else{
            return 0;
        }
    }
    public function total_themes(){
        $theme = $this->db->select('theme_id')->order_by('theme_id',"desc")->limit(1)->get($this->theme)->row();
        if(!empty($theme)){
            return $theme->theme_id;
        }else{
            return 0;
        }
    }

    public function available_product()
    {
        $created_product = $this->theme_count() + $this->plugin_count();
        $buy_product = $this->get_product_number();
        if ($created_product <= $buy_product) {
            return true;
        } else {
            return false;
        }
    }

    public function theme_count()
    {
        $userId = $this->session->userdata('userId');
        $query = $this->db->get_where($this->theme, array('user_id' => $userId));
        return $query->num_rows();
    }

    public function plugin_count()
    {
        $userId = $this->session->userdata('userId');
        $query = $this->db->get_where($this->plugin, array('user_id' => $userId));
        return $query->num_rows();
    }

    public function get_product_number()
    {
        $userId = $this->session->userdata('userId');
        $this->db->select_sum('products');
        $this->db->from('paypal_transaction');
        $this->db->where('(user_id = ' . $userId . ') ');
        $this->db->where('(expire_time >= NOW() OR expire_time = NOW())');
        $query = $this->db->get();
        $data = $query->row()->products;
        if ($data == null) {
            return 0;
        } else {
            return $data;
        }
    }

    public function licences_end()
    {
        $userId = $this->session->userdata('userId');
        $this->db->select('expire_time');
        $this->db->from('paypal_transaction');
        $this->db->where('(user_id = ' . $userId . ') ');
        $this->db->where('(expire_time >= NOW() OR expire_time = NOW())');
        $query = $this->db->get();
        $data = $query->row();
        //print_r($query);

            if (!isset($data->expire_time)) {
                return false;
            } else {
                return $data->expire_time;
            }



    }

    public function current_package()
    {
        $userId = $this->session->userdata('userId');
        $this->db->select('description');
        $this->db->from('paypal_transaction');
        $this->db->where('(user_id = ' . $userId . ') ');
        $this->db->where('(expire_time >= NOW() OR expire_time = NOW())');
        $query = $this->db->get();
        $data = $query->row();
            if (!isset($data->description)) {
                return false;
            } else {
                return $data->description;
            }

    }

    // Licence Check
    public function licence_check($userId)
    {
        //$userId = $this->session->userdata('userId');
        $this->db->select_sum('products');
        $this->db->from('paypal_transaction');
        $this->db->where('(user_id = ' . $userId . ') ');
        $this->db->where('(expire_time >= NOW() OR expire_time = NOW())');
        $query = $this->db->get();
        $data = $query->row()->products;
        if (empty($data)) {
            return false;
        } else {
            return true;
        }
    }

    // Total sell
    public function total_sell()
    {
        $userId = $this->session->userdata('userId');
        $this->db->select_sum('amount');
        $this->db->from('paypal_transaction');
        $this->db->where('(complete = 1) ');
       //$this->db->where('(expire_time >= NOW() OR expire_time = NOW())');
        $query = $this->db->get();
        $data = $query->row()->amount;
        if ($data == null) {
            return 0;
        } else {
            return $data;
        }
    }

    // Total sell
    public function total($row,$tbl,$condition)
    {
        $this->db->select_sum($row);
        $this->db->from($tbl);
        $this->db->where($condition);
        //$this->db->where('(expire_time >= NOW() OR expire_time = NOW())');
        $query = $this->db->get();
        $data = $query->row()->$row;
        if ($data == null) {
            return 0;
        } else {
            return $data;
        }
    }


}