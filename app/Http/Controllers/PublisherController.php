<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function Show($id, $slug)
    {
        $publisher = Publisher::findOrFail($id);
        $news = News::all()->unique();
        $news = $publisher->news()->latest('timestamp')->paginate(70);
        return view('public.publisher.index', compact(['publisher', 'news']));
    }
}
