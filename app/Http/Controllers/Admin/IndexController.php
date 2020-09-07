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

    public function create(Request $request) {
        if ($request->isMethod('post')) {

            $name = null;
            if ($request->file('image')) {
                $path = \Storage::putFile('public/images', $request->file('image'));
                $name = \Storage::url($path);
            }
            $data[] = [
                'title' => $request->title,
                'text' => $request->text,
                'isPrivate' => isset($request->isPrivate),
//                'category' => $request->category,
                'image' => $name
            ];
//            dd($data);
            $id = DB::table('news')->insertGetId([
                'title' => $request->title,
                'text' => $request->text,
                'isPrivate' => isset($request->isPrivate),
                'image' => $name
            ]);

//            $id = array_key_last($data);
//            $data[$id]['id'] = $id;
//            File::put(storage_path() . '/news.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
//            $request->flash();
            return redirect()->route('news.oneNews', $id)->with('success', 'Новость добавлена успешно');
        }
        return view ('admin.create', ['categories' => Categories::getCategories()]);
    }

    public function page1() {
        return view ('admin.page1');
    }

    public function page2() {
        return view ('admin.page2');
    }
}
