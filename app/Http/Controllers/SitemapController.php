<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publisher;
use App\Models\Service;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function Index() {
        return response()
            ->view('public.sitemap.index')
            ->header('Content-Type','text/xml');

    }

    public function News() {
        $news = News::where('publisher_id', '!=', 1)->orderByDesc('timestamp')->take(300)->get();
        return response()
            ->view('public.sitemap.news', compact('news'))
            ->header('Content-Type','text/xml');
    }

    public function Service() {
        $services = Service::where('active', '=', 1)
            ->latest()->get();
        return response()
            ->view('public.sitemap.service', compact('services'))
            ->header('Content-Type','text/xml');
    }

    public function Publisher() {
        $publishers = Publisher::where('active', 1)->get();
        return response()
            ->view('public.sitemap.publisher', compact('publishers'))
            ->header('Content-Type','text/xml');
    }

    public function Tag() {
        $tags = Tag::latest()->limit(50)->get();
        return response()
            ->view('public.sitemap.tag', compact('tags'))
            ->header('Content-Type','text/xml');
    }
}
