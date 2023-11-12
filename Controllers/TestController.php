<?php

namespace Chungu\Controllers;

use Chungu\Controllers\Controller;
use Chungu\Core\Mantle\Logger;

class TestController extends Controller {

    public function __construct() {
        //   $this->middleware('auth');
    }
    public function index() {
        $this->json('index');
    }
    public function show($id) {
        $this->json(['show',$id]);
    }
}