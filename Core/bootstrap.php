<?php

use Chungu\Core\Mantle\App;
use Chungu\Core\Database\Connection;
use Chungu\Core\Database\QueryBuilder;
use Chungu\Core\Mantle\Config;

//change TimeZone
date_default_timezone_set('Africa/Nairobi'); 
//production development
define('ENV','development');
define('APP_ROOT', __DIR__."/../");

//require all files here
require 'helpers.php';



require_once __DIR__.'/../vendor/autoload.php';


$config = Config::load();

print_r($config);


//configure config to always point to config.php
App::bind('config', require 'config.php'); 

session_start();


/**
 *Bind the Database credentials and connect to the app
 *Bind the requred database file above to 
 *an instance of the connections
*/

App::bind('database', new QueryBuilder(
    Connection::make($config['db'])
));
