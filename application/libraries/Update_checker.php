<?php

/**
 * Created by PhpStorm.
 * User: Shapon
 * Date: 3/7/2017
 * Time: 10:25 PM
 */
class Update_checker
{
    public function autoUpdateNow2(array $args){
        /**
         * The remote host file to process update requests
         *
         */
        echo "<pre> 22222";
        print_r($args);
        echo "</pre>";
        if ( !isset( $_POST['action'] ) ) {
            echo '0';
            exit;
        }

//set up the properties common to both requests
        $obj = new stdClass();
        $obj->slug = 'test-plugin-update.php';
        $obj->name = 'Test Plugin Update';
        $obj->plugin_name = 'test-plugin-update.php';
        $obj->new_version = '1.6';
// the url for the plugin homepage
        $obj->url = 'http://www.example.com/plugins/my-plugin';
//the download location for the plugin zip file (can be any internet host)
        $obj->package = 'http://mybucket.s3.amazonaws.com/plugin/plugin.zip';//'http://localhost/WinnRepo/winncomm/5935-aaaaaa/plugins/test-plugin-update_P43852322/test-plugin-update.zip';

        switch ( $_POST['action'] ) {

            case 'version':
                echo serialize( $obj );
                break;
            case 'info':
                $obj->requires = '4.0';
                $obj->tested = '4.0';
                $obj->downloaded = 12540;
                $obj->last_updated = '2012-10-17';
                $obj->sections = array(
                    'description' => 'The new version of the Auto-Update plugin',
                    'another_section' => 'This is another section',
                    'changelog' => 'Some new features'
                );
                $obj->download_link = $obj->package;
                echo serialize($obj);
            case 'license':
                echo serialize( $obj );
                break;
        }

    }

    public function autoUpdateNow(array $args){
        /**
         * The remote host file to process update requests
         *
         */
        // echo "<pre> 22222";
        // print_r($args);
        // echo "</pre>";

        //echo $args['download_url'];
        if ( !isset( $_POST['action'] ) ) {
            echo '0';
            exit;
        }


        //set up the properties common to both requests
        $obj = new stdClass();
        $obj->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $args['name']))).'.php'; //'plugin.php';
        $obj->name = !empty($args['name']) ? $args['name'] : 'name';//'Plugin';
        $obj->plugin_name = !empty($args['name']) ? strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $args['name']))).'.php' : 'plugin.php';//'plugin.php';
        $obj->new_version = !empty($args['version']) ? $args['version'] : '';
        // the url for the plugin homepage
        $obj->url = !empty($args['homepage']) ? $args['homepage'] : 'homepage';//'http://www.example.com/plugins/my-plugin';
        //the download location for the plugin zip file (can be any internet host)
        $obj->package = !empty($args['download_url']) ? $args['download_url'] : 'download_url';//'http://mybucket.s3.amazonaws.com/plugin/plugin.zip';

        //var_dump(serialize($obj));
        switch ( $_POST['action'] ) {

            case 'version':
                echo serialize( $obj );
                break;
            case 'info':
                $obj->requires = !empty($args['requires']) ? $args['requires'] : '3.2';//'4.0';
                $obj->tested = !empty($args['tested']) ? $args['tested'] : '3.2';//'4.0';
                $obj->downloaded = !empty($args['downloaded']) ? $args['downloaded'] : '3.2';//12540;
                $obj->last_updated = !empty($args['last_updated']) ? $args['last_updated'] : '3.2';//'2012-10-17';
                $obj->sections = array(
                    'description' => !empty($args['sections']['description']) ? $args['sections']['description'] : 'description', //'The new version of the Auto-Update plugin',
                    // Change Author section to installation
                    'another_section' => !empty($args['sections']['installation']) ? $args['sections']['installation'] : '',//'This is another section', @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                    'changelog' => !empty($args['sections']['changelog']) ? $args['sections']['changelog'] : '' //'Some new features'
                );
                $obj->download_link = $obj->package;
                echo serialize($obj);
            case 'license':
                echo serialize( $obj );
                break;
        }
    }

    public function plugin_update_checker( array $args)
    {
        $data = array (
            'name' => $args['name'], //'External Update Example'
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $args['name']))), //'external-update-example',
            'homepage' => $args['homepage'], //'http://example.com/',
            'download_url' => $args['download_url'], //'http://w-shadow.com/files/external-update-example/external-update-example.zip',
            'version' => $args['version'], //'8.0',
            'requires' => $args['requires'], //'3.2',
            'tested' => $args['tested'], //'4.5',
            'last_updated' => $args['last_updated'], //'2015-06-26 16:17:00',
            'upgrade_notice' => $args['upgrade_notice'], //'Here why you should upgrade...',
            'author' => $args['author'], //'Janis Elsts',
            'author_homepage' => $args['author_homepage'], //'http://w-shadow.com/',
            'sections' =>
                array (
                    'description' => $args['sections']['description'], //'(Required) Plugin description. Basic HTML can be used in all sections.',
                    'installation' => $args['sections']['installation'], //'(Recommended) Installation instructions.',
                    'changelog' => $args['sections']['changelog'], //'(Recommended) Changelog',
                ),
            'banners' =>
                array (
                    'low' => $args['banners']['low'], //'http://w-shadow.com/files/external-update-example/assets/banner-772x250.png',
                    'high' => $args['banners']['high'], //'http://w-shadow.com/files/external-update-example/assets/banner-1544x500.png',
                ),
            'rating' => $args['rating'], //90,
            'num_ratings' => $args['num_ratings'], //123,
            'downloaded' => $args['downloaded'], //1234,
            'active_installs' => $args['active_installs'], //12345,
        );
        echo json_encode($data, true);


    }
}