<?php return array (
  'nexmo/laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Nexmo\\Laravel\\NexmoServiceProvider',
    ),
    'aliases' => 
    array (
      'Nexmo' => 'Nexmo\\Laravel\\Facade\\Nexmo',
    ),
  ),
  'xethron/migrations-generator' => 
  array (
    'providers' => 
    array (
      0 => 'Way\\Generators\\GeneratorsServiceProvider',
      1 => 'Xethron\\MigrationsGenerator\\MigrationsGeneratorServiceProvider',
    ),
  ),
);