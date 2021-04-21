<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ip_list_model extends MY_Model {


    public function __construct() {
        $this->load->database();
        $this->table = "ip_list";
    }
    public function getRows($data){
        // count all example
        $this->db->where($data);
        $num = $this->db->count_all_results($this->table);
        return $num;
    }

    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where($this->table, array('plugin_id' => $id));
        return $query->row();
    }

    public function insert_data($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_data($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }




}
