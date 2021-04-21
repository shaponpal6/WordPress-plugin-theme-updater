<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model
{


    public function __construct()
    {
        $this->load->database();
        $this->table = "products";
    }

    public function get_all()
    {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row();
    }
}