<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dipak Admin User',
            'slug' => 'dipak-admin',
            'email' => 'admin@gmail.com',
            'user_type' => 'admin',
            'status' => 1,
            'password' => Hash::make('apungo@123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
