<?php

namespace App\Http\Controllers\News;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public  function index() {
        return view('news.news')->with('news', News::getNews());
    }

    public function oneNews($id) {
        return view('news.newsOne')->with('news', News::getNewsId($id));
    }

    public function newsByCategory($id, $name) {
        return view('news.selected', ['selected' => News::selectedNews($id), 'name' => $name]);
    }
}
