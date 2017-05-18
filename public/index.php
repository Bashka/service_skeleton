<?php
chdir(dirname(__DIR__));
require('vendor/autoload.php');

use Zend\ServiceManager\ServiceManager;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\AppFactory;
use Service\Container\ConfigProvider;
use Service\Controller\IndexController;
use Zend\Stratigility\Middleware\ErrorHandler;

$config = (new ConfigProvider)->getConfig();
$container = new ServiceManager($config['container']);
$container->setService('Configuration', $config);
$app = AppFactory::create($container, $container->get(RouterInterface::class));

$controller = $container->get(IndexController::class);
$app->get('/', [$controller, 'indexAction']);

$app->pipe($container->get(ErrorHandler::class));
$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
$app->run();
