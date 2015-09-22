<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Ninja\Entities\Post;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Vaneves\Provider\JsonRequestServiceProvider;

$app = new Application();
$app['debug'] = true;

$app->register(new JsonRequestServiceProvider());
$app->register(new DoctrineServiceProvider, require_once 'app/config/db.php');
$app->register(new DoctrineOrmServiceProvider, require_once 'app/config/db.orm.php');

$app->get('/posts', function () use ($app) {

    $em = $app['orm.em'];
    $results = $em->getRepository('Ninja\Entities\Post')->findAll();
    
    return $app->json($results);
});
$app->post('/posts', function (Request $request) use ($app) {

    $em = $app['orm.em'];

    $post = new Post();
    $post->setTitle($request->get('title'));
    $post->setContent($request->get('title'));

    $em->persist($post);
    $em->flush();

    return $app->json($post);
});
$app->put('/posts/{id}', function ($id, Request $request) use ($app) {

    $em = $app['orm.em'];
    $post = $em->getRepository('Ninja\Entities\Post')->find($id);

    $post->setTitle($request->get('title'));
    $post->setContent($request->get('title'));

    $em->persist($post);
    $em->flush();

    return $app->json($post);
});
$app->delete('/posts/{id}', function ($id) use ($app) {

    $em = $app['orm.em'];
    $post = $em->getRepository('Ninja\Entities\Post')->find($id);

    $em->remove($post);
    $em->flush();

    return $app->json(true);
});
$app->run();
