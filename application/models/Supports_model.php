<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supports_model extends MY_Model {


    public function __construct() {
        $this->load->database();
        $this->table = "supports";
    }

    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function get_by_id() {
        $userId=$this->session->userdata('userId');
        $query = $this->db->where('user_id', $userId)->get($this->table);
        return $query->result();
    }
    public function last_inserted_id(){
        $support = $this->db->select('support_id')->order_by('support_id',"desc")->limit(1)->get($this->table)->row();
        if(!empty($support)){
            return $support->support_id;
        }else{
            return 0;
        }
    }

    public function get_by_ticket($id) {
        $query = $this->db->get_where($this->table, array('ticket' => $id));
        return $query->row();
    }
    public function get_status_by_ticket($id) {
        $query = $this->db->get_where($this->table, array('ticket' => $id));
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
