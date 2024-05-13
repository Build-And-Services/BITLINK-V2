<?php

namespace Database\Seeders;

use App\Models\BenihData;
use App\Models\DataAkunProdusen;
use App\Models\DataMitra;
use App\Models\DinasLuarDaerah;
use App\Models\DinasNganjuk;
use App\Models\DinasNonNganjuk;
use App\Models\Pesanan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $image = $faker->image('public/img/benih', 640, 480, null, false);
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Akun Dinas Non Nganjuk',
            'email' => 'akunnondinas@mail.com',
            'username' => 'AKUN NON DINAS',
            'password' => Hash::make('password123')
        ]);

        $admin = User::factory()->create([
            'name' => 'Akun Dinas Nganjuk',
            'email' => 'akundinas@mail.com',
            'username' => 'AKUN DINAS',
            'role' => 'AKUN DINAS',
            'password' => Hash::make('password123')
        ]);

        $nonDinas = DinasNonNganjuk::create([
            'id_user' => $user->id,
            'nama_instansi' => 'Dinas Kabupaten Kediri',
            'alamat_lengkap' => 'Jl Ahmad Yani',
            'telepon' => '082266784455'
        ]);

        $dinas = DinasNganjuk::create([
            'id_user' => $admin->id,
            'nama_instansi' => 'Dinas Kabupaten Nganjuk',
            'alamat_lengkap' => 'Jl Gajah Mada',
            'telepon' => '083388770099'
        ]);

        $userProdusen1 = User::factory()->create([
            'name' => 'Produsen 1',
            'username' => 'produsen1',
            'role' => 'PRODUSEN',
            'email' => 'produsen1@mail.com',
            'password' => Hash::make('password123')
        ]);
        $userProdusen2 = User::factory()->create([
            'name' => 'Produsen 2',
            'username' => 'produsen2',
            'role' => 'PRODUSEN',
            'email' => 'produsen2@mail.com',
            'password' => Hash::make('password123')
        ]);
        $userProdusen3 = User::factory()->create([
            'name' => 'Produsen 3',
            'username' => 'produsen3',
            'role' => 'PRODUSEN',
            'email' => 'produsen3@mail.com',
            'password' => Hash::make('password123')
        ]);

        $mitra1 = DataMitra::create([
            'nama_mitra' => 'Kelompok Tani Jaya Berkah'
        ]);
        $mitra2 = DataMitra::create([
            'nama_mitra' => 'Kelompok Tani Indonesia Maju'
        ]);
        $mitra3 = DataMitra::create([
            'nama_mitra' => 'Kelompok Subur Abadi'
        ]);

        $dataProdusen1 = DataAkunProdusen::create([
            'id_user' => $userProdusen1->id,
            'nama_perusahaan' => 'PT Gudang Garam Merah',
            'nomor_legalitas_usaha' => '9120106570390',
            'alamat_lengkap' => 'Jl Sumatera',
            'telepon' => '087178903345',
            'id_kemitraan' => $mitra1->id_kemitraan,
        ]);
        $dataProdusen2 = DataAkunProdusen::create([
            'id_user' => $userProdusen2->id,
            'nama_perusahaan' => 'PT HM Sampoerna',
            'nomor_legalitas_usaha' => '9120106577843',
            'alamat_lengkap' => 'Jl Kalimantan',
            'telepon' => '087178903345',
            'id_kemitraan' => $mitra2->id_kemitraan,
        ]);
        $dataProdusen3 = DataAkunProdusen::create([
            'id_user' => $userProdusen3->id,
            'nama_perusahaan' => 'PT Djarum Indonesia',
            'nomor_legalitas_usaha' => '9120106574387',
            'alamat_lengkap' => 'Jl Riau',
            'telepon' => '087178903345',
            'id_kemitraan' => $mitra3->id_kemitraan,
        ]);

        $benih1 = BenihData::create([
            'varietas' => 'Edamame',
            'jenis_benih' => 'kedelai',
            'stok_benih' => 200,
            'kualitas_benih' => 'Benih Pokok',
            'harga_benih' => 15000,
            'foto_benih' => url("/img/benih/{$image}"),
            'tgl_masuk' => now(),
            'turun_gudang' => 10,
            'jemur_kering' => 10,
            'blower1' => 10,
            'benih_susut' => 10,
            'biji_kecil' => 10,
            'jumlah_benih' => 10,
            'id_akunp' => $userProdusen1->id
        ]);

        $benih1 = BenihData::create([
            'varietas' => 'Logawa',
            'jenis_benih' => 'padi',
            'stok_benih' => 170,
            'kualitas_benih' => 'Benih Pokok',
            'harga_benih' => 20000,
            'foto_benih' => url("/img/benih/{$image}"),
            'tgl_masuk' => now(),
            'turun_gudang' => 10,
            'jemur_kering' => 10,
            'blower1' => 10,
            'benih_susut' => 10,
            'biji_kecil' => 10,
            'jumlah_benih' => 10,
            'id_akunp' => $userProdusen1->id
        ]);
        $benih2 = BenihData::create([
            'varietas' => 'Kedelai Putih',
            'jenis_benih' => 'kedelai',
            'stok_benih' => 200,
            'kualitas_benih' => 'Benih Pokok',
            'harga_benih' => 20000,
            'foto_benih' => url("/img/benih/{$image}"),
            'tgl_masuk' => now(),
            'turun_gudang' => 10,
            'jemur_kering' => 10,
            'blower1' => 10,
            'benih_susut' => 10,
            'biji_kecil' => 10,
            'jumlah_benih' => 10,
            'id_akunp' => $userProdusen2->id
        ]);

        $benih2 = BenihData::create([
            'varietas' => 'Padi Ketan',
            'jenis_benih' => 'padi',
            'stok_benih' => 150,
            'kualitas_benih' => 'Benih Pokok',
            'harga_benih' => 35000,
            'foto_benih' => url("/img/benih/{$image}"),
            'tgl_masuk' => now(),
            'turun_gudang' => 10,
            'jemur_kering' => 10,
            'blower1' => 10,
            'benih_susut' => 10,
            'biji_kecil' => 10,
            'jumlah_benih' => 10,
            'id_akunp' => $userProdusen2->id
        ]);
        $benih3 = BenihData::create([
            'varietas' => 'Kedelai Kuning',
            'jenis_benih' => 'kedelai',
            'stok_benih' => 200,
            'kualitas_benih' => 'Benih Pokok',
            'harga_benih' => 12000,
            'foto_benih' => url("/img/benih/{$image}"),
            'tgl_masuk' => now(),
            'turun_gudang' => 10,
            'jemur_kering' => 10,
            'blower1' => 10,
            'benih_susut' => 10,
            'biji_kecil' => 10,
            'jumlah_benih' => 10,
            'id_akunp' => $userProdusen3->id
        ]);

        $benih3 = BenihData::create([
            'varietas' => 'Padi Merah',
            'jenis_benih' => 'padi',
            'stok_benih' => 150,
            'kualitas_benih' => 'Benih Pokok',
            'harga_benih' => 25000,
            'foto_benih' => url("/img/benih/{$image}"),
            'tgl_masuk' => now(),
            'turun_gudang' => 10,
            'jemur_kering' => 10,
            'blower1' => 10,
            'benih_susut' => 10,
            'biji_kecil' => 10,
            'jumlah_benih' => 10,
            'id_akunp' => $userProdusen3->id
        ]);

        $pesanan = Pesanan::create([
            'id_benih' => $benih1->id_benih,
            'id_user' => $user->id,
            'quantity' => 10,
            'harga' => 50000,
            'alamat_lengkap' => 'Jl. Papua',
            'telepon' => '082318471623',
        ]);
    }
}
