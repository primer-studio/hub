<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoveDuplicateNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:unique';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete duplicate news.';

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
        $job->RemoveDuplicates();
        echo "Renewing the system cache ...\r\n";
        $status = \Artisan::call('cache:clear');
        echo "System cache is fresh now.\r\n";
        echo "Process takes " . microtime(true) - LARAVEL_START . " seconds to exec.";
        return 0;
    }
}
