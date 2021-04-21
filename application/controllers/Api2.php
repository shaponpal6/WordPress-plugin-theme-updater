<?php

/**
 * Created by PhpStorm.
 * User: Shapon
 * Date: 3/9/2017
 * Time: 5:29 PM
 */
class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Plugins_model');
        $this->load->model('Themes_model');
        $this->load->helper(array('url', 'form', 'Url_helper','download'));
        
    }
	
	// Plugin download	
    public function plugin_file_download(){
        $request_id = $this->uri->segment(3);
        $id = $this->input->post('plugin_id');
        if ($request_id==$id){
            $plugin = $this->Plugins_model->get_by_id($id);
            //$data = base_url().$plugin->php_file;
            $data = file_get_contents($plugin->download_url);
            $name = $this->uri->segment(4);
            force_download($name, $data);
            //add flash data
            $this->session->set_flashdata('plugin','You have downloaded a php file. Please import it in your plugin root directory and add under 2 line code. That\'s it.');
            $this->session->set_flashdata('class','success');
        }else{
            redirect('home/index');
        }
    }  

    // Theme download	
	public function theme_file_download(){
        $request_id = $this->uri->segment(3);
        $id = $this->input->post('theme_id');
        if ($request_id==$id){
            $theme = $this->Themes_model->get_by_id($id);
            //$data = base_url().$theme->php_file;
            $data = file_get_contents($theme->download_url);
            $name = $this->uri->segment(4);
            force_download($name, $data);
            //add flash data
            $this->session->set_flashdata('thjeme','You have downloaded a php file. Please import it in your theme root directory and add under 2 line code. That\'s it.');
            $this->session->set_flashdata('class','success');
        }else{
            redirect('home/index');
        }
    }
	
	// Plugin update class filr download
    public function plugin_auto_update_class_download(){
        $request_id = $this->uri->segment(3);
        $id = $this->input->post('plugin_id');
        if ($request_id==$id){
            $plugin = $this->Plugins_model->get_by_id($id);
            //$data = base_url().$plugin->php_file;
            $data = file_get_contents($plugin->php_file_url);
            $name = $this->uri->segment(4).'.php';
            force_download($name, $data);
            //add flash data
            $this->session->set_flashdata('plugin','You have downloaded your plugin.');
            $this->session->set_flashdata('class','success');
        }else{
            redirect('home/index');
        }
    }  
	
	// Theme update class filr download	
	public function theme_auto_update_class_download(){
        $request_id = $this->uri->segment(3);
        $id = $this->input->post('theme_id');
        if ($request_id==$id){
            $theme = $this->Themes_model->get_by_id($id);
            $data = file_get_contents($theme->php_file_url);
            $name = $this->uri->segment(4).'.php';
            force_download($name, $data);
            //add flash data
            $this->session->set_flashdata('theme','You have downloaded your theme.');
            $this->session->set_flashdata('class','success');
        }else{
            redirect('home/index');
        }
    }
}