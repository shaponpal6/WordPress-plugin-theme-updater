<?php if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}

/**
 * User Management class created by CodexWorld
 */
class Setting extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library( 'form_validation' );
		$this->load->model( 'user', 'user' );
	}

	public function index(){
        $user_profile['profile'] = $this->user->get_by_id($this->session->userdata( 'userId' ) );
		$this->load->view( 'admin/setting', $user_profile);
	}
    /*
 * Edit Profile
 */
    public function edit_profile() {
        // Validation
        if ( $this->input->post( 'edit_profile' ) ) {
            $this->form_validation->set_rules( 'name', 'Name', 'required' );
            $this->form_validation->set_rules( 'address', 'Name', 'required' );
            $this->form_validation->set_rules( 'city', 'Name', 'required' );
            $this->form_validation->set_rules( 'state', 'Name', 'required' );
            $this->form_validation->set_rules( 'zipcode', 'Name', 'required' );
            $this->form_validation->set_rules( 'country', 'Name', 'required' );
            $this->form_validation->set_rules( 'telephone', 'Name', 'required' );

            $userData = array(
                'name'     => strip_tags( $this->input->post( 'name' ) ),
                'address'     => strip_tags( $this->input->post( 'address' ) ),
                'city'     => strip_tags( $this->input->post( 'city' ) ),
                'state'     => strip_tags( $this->input->post( 'state' ) ),
                'zipcode'     => strip_tags( $this->input->post( 'zipcode' ) ),
                'country'     => strip_tags( $this->input->post( 'country' ) ),
                'telephone'     => strip_tags( $this->input->post( 'telephone' ) )
            );

            if ( $this->form_validation->run() == true ) {
                $user_id = $this->session->userdata( 'userId' );
                if($this->user->update(array('id'=>$user_id), $userData )==1){
                    $this->session->set_userdata( 'users_msg', 'Profile Edited Successfully.' );
                    //redirect( 'home/index' );
                    $this->session->set_flashdata('user','Your Profile Edited Successfully.');
                    $this->session->set_flashdata('class','success');
                    $this->session->set_userdata( 'userName',  strip_tags( $this->input->post( 'name' ) ) );
                    redirect('Setting/index');
                }else {
                    $this->session->set_userdata( 'users_msg', 'Some problems occurred, please try again.' );
                    //add flash data
                    $this->session->set_flashdata('user','Some problems occurred, please try again.');
                    $this->session->set_flashdata('class','danger');
                    redirect('Setting/index');
                }
            }
        }
    }

	/*
	 * Change Password
	 */
	public function change_password() {
		if ( $this->input->post( 'change_password' ) ) {
			$this->form_validation->set_rules( 'password', 'password', 'required' );
			$this->form_validation->set_rules( 'new_password', 'password', 'required' );
			$this->form_validation->set_rules( 'conf_password', 'confirm password', 'required|matches[new_password]' );
			if ( $this->form_validation->run() == true ) {
				$con['returnType'] = 'single';
				$con['conditions'] = array(
					'password' => md5( $this->input->post( 'password' ) ),
					'status'   => '1'
				);
				$checkLogin        = $this->user->getRows( $con );
				if ( $checkLogin ) {
					$userId = $this->session->userdata('userId');

					// Update Data
					$data = array(
						'password' => md5($this->input->post( 'conf_password' )),
						'modified' => date("Y-m-d H:i:s")
					 );
					if ($this->user->update(array('id' => $userId), $data) == 1) {
          				redirect( 'admin/login' );
          			}
					//$this->load->view( 'index.php/setting/index', $cc );
				} else {
                    $this->session->set_userdata( 'users_msg', 'Some problems occurred, please try again.' );
                    //add flash data
                    $this->session->set_flashdata('user','Some problems occurred, please try again.');
                    $this->session->set_flashdata('class','danger');
                    redirect('Setting/index');
				}
			}
		}
	}

	/*
	 * Change Password
	 */
	public function change_email() {
		if ( $this->input->post( 'change_email' ) ) {
			//$this->form_validation->set_rules( 'email', 'Email', 'required|valid_email' );
			$this->form_validation->set_rules( 'password', 'password', 'required' );
            $this->form_validation->set_rules( 'email', 'Email', 'required|valid_email' );
            // Email
            $email = $this->input->post( 'email' );
			if ( $this->form_validation->run() == true && $this->email_check($email)==true) {
				$con['returnType'] = 'single';
				$con['conditions'] = array(
					//'email'    => $this->input->post( 'email' ),
					'password' => md5( $this->input->post( 'password' ) ),
					'status'   => '1'
				);
				$checkLogin        = $this->user->getRows( $con );
				if ( $checkLogin ) {
					$userId = $this->session->userdata('userId');

                    $key =  substr(number_format(time() * rand(), 0, '', ''), 0, 8) .$userId; // Licence Key by time
                    $link = base_url().'users/winnrepo_confirm_email?q=winnrepo+user+email+varify&ie=utf-8&varify=true&tokrn=$key&oe=utf-8&client=setting+api';

					// Update Data
					$data = array(
						'change_email' => $email,
						'varify_token' => $key,
						'modified' => date("Y-m-d H:i:s")
					 );
					if ($this->user->update(array('id' => $userId), $data) == 1) {
                        $userName = $this->session->userdata( 'userName');
                        $to = $email;
                        $sub = 'WP Auto Update Email Confirmation';
                        $message = 'Hello '.$userName.'<br/> You have change your Email. Please click Here <a href="'.$link.'">Confirm Email</a> to confirm your email. <br/> <br/> <br/> <br/> Thank you ';
                        $this->user->send_email($to, $sub, $message);
          				redirect( 'setting/index' );
          			}
					//$this->load->view( 'index.php/setting/index', $cc );
				} else {
                    if ($this->email_check($email)==false) {
                        $this->session->set_userdata('users_msg', 'This Email is already used !!');
                        //add flash data
                        $this->session->set_flashdata('user', 'This Email is already used, please try with another email.');
                        $this->session->set_flashdata('class', 'danger');
                        redirect('Setting/index');
                    }else{
                        $this->session->set_userdata( 'users_msg', 'Some problems occurred, please try again.' );
                        //add flash data
                        $this->session->set_flashdata('user','Some problems occurred, please try again.');
                        $this->session->set_flashdata('class','danger');
                        redirect('Setting/index');
                    }
				}
			}
		}
	}
    //  Delete Account
    public function delete_account(){
        // Validation
        if ( $this->input->post( 'delete_account' ) ) {
            $this->form_validation->set_rules( 'reason', 'Name', 'required' );

            $userData = array(
                'reason'     => strip_tags( $this->input->post( 'reason' ) ),
                'status'     => 0
            );

            if ( $this->form_validation->run() == true ) {
                $user_id = $this->session->userdata('userId');
                if ($this->user->update(array('id' => $user_id), $userData) == 1) {
                    $this->session->set_userdata('users_msg', 'You have delete your Account.');
                    //redirect( 'home/index' );
                    $this->session->set_flashdata('user', 'You have delete your Account.');
                    $this->session->set_flashdata('class', 'danger');
                    $this->session->set_userdata('userName', strip_tags($this->input->post('name')));
                    redirect('users/logout');


                }
            }
        }
    }

	/*
	 * Existing email check during validation
	 */
	public function email_check( $str ) {
		$con['returnType'] = 'count';
		$con['conditions'] = array( 'email' => $str );
		$checkEmail        = $this->user->getRows( $con );
		if ( $checkEmail > 0 ) {
			$this->form_validation->set_message( 'email_check', 'The given email already exists.' );
            $this->session->set_flashdata('user','The given email already exists.');
            $this->session->set_flashdata('class','danger');
			return false;
		} else {
			return true;
		}
	}
}