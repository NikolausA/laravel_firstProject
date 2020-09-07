<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index() {
        $categories = DB::table('categories')->get();
        return view('news.categories')->with('categories', $categories);
    }

    public function newsByCategory($slug) {
        return view('news.selected', ['selected' => News::getNewsByCategoryName($slug), 'name' => Categories::getCategoryNameBySlug($slug)]);
    }
}
