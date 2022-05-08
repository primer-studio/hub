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
        ]);//1
        DB::table('services')->insert([
            'title' => 'سیاسی',
            'slug' => 'اخبار-سیاسی',
            'active' => 1
        ]);//2
        DB::table('services')->insert([
            'title' => 'حوادث',
            'slug' => 'اخبار-حوادث',
            'active' => 1
        ]);//3
        DB::table('services')->insert([
            'title' => 'فرهنگی',
            'slug' => 'اخبار-فرهنگی',
            'active' => 1
        ]);//4
        DB::table('services')->insert([
            'title' => 'ورزشی',
            'slug' => 'اخبار-ورزشی',
            'active' => 1
        ]);//5
    }
}
