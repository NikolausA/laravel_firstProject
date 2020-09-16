<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=[
            [
                'name' => 'Политика',
                'slug' => 'Politics',
            ],
            [
                'name' => 'Спорт',
                'slug' => 'Sport',
            ],
            [
                'name' => 'Бизнес',
                'slug' => 'Business',
            ],
            [
                'name' => 'Наука',
                'slug' => 'Science',
            ],
            [
                'name' => 'Местные',
                'slug' => 'Local',
            ],
        ];

        DB::table('categories')->insert($category);
    }
}
