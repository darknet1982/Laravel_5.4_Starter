<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InverseSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adv:iseed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates necessary seed files from the current database.';

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
     * @return mixed
     */
    public function handle()
    {
        $this->info('Creating Home Page seed');
        Artisan::call('iseed', [
            '--exclude' => 'id',
            'tables' => 'home_page',
            '--force' => true
        ]);

        $this->info('Creating Contact Page seed');
        Artisan::call('iseed', [
            '--exclude' => 'id',
            'tables' => 'contact_form',
            '--force' => true
        ]);

        $this->info('Creating roles seed');
        Artisan::call('iseed', [
            'tables' => 'roles',
            '--exclude' => 'id',
            '--force' => true
        ]);

        $this->info('Creating permissions seed');
        Artisan::call('iseed', [
            '--exclude' => 'id',
            'tables' => 'permissions',
            '--force' => true
        ]);

        $this->info('Creating permission_roles seed');
        Artisan::call('iseed', [
            'tables' => 'permission_roles',
            '--force' => true
        ]);

        $this->info('Creating permission_users seed');
        Artisan::call('iseed', [
            'tables' => 'permission_users',
            '--force' => true
        ]);

        $this->info('Creating role_users seed');
        Artisan::call('iseed', [
            'tables' => 'role_users',
            '--force' => true
        ]);

    }
}