<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tags:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate tags with count of uses less than 3, and activate which used more than 3.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $job = new \App\Http\Controllers\TagController();
        $this->comment("Cleaning tags dataset ...");
        $job->DummiesDeactiveJob();
        $this->comment("Renewing the system cache ...");
        $status = \Artisan::call('cache:clear');
        $this->question("System cache is fresh now.");
        $this->info("Process takes " . (int) (microtime(true) - LARAVEL_START) . " seconds to exec.");
    }
}
