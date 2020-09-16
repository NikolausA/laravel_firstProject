<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()->paginate(4);
        return view('admin.index')->with('news', $news);
    }

    public function create() {
        $news = new News();
        return view ('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get()
            ]);
    }

    public function update(Request $request, News $news) {
        $name = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/images', $request->file('image'));
            $name = Storage::url($path);
        }

        $this->validate($request, News::rules(), [], News::attrName());
        $news->fill($request->all());
        $news->image = $name;
        $result = $news->save();
        if ($result) {
            return redirect()->route('news.oneNews', $news->id)->with('success', 'Новость изменена успешно');
        } else {
            return redirect()->route('admin.news.update')->with('error', 'Ошибка');
        }
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена');
    }

    public function edit(News $news) {
        return view ('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get()
        ]);
    }

    public function store(Request $request) {
        $news = new News();
        $name = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/images', $request->file('image'));
            $name = Storage::url($path);
        }
        $this->validate($request, News::rules(), [], News::attrName());
        $news->fill($request->all());
        $news->image = $name;
        $result = $news->save();
        if ($result) {
            return redirect()->route('news.oneNews', $news->id)->with('success', 'Новость добавлена успешно');
        } else {
            return redirect()->route('admin.news.create')->with('error', 'Ошибка');
        }


    }
}
