<?php
namespace Service;

// Interfaces
use Zend\Expressive\Router\RouterInterface;

// Implements
use Zend\Expressive\Router\FastRouteRouter;
use Service\Middleware\ErrorResponseGenerator;
use Zend\Stratigility\Middleware\ErrorHandler;
use Service\Container\Factory\ErrorHandlerFactory;
use Service\Controller\IndexController;

return [
  'invokables' => [
    RouterInterface::class => FastRouteRouter::class,
    ErrorResponseGenerator::class => ErrorResponseGenerator::class,
    IndexController::class => IndexController::class,
  ],
  'factories' => [
    ErrorHandler::class => ErrorHandlerFactory::class,
  ],
];
