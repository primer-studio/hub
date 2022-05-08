<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\News;
use App\Models\Service;


class HomeController extends Controller
{
    public function CreateDataset()
    {
        if ( Cache::has('index_dataset') ) {
            $dataset = Cache::get('index_dataset');
        }
        else {
            $dataset = [
                'economical' => News::where('publisher_id', '!=', 1)->where('service_id', 1)->orderByDesc('timestamp')->limit(20)->get(),
                'political' => News::where('publisher_id', '!=', 1)->where('service_id', 2)->orderByDesc('timestamp')->limit(20)->get(),
                'accident' => News::where('publisher_id', '!=', 1)->where('service_id', 3)->orderByDesc('timestamp')->limit(20)->get(),
                'cultural' => News::where('publisher_id', '!=', 1)->where('service_id', 4)->orderByDesc('timestamp')->limit(20)->get(),
                'sport' => News::where('publisher_id', '!=', 1)->where('service_id', 5)->orderByDesc('timestamp')->limit(20)->get(),
            ];
            $this->CacheHandler('index_dataset', $dataset, 60*2);

        }
        return $dataset;
    }

    public function CacheHandler($key, $value, $seconds)
    {
        Cache::put($key, $value, $seconds);
    }

    public function Index(Request $request)
    {
        $dataset = $this->CreateDataset();
        $services = Service::all();
        return view('public.home.index', compact(['dataset', 'services']));
    }
}
