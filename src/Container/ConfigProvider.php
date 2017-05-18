<?php
namespace Service\Container;

/**
 * @author Artur Sh. Mamedbekov
 */
class ConfigProvider{
  /**
   * @return array Конфигурация сервиса.
   */
  public function getConfig(){
    $config = array_replace_recursive(
      include('config/service.config.php'),
      file_exists('config/local.config.php')? include('config/local.config.php') : []
    );

    $config = array_replace_recursive($config, [
      'config' => [
        'foo' => getenv('FOO')?: $config['config']['foo'],
      ],
    ]);

    return $config;
  }
}
