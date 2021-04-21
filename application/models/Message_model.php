<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends MY_Model {


    public function __construct() {
        $this->load->database();
        $this->table = "message";
    }

    public function get_all($ticket) {
        $userId=$this->session->userdata('userId');
        $query = $this->db->where('ticket', $ticket)->get($this->table);
        return $query->result();
    }

    public function get_by_ticket($ticket) {
        $query = $this->db->get_where($this->table, array('ticket' => $ticket));
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

    public function delete_by_id($id) {
        $userId=$this->session->userdata('userId');
        $user = $this->db->select('user_id')->get_where($this->table, array('plugin_id' => $id))->row();
        $user_id = $user->user_id;
        if ($userId==$user_id){
            $this->db->where('plugin_id', $id);
            $this->db->delete($this->table);
            redirect('Plugins/index');
        }else{
            redirect('Plugins/index');
        }
    }

}
