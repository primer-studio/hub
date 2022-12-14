<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function CryptoOverView()
    {
        return view('public.page.crypto-overview');
    }
}
