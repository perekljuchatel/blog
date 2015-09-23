<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

use App\Entities\Post;
use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Vaneves\Doctrine\CollectionExtractor;
use Vaneves\Provider\JsonRequestServiceProvider;

$loader = require 'vendor/autoload.php';
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$app = new Application();
$app['debug'] = true;

$app->register(new JsonRequestServiceProvider());
$app->register(new DoctrineServiceProvider, require_once 'app/config/db.php');
$app->register(new DoctrineOrmServiceProvider, require_once 'app/config/db.orm.php');

$app->get('/posts', function () use ($app) {

    $em = $app['orm.em'];
    $results = $em->getRepository('App\Entities\Post')->findAll();

    $hydrator = new CollectionExtractor(new DoctrineHydrator($em));

    return $app->json($hydrator->extract($results));
});
$app->get('/posts/{id}', function ($id) use ($app) {

    $em = $app['orm.em'];
    $post = $em->getRepository('App\Entities\Post')->find($id);
    $hydrator = new DoctrineHydrator($em);

    return $app->json($hydrator->extract($post));
});
$app->post('/posts', function (Request $request) use ($app) {

    $em = $app['orm.em'];

    $post = new Post();
    $post->setTitle($request->get('title'));
    $post->setContent($request->get('content'));

    $em->persist($post);
    $em->flush();

    return $app->json($hydrator->extract($post));
});
$app->put('/posts/{id}', function ($id, Request $request) use ($app) {

    $em = $app['orm.em'];
    $post = $em->getRepository('App\Entities\Post')->find($id);

    $post->setTitle($request->get('title'));
    $post->setContent($request->get('content'));

    $em->persist($post);
    $em->flush();

    return $app->json($hydrator->extract($post));
});
$app->delete('/posts/{id}', function ($id) use ($app) {

    $em = $app['orm.em'];
    $post = $em->getRepository('App\Entities\Post')->find($id);

    $em->remove($post);
    $em->flush();

    return $app->json(true);
});
$app->run();
