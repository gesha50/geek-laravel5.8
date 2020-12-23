<?php

use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    protected $links = [
        'https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/auto_racing.rss',
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/gadgets.rss',
        'https://news.yandex.ru/index.rss',
        'https://news.yandex.ru/health.rss',
        'https://news.yandex.ru/games.rss',
        'https://news.yandex.ru/internet.rss',
        'https://news.yandex.ru/cyber_sport.rss',
        'https://news.yandex.ru/movies.rss',
        'https://news.yandex.ru/cosmos.rss',
        'https://news.yandex.ru/culture.rss',
        'https://news.yandex.ru/championsleague.rss',
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/nhl.rss',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->links as $link){
            $arr = ['link' => $link];
            \DB::table('resources')->insert($arr);
        }
    }
}
