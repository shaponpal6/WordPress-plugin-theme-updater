<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plugins extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Plugins_model', 'model');
        $this->load->helper(array('url', 'form'));
        if (!$this->session->userdata('isUserLoggedIn')) {
            redirect('home/index');
        }
    }

    public function index()
    {
        $data['all_data'] = $this->model->get_all();
        $this->load->view('admin/plugins', $data);
    }

    public function show_by_id($id)
    {
        $data = $this->model->get_by_id($id);
        //print_r($data);
    }


    public function create()
    {
        // First check user can add new product
        if ($this->model->available_product() == true) {

            $userId = $this->session->userdata('userId');
            $userName = $this->session->userdata('userName');
            //Form_validation stuff
            $this->load->library('form_validation');
            $this->load->helper('url_helper');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('requires', 'Requires', 'required');

            if ($this->form_validation->run() == FALSE) {
                // $this->index();
                //add flash data
                $this->session->set_flashdata('plugin', 'All Field Required.');
                $this->session->set_flashdata('class', 'danger');
                redirect('plugins/index');
            } else {
                $data = array(
                    'title' => $this->input->post('title'),
                    //'readme_text' => ($this->input->post('readme_text') == 'yes' ? 1 : 0),
                    'description' => $this->input->post('description'),
                    'requires' => $this->input->post('requires'),
                    'homepage' => prep_url($this->input->post('homepage')),
                    'status' => '1',
                    'user_id' => $userId
                );
                $insert_id = $this->model->insert_data($data);
                //print ($insert_id);
                if ($insert_id) {
                    $this->session->set_userdata('pluginId', $insert_id); // set plugi id in session
                    $key = 'P' . substr(number_format(time() * rand(), 0, '', ''), 0, 6) . $insert_id; // Licence Key by time
                    // Load custom Library
                    $this->load->library('RepositoryHelper');
                    $this->load->library('Plugin_update_checker');
                    $repo = new RepositoryHelper();
                    $php_code = new Plugin_update_checker();
                    // Folder Name
                    $folder_name = $repo->slug($data['title']) . '_' . $key;
                    // Location dir
                    $dir = 'winncomm/' . $repo->sum($userId, 5929) . '-' . $repo->slug($userName) . '/plugins/' . $folder_name . '/';
                    // php file name
                    $file_name = 'WinnRepo' . $repo->slug_space($data['title']) . 'PluginUpdater';
                    $WinnRepo = 'WinnRepo' . $repo->slug_space($data['title']) . 'PluginUpdater';
                    // Full path
                    $WinnRepoPluginUpdater = $dir . '/' . $file_name . '.php';
                    // index. php file
                   // $index_file = $dir . '/' . index . '.html';
                    // Make dir final[main]
                    $repo->make_directory($dir);
                    // Dynamic php code
                    $code = $php_code->plugin_update_core_file($WinnRepo, 'plugin_version_control/');
                    // Main file to make update class
                    $repo->make_file($WinnRepoPluginUpdater, $code);
                    // Main file for index
                   // $repo->make_file($index_file, $php_code->index());
                    // Update model
                    $data =  array(
                        'secret_key' => $key,
                        'php_file_url' => $dir, //$WinnRepoPluginUpdater,
                        'php_file_name' => $file_name.'.php'
                    );
                    $this->model->update_data(array('plugin_id' => $insert_id), $data);
                    //add flash data
                    $this->session->set_flashdata('plugin', 'Plugin Added Successfully. Now you can add new version with many more extra features just like <a href="https://wordpress.org/">WordPress.org</a>.');
                    $this->session->set_flashdata('class', 'success');

                    // Redirect
                    redirect('Plugins/view');
                }
            }
        } else {
            // Redirect when unable to add new product
            //add flash data
            $this->session->set_flashdata('plugin', 'You can\'t add new Plugin. Please Upgrade your Licence.');
            $this->session->set_flashdata('class', 'error');
            redirect('Plugins/index');
        }
    }

    public function view()
    {
        $id = $this->session->userdata('pluginId');
        $data['single_data'] = $this->model->get_by_id($id);
        // Get Licence Key
        $licence = $data['single_data']->secret_key;
        //echo $licence;
        // Fetch Ip Data
        $this->load->model('Ip_blocker_model','ip_model');
        $data['ip'] = $this->ip_model->get_all(array('licence'=> $licence));

        // Total download
        $download = $this->ip_model->total('download','ip_blocker',['licence'=>$licence]);
        $current_version_download = $this->ip_model->total('download','ip_blocker',['licence'=>$licence, 'version' => $data['single_data']->version]);
        $data['download'] = $download;
        $data['current_version_download'] = $current_version_download;

        // Load view
        $this->load->view('admin/plugin-control', $data);
    }

    public function manage_data()
    {
        $id = $this->uri->segment(3);
        $this->session->set_userdata('pluginId', $id);
    }

    public function ajax_edit()
    {
        $id = $this->uri->segment(3);
        $data = $this->model->get_by_id($id);
        echo json_encode($data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'requires' => $this->input->post('requires'),
            'homepage' => prep_url($this->input->post('homepage'))
        );
        //$this->model->update_data($id);
        if ($this->model->update_data(array('plugin_id' => $id), $data) == 1) {
            //add flash data
            $this->session->set_flashdata('plugin', 'Plugin Added Successfully. Now you can add new version with Licences Key and many more extra features just like <a href="https://wordpress.org/">WordPress.org</a>.');
            //add flash data
            $this->session->set_flashdata('plugin', 'Update Successfully.');
            $this->session->set_flashdata('class', 'success');
            // Redirect
            redirect('Plugins/index');
        } else {
            //add flash data
            $this->session->set_flashdata('plugin', 'Update Not Success.');
            $this->session->set_flashdata('class', 'danger');
            redirect('Plugins/index');
        }
    }

    // Upload new file
    public function add_new_version()
    {
        $id = $this->input->post('id');
        $php_file_url = $this->input->post('php_file_url');

        // Plugin file upload
        $config['upload_path']          = './'.$php_file_url;
        $config['allowed_types']        = 'zip';
        $config['max_size']             = 9024023;
        //$config['max_width']            = 9024023;
        //$config['max_height']           = 768;
        $config['overwrite']           = true;

        $this->load->library('upload', $config);



        if ( ! $this->upload->do_upload('download_url'))
        {
            $error = $this->upload->display_errors();
            $error_mag = (!empty($error)) ? $error : 'New Version not added successfully';
            //add flash data
            $this->session->set_flashdata('plugin', $error_mag);
            $this->session->set_flashdata('class', 'danger');
            redirect('Plugins/view');
        }
        else
        {
            $uploadData = $this->upload->data();
            $file_name = $uploadData['raw_name'];
            $file_size = $uploadData['file_size'];
            //$download_url = $uploadData['full_path'];
            $download_url = base_url().$php_file_url.$uploadData['file_name'];
            //$download_url = base_url().'index.php/Downloader/newPluginDownload/'.$key;
            //$download_url = 'ujjjjjjjjjjjjjjj';

            // Save data to DB
                $data = array(
                    'download_url' => $download_url,
                    'plugin_file_name' => $file_name,
                    'plugin_size' => $file_size,
                    'version' => $this->input->post('version'),
                    'changelog' => $this->input->post('changelog'),
                    'tested' => $this->input->post('tested'),
                    'last_updated' => date("Y-m-d h:i:sa")
                );

            //add flash data
            $this->session->set_flashdata('plugin', 'New Version added successfully.');
            $this->session->set_flashdata('class', 'success');

            if ($this->model->update_data(array('plugin_id' => $id), $data) == 1) {
                $this->session->set_userdata('pluginId', $id);
                redirect('Plugins/view');
            }else{
                $this->session->set_flashdata('plugin',  $id.'mmmm --- Something was wrong. Please try again');
                $this->session->set_flashdata('class', 'danger');
                redirect('Plugins/view');
            }
        }
    }

    public function add_more_feature()
    {
        $id = $this->input->post('id');
        $php_file_url = $this->input->post('php_file_url');

        // Plugin file upload
        $config['upload_path']          = './'.$php_file_url;
        $config['allowed_types']        = 'png|jpeg|jpg';
        $config['max_size']             = 1024;
        $config['max_width']            = 772;
        $config['max_height']           = 250;
        $config['overwrite']           = true;

        $this->load->library('upload', $config);



       // if ( ! $this->upload->do_upload('banners'))
        if ( !$this->input->post('author') )
        {
            $error = $this->upload->display_errors();
            $error_mag = (!empty($error)) ? $error : 'More info not added successfully';
            //add flash data
            $this->session->set_flashdata('plugin', $error_mag);
            $this->session->set_flashdata('class', 'danger');
            redirect('Plugins/view');
        }
        else
        {
            $uploadData = $this->upload->data();
            $download_url = $uploadData['full_path'];

            // Save data to DB
            $data = array(
               // 'banners' => $download_url,
                'author' => $this->input->post('author'),
                'author_homepage' => $this->input->post('author_homepage'),
                'installation' => $this->input->post('installation')
            );

            //add flash data
            $this->session->set_flashdata('plugin', 'You have added more information successfully.');
            $this->session->set_flashdata('class', 'success');

            if ($this->model->update_data(array('plugin_id' => $id), $data) == 1) {
                $this->session->set_userdata('pluginId', $id);
                redirect('Plugins/view');
            }else{
                $this->session->set_flashdata('plugin', 'Something was wrong. Please try again');
                $this->session->set_flashdata('class', 'danger');
                redirect('Plugins/view');
            }
        }

    }


    public function delete2()
    {
        $id = $this->session->userdata('pluginDeleteId');
        if ($this->model->delete_by_id($id)) {
            $this->session->unset_userdata('pluginDeleteId', $id);
            redirect('Plugins/index');
        }
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $plugin_id = $this->input->post('plugin_id');
        if ($plugin_id == $id) {
            $this->model->delete_by_id($plugin_id);
            //add flash data
            $this->session->set_flashdata('plugin', 'Plugin Deleted successfully.');
            $this->session->set_flashdata('class', 'success');
        } else {
            //add flash data
            $this->session->set_flashdata('plugin', 'Plugin not Deleted.');
            $this->session->set_flashdata('class', 'danger');
            redirect('Plugins/index');
        }
    }

    public function sp_check_before_delete_ok_jdhfj()
    {
        $id = $this->uri->segment(3);
        $this->session->set_userdata('pluginDeleteId', $id);
    }

    // Ip blocker
    public function ip_blocker(){
        if ($this->input->post('licence')) {
            $status = $this->uri->segment(3);
            $licence = $this->input->post('licence');
            $ip_address = $this->input->post('ip_address');
            // Load model
            $this->load->model('Ip_blocker_model', 'ip_blocker');
            if ($status == 1) {
                $data = ['status' => '0'];
            } else {
                $data = ['status' => '1'];
            }
            $where = ['ip_address' => $ip_address, 'licence' => $licence];
            if ($this->ip_blocker->update_data($where, $data)) {
                redirect('plugins/view', 'refresh');
            }
        }
    }


}
