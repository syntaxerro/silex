<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:20
 */
    require_once "/var/db.php";
    // Doctrine (db)
    $app['db.options'] = array(
        'driver'   => 'pdo_mysql',
        'host'     => 'localhost',
        'dbname'   => 'secret',
        'user'     => 'root',
        'password' => $pwd,
    );
