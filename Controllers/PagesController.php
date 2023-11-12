<?php

namespace Chungu\Controllers;

use Chungu\Controllers\Controller;
use Chungu\Core\Mantle\Logger;

class PagesController extends Controller {

    public function __construct() {
        //   $this->middleware('auth');
    }
    public function index() {
        
        return view('index');
    }
}