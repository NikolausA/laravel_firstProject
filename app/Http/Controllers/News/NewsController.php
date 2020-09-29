<?php

namespace App\Http\Controllers\News;

use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public  function index() {
        $news = News::query()->paginate(4);
        return view('news.index', ['news' => $news]);
    }

    public function oneNews(News $news) {
        return view('news.one')->with('news', $news);
    }


}
