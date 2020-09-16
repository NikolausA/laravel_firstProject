<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(News::class, 10)->create();
    }

    public function getData(): array {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i=0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 30)),
                'text' => $faker->realText(rand(10, 200)),
                'isPrivate' => (boolean)rand(0, 1),
            ];
        }
        return $data;
    }
}
