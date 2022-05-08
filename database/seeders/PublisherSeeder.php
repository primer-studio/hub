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
        /* Service ID 1 */

        DB::table('publishers')->insert(
            [
                'name' => 'Test service',
                'website' => 'test.notld',
                'feeds' => json_encode(['service_id' => 1, 'url' => 'https://no.tld/rss']),
                'avatar' => '',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'گسترش نیوز',
                'website' => 'gostaresh.news',
                'feeds' => '{"feeds":[
                {"service_id":1,"url":"https://www.gostaresh.news/fa/feeds/?p=Y2F0ZWdvcmllcz03"}
                ,{"service_id":4,"url":"https://www.gostaresh.news/fa/feeds/?p=Y2F0ZWdvcmllcz03MQ%2C%2C"}
                ,{"service_id":5,"url":"https://www.gostaresh.news/fa/feeds/?p=Y2F0ZWdvcmllcz0yNg%2C%2C"}
                ]}',
                'avatar' => 'assets/theme/minimal/images/fav/gostaresh.png',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'اقتصاد آنلاین',
                'website' => 'eghtesadonline.com',
                'feeds' => '{"feeds":[
                {"service_id":1,"url":"https://www.eghtesadonline.com/fa/feeds/?p=Y2F0ZWdvcmllcz0xMA%2C%2C"}
                ,{"service_id":2,"url":"https://www.eghtesadonline.com/fa/feeds/?p=Y2F0ZWdvcmllcz0xMjA%2C"}
                ]}',
                'avatar' => 'assets/theme/minimal/images/fav/eghtesadonline.ico',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'اقتصاد نیوز',
                'website' => 'eghtesadnews.com',
                'feeds' => '{"feeds":[{"service_id":1,"url":"https://www.eghtesadnews.com/fa/feeds/?p=Y2F0ZWdvcmllcz02Nw%2C%2C"}]}',
                'avatar' => 'assets/theme/minimal/images/fav/eghtesadnews.ico',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'تسنیم',
                'website' => 'tasnimnews.com',
                'feeds' => '{"feeds":[{"service_id":1,"url":"https://www.tasnimnews.com/fa/rss/feed/0/7/7/%D8%A7%D9%82%D8%AA%D8%B5%D8%A7%D8%AF%DB%8C"}]}',
                'avatar' => 'assets/theme/minimal/images/fav/tasnim.ico',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'مشرق',
                'website' => 'mashreghnews.ir',
                'feeds' => '{"feeds":[{"service_id":1,"url":"https://www.mashreghnews.ir/rss/tp/16"}]}',
                'avatar' => 'assets/theme/minimal/images/fav/mashregh.ico',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'پندار آنلاین',
                'website' => 'pendaronline.news',

                'feeds' => '{"feeds":[{"service_id":1,"url":"https://www.pendaronline.news/fa/feeds/?p=Y2F0ZWdvcmllcz00"}]}',
                'avatar' => 'assets/theme/minimal/images/fav/pendaronline.png',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'اکوایران',
                'website' => 'ecoiran.com',
                'feeds' => '{"feeds":[{"service_id":1,"url":"https://ecoiran.com/fa/feeds/?p=Y2F0ZWdvcmllcz03OQ%2C%2C"}]}',
                'avatar' => 'https://ecoiran.com/favicon.ico',
                'active' => 1,
            ]);

        /* Service ID 3 */

        DB::table('publishers')->insert(
            [
                'name' => 'رکنا',
                'website' => 'rokne.net',
                'feeds' => '{"feeds":[{"service_id":3,"url":"https://www.rokna.net/fa/feeds/?p=Y2F0ZWdvcmllcz0yMw%2C%2C"}]}',
                'avatar' => 'https://www.rokna.net/favicon.ico',
                'active' => 1,
            ]);
        DB::table('publishers')->insert(
            [
                'name' => 'صمت نیوز',
                'website' => 'smtnews.ir',
                'feeds' => '{"feeds":[{"service_id":1,"url":"https://smtnews.ir/rss/v2"}]}',
                'avatar' => 'https://smtnews.ir/assets/image/logo.png',
                'active' => 1,
            ]);

        /* Service ID 4 */

        DB::table('publishers')->insert(
            [
                'name' => 'کتاب نیوز',
                'website' => 'ketabnews.com',
                'feeds' => '{"feeds":[{"service_id":4,"url":"https://ketabnews.com/rss"}]}',
                'avatar' => 'https://ketabnews.com/images/favicon.ico',
                'active' => 1,
            ]);

        /* Service ID 5 */

        DB::table('publishers')->insert(
            [
                'name' => 'خبر ورزشی',
                'website' => 'khabarvarzeshi.com',
                'feeds' => '{"feeds":[{"service_id":5,"url":"https://www.khabarvarzeshi.com/rss"}]}',
                'avatar' => 'https://www.khabarvarzeshi.com/resources/theme/khabarvarzeshi/img/favicon.ico',
                'active' => 1,
            ]);

        DB::table('publishers')->insert(
            [
                'name' => 'باشگاه خبرنگاران جوان',
                'website' => 'yjc.news',
                'feeds' => '{"feeds":[
                {"service_id":3,"url":"https://www.yjc.news/fa/rss/5/99"}
                ,{"service_id":5,"url":"https://www.yjc.news/fa/rss/8"}
                ]}',
                'avatar' => 'https://cdn.yjc.news/client/themes/fa/main/img/favicon.ico',
                'active' => 1,
            ]);

    }
}
