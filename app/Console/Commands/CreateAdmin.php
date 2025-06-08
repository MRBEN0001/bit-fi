<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

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
        User::create([
            'name' => 'admin',
            'username' => 'asset-chain',
            'email' => 'admin@asset-chain.top',
            'password' => Hash::make('password@asset-chain'),
            'is_admin' => true
        ]);
        echo 'Admin Created';
    }
}
