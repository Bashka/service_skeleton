<?php
namespace Service\Controller;

use Psr\Http\Message\RequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Log\LoggerInterface;
use Bricks\ReferenceLog\Message as LogMessage;
use Zend\Diactoros\Response\TextResponse;

/**
 * @author Artur Sh. Mamedbekov
 */
class IndexController{
  /**
   * @var LoggerInterface
   */
  private $logger;

  /**
   * @param LoggerInterface $logger
   */
  public function __construct(LoggerInterface $logger){
    $this->logger = $logger;
  }

  public function indexAction(RequestInterface $request, DelegateInterface $delegate){
    $this->logger->info(new LogMessage('Index.index'));
    return new TextResponse('Hello world');
  }
}
