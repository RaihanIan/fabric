<?php

namespace Database\Seeders;

use App\Models\Ketersediaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KetersediaanBarangSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['ketersediaan' => 'Sangat Tersedia', 'bobot' => 5],
            ['ketersediaan' => 'Tersedia', 'bobot' => 4],
            ['ketersediaan' => 'Cukup Tersedia', 'bobot' => 3],
            ['ketersediaan' => 'Terbatas', 'bobot' => 2],
            ['ketersediaan' => 'Tidak Tersedia', 'bobot' => 1],
        ];

        foreach ($data as $item) {
            Ketersediaan::create($item);
        }
    }
}
