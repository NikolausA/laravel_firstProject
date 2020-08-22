<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        return view('categories')->with('categories', Categories::getCategories());
    }

}
