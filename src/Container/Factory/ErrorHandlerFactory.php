<?php
namespace Service\Container\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Stratigility\Middleware\ErrorHandler;
use Service\Middleware\ErrorResponseGenerator;
use Zend\Log\LoggerInterface;
use Zend\Diactoros\Response;

/**
 * @author Artur Sh. Mamedbekov
 */
class ErrorHandlerFactory implements FactoryInterface{
  /**
   * {@inheritdoc}
   */
  public function __invoke(ContainerInterface $container, $requestedName, array $options = null){
    $errorResponseGenerator = $container->get(ErrorResponseGenerator::class);
    $logger = $container->get(LoggerInterface::class);

    $errorHandler = new ErrorHandler(new Response, $errorResponseGenerator);
    $errorHandler->attachListener(function($error, $request, $response) use($logger){
      $logger->err($error);
    });

    return $errorHandler;
  }
}
