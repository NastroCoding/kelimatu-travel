<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'kelimatuadmin@kelimatu.com',
            'password' => Hash::make('travel&tourkelimatu24')
        ]);

        DB::table('configs')->insert([
            'address' => 'Ruko Jl. Persada Raya 70H, RT003 RW015 Menteng Dalam, Tebet, Jakarta, Indonesia 12870',
            'whatsapp_num' => '087771408467',
            'gmail' => 'khighlevel@gmail.com',
            'instagram' => 'kelimatutraveltour',
        ]);
    }
}
