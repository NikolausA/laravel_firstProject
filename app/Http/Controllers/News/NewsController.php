<?php

namespace App\Http\Controllers\News;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public  function index() {
        return view('news.index')->with('news', News::getNews());
    }

    public function oneNews($id) {
        return view('news.one')->with('news', News::getNewsId($id));
    }


}
