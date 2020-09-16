<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('news.categories')->with('categories', $categories);
    }

    public function newsByCategory($slug) {
        $news = Category::query()->where('slug', $slug)->first()->news;
        $name = Category::query()->where('slug', $slug)->value('name');
//        $news = News::query()->where('category_id', $id)->get();
//        dd($name);

        return view('news.selected')->with(['news' => $news, 'name' => $name]);
    }
}
