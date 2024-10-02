<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Simone',
            'email' => 'info@vannucci.ch',
            'password' => Hash::make('p@ssW0rd&'),
        ]);
    }
}
