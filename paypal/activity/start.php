<?php 
	session_start();
	$_SESSION['user_id'] = 2;

	$db = new PDO('mysql:host=localhost;dbname=paypal','root','');

	$user = $db->prepare("select * from users where id=:user_id");
	$user->execute(['user_id' => $_SESSION['user_id']]);

	$user = $user->fetchObject();

	// paypal
	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;
	require __DIR__.'/../vendor/autoload.php';

	//API
	$api = new ApiContext(
		new OAuthTokenCredential( 
			'AaNAcDswIPbXSy2jpr3HPIUXZGTj224CTmtnYNZtLUgNlD7sxg3qcs2jOp6L69DZa3a5yYqZA3BolsoF',
			'EJtWtuvpMpx8UFu92jK0R9gOLaEMAj-92DYCLSMKACDmCY7PRloTAXhFBCa2mtpK1eMN-QW9a7CY0Xx3'
			)
		);

	$api->setConfig([
		'mode' => 'sandbox',
		'http.ConnectionTimeOut' => 30,
		'log.LogEnabled' => true,
		'log.FileName' => 'PayPal.log',
		'log.LogLevel' => 'FINE',
		'validation.level' => 'log'

		]);
