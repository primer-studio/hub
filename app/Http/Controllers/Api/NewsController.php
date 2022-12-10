<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\News;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NewsController extends Controller
{
    public function CacheHandler($key, $value, $seconds)
    {
        Cache::put($key, $value, $seconds);
    }

    public function Index()
    {
        $handler = New HomeController();
        return $handler->CreateDataset();
    }

    public function Publisher($publisher_id, $count)
    {
        if (Cache::has('gostaresh_OwnerNews')) {
            $dataset = Cache::get('gostaresh_OwnerNews');
        } else {
            $publisher = Publisher::findOrFail($publisher_id);
            $dataset = $publisher->news()->latest('timestamp')->take($count)->get();
            $this->CacheHandler('gostaresh_OwnerNews', $dataset, 60);

        }
        return $dataset;
    }
}
