<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function index() {
        $news = [];
        $xml = XmlParser::load('https://lenta.ru/rss');
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'description' => ['uses' => 'channel.description'],
            'link' => ['uses' => 'channel.item.title'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[guid,title,link,description,pubDate,enclosure::url,category]']
        ]);
//        dd($xml);
//        dd($data['news'][0]['title']);
        foreach ($data['news'] as $news) {
            if ($news['category']) {
                $category = Category::query()->firstOrCreate([
                    'name' => $news['category'],
                    'slug' => Str::slug($news['category'])
                ]);

                News::query()->firstOrCreate([
                    'title' => $news['title'],
                    'text' => $news['description'],
                    'isPrivate' => false,
                    'image' => $news['enclosure::url'],
//                    'created_at' => $news['pubDate'],
                    'category_id' => $category->id
                ]);
            }
        }
//        dd($news);
        return redirect()->route('news.News');
    }
}




