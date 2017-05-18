<?php
namespace Service\Exception;

use RuntimeException;
use JsonSerializable;

/**
 * Исключения, передаваемые на уровень клиента.
 *
 * @author Artur Sh. Mamedbekov
 */
abstract class AbstractControllerException extends RuntimeException implements JsonSerializable{
}
