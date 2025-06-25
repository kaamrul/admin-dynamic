<?php

namespace App\Http\Controllers\Public;

use App\Models\Post;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // $news = Post::with('operator')->featured()->active()->limit(3)->get();

        // $sliders = Slider::active()->featured()->orderBy('order', 'asc')->get();

        return view('public.pages.landing.index', [
            'news'    => [],
            'sliders' => [],
        ]);
    }
}
