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
            'slug' => 'politics'
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

    public static function getCategoryIdByName($slug) {
        $id = null;
        foreach (static::$categories as $category) {
            if ($category['slug'] == $slug) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategoryNameBySlug($slug) {
        $name = null;
        foreach (static::$categories as $category) {
            if ($category['slug'] == $slug) {
                $name = $category['name'];
                break;
            }
        }
        return $name;
    }

    public static function getCategoryById($id) {
        return static::$categories[$id];
    }
}
