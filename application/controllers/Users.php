<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user', 'user');
    }

    public function signin()
    {
        $this->load->view('admin/login');
    }
    public function signup()
    {
        $this->load->view('admin/registration');
    }


    /*
     * User account information
     */
    public function account()
    {
        $data = array();
        if ($this->session->userdata('isUserLoggedIn')) {
            $data['user'] = $this->user->getRows(array('id' => $this->session->userdata('userId')));
            //load the view
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect('users/signin');
        }
    }

    /*
     * User login
     */
    public function login()
    {
        $data = array();
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if ($this->input->post('loginSubmit')) {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if ($checkLogin) {
                    $this->session->set_userdata('isUserLoggedIn', true);
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    $this->session->set_userdata('userName', $checkLogin['name']);
                    $this->session->set_userdata('userEmail', $checkLogin['email']);
                    $this->session->set_userdata('userRules', $checkLogin['rules']);
                    $this->session->set_userdata('users_msg', 'Successfully Login.');
                    redirect('admin/dashboard');
                } else {
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                    $this->session->set_flashdata('user', 'Wrong email or password, please try again');
                    $this->session->set_flashdata('class', 'danger');
                    redirect('users/signin');
                }
            } else {
                $this->session->set_flashdata('user', 'Login not completed!! Please import valid Email.');
                $this->session->set_flashdata('class', 'danger');
                redirect('home/index');
            }
        }
        //load the view
        $this->load->view('home/index', $data);
    }

    /*
     * User registration
     */
    public function registration()
    {
        $data = array();
        $userData = array();
        if ($this->input->post('regisSubmit')) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => md5($this->input->post('password')),
                'status' => '1',
                'rules' => 'free'
            );

            if ($this->form_validation->run() == true) {
                //$insert = $this->user->insert($userData);
                if (!$this->user->insert($userData)) {
                    $this->session->set_userdata('users_msg', 'Some problems occurred, please try again.');
                    //add flash data
                    $this->session->set_flashdata('user', 'Some problems occurred, please try again.');
                    $this->session->set_flashdata('class', 'danger');
                    redirect('users/signup');
                } else {
                    $this->session->set_userdata('users_msg', 'Your registration have completed successfully. Please login to your account.');
                    //redirect( 'home/index' );
                    $this->session->set_flashdata('user', 'Your registration have completed successfully. Please login to your account.');
                    $this->session->set_flashdata('class', 'success');
                    redirect('users/signin');
                }
            } else {
                $this->session->set_flashdata('user', 'Your registration is not completed. Input field not valid.');
                $this->session->set_flashdata('class', 'danger');
                redirect('home/index');
            }
        }
        $data['user'] = $userData;
        //load the view
        $this->load->view('home/index', $data);
    }

    /*
     * User logout
     */
    public function logout()
    {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('userName');
        $this->session->unset_userdata('userEmail');
        $this->session->unset_userdata('userRules');
        $this->session->userdata('pluginId');
        $this->session->userdata('themeId');
        $this->session->userdata('users_msg');
        $this->session->userdata('plugin_msg');
        $this->session->userdata('theme_msg');
        $this->session->sess_destroy();
        $this->session->set_flashdata('user', 'Log out completed sucessfully.');
        $this->session->set_flashdata('class', 'success');
        redirect('home/index');
    }

    /*
     * Existing email check during validation
     */
    public function email_check($str)
    {
        $con['returnType'] = 'count';
        $con['conditions'] = array('email' => $str);
        $checkEmail = $this->user->getRows($con);
        if ($checkEmail > 0) {
            $this->form_validation->set_message('email_check', 'The given email already exists.');
            $this->session->set_flashdata('user', 'The given email already exists.');
            $this->session->set_flashdata('class', 'danger');
            return false;
        } else {
            return true;
        }
    }

    public function winnrepo_confirm_email()
    {
        $varify = $_GET['varify'];
        $token = $_GET['tokrn'];

        // Match data
        $user_data = $this->user->get_by(array('varify_token' => $token));
        $varify_token = $user_data->varify_token;
        $user_id = $user_data->id;
        $old_email = $user_data->email;
        $new_email = $user_data->change_email;
        if ($varify == true && $token == $varify_token) {
            $data = array(
                'email_varify' => 1,
                'email' => $new_email,
                'change_email' => $old_email
            );
            if ($this->user->update(array('id' => $user_id), $data) == 1) {
                // Send email
                $userName = $this->session->userdata('userName');
                $to = $user_data->varify_token;
                $sub = 'WinnRepo Email Confirmation';
                $message = 'Hello ' . $userName . '<br/> You have changed your Email.<br/> Your ' . $user_data->email . ' Confirm Email</a> to confirm your email. <br/> <br/> <br/> <br/> Thank you ';
                $this->user->send_email($to, $sub, $message);
                //add flash data
                $this->session->set_flashdata('user', 'You have successfully varify your email. We have sent you Email with your new credential.');
                $this->session->set_flashdata('class', 'success');
                redirect('home/index');
            } else {
                $this->session->set_userdata('users_msg', 'Some problems occurred to varify your email, please try again.');
                //add flash data
                $this->session->set_flashdata('user', 'Some problems occurred to varify your email, please try again.');
                $this->session->set_flashdata('class', 'danger');
                redirect('home/index');
            }
        }

    }
}