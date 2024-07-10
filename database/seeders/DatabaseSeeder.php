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
            'password' => Hash::make('travel&tripkelimatu24')
        ]);

        DB::table('configs')->insert([
            'address' => 'PT. LTE Holding (PT. Kelimatu Travel & Tours) Jl. Persada Raya No. 70H T03 RT015 Kel. Menteng Dalam, Kec. Tebet - Jakarta Selatan.',
            'whatsapp_num' => '085171688927',
            'gmail' => 'kelimatutravel@gmail.com',
            'instagram' => '@kelimatutravel',
        ]);
    }
}
