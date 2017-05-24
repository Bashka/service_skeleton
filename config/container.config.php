<?php
namespace Service;

// Interfaces
use Zend\Expressive\Router\RouterInterface;
use Zend\Log\LoggerInterface;

// Implements
use Zend\Expressive\Router\FastRouteRouter;
use Service\Middleware\ErrorResponseGenerator;
use Zend\Stratigility\Middleware\ErrorHandler;
use Service\Controller\IndexController;

// Factories
use Service\Container\Factory\ErrorHandlerFactory;
use Bricks\ReferenceLog\Container\Factory\LoggerFactory;
use Service\Container\Factory\IndexControllerFactory;

return [
  'invokables' => [
    RouterInterface::class => FastRouteRouter::class,
    ErrorResponseGenerator::class => ErrorResponseGenerator::class,
  ],
  'factories' => [
    ErrorHandler::class => ErrorHandlerFactory::class,
    LoggerInterface::class => LoggerFactory::class,
    IndexController::class => IndexControllerFactory::class,
  ],
];
