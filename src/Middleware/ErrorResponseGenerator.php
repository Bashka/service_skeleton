<?php
namespace Service\Middleware;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Stratigility\Utils;
use Service\Exception\AbstractControllerException;

/**
 * Генератор ответа при возникновении ошибки.
 *
 * @author Artur Sh. Mamedbekov
 */
final class ErrorResponseGenerator{
  /**
   * Создает ответ при возникновении ошибки.
   *
   * @param Throwable|Exception $e
   * @param ServerRequestInterface $request
   * @param ResponseInterface $response
   * 
   * @return ResponseInterface
   */
  public function __invoke($e, ServerRequestInterface $request, ResponseInterface $response){
    if($e instanceof AbstractControllerException){
      $response = new JsonResponse($e, Utils::getStatusCode($e, $response));
    }
    else{
      $response = $response->withStatus(Utils::getStatusCode($e, $response));
      $body = $response->getBody();
      $body->write((string) $e);
    }

    return $response;
  }
}
