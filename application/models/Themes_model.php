<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Themes_model extends MY_Model {


    public function __construct() {
        $this->load->database();
        $this->table = "themes";
    }

    public function get_all() {
        $userId=$this->session->userdata('userId');
        $query = $this->db->where('user_id', $userId)->get($this->table);
        return $query->result();
    }

    public function get_by_id($id) {
        $query = $this->db->get_where($this->table, array('theme_id' => $id));
        return $query->row();
    }

    public function insert_data($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    
    public function file_upload(){
         if($this->input->post('add_new_version')){
            
            //Check whether user upload picture
            if(!empty($_FILES['file_dir']['name'])){
                $config['upload_path'] = 'uploads/themes/';
                $config['allowed_types'] = 'zip|jpeg|png|gif';
                $config['file_name'] = $_FILES['file_dir']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('file_dir')){
                    $uploadData = $this->upload->data();
                    $file_dir = $uploadData['file_name'];
                }else{
                    $picture = '';
                }
            }else{
                $picture = '';
            }
            
            //Prepare array of user data
            $userData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'picture' => $picture
            );
            
            //Pass user data to model
            $insertUserData = $this->user->insert($userData);
            
            //Storing insertion status message.
            if($insertUserData){
                $this->session->set_flashdata('success_msg', 'User data have been added successfully.');
            }else{
                $this->session->set_flashdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        //Form for adding user data
        $this->load->view('users/add');
    }

    public function update_data($where, $data) {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

//    public function delete_by_id($id) {
//        $this->db->where('theme_id', $id);
//        $this->db->delete($this->table);
//    }
    public function delete_by_id($id) {
        $userId=$this->session->userdata('userId');
        $user = $this->db->select('user_id')->get_where($this->table, array('theme_id' => $id))->row();
        $user_id = $user->user_id;
        if ($userId==$user_id){
            $this->db->where('theme_id', $id);
            $this->db->delete($this->table);
            redirect('Themes/index');
        }else{
            redirect('Themes/index');
        }
    }

}
