<?php
chdir(dirname(__DIR__));
require('vendor/autoload.php');

use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;
use Zend\ServiceManager\ServiceManager;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\AppFactory;
use Service\Container\ConfigProvider;
use Service\Controller\IndexController;
use Zend\Stratigility\Middleware\ErrorHandler;

set_error_handler(function($errno, $errstr, $errfile, $errline, array $errcontext){
  throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}, error_reporting());

$config = (new ConfigProvider)->getConfig();
$container = new ServiceManager($config['container']);
$container->setService('Configuration', $config);
$container->setService(RequestInterface::class, ServerRequestFactory::fromGlobals());
$app = AppFactory::create($container, $container->get(RouterInterface::class));

$controller = $container->get(IndexController::class);
$app->get('/', [$controller, 'indexAction']);

$app->pipe($container->get(ErrorHandler::class));
$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
$app->run($container->get(RequestInterface::class));
