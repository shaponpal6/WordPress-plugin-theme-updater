<?php

/**
 * Created by PhpStorm.
 * User: Shapon
 * Date: 14-03-17
 * Time: 02.03
 */
class Theme_update_checker
{

    public function theme_update_core_file($WinnRepo, $plugin_dir)
    {
        ob_start();
        echo '<?php ';
        ?>

        class <?=$WinnRepo;?> {
        private $current_version;
        private $update_path;
        private $plugin_slug;
        private $slug;
        private $license_user;
        private $license_key;
        public function __construct( $update_path, $license_key ) {
        $this->current_version = '';
        $update_path += '/theme_updater_server/'.$license_key;
        $this->update_path     = $update_path;
        $this->license_user    = 'WinnRepo';
        $this->license_key     = $license_key;
        $this->plugin_slug     = basename( __FILE__ );
        list($t1, $t2) = explode('/', basename( __FILE__ ));
        $this->slug = str_replace('.php', '', $t2);
        add_filter('pre_set_site_transient_update_plugins', array(
        &$this,
        'check_update'
        ));
        add_filter('plugins_api', array(
        &$this,
        'check_info'
        ), 90, 3);
        }
        public function check_update($transient) {
        if (empty($transient->checked)) {
        return $transient;
        }
        $remote_version = $this->getRemote('version');
        if (version_compare($this->current_version, $remote_version->new_version, '<')) {
        $obj                                     = new stdClass();
        $obj->slug                               = $this->slug;
        $obj->new_version                        = $remote_version->new_version;
        $obj->url                                = $remote_version->url;
        $obj->plugin                             = $this->plugin_slug;
        $obj->package                            = $remote_version->package;
        $obj->tested                             = $remote_version->tested;
        $transient->response[$this->plugin_slug] = $obj;
        }
        return $transient;
        }
        public function check_info($obj, $action, $arg) {
        if (($action == 'query_plugins' || $action == 'plugin_information') && isset($arg->slug) && $arg->slug === $this->slug) {
        return $this->getRemote('info');
        }
        return $obj;
        }
        public function getRemote($action = '') {
        $params  = array(
        'body' => array(
        'action' => $action,
        'license_user' => $this->license_user,
        'license_key' => $this->license_key
        )
        );
        $request = wp_remote_post($this->update_path, $params);
        if (!is_wp_error($request) || wp_remote_retrieve_response_code($request) === 200) {
        return @unserialize($request['body']);
        }
        return false;
        }
        }


        <?php
        $gosolo = ob_get_contents();
        return $gosolo;

    }
}