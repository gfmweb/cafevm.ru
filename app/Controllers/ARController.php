<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ARController extends BaseController
{
    public function index()
    {
       $redis = new \Redis();
       $redis->connect('80.87.196.133',6379);
       $keys = $redis->keys('*');
       var_dump($keys);

    }
}
