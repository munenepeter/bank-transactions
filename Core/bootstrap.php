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

//configure config to always point to env
App::bind('config', Config::load()); 

print_r(App::get('config'));

session_start();

/**
 *Bind the Database credentials and connect to the app
 *Bind the requred database file above to 
 *an instance of the connections
*/

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['db'])
));
