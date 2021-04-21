<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->database();

    }

    public function check_ip_blocklist(){
        $this->load->model('Ip_blocker_model', 'ip_blocker');
       print_r( $this->ip_blocker->get_by_status());
    }


    public function store_ip()
    {

        $this->load->model('Ip_list_model', 'ip_model');
        $this->load->library('IP_blocker');

        // Get Client Ip
        $client_ip = IP_blocker::get_client_ip_by_server();
        if ($this->ip_model->getRows(array('ip_address' => $client_ip)) == 0) {

            // Get Details from IP
            $client_info = IP_blocker::ip_info($client_ip, 'Location');
            if (!isset($client_info)) {
                $client_info = array();
            }

            // Full list of IP Info
            $ip_address = array('ip_address' => $client_ip);

            $data = array_merge($ip_address, $client_info);
            // Store IP in database
            $this->ip_model->insert_data($data);

        }
//        else{ // Update Ip address
//            // Get Details from IP
//            $client_info = IP_blocker::ip_info($client_ip, 'Location');
//
//            // Full list of IP Info
//            $ip_address = array('ip_address' => $client_ip);
//
//            $data = array_merge($ip_address, $client_info);
//            // Store IP in database
//            $this->ip_model->update_data($ip_address, $data);
//        }

    }

    // Ip store when download
    public function store_ip_in_download($product = [])
    {

        $this->load->model('Ip_blocker_model', 'model');
        $this->load->library('IP_blocker');

        // Get Client Ip
        $client_ip = IP_blocker::get_client_ip_by_server();
        $client_ip_array= array('ip_address'=> $client_ip);
        // Check Block List
        $licence = $product['licence'];
        $version = $product['version'];
        //echo $licence;
        $block_list = $this->model->get_by_status($licence);
        // print_r( $block_list);

        if (in_array($client_ip_array, $block_list)) {
            echo 'You are is Block for this product';
            header("location: http://www.winnrepo.com/home/pricing");
            exit();
        } else {

            if ($this->model->getRows(array('ip_address' => $client_ip, 'licence'=>$licence)) == 0) {

                // Get Details from IP
                $client_info = IP_blocker::ip_info($client_ip, 'Location');
                if (empty($client_info)){
                    $client_info = array();
                }

                // Full list of IP Info
                $ip_address = array(
                    'ip_address' => $client_ip,
                    'version' => $version,
                    'download' => 1
                );
                $data = array_merge($ip_address, $client_info);
                if (!empty($product)) {
                    $data = array_merge($ip_address, $product, $client_info);
                    // Store IP in database
                    $this->model->insert_data_with_product($data);
                } else {
                    // Store IP in database
                    $this->model->insert_data($data);
                }
            }else{
                // -------------------- Update Ip ----------------
                // Get Details from IP
                $client_info = IP_blocker::ip_info($client_ip, 'Location');
                if (empty($client_info)){
                    $client_info = array();
                }
                $download = $this->model->total_download( $licence ,$client_ip);
                // print_r($download);
                // Full list of IP Info
                $ip_address = array(
                    'ip_address' => $client_ip,
                    'version' => $version,
                    'download' => $download + 1
                );
                $data = array_merge($ip_address, $client_info);
                if (!empty($product)) {
                    $where = array('ip_address'=>$client_ip, 'licence'=>$licence);
                    $data = array_merge($ip_address, $product, $client_info);
                    // Store IP in database
                    $this->model->update_data_with_product($where, $data);
                } else {
                    // Store IP in database
                    $this->model->update_data($data);
                }
                // -------------------- Update Ip ----------------
            }

            return true;
        }

    }

    public function index()
    {
        $this->load->view('home/index');
        $this->store_ip();
    }

    public function front_page()
    {
        $this->load->view('home/index');
    }

    public function price()
    {
        $this->load->view('home/pricing');
    }

    public function documentation()
    {
        $this->load->view('home/documentation');
    }

    public function blog()
    {
        $this->load->view('home/blog');
    }

    public function dashboard()
    {
        $this->load->view('admin/dashboard');
    }

    public function login()
    {
        $this->load->view('home/login');
    }

    public function registration()
    {
        $this->load->view('home/registration');
    }

    public function sign_up_free()
    {
        $this->load->view('home/registration');
    }

    public function error_page()
    {
        $this->load->view('home/error-page');
    }

    public function plugin_version_control()
    {

        $this->load->database('default', true);
        $this->load->model('Plugins_model');
        $this->load->helper('url');

        $secret_key = $this->uri->segment(3);
        $plugin_id = substr($secret_key, 7);
        // echo $plugin_id;
        $p = $this->db->get_where('plugins', array('plugin_id' => $plugin_id))->row();
        // var_dump($p);
        // print_r($p);
        $plugin_status = $p->status; //'1', '0'
        $user_id = $p->user_id;
        $user = $this->db->select('status')->get_where('users', array('id' => $user_id))->row();
        $user_status = $user->status; //1 0
        // User rule
        $user_rules_row = $this->db->select('rules')->get_where('users', array('id' => $user_id))->row();
        $user_rules = $user_rules_row->rules; //member,  free
        // print_r($user_status);
        $banners = base_url() . $p->banners;

        // -------------------- All Data  ------------
        $data = array(
            'name' => $p->title, //'External Update Example',
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $p->title))), //'external-update-example',
            'homepage' => $p->homepage, //'http://example.com/',
            'download_url' => $p->download_url, //'http://w-shadow.com/files/external-update-example/external-update-example.zip',
            'version' => $p->version, //'8.0',
            'requires' => $p->requires, //'3.2',
            'tested' => $p->tested, //'4.5',
            'last_updated' => $p->last_updated, //'2015-06-26 16:17:00',
            'upgrade_notice' => $p->changelog, //'Here why you should upgrade...',
            'author' => $p->author, //'Janis Elsts',
            'author_homepage' => $p->author_homepage, //'http://w-shadow.com/',
            'sections' =>
                array(
                    'description' => $p->description, //'(Required) Plugin description. Basic HTML can be used in all sections.',
                    'installation' => $p->installation, //'(Recommended) Installation instructions.',
                    'changelog' => $p->changelog, //'(Recommended) Changelog',
                ),
            'banners' =>
                array(
                    'low' => $banners, //'http://w-shadow.com/files/external-update-example/assets/banner-772x250.png',
                    'high' => $p->banners, //'http://w-shadow.com/files/external-update-example/assets/banner-1544x500.png',
                ),
            'rating' => 90, //90,
            'num_ratings' => 123, //123,
            'downloaded' => $p->total_downloads, //1234,
            'active_installs' => $p->active_installs, //12345,
            'secret_key' => $p->secret_key, //12345,
        );
        // -------------------- All Data -------------

        // ---------- Ip Blocklist Check -----------
        $product = array(
            'licence' => $secret_key,
            'version' => $p->version,
            'client_id' => $user_id,
            'status' => 1
        );
        // ---------- Ip Blocklist Check -----------
        if ($this->store_ip_in_download($product) == false){
            echo 'you are Block';

        }else {
            // ---------- Licence Check -----
            if ($this->Plugins_model->licence_check($user_id)==true && $user_rules=='member'){


                // -------------------- User Licence -------------
                if ($user_status == 1 && $plugin_status == 1) {
                    $this->load->library('Update_checker');
                    $plugin = new Update_checker();
                    $plugin->winnrepo_plugin_jason_data($data);
                    // $data = array_map('htmlentities',$data);

                    // //encode
                    // $json = html_entity_decode(json_encode($data));

                    // //Output: {"nome":"Paição","cidade":"São Paulo"}
                    // echo $json;

                    $this->db->close();
                }
                // -------------------- User Licence  -------------

               //------  If Free for 1 product -------
            } else if($this->Plugins_model->licence_check($user_id)==false && $user_rules=='free'){

                // -------------------- User Licence -------------
                if ($user_status == 1 && $plugin_status == 1) {
                    $this->load->library('Update_checker');
                    $plugin = new Update_checker();
                    $plugin->winnrepo_plugin_jason_data($data);
                    $this->db->close();
                }
                // -------------------- User Licence  -------------

            }else{
                echo 'Your Licence is End.';
                header("location: http://www.winnrepo.com/home/pricing");
                exit();
            }
            //echo 'you are not Block';
        }// Ip Block list check


    }

    //Theme version control
    public function theme_version_control()
    {

        $this->load->database('default', true);
        $this->load->model('Themes_model');
        $this->load->helper('url');

        $secret_key = $this->uri->segment(3);
        $theme_id = substr($secret_key, 7);
        // echo $theme_id;
        $p = $this->db->get_where('themes', array('theme_id' => $theme_id))->row();
        // var_dump($p);
        // print_r($p);
        $theme_status = $p->status; //'1', '0'
        $user_id = $p->user_id;
        $user = $this->db->select('status')->get_where('users', array('id' => $user_id))->row();
        $user_status = $user->status; //1 0
        // print_r($user_status);

        // User rule
        $user_rules_row = $this->db->select('rules')->get_where('users', array('id' => $user_id))->row();
        $user_rules = $user_rules_row->rules; //member,  free
        // print_r($user_status);
        $banners = base_url() . $p->banners;



        // -------------------- All Data  ------------
        $data = array(
            'name' => $p->title, //'External Update Example',
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $p->title))), //'external-update-example',
            'homepage' => $p->homepage, //'http://example.com/',
            'download_url' => $p->download_url, //'http://w-shadow.com/files/external-update-example/external-update-example.zip',
            'version' => $p->version, //'8.0',
            'requires' => $p->requires, //'3.2',
            'tested' => $p->tested, //'4.5',
            'last_updated' => $p->last_updated, //'2015-06-26 16:17:00',
            'upgrade_notice' => $p->changelog, //'Here why you should upgrade...',
            'author' => $p->author, //'Janis Elsts',
            'author_homepage' => $p->author_homepage, //'http://w-shadow.com/',
            'sections' =>
                array(
                    'description' => $p->description, //'(Required) Plugin description. Basic HTML can be used in all sections.',
                    'installation' => $p->installation, //'(Recommended) Installation instructions.',
                    'changelog' => $p->changelog, //'(Recommended) Changelog',
                ),
            'banners' =>
                array(
                    'low' => $banners, //'http://w-shadow.com/files/external-update-example/assets/banner-772x250.png',
                    'high' => $p->banners, //'http://w-shadow.com/files/external-update-example/assets/banner-1544x500.png',
                ),
            'rating' => 90, //90,
            'num_ratings' => 123, //123,
            'downloaded' => $p->total_downloads, //1234,
            'active_installs' => $p->active_installs, //12345,
        );
        // -------------------- All Data -------------


        // ---------- Ip Blocklist Check -----------
        $product = array(
            'licence' => $secret_key,
            'version' => $p->version,
            'client_id' => $user_id,
            'status' => 1
        );
        // ---------- Ip Blocklist Check -----------
        if ($this->store_ip_in_download($product) == false){
            echo 'you are Block';

        }else {
            // ---------- Licence Check -----
            if ($this->Plugins_model->licence_check($user_id)==true && $user_rules=='member'){


                // -------------------- User Licence -------------
                if ($user_status == 1 && $theme_status == 1) {
                    $this->load->library('Update_checker');
                    $plugin = new Update_checker();
                    $plugin->winnrepo_plugin_jason_data($data);
                    $this->db->close();
                }
                // -------------------- User Licence  -------------

                //------  If Free for 1 product -------
            } else if($this->Plugins_model->licence_check($user_id)==false && $user_rules=='free'){

                // -------------------- User Licence -------------
                if ($user_status == 1 && $theme_status == 1) {
                    $this->load->library('Update_checker');
                    $theme = new Update_checker();
                    $theme->winnrepo_plugin_jason_data($data);
                    $this->db->close();
                }
                // -------------------- User Licence  -------------

            }else{
                echo 'Your Licence is End.';
                header("location: http://www.winnrepo.com/home/pricing");
                exit();
            }
            //echo 'you are not Block';
        }// Ip Block list check





    }


}
