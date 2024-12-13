<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisKainSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['jenis' => 'Katun Combed', 'bobot' => 5],
            ['jenis' => 'Katun Carded', 'bobot' => 4],
            ['jenis' => 'Polyester', 'bobot' => 3],
            ['jenis' => 'Viscose', 'bobot' => 2],
            ['jenis' => 'CVC (Cotton Viscose)', 'bobot' => 1],
        ];

        foreach ($data as $item) {
            Jenis::create($item);
        }    
    }
}
