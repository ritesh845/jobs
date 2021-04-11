<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'role_id' => '1',
            'name' => 'Job Admin',
            'email' => 'jobs@physiotherapy.org',
            'email' => '1234567890',
            'password' => Hash::make('password'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'status'		=> 'A'
        ]);

        $user->attachRole('1');

    }
}
