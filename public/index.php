<?php
use Zend\ServiceManager\ServiceManager;
use Zend\Expressive\AppFactory;
use Zend\Expressive\Application;
use Zend\Stratigility\Http\Request;
use Zend\Stratigility\Http\Response;
use Zend\Stratigility\Next;
use Zend\Diactoros\Response\JsonResponse;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

// Version 1
///** @var Application $app */
//$app = AppFactory::create();
//
///**
// * @param Request $request
// * @param Response $response
// * @param Next $next
// * @return Response
// */
//$homepage = function (Request $request, Response $response, Next $next) {
//    $response->write('Hello World');
//    return $response;
//};
//
//// Home page
//$app->get('/', $homepage);

//// Version 2
///** @var ServiceManager $container */
//$container = new ServiceManager;
//
//$container->setFactory('HelloWorld', function (ServiceManager $container) {
//    return function (Request $request, Response $response, Next $next) {
//        $response->write('Hello World');
//        return $response;
//    };
//});
//
//$container->setFactory('Ping', function (ServiceManager $container) {
//    return function (Request $request, Response $response, Next $next) {
//        return new JsonResponse(['ack' => time()]);
//    };
//});
//
/////** @var Application $app */
////$app = AppFactory::create($container);
////// $container = $app->getContainer();
////$app->get('/', 'HelloWorld');
////$app->get('/ping', 'Ping');
//
//// Version 3
//$container->setFactory('Zend\Expressive\Application', function ($container) {
//    $app = AppFactory::create($container);
//    $app->get('/', 'HelloWorld');
//    $app->get('/ping', 'Ping');
//    return $app;
//});
//
//$app = $container->get('Zend\Expressive\Application');

/** @var ServiceManager $container */
$container = include 'config/services.php';
/** @var Application $app */
$app = $container->get('Zend\Expressive\Application');

$app->post('/post', function (Request $request, Response $response, Next $next) {
    $response->write('IN POST!');
    return $response;
});

// Run application
$app->run();