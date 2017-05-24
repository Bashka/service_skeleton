<?php
return [
  'config' => [
    'foo' => 'bar',
  ],
  'log' => [
    'file' => __DIR__ . '/../data/log/log.log',
  ],
  'container' => include(__DIR__ . '/container.config.php'),
];
