<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return view('news.categories')->with('categories', Categories::getCategories());
    }

    public function newsByCategory($slug) {
        return view('news.selected', ['selected' => News::getNewsByCategoryName($slug), 'name' => Categories::getCategoryNameBySlug($slug)]);
    }
}
