<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supports extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supports_model', 'model');
        $this->load->model('Message_model', 'message_model');
        $this->load->helper(array('url', 'form', 'Url_helper'));
//        if (!$this->session->userdata('isUserLoggedIn')) {
//            redirect('home/index');
//        }
    }

    public function index()
    {
        if ( $this->session->userdata('isUserLoggedIn') && $this->session->userdata('userRules')=='superAdmin' ) {
            $data['all_data'] = $this->model->get_all();
        }else {
            $data['all_data'] = $this->model->get_by_id();
        }
        $this->load->view('admin/supports', $data);
    }

    public function last_support_id()
    {
        $key = substr(number_format(time() * rand(), 0, '', ''), 0, 5) ;
        $suppoer_id = $this->model->last_inserted_id();
        echo $key.$suppoer_id+1;
    }
    // Fetch data by to edit or replay
    public  function ajax_replay_message(){
        $ticket = '#'.$this->uri->segment(3);
        $topic_data = $this->model->get_by_ticket($ticket);
        $message_data = $this->message_model->get_all($ticket);
        $topic= json_encode($topic_data);
        $message = json_encode($message_data);
        $json = '{"topic" : '.$topic.', "message" : '.$message.'}';
        echo $json;
    }
    public  function view_message(){
        $ticket = $this->uri->segment(3);
        $data['topic'] = $this->model->get_by_ticket($ticket);
        $data['message'] = $this->message_model->get_all($ticket);

        $this->load->view('admin/message',$data);
    }

    public function create()
    {

        $userId = $this->session->userdata('userId');
        $userName = $this->session->userdata('userName');
        //Form_validation stuff
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', '');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');
        $this->form_validation->set_rules('topic', 'Topic', 'required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('user', 'Something was Wrong. Please try Again.');
            $this->session->set_flashdata('class', 'danger');
            redirect('home/index');
        } else {
            $data = array(
                'user_id' => (empty($userId))? 0 : $userId,
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'ticket' => $this->input->post('ticket'),
                'topic' => $this->input->post('topic'),
                //'status' => ($this->input->post('status') == 'yes' ? 1 : 0),
                'description' => $this->input->post('description'),
                'created' => date("Y-m-d h:i:sa"),
                'status' => '1'
            );
            $ticket = $this->input->post('ticket');
            if ($ticket) {
                if ($this->model->insert_data($data)) {
                    $this->session->set_flashdata('user', 'Thank you for using our support. Your support Ticket is <b>#' . $ticket . '</b> You will get email as soon as possible.');
                    $this->session->set_flashdata('class', 'danger');
                    redirect('', 'refresh');
                }
            }else{
                $this->session->set_flashdata('user', 'Something was Wrong. Please try Again.');
                $this->session->set_flashdata('class', 'danger');
                redirect('', 'refresh');
            }

        }
    }



    public function replay_message()
    {
        $userId = $this->session->userdata('userId');
        $userName = $this->session->userdata('userName');
        $ticket = $this->input->post('ticket');
        //Form_validation stuff
        $this->load->library('form_validation');

        $this->form_validation->set_rules('replay_text', 'Relay text', 'trim|required'); //min_length[4]|xss_clean||alpha_numeric

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('supports', 'Something was Wrong. Please try Again.');
            $this->session->set_flashdata('class', 'danger');
            redirect('supports/view_message/'.$ticket, 'refresh');
        } else {
            $data = array(
                'user_id' => $userId,
                'name' => $userName,
                'email' => $this->input->post('email'),
                'ticket' => $this->input->post('ticket'),
                //'status' => ($this->input->post('status') == 'yes' ? 1 : 0),
                'message' => $this->input->post('replay_text'),
                'last_updated' => date("Y-m-d h:i:sa")
            );
            if ($this->message_model->insert_data($data)) {
                redirect('supports/view_message/'.$ticket);
            }else{
                redirect('support/index');
            }

        }
    }


    public function close_ticket(){
        if ($this->input->post('licence')) {
            $status = $this->uri->segment(3);
            $licence = $this->input->post('licence');
            $userId = $this->session->userdata('userId');
            // Load model
            $this->load->model('Supports_model', 'supports');
            if ($status == 1) {
                $data = ['status' => '0', 'admin_id' => $userId];
            } else {
                $data = ['status' => '1', 'admin_id' => $userId];
            }
            $where = ['ticket' => $licence];
            if ($this->supports->update_data($where, $data)) {
                redirect('supports/view_message/'.$licence, 'refresh');
            }
        }
    }



}
