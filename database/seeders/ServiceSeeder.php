<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'title' => 'اقتصادی',
            'slug' => 'اخبار-اقتصادی',
            'active' => 1
        ]);
        DB::table('services')->insert([
            'title' => 'سیاسی',
            'slug' => 'اخبار-سیاسی',
            'active' => 1
        ]);
    }
}
