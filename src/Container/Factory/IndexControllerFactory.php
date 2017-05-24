<?php
namespace Service\Container\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Service\Controller\IndexController;
use Zend\Log\LoggerInterface;

/**
 * @author Artur Sh. Mamedbekov
 */
class IndexControllerFactory implements FactoryInterface{
  /**
   * {@inheritdoc}
   */
  public function __invoke(ContainerInterface $container, $requestedName, array $options = null){
    $logger = $container->get(LoggerInterface::class);

    return new IndexController($logger);
  }
}
