<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Plugins_model', 'mPlugin');
        $this->load->model('Themes_model', 'mTheme');
        $this->load->helper(array('url', 'form', 'Url_helper'));
        if (!$this->session->userdata('isUserLoggedIn')) {
            redirect('home/index');
        }
    }

    public function ss(){
        $this->mPlugin->licences_end();
    }

    public function registration(){
        $this->load->view('admin/registration');
    }

    public function login(){
         $this->load->view('admin/login');
     }
    public function dashboard(){
        $userId=$this->session->userdata('userId');
    	if ($this->session->userdata('isUserLoggedIn') && $this->session->userdata('userRules')=='superAdmin') {
            $this->superDashboard();
        }else{
            $licences = $this->mPlugin->available_product();
            $licences_end = $this->mPlugin->licences_end();
            $package = $this->mPlugin->current_package();
            $total_products = $this->mPlugin->get_product_number();
            $plugin_count = $this->mPlugin->plugin_count();
            $theme_count = $this->mTheme->theme_count();

            // Plugin List
            $plugin_list = $this->mPlugin->get_all();
            // Theme List
            $theme_list = $this->mTheme->get_all();

            $data['admin'] = array(
                'licences' => $licences,
                'licences_end' => $licences_end,
                'package' => $package,
                'total_product' => $total_products,
                'plugin_count' => $plugin_count,
                'theme_count' => $theme_count,
                'plugin_list' => $plugin_list,
                'theme_list' => $theme_list,
            );
            // Fetch All Ip Address
            $this->load->model('Ip_blocker_model','ip_blocker');
            $data['ip_list'] = $this->ip_blocker->get_by_id($userId);
            // Load to view
        	$this->load->view('admin/index', $data);
    	}
    }

    // Supper admin
    public function superDashboard(){
        if ( !$this->session->userdata('isUserLoggedIn') && $this->session->userdata('userRules')=='superAdmin' ) {
            redirect('home/index');
        }else{
            $total_plugins = $this->mPlugin->total_plugins();
            $total_themes = $this->mPlugin->total_themes();
            $total_products = $total_plugins + $total_themes;
            $total_sell = $this->mPlugin->total_sell();

            $data['admin'] = array(
                'total_plugins' => $total_plugins,
                'total_themes' => $total_themes,
                'total_products' => $total_products,
                'total_sell' => $total_sell
            );
            //Support

            $data['supports'] = $this->db->get('supports')->result();
            // Fetch All Ip Address
            $this->load->model('Ip_list_model','ip_list');
            $data['ip_list'] = $this->ip_list->get_all();
            // Load to view
            $this->load->view('admin/super-admin', $data);
        }
    }

}