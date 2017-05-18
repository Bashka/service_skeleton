<?php
namespace Service\Controller;

use Psr\Http\Message\RequestInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Zend\Diactoros\Response\TextResponse;
use Service\Exception\InvalidRequestException;
use RuntimeException;

/**
 * @author Artur Sh. Mamedbekov
 */
class IndexController{
  public function indexAction(RequestInterface $request, DelegateInterface $delegate){
    return new TextResponse('Hello world');
  }
}
