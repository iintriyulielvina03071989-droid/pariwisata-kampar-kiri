<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Destinasi::truncate();
 
    Destinasi::create([
        'nama' => 'Air Terjun Batu Tilam',
        'deskripsi' => 'Tempat wisata ini berada di dalam kawasan hutan belantara Bukit Barisan dan berbatasan langsung dengan Suaka Margasatwa Rimbang Baling',
        'gambar' => 'air-terjun-batu tilam.jpeg',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '17:00:00',
        'lokasi' => 'Desa Kebun Tinggi, Kecamatan Kampar Kiri Hulu, Kabupaten Kampar, Provinsi Riau',
    ]);

    Destinasi::create([
        'nama' => 'Istana Bersejarah Gunung Sahilan',
        'deskripsi' => 'situs cagar budaya peninggalan Kerajaan Gunung Sahilan yang berbentuk rumah panggung kayu khas Melayu.',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '17:00:00',
        'lokasi' => 'Desa Sahilan Darussalam, Kecamatan Gunung Sahilan, Desa Tanjung Belit, Kecamatan Kampar Kiri Hulu, Kabupaten Kampar, Provinsi Riau, Indonesia.',
    ]);
 
   Destinasi::create([
        'nama' => 'Sungai Subayang',
        'deskripsi' => 'Destinasi alam yang terkenal dengan airnya yang jernih, hutan hijau yang asri, serta aktivitas seru seperti naik perahu tradisional (piyau), berkemah, dan menyusuri sungai. Lokasi ini berada di kawasan Suaka Margasatwa Bukit Rimbang Baling, dengan gerbang utama melalui desa wisata seperti Desa Gema dan Desa Tanjung Belit, berjarak sekitar 2,5 hingga 3 jam perjalanan darat dari Kota Pekanbaru.',
        'gambar' => 'sungai_subayang.jpg',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '17:00:00',
        'lokasi' => 'Desa Gema dan Desa Tanjung Belit, Kecamatan Kampar Kiri Hulu, Kabupaten Kampar, Provinsi Riau, Indonesia.',
    ]);
    
    Destinasi::create([
        'nama' => 'Air Terjun Batu Dinding',
        'deskripsi' => 'Air terjun ini relatif lebih mudah diakses dibandingkan dua opsi sebelumnya. Wisatawan biasanya menyewa perahu motor tradisional (sampan) menyusuri sungai jernih, lalu berjalan kaki singkat menembus hutan rimba yang sejuk.',
        'gambar' => 'air-terjun-batu-dinding-kampar-kiri.webp',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '17:00:00',
        'lokasi' => 'Desa Tanjung Belit, Kecamatan Kampar Kiri Hulu, Kabupaten Kampar, Provinsi Riau, Indonesia.',
    ]);
}

}
