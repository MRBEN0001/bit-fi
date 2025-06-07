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
            'username' => 'smart-wealth',
            'email' => 'admin@smart-wealth.uk',
            'password' => Hash::make('secret@smart-wealth'),
            'is_admin' => true
        ]);
        echo 'Admin Created';
    }
}
