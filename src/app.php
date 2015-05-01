<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:12
 */
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;

$app->register(new TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->register(new DoctrineServiceProvider());


return $app;