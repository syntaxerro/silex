<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:17
 */
use Syntax\Model\Tip;
use Syntax\Model\TList;

$app->get("/silex/unique/{id}", function ($id) use ($app, $pwd) {

    switch ($id) {
        case 1:
            $quWhere = " FROM inj WHERE wpis2=''";
            break;
        case 2:
            $quWhere = " FROM inj WHERE wpis2!=''";
            break;
        case 3:
            $quWhere = " FROM inj3 WHERE 1=1";
            break;
        default:
            $quWhere = "";
            break;
    }
    if($quWhere=='') return $app['twig']->render('404.html.twig');
    $all = array();
    $sql = "SELECT * ". $quWhere;

    $query = $app['db']->query($sql);

    while ($line =  $query->fetch() ) {
        if (!in_array(new TList($line['ip']), $all)) {
            array_push($all, new TList($line['ip']));
        } // unikatowe
    }
    // Liczba wpisow
    for ($i = 0; $i < count($all); $i++) {
        $locip = $all[$i]->getIp();
        $query = $app['db']->query("SELECT count(1) AS ile" . $quWhere . " AND ip='$locip'");
        $fetched = $query->fetch();
        $all[$i]->setLicznik($fetched['ile']);
    }
    // Czy bot?
    for ($i = 0; $i < count($all); $i++) {
        $locip = $all[$i]->getIp();
        if ($id == 2) {
            $query = $app['db']->query("SELECT LENGTH(wpis) AS sizew, wpis, wpis2" . $quWhere . " AND ip='$locip'");
        } else {
            $query = $app['db']->query("SELECT LENGTH(wpis) AS sizew, wpis" . $quWhere . " AND ip='$locip'");
        }
        $bt_loc = false;
        while ($fetched = $query->fetch()) {
            if ($fetched['sizew'] > 120 ||
                preg_match("/[0-9][0-9]+=[0-9][0-9]+/", $fetched['wpis']) ||
                preg_match("/0x[0-9]+/", $fetched['wpis']) ||
                (isset($fetched['wpis2']) && preg_match("/[0-9][0-9]+=[0-9][0-9]+/", $fetched['wpis2'])) ||
                (isset($fetched['wpis2']) && preg_match("/0x[0-9]+/", $fetched['wpis2']))
            ) {
                $bt_loc = true;
            }
        }
        $all[$i]->setBot($bt_loc);
    }
    // Sortowanie obiektow
    for ($i = 0; $i < count($all); $i++) {
        for ($j = 0; $j < count($all) - 1; $j++) {
            if ($all[$j]->getLicznik() < $all[$j + 1]->getLicznik()) {
                $buf = $all[$j];
                $all[$j] = $all[$j + 1];
                $all[$j + 1] = $buf;
            }
        }
    }
    for ($i = 0; $i < count($all); $i++) {
        $all[$i]->setI($i);
    }

    return $app['twig']->render('unique.twig', array('all' => $all, 'id' => $id,));
});

$app->get("/silex/{id}/ip/{ip}", function ($id, $ip) use ($app, $pwd) {

    switch ($id) {
        case 1:
            $query = $app['db']->query("SELECT wpis, kiedy FROM inj WHERE wpis2='' AND ip='$ip'");
            break;
        case 2:
            $query = $app['db']->query("SELECT wpis, wpis2, kiedy FROM inj WHERE wpis2!='' AND ip='$ip'");
            break;
        case 3:
            $query = $app['db']->query("SELECT wpis, kiedy FROM inj3 WHERE ip='$ip'");
            break;
        default:
            $query = "";
            break;
    }
    if($query=='') return $app['twig']->render('404.html.twig');
    $i = 0;
    if ($id == 2) {
        while ($line = $query->fetch()) {
            $dane[$i++] = new Tip(htmlentities($line['wpis']), htmlentities($line['wpis2']), $line['kiedy'], $i);
        }
    } else {
        while ($line = $query->fetch()) {
            $dane[$i++] = new Tip(htmlentities($line['wpis']), null, $line['kiedy'], $i);
        }
    }


    return $app['twig']->render('ipstory.twig',
        array('dane' => $dane, 'id' => $id, 'ip' => $ip, 'ile' => count($dane)));
});

return $app;