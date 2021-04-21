<?php
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