<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function TestRedis()
    {
        $client = new \Predis\Client();
//        $client->set('foo', 'bar');
        $value = $client->get('foo');
        return $value;
    }

    public function Chat()
    {
        return 'will be chatroom here ...';
    }
}
