<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:test {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test given feed url.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        return $this->argument('url');
        $job = New \App\Http\Controllers\NewsController();
        $job->TestFeed($this->argument('url'));
        return 0;
    }
}
