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
	require_once __DIR__."/../myclass.php";	
	switch($id) {
		case 1: $quWhere=" FROM inj WHERE wpis2=''"; break;
		case 2: $quWhere=" FROM inj WHERE wpis2!=''"; break;
		case 3: $quWhere=" FROM inj3 WHERE 1"; break;
		default: die("No ale nie bylo takiej czesci :("); break;
	}

	$query = $con->query("SELECT ip".$quWhere);
	
	$ips = array(); $cnt = array(); $bots = array();
	
	while( $line = $query->fetch_assoc() ) {
		if(!in_array($line['ip'], $ips)) array_push($ips, $line['ip']);
	} 
	
	$query->close();	
	foreach($ips as $locip) {
		$query = $con->query("SELECT count(1) AS ile".$quWhere." AND ip='$locip'");
		$fetched = $query->fetch_assoc();
		array_push($cnt, $fetched['ile']);
		$query->close();
	}
	
	for($i=0; $i<count($ips); $i++) { 
		$all[$i] = new TList;
		$all[$i]->setIp($ips[$i]);
		$all[$i]->setLicznik($cnt[$i]);
	}

	for($i=0; $i < count($all); $i++) {
		for($j=0; $j < count($all)-1; $j++) 
			if( $all[$j]->getLicznik() < $all[$j+1]->getLicznik() ) {
				$buf = $all[$j];
				$all[$j] = $all[$j+1];
				$all[$j+1] = $buf;
			}
	}
	
	$con->close();

	return $app['twig']->render('unique.twig', array( 'all' => $all, 'id' => $id, ));
 });


 $app->get("/silex/{id}/ip/{ip}", function($id, $ip) use ($app, $pwd) {
	$con = new mysqli("localhost", 'root', $pwd, 'secret');
	require_once __DIR__."/../myclass.php";
	
	switch($id) {
	case 1: $query = $con->query("SELECT wpis, kiedy FROM inj WHERE wpis2='' AND ip='$ip'"); break;
	case 2: $query = $con->query("SELECT wpis, wpis2, kiedy FROM inj WHERE wpis2!='' AND ip='$ip'"); break;
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
 
 $app->get("/silex/{id}/when/{when}", function($id, $when) use ($app, $pwd) {
	$con = new mysqli("localhost", 'root', $pwd, 'secret');
	require_once __DIR__."/../myclass.php";
	
	switch($id) {
	case 1: $query = $con->query("SELECT wpis, kiedy FROM inj WHERE wpis2='' AND kiedy LIKE '$when%'"); break;
	case 2: $query = $con->query("SELECT wpis, kiedy FROM inj WHERE wpis2!='' AND kiedy LIKE '$when%'"); break;
	case 3: $query = $con->query("SELECT wpis, kiedy FROM inj3 WHERE kiedy LIKE '$when%'"); break;
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
