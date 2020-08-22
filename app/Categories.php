<?php

namespace App;
use App\News;

class Categories
{
    private static $categories = [
        [
            'id' => 1,
            'name' => 'Срочно',
            'slug' => 'break'
        ],
        [
            'id' => 2,
            'name' => 'Политика',
            'slug' => 'politic'
        ],
        [
            'id' => 3,
            'name' => 'Спорт',
            'slug' => 'sport'
        ],
        [
            'id' => 4,
            'name' => 'Бизнес',
            'slug' => 'business'
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }
}
