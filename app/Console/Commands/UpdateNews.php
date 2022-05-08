<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Publisher;

class UpdateNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update publishers news.';

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
        $job = new \App\Http\Controllers\NewsController;
        $job->XMLrender();
        echo "Process takes " . microtime(true) - LARAVEL_START . " seconds to exec.";
        return 0;
    }
}
