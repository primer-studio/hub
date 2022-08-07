<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\News;
use App\Models\Service;


class HomeController extends Controller
{
    public function CreateDataset()
    {
        if (Cache::has('index_dataset')) {
            $dataset = Cache::get('index_dataset');
        } else {
            $dataset = [
                'economical' => News::where('publisher_id', '!=', 1)->where('service_id', 1)->orderByDesc('timestamp')->limit(20)->get(),
                'political' => News::where('publisher_id', '!=', 1)->where('service_id', 2)->orderByDesc('timestamp')->limit(20)->get(),
                'accident' => News::where('publisher_id', '!=', 1)->where('service_id', 3)->orderByDesc('timestamp')->limit(20)->get(),
                'cultural' => News::where('publisher_id', '!=', 1)->where('service_id', 4)->orderByDesc('timestamp')->limit(20)->get(),
                'sport' => News::where('publisher_id', '!=', 1)->where('service_id', 5)->orderByDesc('timestamp')->limit(20)->get(),
            ];
            $this->CacheHandler('index_dataset', $dataset, 60 * 2);

        }
        return $dataset;
    }

    public function CreateTabset()
    {
        if (Cache::has('index_tabset')) {
            $dataset = Cache::get('index_tabset');
        } else {
            $dataset = [
                'today_hits' => News::where('publisher_id', '!=', 1)->whereDate('created_at', Carbon::today())->orderByDesc('hits')->limit(20)->get(),
                'suggested' => News::where('publisher_id', '!=', 1)->whereDate('created_at', Carbon::today())->orderBy('hits')->limit(20)->get(),
                'recent' => News::where('publisher_id', '!=', 1)->whereDate('created_at', Carbon::today())->orderByDesc('timestamp')->limit(20)->get(),
            ];
            $this->CacheHandler('index_tabset', $dataset, 60 * 2);

        }
        return $dataset;
    }

    public function CreateHitset()
    {
        if (Cache::has('index_hitset')) {
            $dataset = Cache::get('index_hitset');
        } else {
            $dataset = News::where('publisher_id', '!=', 1)->whereDate('created_at', Carbon::today())->orderByDesc('hits')->limit(5)->get();
            $this->CacheHandler('index_hitset', $dataset, 60 * 2);

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
        $hitset = $this->CreateHitset();
        $services = Service::all();
        return view('public.home.index', compact(['dataset', 'hitset' ,'services']));
    }

    public function RealTime()
    {
        return view('public.realtime.index');
    }
}
