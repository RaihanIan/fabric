<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Harga;

class HargaBobotSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['harga' => '<100.000', 'bobot' => 5],
            ['harga' => '100k - 110k', 'bobot' => 4],
            ['harga' => '110k - 120k', 'bobot' => 3],
            ['harga' => '120k - 130k', 'bobot' => 2],
            ['harga' => '>130.000', 'bobot' => 1],
        ];

        foreach ($data as $item) {
            Harga::create($item);
        }
    }
}
