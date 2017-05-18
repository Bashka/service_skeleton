<?php
namespace Service\Exception;

/**
 * Исключение свидетельствует о недопустимом формате запроса.
 *
 * @author Artur Sh. Mamedbekov
 */
class InvalidRequestException extends AbstractControllerException{
  /**
   * {@inheritdoc}
   */
  public function jsonSerialize(){
    return $this->message;
  }
}
