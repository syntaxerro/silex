<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:17
 */

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig');
});
/*
$app->get('/silex/unique/{$id}', function ($id) use ($app) {
    switch ($id) {
        case "1":
            $quWhere = " FROM inj WHERE wpis2=''";
            break;
        case "2":
            $quWhere = " FROM inj WHERE wpis2!=''";
            break;
        case "3":
            $quWhere = " FROM inj3 WHERE 1=1";
            break;
        default:
            $quWhere = "";
            break;
    }
    if("" == $quWhere)  return $app['twig']->render('404.html.twig');

    $sql = "SELECT ip". $quWhere;

    $all = $app['db']->fetchAll($sql);





    //dalsza czesc kodu
    return print_r($all,1);


});
*/
return $app;