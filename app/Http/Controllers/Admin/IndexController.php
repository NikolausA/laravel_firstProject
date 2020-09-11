<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index');
    }


    public function page1() {
        return view ('admin.page1');
    }

    public function page2() {
        return view ('admin.page2');
    }
}
