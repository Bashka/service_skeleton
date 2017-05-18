<?php
namespace Service\Container\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Stratigility\Middleware\ErrorHandler;
use Service\Middleware\ErrorResponseGenerator;
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

    return new ErrorHandler(new Response, $errorResponseGenerator);
  }
}
