<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model{

    function __construct() {
        $this->userTbl = 'users';
    }
    // Get by ID
    public function get_by_id($id) {
        $query = $this->db->get_where($this->userTbl, array('id' => $id));
        return $query->row();
    }
    // Get by
    public function get_by(array $where) {
        $query = $this->db->get_where($this->userTbl, $where);
        return $query->row();
    }
    /*
     * get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key,$value);
			}
		}
        
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
				$result = $query->num_rows();
			}elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
				$result = ($query->num_rows() > 0)?$query->row_array():FALSE;
			}else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    
	/*
	 * Insert user information
	 */
    public function insert($data = array()) {
        //add created and modified data if not included
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
            $data['rules'] = 'free';
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }

        
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function update($where, $data){
        $this->db->update($this->userTbl, $data, $where);
        return $this->db->affected_rows();
    }

    // Send Email
    public function send_email($to, $sub, $message){
        $this->load->library('email');

        $this->email->from('shaponpal4@gmail.com', 'WinnRepo Support Center');
        $this->email->to($to);
       // $this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject($sub);
        $this->email->message($message);

        $this->email->send();
    }

}
