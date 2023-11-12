<?php

use Chungu\Core\Mantle\App;
use Chungu\Core\Database\Connection;
use Chungu\Core\Database\QueryBuilder;
use Chungu\Core\Mantle\Mail;

//change TimeZone
date_default_timezone_set('Africa/Nairobi'); 
//production development
define('ENV','development');

//require all files here
require 'helpers.php';


require_once __DIR__.'/../vendor/autoload.php';


$envFilePath = __DIR__.'/.env';
$config = new Config($envFilePath);
$result = $config->load();

print_r($result);


//configure config to always point to config.php
App::bind('config', require 'config.php'); 

session_start();

$database = (is_dev()) ? App::get('config')['sqlite'] : App::get('config')['mysql'];

/**
 *Bind the Database credentials and connect to the app
 *Bind the requred database file above to 
 *an instance of the connections
*/

App::bind('database', new QueryBuilder(
    Connection::make($database)
));

App::bind('mailer', new Mail(App::get('config')['mail']));
