<?php

/**
 * Created by PhpStorm.
 * User: Shapon
 * Date: 3/8/2017
 * Time: 12:24 PM
 */
class RepositoryHelper
{

    public function make_directory($dir){
        if (!file_exists($dir)) {
            return mkdir($dir, 0777, true);
        }
    }

    public function make_file($newFileName,$newFileContent){
        error_reporting(E_ALL);

        if (file_put_contents($newFileName, $newFileContent) !== false) {
            echo "File created (" . basename($newFileName) . ")";
            //copy("source.txt","target.txt");
        } else {
            echo "Cannot create file (" . basename($newFileName) . ")";
        }
    }
    public function slug($name){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    }
    public function slug_space($name){
        return trim(preg_replace('/[^A-Za-z0-9-]+/', '', $name));
    }
    public function sum($a,$b){
        return $a+$b;
    }
    public function create_path($id,$title)
    {
        $userId = $this->session->userdata('userId'); // set UserId id in session
        $userName = $this->session->userdata('userName'); // set userName id in session
        $key = 'P' . substr(number_format(time() * rand(), 0, '', ''), 0, 6) . $id; // Licence Key by time
        // Load custom Library
        // Folder Name
        $folder_name = $this->slug($title) . '_' . $key;
        // Location dir
        $dir = 'api/' . $this->sum($userId, 1548) . '-' . $this->slug($userName) . '/plugins/' . $folder_name . '/';
       // $this->make_directory($dir);
        return $dir;
    }
    public function make_dynamic_file($id,$title){
        $userId = $this->session->userdata('userId'); // set UserId id in session
        $userName = $this->session->userdata('userName'); // set userName id in session
        $key = 'P'.substr(number_format(time() * rand(),0,'',''),0,6).$id; // Licence Key by time
        // Load custom Library
        // Folder Name
        $folder_name = $this->slug($title).'_'.$key;
        // Location dir
        $dir = 'api/'.$this->sum($userId,1548).'-'.$this->slug($userName).'/plugins/'.$folder_name.'/';
        // php file name
        $file_name = 'WinnRepo'.$this->slug_space($title).'PluginUpdater';
        $WinnRepo = 'WinnRepo'.$this->slug_space($title).'PluginUpdater';
        // Full path
        $WinnRepoPluginUpdater = $dir.'/'.$file_name.'.php';
        // index. php file
        $index_file = $dir.'/'.index.'.php';
        // Make dir final[main]
        $this->make_directory($dir);
        // Dynamic php code
        $this->load->library('Plugin_update_checker');
        $php_code = new Plugin_update_checker();
        $code = $php_code->plugin_update_core_file($WinnRepo, 'plugin_version_control/');
        // Main file to make update class
        $this->make_file($WinnRepoPluginUpdater,$code);
        // Main file for index
        $this->make_file($index_file,$php_code->index());
    }
}