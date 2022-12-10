<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $news = $service->news()->latest('timestamp')->paginate(70);
        return view('public.service.index', compact(['service', 'news']));
    }
}
