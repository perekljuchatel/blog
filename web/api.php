<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Ninja\Entities\Post;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Vaneves\Provider\JsonRequestServiceProvider;
use Doctrine\Common\Annotations\AnnotationRegistry;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

$loader = require 'vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$app = new Application();
$app['debug'] = true;

$app->register(new JsonRequestServiceProvider());
$app->register(new DoctrineServiceProvider, require_once 'app/config/db.php');
$app->register(new DoctrineOrmServiceProvider, require_once 'app/config/db.orm.php');

$app->get('/posts', function () use ($app) {

    $em = $app['orm.em'];
    $hydrator = new DoctrineHydrator($em);
    $results = $em->getRepository('Ninja\Entities\Post')->findAll();

    $data = [];
    foreach ($results as $r) {
        $data[] = $hydrator->extract($r);
    }

    return $app->json($data);
});
$app->get('/posts/{id}', function ($id) use ($app) {

    $em = $app['orm.em'];
    $hydrator = new DoctrineHydrator($em);
    $post = $em->getRepository('Ninja\Entities\Post')->find($id);

    return $app->json($hydrator->extract($post));
});
$app->post('/posts', function (Request $request) use ($app) {

    $em = $app['orm.em'];

    $post = new Post();
    $post->setTitle($request->get('title'));
    $post->setContent($request->get('content'));

    $em->persist($post);
    $em->flush();

    return $app->json($post);
});
$app->put('/posts/{id}', function ($id, Request $request) use ($app) {

    $em = $app['orm.em'];
    $post = $em->getRepository('Ninja\Entities\Post')->find($id);

    $post->setTitle($request->get('title'));
    $post->setContent($request->get('content'));

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
