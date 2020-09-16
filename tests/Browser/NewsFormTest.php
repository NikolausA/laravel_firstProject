<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsFormTest extends DuskTestCase
{
    use RefreshDatabase;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testNewsCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('title', 'News title')
                    ->type('text', 'News text')
                    ->press('Добавить')
                    ->assertSee('Новость добавлена успешно')
                    ->assertPathIs('/news');
        });
    }

    public function testNewsCreateFalse()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'News title')
                ->type('text', '')
                ->check('category')
                ->press('Добавить')
                ->assertSee('Поле Текст новости обязательно для заполнения.')
                ->assertPathIs('/admin/news/create');
        });
    }
}
