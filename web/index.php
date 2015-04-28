<?php
require_once __DIR__."/../vendor/autoload.php";
require_once "/var/db.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
 $app = new Silex\Application();
 $app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/../views',
 ));

 $app->get("/silex/unique/{id}", function($id) use ($app, $pwd) {
	$con = new mysqli('localhost', 'root', $pwd, 'secret');
	
	switch($id) {
		case 1: $query = $con->query("SELECT kiedy, ip FROM inj WHERE wpis2=''"); break;
		case 2: $query = $con->query("SELECT kiedy, ip FROM inj WHERE wpis!=''"); break;
		case 3: $query = $con->query("SELECT kiedy, ip FROM inj3"); break;
	}

	$ips = array(); $when = array();
	while( $line = $query->fetch_assoc() ) {
		$datetime = explode(" ", $line['kiedy']);

		if(!in_array($line['ip'], $ips)) array_push($ips, $line['ip']);
		if(!in_array($datetime[0], $when)) array_push($when, $datetime[0]);
	} 
	

	$query->close();	
	$con->close();
	return $app['twig']->render('unique.twig', array( 'ips' => $ips, 'when' => $when, 'id' => $id, ));
 });


 $app->get("/silex/{id}/ip/{ip}", function($id, $ip) use ($app, $pwd) {
	$con = new mysqli("localhost", 'root', $pwd, 'secret');
	require_once __DIR__."/../myclass.php";
	
	switch($id) {
	case 1: $query = $con->query("SELECT wpis, kiedy FROM inj WHERE wpis2='' AND ip='$ip'"); break;
	case 2: $query = $con->query("SELECT wpis, kiedy FROM inj WHERE wpis2!='' AND ip='$ip'"); break;
	case 3: $query = $con->query("SELECT wpis, kiedy FROM inj3 WHERE ip='$ip'"); break;
	}
	

	$i=0;
	while( $line = $query->fetch_assoc() ) {
		$dane[$i++] = new Tip($line['wpis'], $line['kiedy']);
	}

	$query->close();
	$con->close();
	return $app['twig']->render('ipstory.twig', array( 'dane' => $dane, 'id' => $id, 'ip' => $ip, ) );



 });
 
 $app->get("/silex/", function(Request $req) {
	return $req->__toString();
	
 });
 $app->get("/", function(Request $req) {
	return $req->__toString();
	
 });
$app->run();
?>
