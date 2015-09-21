<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new DoctrineServiceProvider, require_once 'app/config/db.php');
$app->register(new DoctrineOrmServiceProvider, require_once 'app/config/db.orm.php');
$app->get('/posts', function () use ($app) {

    $em = $app['orm.em'];
    $results = $em->getRepository('Ninja\Entities\Post')->findAll();
    return $app->json($results);
});
$app->run();
