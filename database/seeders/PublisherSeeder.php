<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert(
        [
            'name' => 'گسترش نیوز',
            'website' => 'gostaresh.news',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://www.gostaresh.news/fa/feeds/?p=Y2F0ZWdvcmllcz04Mw%2C%2C']),
            'avatar' => 'assets/theme/minimal/images/fav/gostaresh.png',
            'active' => 1,
        ]);
        DB::table('publishers')->insert(
        [
            'name' => 'اقتصاد آنلاین',
            'website' => 'eghtesadonline.com',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://www.eghtesadonline.com/fa/feeds/?p=Y2F0ZWdvcmllcz0xMA%2C%2C']),
            'avatar' => 'assets/theme/minimal/images/fav/eghtesadonline.ico',
            'active' => 1,
        ]);
        DB::table('publishers')->insert(
        [
            'name' => 'اقتصاد نیوز',
            'website' => 'eghtesadnews.com',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://www.eghtesadnews.com/fa/feeds/?p=Y2F0ZWdvcmllcz02Nw%2C%2C']),
            'avatar' => 'assets/theme/minimal/images/fav/eghtesadnews.ico',
            'active' => 1,
        ]);
        DB::table('publishers')->insert(
        [
            'name' => 'تسنیم',
            'website' => 'tasnimnews.com',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://www.tasnimnews.com/fa/rss/feed/0/7/7/%D8%A7%D9%82%D8%AA%D8%B5%D8%A7%D8%AF%DB%8C']),
            'avatar' => 'assets/theme/minimal/images/fav/tasnim.ico',
            'active' => 1,
        ]);
        DB::table('publishers')->insert(
        [
            'name' => 'مشرق',
            'website' => 'mashreghnews.ir',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://www.mashreghnews.ir/rss/tp/16']),
            'avatar' => 'assets/theme/minimal/images/fav/mashregh.ico',
            'active' => 1,
        ]);
        DB::table('publishers')->insert(
        [
            'name' => 'پندار آنلاین',
            'website' => 'pendaronline.news',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://www.pendaronline.news/fa/feeds/?p=Y2F0ZWdvcmllcz00']),
            'avatar' => 'assets/theme/minimal/images/fav/pendaronline.png',
            'active' => 1,
        ]);
        DB::table('publishers')->insert(
        [
            'name' => 'اکوایران',
            'website' => 'ecoiran.com',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://ecoiran.com/fa/feeds/?p=Y2F0ZWdvcmllcz03OQ%2C%2C']),
            'avatar' => 'https://ecoiran.com/favicon.ico',
            'active' => 1,
        ]);
        DB::table('publishers')->insert(
        [
            'name' => 'رکنا',
            'website' => 'rokne.net',
            'feeds' => json_encode(['service_id' => 1, 'url' => 'https://www.rokna.net/fa/feeds/?p=Y2F0ZWdvcmllcz0yMw%2C%2C']),
            'avatar' => 'https://www.rokna.net/favicon.ico',
            'active' => 1,
        ]);
    }
}
