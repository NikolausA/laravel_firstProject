<?php

namespace App;


class News
{
    private static $news = [
        [
            'id' => 1,
            'title' => 'Funny news',
            'text' => 'There are a lot of jocks here',
            'category_id' => 2
        ],
        [
            'id' => 2,
            'title' => 'Break news',
            'text' => 'Something was going wrong',
            'category_id' => 1
        ],
        [
            'id' => 3,
            'title' => 'What happens',
            'text' => 'It never has been before and happened again',
            'category_id' => 4
        ],
        [
            'id' => 4,
            'title' => 'Gorgeous comeback',
            'text' => 'They did not give up',
            'category_id' => 3
        ],
        [
            'id' => 5,
            'title' => 'Today or never',
            'text' => 'He is going to beat guy who used to be his fan',
            'category_id' => 3
        ]
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsId($id) {
        foreach (static::getNews() as $news) {
            if ($news['id'] == $id) {
                return $news;
            }
        }
        return null;
    }

    public static function selectedNews($id) {
        $selected = [];
        foreach (static::getNews() as $news) {
            if ($news['category_id'] == $id) {
                $selected += $news;
            }
        }
        return $selected;
    }
}
