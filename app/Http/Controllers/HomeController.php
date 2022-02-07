<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Service;

class HomeController extends Controller
{
    public function Index(Request $request) {
        $dataset = [
            'economical' => News::where('service_id', 1)->orderByDesc('timestamp')->get(),
            'political' => News::where('service_id', 2)->orderByDesc('timestamp')->get(),
            'accident' => News::where('service_id', 3)->orderByDesc('timestamp')->get(),
        ];
        return view('public.home.index', compact(['dataset']));
    }
}