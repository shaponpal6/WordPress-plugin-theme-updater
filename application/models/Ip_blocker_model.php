<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ip_blocker_model extends MY_Model {


    public function __construct() {
        $this->load->database();
        $this->table = "ip_blocker";
    }

    public function getRows($data){
        // count all example
        $this->db->where($data);
        $num = $this->db->count_all_results($this->table);
        return $num;
    }

    public function get_all($data) {
        $query = $this->db->where($data)->get($this->table);
        return $query->result();
    }
    public function get_all_status() {
        $query = $this->db->where(array('status'=>0))->get($this->table);
        return $query->result_array();
    }

    public function get_by_id($id) {
        $query = $this->db->where(array('client_id'=>$id))->get($this->table);
        return $query->result();
    }
    public function get_by_status($licence) {
        $this->db->select("ip_address");
        $this->db->from($this->table);
        $this->db->where('status', '0');
        $this->db->where('licence', $licence);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function total_download($licence,$ip) {
        $this->db->select("download");
        $this->db->from($this->table);
        $this->db->where('licence', $licence);
        $this->db->where('ip_address', $ip);
        $query = $this->db->get();
        $download = $query->row()->download;
        //print_r($query);
        if (!empty($download)){
            return $download;
        }
    }

    public function insert_data($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function insert_data_with_product($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }


    public function update_data($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function update_data_with_product($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }




}
