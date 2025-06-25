<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();
        abort_unless($page, 404);

        return view('public.pages.dynamic-page', [
            'page' => $page->load('operator'),
        ]);
    }

}
