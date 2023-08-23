<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:clear-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all cache and browser cache';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('view:cache');
        $this->call('view:clear');
        $this->call('config:cache');
        $this->call('config:clear');
        $this->call('event:cache');
        $this->call('event:clear');
        $this->call('route:cache');
        $this->call('route:clear');
        $this->call('cache:clear');

        $this->info('Cache Cleared .');
    }
}
