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
            'visi' => 'Menjadi penyelenggara umroh terdepan dengan fasilitas terbaik, mengutamakan nilai spiritual dan kepuasan layanan kepada Tamu Allah.',
            'misi' => '- Memberikan layanan terbaik, nyaman, kompetitif dan memuaskan bagi jamaah.
            - Melakukan edukasi pemahaman kepada masyarakat dalam memilih penyelenggara umroh haji yang baik dan benar.
            - Memberikan sentuhan nilai spiritual kepada jemaah.
            - Menjaga dan merawat silaturahmi kepada jemaah pasca kepulangan dari Tanah Suci.',
            'history' => 'Pada akuisisi saham PT. Emaar Pesona Wisata, pengurus baru PT. Emaar Pesona Wisata telah mengubah branding nama menjadi "Kelimatu Travel & Tours", dengan domisili yang tetap, serta memiliki izin PPIU (Penyelenggara Perjalanan Ibadah Umroh) dari Kementerian Agama RI dengan nomor 12860016215810006. Kami fokus pada penyediaan produk perjalanan ibadah umroh. Insya allah dalam waktu dekat kami akan segera mengurus PIHK (Penyelenggara Ibadah Haji Khusus)',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d416.90209824202327!2d106.84648490626037!3d-6.228946038477268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f39231e44cfd%3A0xc599df0bb0956bf4!2sJl.%20Persada%20Raya%20No.70%2C%20RT.3%2FRW.15%2C%20Kuningan%2C%20Menteng%20Dalam%2C%20Kec.%20Tebet%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012870!5e0!3m2!1sen!2sid!4v1720001500411!5m2!1sen!2sid',
            'operational' => 'Senin-Jumat, 09.00 - 18.00
            Sabtu, 09.00 - 18.00
            Minggu, 09.00 - 12.00',
            'gmail' => 'khighlevel@gmail.com',
            'instagram' => 'kelimatutraveltour',
            'title_info' => 'Umroh Adalah',
            'info' => "Umrah secara bahasa bisa diartikan berziarah. Sedangkan menurut istilah, umroh adalah menyengaja menuju Ka'bah untuk melaksanakan ibadah tertentu.

Dalam syariat Islam, Umroh adalah berkunjung ke Baitullah atau (Masjidil Haram) dengan tujuan untuk mendekatkan diri kepada Sang Khalik yakni Allah SWT dengan memenuhi seluruh syarat-syaratnya, serta waktu tak ditentukan pada seperti ibadah haji.",
            'title_info2' => 'Mengapa Harus Umroh?',
            'info2' => "Mayoritas penduduk Indonesia adalah muslim. Sudah barang tentu, setiap seorang muslim sangat mendambakan dan merindukan untuk bisa pergi ke Tanah Suci melaksanakan umroh maupun haji.

Umumnya masyarakat Indonesia memilih untuk menunaikan ibadah umroh terlebih dahulu, dikarenakan panjangnya antrian untuk bisa melakukan ibadah haji di Indonesia

Bagi sebagian masyarakat muslim di Indonesia melaksankan ibadah umroh bukan hanya diperuntukan bagi orang-orang yang mampu saja. Tapi yakinlah bahwa Allah SWT akan memampukan orang-orang yang terpanggil untuk berumroh.

Untuk bisa menjadi yang terpanggil tentunya niat saja tidak cukup. Kita harus awali dengan memantaskan diri agar diterima dan bisa menjadi Tamu Allah. Caranya yaitu mengiringinya dengan keinginan yang kuat, berdoa setiap waktu, dan ditambah dengan ikhtiar tindakan atau usaha kita dalam mewujudkannya.",
                'quote' => '"Kalau Allah sudah memanggil, kalau Allah sudah mengundang, dengan cara apapun kita pasti akan mengunjunginya, Insyaa Allah kita akan dimudahkan hadir ke Baitullah"'
        ]);
    }
}
