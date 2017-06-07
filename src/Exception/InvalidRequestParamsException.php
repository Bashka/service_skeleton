<?php
namespace Service\Exception;

/**
 * Исключение свидетельствует о недопустимом формате запроса.
 *
 * @author Artur Sh. Mamedbekov
 */
class InvalidRequestParamsException extends InvalidRequestException{
  /**
   * @var array
   */
  private $params;

  /**
   * {@inheritdoc}
   */
  public function __construct(array $params, $code = 0, $previous = null){
    parent::__construct(
      sprintf(
        'Invalid request params: %s',
        var_export($params, true)
      ),
      $code,
      $previous
    );
    
    $this->params = $params;
  }

  /**
   * {@inheritdoc}
   */
  public function jsonSerialize(){
    return $this->params;
  }
}
