<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('supplier')->insert([
            [
                'nama_supplier' => 'GantiKain',
                'foto_supplier' => null, // Bisa diisi dengan path gambar jika ada
                'email' => 'info@gantikain.com',
                'alamat' => 'Jl. Merdeka No. 1, Jakarta',
                'catatantambahan' => 'Supplier kain premium terbaik',
                'harga_id' => 1, // Sesuaikan dengan ID di tabel harga
                'jenis_id' => 1, // Sesuaikan dengan ID di tabel jenis_kain
                'ketersediaan_id' => 1, // Sesuaikan dengan ID di tabel ketersediaan
                'skor' => 90, // Nilai skor sesuai kriteria
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Kampung Batik',
                'foto_supplier' => null,
                'email' => 'info@kampungbatik.com',
                'alamat' => 'Jl. Diponegoro No. 2, Solo',
                'catatantambahan' => 'Spesialis kain batik dengan motif tradisional',
                'harga_id' => 2,
                'jenis_id' => 2,
                'ketersediaan_id' => 1,
                'skor' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_supplier' => 'Bahan Bersama',
                'foto_supplier' => null,
                'email' => 'info@bahanbersama.com',
                'alamat' => 'Jl. Sudirman No. 3, Bandung',
                'catatantambahan' => 'Pilihan ekonomis untuk kain dengan kualitas memadai',
                'harga_id' => 3,
                'jenis_id' => 3,
                'ketersediaan_id' => 2,
                'skor' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
