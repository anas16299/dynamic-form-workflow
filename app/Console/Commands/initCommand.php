<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class initCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Step 1: Rollback all migrations
        $this->info('Rolling back migrations...');
        Artisan::call('migrate:reset');

        // Step 2: Run migrations
        $this->info('Running migrations...');
        Artisan::call('migrate');

        // Step 3: Run the  seeder
        $this->info('Running  seeder...');
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);

        $this->info('Migrations reset, migrated, and specific seeder executed successfully.');
    }
}
